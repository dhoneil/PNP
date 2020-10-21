<?php 

class Model_reports extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*getting the total months*/
	private function months()
	{
		return array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
	}

	/* getting the year of the orders */
	public function getOrderYear()
	{
		$sql = "SELECT * FROM orders WHERE paid_status = ?";
		$query = $this->db->query($sql, array(1));
		$result = $query->result_array();
		
		$return_data = array();
		foreach ($result as $k => $v) {
			$date = date('Y', $v['date_time']);
			$return_data[] = $date;
		}

		$return_data = array_unique($return_data);

		return $return_data;
	}

	// getting the order reports based on the year and moths
	public function getOrderData($year)
	{	
		if($year) {
			$months = $this->months();
			
			$sql = "SELECT * FROM orders WHERE return = 'No' and paid_status = ?";
			$query = $this->db->query($sql, array(1));
			$result = $query->result_array();

			$final_data = array();
			foreach ($months as $month_k => $month_y) {
				$get_mon_year = $year.'-'.$month_y;	

				$final_data[$get_mon_year][] = '';
				foreach ($result as $k => $v) {
					$month_year = date('Y-m', $v['date_time']);

					if($get_mon_year == $month_year) {
						$final_data[$get_mon_year][] = $v;
					}
				}
			}	


			return $final_data;
			
		}
	}
	
	public function getSalesByCustomer()
	{
		$from_date = strtotime($this->session->userdata('from_date'));
		$to_date = strtotime($this->session->userdata('to_date'));
		$sql = "SELECT a.id,a.customer_name, a.customer_address,
		(select sum(b.net_amount) from orders b where (b.date_time between $from_date and $to_date) and b.return = 'No' and b.paid_status = 1 and b.customer_id = a.id)as total_paid_sales, 
		(select sum(b.net_amount) from orders b where (b.date_time between $from_date and $to_date) and b.return = 'No' and b.paid_status = 2 and b.customer_id = a.id)as total_unpaid_sales 
		FROM `customers` a";
		$query = $this->db->query($sql);
		return $query->result_array();	
		
	}
	
	public function getProductDistribution($id = null)
	{	
		if($id) {
			$sql = "SELECT * FROM (
    (SELECT a.bill_no as ref_no, 'orders' as cs_type, a.id as id, a.date_time as ddate, d.customer_name AS cs_name, 
	d.customer_address AS cs_address, b.qty as noitems, c.name as productname, c.qty as balance, c.id as product_id  
     FROM orders a left join orders_item b on b.order_id = a.id left join customers d on d.id = a.customer_id 
	 left join products c on c.id = b.product_id)
    UNION ALL
    (SELECT a.bill_no as ref_no, 'receive' as cs_type, a.id as id, a.date_time as ddate, d.supplier_name AS cs_name, 
	d.supplier_address AS cs_address, b.qty as noitems, c.name as productname, c.qty as balance, c.id as product_id     
     FROM receive a left join receive_item b on b.receive_id = a.id left join suppliers d on d.id = a.supplier_id 
	 left join products c on c.id = b.product_id)
) inandout 
WHERE inandout.product_id = ? 
ORDER BY inandout.ddate ASC";

			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		
			
		}
	}
	
	public function getOverallInventory()
	{
		$sql = "select a.*, 
       (select sum(oi.qty)
        from orders_item oi
        where oi.product_id = a.id
       ) as order_items,
       (select sum(ri.qty)
        from receive_item ri
        where ri.product_id = a.id
       ) as receive_items
from products a";
		$query = $this->db->query($sql);
		return $query->result_array();	
	}
	
	public function getSalesCustomer( $id )
	{
		$from_date = strtotime($this->session->userdata('from_date'));
		$to_date = strtotime("+1 day",strtotime($this->session->userdata('to_date')));
		$sql = "SELECT * FROM orders where (date_time between $from_date and $to_date) and return = 'No' and customer_id = $id order by date_time asc";
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		return $query->result_array();	
		
	}
	
	public function getDeailSalesReport()
	{
		$from_date = strtotime($this->session->userdata('from_date'));
		$to_date = strtotime("+1 day",strtotime($this->session->userdata('to_date')));
		$sql = "SELECT a.*,b.customer_name,b.customer_address FROM orders a left join customers b on b.id = a.customer_id where (a.date_time between $from_date and $to_date) and a.return = 'No' order by a.date_time asc";
		$query = $this->db->query($sql);
		//echo $this->db->last_query();
		return $query->result_array();	
		
	}
	
}