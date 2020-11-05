<?php 

class Model_products extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getProductData($id = null)
	{
		if($id) {
			$sql = "SELECT * FROM products where id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM products ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/* get the brand data */
	public function getProductDataReport($id = null)
	{
		$sql = "select * from products order by name asc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getActiveProductData()
	{
		$sql = "SELECT * FROM products WHERE availability = ? ORDER BY id DESC";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	public function getActiveProductDatav2()
	{
		$sql = "SELECT * FROM productsv2 WHERE is_active = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('products', $data);
			return ($insert == true) ? true : false;
		}
	}
	public function createv2($data)
	{
		if($data) {
			$insert = $this->db->insert('productsv2', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function getProductByCategory($product_category_id = null, $is_active = null)
	{
		$sql = "SELECT * FROM productsv2 where product_category_id = ? and is_active = ?";
		$query = $this->db->query($sql, array($product_category_id,$is_active));
		return $query->result_array();
	}

	public function GetProductsByLocations_productcategory_id($product_category_id = null)
	{
		$this->db->where('product_category_id',$product_category_id);
		$this->db->order_by('item','ASC');
		$query = $this->db->get('productsv2');
		$output = '<option value="">[ SELECT ]</option>';
		foreach ($query->result() as $x) {
			$output .= '<option value="'.$x->id.'" >'.$x->item.'</option>';
		}
		return $output;
	}
	

	public function allreceives()
	{
		$sqlbisanunsanasiya = "SELECT * FROM TABLENAME";
		$queryyyyyy = $this->db->query($sqlbisanunsanasiya);
		return $queryyyyyy->result_array();
	}


	public function updatev2($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('productsv2', $data);
			return ($update == true) ? true : false;
		}
	}
	

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('products', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('products');
			return ($delete == true) ? true : false;
		}
	}

	public function countTotalProducts()
	{
		$sql = "SELECT * FROM products";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}



}