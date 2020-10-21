<?php  

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller 
{	
	public function __construct()
	{
		parent::__construct();
		$this->data['page_title'] = 'Reports';
		$this->load->model('model_reports');
		$this->load->model('model_products');
		$this->load->model('model_stores');
		$this->load->model('model_company');
		$this->load->model('model_customers');
	}

	/* 
    * It redirects to the report page
    * and based on the year, all the orders data are fetch from the database.
    */
	public function index()
	{
		if(!in_array('viewReports', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
		
		$today_year = date('Y');

		if($this->input->post('select_year')) {
			$today_year = $this->input->post('select_year');
		}

		$parking_data = $this->model_reports->getOrderData($today_year);
		$this->data['report_years'] = $this->model_reports->getOrderYear();
		

		$final_parking_data = array();
		foreach ($parking_data as $k => $v) {
			
			if(count($v) > 1) {
				$total_amount_earned = array();
				foreach ($v as $k2 => $v2) {
					if($v2) {
						$total_amount_earned[] = $v2['gross_amount'];						
					}
				}
				$final_parking_data[$k] = array_sum($total_amount_earned);	
			}
			else {
				$final_parking_data[$k] = 0;	
			}
			
		}
		
		$this->data['selected_year'] = $today_year;
		$this->data['company_currency'] = $this->company_currency();
		$this->data['results'] = $final_parking_data;

		$this->render_template('reports/index', $this->data);
	}
	
	public function products()
	{
        $this->render_template('reports/products', $this->data);	
	}
	
	public function sales()
	{
		$newdate = array(
			'from_date' => date('Y-m-01'),
			'to_date' => date('Y-m-d')
		);
		$this->session->set_userdata($newdate);
        $this->render_template('reports/sales', $this->data);	
	}
	
	public function sales_search()
	{
		$newdate = array(
			'from_date' => $this->input->post("from_date"),
			'to_date' => $this->input->post("to_date")
		);
		$this->session->set_userdata($newdate);
        $this->render_template('reports/sales', $this->data);	
	}

	public function fetchProductData()
	{
		$result = array('data' => array());

		$data = $this->model_products->getProductDataReport();

		foreach ($data as $key => $value) {

            $store_data = $this->model_stores->getStoresData($value['store_id']);
			$buttons = '';
			$buttons .= '<a target="__blank" href="'.base_url('reports/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
            //$img = '<img src="'.base_url($value['image']).'" alt="'.$value['name'].'" class="img-circle" width="50" height="50" />';
            $availability = ($value['availability'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';
            $qty_status = '';
            if($value['qty'] <= 10) {
                $qty_status = '<span class="label label-warning">Low !</span>';
            } else if($value['qty'] <= 0) {
                $qty_status = '<span class="label label-danger">Out of stock !</span>';
            }

			$result['data'][$key] = array(
				//$img,
				$value['sku'],
				$value['name'],
				//$value['treceive'],$value['torders'],
                //$value['qty'] . ' ' . $qty_status,
				$buttons
			);
		} 

		echo json_encode($result);
	}
	
	public function fetchOverallInventory()
	{
		$result = array('data' => array());

		$data = $this->model_reports->getOverallInventory();

		$tamount = 0;
		foreach ($data as $key => $value) {
			
			$stocks = ($value['receive_items'] - $value['order_items']);
			//if($stocks>0):
			
            $store_data = $this->model_stores->getStoresData($value['store_id']);
			$buttons = '';
			$buttons .= '<a target="__blank" href="'.base_url('reports/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
            
            $availability = ($value['availability'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';
            $qty_status = '';
            if($value['qty'] <= 10) {
                $qty_status = '<span class="label label-warning">Low !</span>';
            } else if($value['qty'] <= 0) {
                $qty_status = '<span class="label label-danger">Out of stock !</span>';
            }

			$total = ($stocks * $value['price']);
			$tamount += $total;

			$result['data'][$key] = array(
				$value['generic'],
				$value['name'],
				$value['expiry'],
				$value['sku'],
				$stocks,
				$value['price'],
				number_format($total,2),
				$buttons
			);
			
			//endif;
			
		} 

		echo json_encode($result);
	}
	
	public function fetchSalesByCustomer()
	{
		$result = array('data' => array());

		$data = $this->model_reports->getSalesByCustomer();

		foreach ($data as $key => $value) {
			
			$total_sales = ($value['total_unpaid_sales'] + $value['total_paid_sales']);
			//$balance = $total_sales - $value['total_paid_sales'];
			
			$buttons = '';
			$buttons .= '<a target="__blank" href="'.base_url('reports/salesCustomer/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';

			$unpaid = "<span style='color:red'>".number_format($value['total_unpaid_sales'],2)."</span>";

			$result['data'][$key] = array(
				$value['customer_name'],
				$value['customer_address'],
				number_format($value['total_paid_sales'],2),
				$unpaid,
				number_format($total_sales,2),
				$buttons
			);
			
		} 

		echo json_encode($result);
	}
	
	public function allcustomersales()
	{
		
		//if($id) {
			
			//$return_items = $this->model_reports->getProductDistribution($id);
			$company_info = $this->model_company->getCompanyData(1);
			//$sales_info = $this->model_reports->getSalesCustomer($id); 
			//$customer_info = $this->model_customers->getCustomerData($id); 
			
			$result = array('data' => array());

			$sales_info = $this->model_reports->getSalesByCustomer();

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>Inventory System | Order</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
			<style>
				.table td{ font-size:10px; }
			</style>
			</head>
			<body onload="window.print();">
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12">
			        <h2 class="page-header">
					
					<table style="width:100%;text-align:center;margin:0 auto;" cellpadding="0" cellspacing="0">
					<tr>
						<td width="35%" style="text-align:right;"><img src="'.site_url().'fb-logo.png" width="90">	</td>
						<td width="65%" style="text-align:left;line-height:14px;padding-left:5px;">'.$company_info['company_name'].'<br>
					  <small>No. 8 Osme&ntilde;a Village, M.L. Quezon St.,<br>
					  Maguikay, Mandaue City - Cebu, Phil.<br>Tel. 344-2858 / 421-3450<br>
					  VAT REG. TIN: 148-644-746-000</small></td>
					</tr>
					</table>

			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    <div class="row invoice-info">
			      
				  <h3 style="text-align:center;margin-top:0;margin-bottom:20px;"><u>Sales Report</u></h3>
				  
			      <div class="col-sm-6 invoice-col">
			        Orders from '.date('m-d-y',strtotime($this->session->userdata('from_date'))).' to '.date('m-d-y',strtotime($this->session->userdata('to_date'))).'
			      </div>
				  
				  <div class="col-sm-6 invoice-col" style="text-align:right;">
			        <b>Report Date:</b> '.date("F d, Y h:ia").' <br>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <!-- Table row -->
			    <div class="row" style="padding-top:10px;">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          
			          <tr>
			            <th>Customer</th>
			            <th>Address</th>
			            <th>Sales Paid</th>
			            <th>Sales Unpaid</th>
			            <th>Total Sales</th>
			          </tr>
			          
			          <tbody>'; 
					  
					  $total_paid = 0;
					  $total_unpaid = 0;
					  $total_amount = 0;
					  foreach ($sales_info as $k => $v) {
						
					  //$unpaid = "<span style='color:red'>".number_format($v['total_unpaid_sales'],2)."</span>"; 		
					  $total_sales = ($v['total_unpaid_sales'] + $v['total_paid_sales']);
					  
					  $total_paid += $v['total_paid_sales'];
					  $total_unpaid += $v['total_unpaid_sales'];
					  
						$total_amount += $total_sales;
						if($total_sales>0){
			          	$html .= '<tr>
				            <td>'.$v['customer_name'].'</td>
				            <td>'.$v['customer_address'].'</td>
				            <td>'.number_format($v['total_paid_sales'],2).'</td>
				            <td>'.number_format($v['total_unpaid_sales'],2).'</td>
				            <td>'.number_format($total_sales,2).'</td>
			          	</tr>';
						}
			          }
			          
			          $html .= '
					  
						<tr style="font-size:12px;">
							<td colspan="4" style="text-align:right;font-weight:bold;font-size:12px;">TOTAL AMOUNT (Php)</td>
							<td style="font-weight:bold;font-size:12px;">'.number_format($total_amount,2).'</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align:right;font-weight:bold">TOTAL Paid</td>
							<td style="font-weight:bold">'.number_format($total_paid,2).'</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align:right;font-weight:bold">TOTAL Unpaid</td>
							<td style="font-weight:bold">'.number_format($total_unpaid,2).'</td>
						</tr>
					  
					  </tbody>
			        </table>
			      </div>
			      <!-- /.col -->
			    </div><br><br>
				<div class="row">
				
					<div class="col-xs-3 pull pull-left">
					<p>Prepared By: _______________</p>
				  </div>
				  <div class="col-xs-3 pull pull-left">
					<p>Verified By: _______________</p>
				  </div>
				  <div class="col-xs-3 pull pull-left">
					<p>Checked By: _______________</p>
				  </div>
				  <div class="col-xs-3 pull pull-left">
					<p>Approved By: _______________</p>
				  </div>
				
				</div>
			    <!-- /.row -->

			    <div class="row">
			      
			      <div class="col-xs-6 pull pull-right">

			        
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			  </section>
			  <!-- /.content -->
			</div>
		</body>
	</html>';

			  echo $html;
		//}	
		
	}
	
	public function detailcustomersales()
	{
		
		//if($id) {
			
			//$return_items = $this->model_reports->getProductDistribution();
			$company_info = $this->model_company->getCompanyData(1);
			$sales_info = $this->model_reports->getDeailSalesReport(); 
			//$customer_info = $this->model_customers->getCustomerData($id); 

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>Inventory System | Order</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/print.css').'" type="text/css" media="print"/>
			<style>
				.table td{ font-size:10px; }
			</style>
			</head>
			<body>
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12">
			        <h2 class="page-header">
					
					<table style="width:100%;text-align:center;margin:0 auto;" cellpadding="0" cellspacing="0">
					<tr>
						<td width="35%" style="text-align:right;"><img src="'.site_url().'fb-logo.png" width="90">	</td>
						<td width="65%" style="text-align:left;line-height:14px;padding-left:5px;">'.$company_info['company_name'].'<br>
					  <small>No. 8 Osme&ntilde;a Village, M.L. Quezon St.,<br>
					  Maguikay, Mandaue City - Cebu, Phil.<br>Tel. 344-2858 / 421-3450<br>
					  VAT REG. TIN: 148-644-746-000</small></td>
					</tr>
					</table>

			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    <div class="row invoice-info">
			      
				  <h3 style="text-align:center;margin-top:0;margin-bottom:20px;"><u>Detail Sales Report</u></h3>
				  
			      <div class="col-sm-6 invoice-col">
					Orders from '.date('m-d-y',strtotime($this->session->userdata('from_date'))).' to '.date('m-d-y',strtotime($this->session->userdata('to_date'))).'
			      </div>
				  
				  <div class="col-sm-6 invoice-col" style="text-align:right;">
			        <b>Report Date:</b> '.date("F d, Y h:ia").' <br>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <!-- Table row -->
			    <div class="row" style="padding-top:10px;">
			      <div class="col-xs-12 table-responsive">
			        <table class="table">
			          
			          <tr>
			            <th>Order Date</th>
			            <th>Customer</th>
			            <th>Bill No.</th>
			            <th>Paid?</th>
			            <th>Amount</th>
			          </tr>
			          
			          <tbody>'; 
					  
					  $total_paid = 0;
					  $total_unpaid = 0;
					  $total_amount = 0;
					  foreach ($sales_info as $k => $v) {
						//$paid_status = $v['paid_status'] == 1 ? "Paid":"Not Paid";
						
					  if($v['paid_status'] == 1){
						  $paid_status = "Paid";
						  $total_paid += $v['net_amount'];
					  }else{
						  $paid_status = "Not Paid";
						  $total_unpaid += $v['net_amount'];
					  }
						
						$total_amount += $v['net_amount'];
			          	$html .= '<tr>
				            <td>'.date("m/d/y",$v['date_time']).'</td>
				            <td>'.$v['customer_name'].'</td>
				            <td>'.$v['bill_no'].'</td>
				            <td>'.$paid_status.'</td>
				            <td>'.number_format($v['net_amount'],2).'</td>
			          	</tr>';
			          }
			          
			          $html .= '
					  
						<tr style="font-size:12px;">
							<td colspan="4" style="text-align:right;font-weight:bold;font-size:12px;">TOTAL AMOUNT (Php)</td>
							<td style="font-weight:bold;font-size:12px;">'.number_format($total_amount,2).'</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align:right;font-weight:bold">TOTAL Paid</td>
							<td style="font-weight:bold">'.number_format($total_paid,2).'</td>
						</tr>
						<tr>
							<td colspan="4" style="text-align:right;font-weight:bold">TOTAL Unpaid</td>
							<td style="font-weight:bold">'.number_format($total_unpaid,2).'</td>
						</tr>
					  
					  </tbody>
			        </table>
			      </div>
			      <!-- /.col -->
			    </div><br><br>
				<div class="row">
				
					<div class="col-xs-3 pull pull-left">
					<p>Prepared By: _______________</p>
				  </div>
				  <div class="col-xs-3 pull pull-left">
					<p>Verified By: _______________</p>
				  </div>
				  <div class="col-xs-3 pull pull-left">
					<p>Checked By: _______________</p>
				  </div>
				  <div class="col-xs-3 pull pull-left">
					<p>Approved By: _______________</p>
				  </div>
				
				</div>
			    <!-- /.row -->

			    <div class="row">
			      
			      <div class="col-xs-6 pull pull-right">

			        
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			  </section>
			  <!-- /.content -->
			</div>
		</body>
	</html>';

			  echo $html;
		//}	
		
	}
	
	
	public function salesCustomer($id)
	{
		
		if($id) {
			
			$return_items = $this->model_reports->getProductDistribution($id);
			$company_info = $this->model_company->getCompanyData(1);
			$sales_info = $this->model_reports->getSalesCustomer($id); 
			$customer_info = $this->model_customers->getCustomerData($id); 

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>Inventory System | Order</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
			<style>
				.table td{ font-size:10px; }
			</style>
			</head>
			<body onload="window.print();">
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12">
			        <h2 class="page-header">
					
					<table style="width:100%;text-align:center;margin:0 auto;" cellpadding="0" cellspacing="0">
					<tr>
						<td width="35%" style="text-align:right;"><img src="'.site_url().'fb-logo.png" width="90">	</td>
						<td width="65%" style="text-align:left;line-height:14px;padding-left:5px;">'.$company_info['company_name'].'<br>
					  <small>No. 8 Osme&ntilde;a Village, M.L. Quezon St.,<br>
					  Maguikay, Mandaue City - Cebu, Phil.<br>Tel. 344-2858 / 421-3450<br>
					  VAT REG. TIN: 148-644-746-000</small></td>
					</tr>
					</table>

			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    <div class="row invoice-info">
			      
				  <h3 style="text-align:center;margin-top:0;margin-bottom:20px;"><u>Customer Sales</u></h3>
				  
			      <div class="col-sm-6 invoice-col">
			        <b>Customer:</b> '.$customer_info['customer_name'].'<br>
					Orders from '.date('m-d-y',strtotime($this->session->userdata('from_date'))).' to '.date('m-d-y',strtotime($this->session->userdata('to_date'))).'
			      </div>
				  
				  <div class="col-sm-6 invoice-col" style="text-align:right;">
			        <b>Report Date:</b> '.date("F d, Y h:ia").' <br>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <!-- Table row -->
			    <div class="row" style="padding-top:10px;">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          
			          <tr>
			            <th>Order Date</th>
			            <th>Bill No.</th>
			            <th>Paid?</th>
			            <th>Amount</th>
			          </tr>
			          
			          <tbody>'; 
					  
					  $total_paid = 0;
					  $total_unpaid = 0;
					  $total_amount = 0;
					  foreach ($sales_info as $k => $v) {
						//$paid_status = $v['paid_status'] == 1 ? "Paid":"Not Paid";
						
					  if($v['paid_status'] == 1){
						  $paid_status = "Paid";
						  $total_paid += $v['net_amount'];
					  }else{
						  $paid_status = "Not Paid";
						  $total_unpaid += $v['net_amount'];
					  }
						
						$total_amount += $v['net_amount'];
			          	$html .= '<tr>
				            <td>'.date("m/d/y",$v['date_time']).'</td>
				            <td>'.$v['bill_no'].'</td>
				            <td>'.$paid_status.'</td>
				            <td>'.number_format($v['net_amount'],2).'</td>
			          	</tr>';
			          }
			          
			          $html .= '
					  
						<tr style="font-size:12px;">
							<td colspan="3" style="text-align:right;font-weight:bold;font-size:12px;">TOTAL AMOUNT (Php)</td>
							<td style="font-weight:bold;font-size:12px;">'.number_format($total_amount,2).'</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align:right;font-weight:bold">TOTAL Paid</td>
							<td style="font-weight:bold">'.number_format($total_paid,2).'</td>
						</tr>
						<tr>
							<td colspan="3" style="text-align:right;font-weight:bold">TOTAL Unpaid</td>
							<td style="font-weight:bold">'.number_format($total_unpaid,2).'</td>
						</tr>
					  
					  </tbody>
			        </table>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <div class="row">
			      
			      <div class="col-xs-6 pull pull-right">

			        
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			  </section>
			  <!-- /.content -->
			</div>
		</body>
	</html>';

			  echo $html;
		}	
		
	}
	
	public function printDiv($id)
	{
		if($id) {
			
			$return_items = $this->model_reports->getProductDistribution($id);
			$company_info = $this->model_company->getCompanyData(1);
			$product_data = $this->model_products->getProductData($id); 

			$html = '<!-- Main content -->
			<!DOCTYPE html>
			<html>
			<head>
			  <meta charset="utf-8">
			  <meta http-equiv="X-UA-Compatible" content="IE=edge">
			  <title>Inventory System | Order</title>
			  <!-- Tell the browser to be responsive to screen width -->
			  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
			  <!-- Bootstrap 3.3.7 -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
			  <!-- Font Awesome -->
			  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
			  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
			<style>
				.table td{ font-size:10px; }
			</style>
			</head>
			<body onload="window.print();">
			
			<div class="wrapper">
			  <section class="invoice">
			    <!-- title row -->
			    <div class="row">
			      <div class="col-xs-12">
			        <h2 class="page-header">
					
					<table style="width:100%;text-align:center;margin:0 auto;" cellpadding="0" cellspacing="0">
					<tr>
						<td width="35%" style="text-align:right;"><img src="'.site_url().'fb-logo.png" width="90">	</td>
						<td width="65%" style="text-align:left;line-height:14px;padding-left:5px;">'.$company_info['company_name'].'<br>
					  <small>No. 8 Osme&ntilde;a Village, M.L. Quezon St.,<br>
					  Maguikay, Mandaue City - Cebu, Phil.<br>Tel. 344-2858 / 421-3450<br>
					  VAT REG. TIN: 148-644-746-000</small></td>
					</tr>
					</table>

			        </h2>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- info row -->
			    <div class="row invoice-info">
			      
			      <div class="col-sm-4 invoice-col">
			        
			        <b>REPORT:</b> Product Distribution<br>
			        <b>Date:</b> '.date("F d, Y h:ia").' <br>
			        <b>Product Name:</b> '.$product_data['name'].'
			        
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <!-- Table row -->
			    <div class="row" style="padding-top:10px;">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          
			          <tr>
			            <th>Date</th>
			            <th>Reference #</th>
			            <th>Customer/Supplier</th>
			            <th>Address</th>
			            <th>In</th>
			            <th>Out</th>
			            <th>Balance</th>
			          </tr>
			          
			          <tbody>'; 
					  
					  $in = 0;
					  $out = 0;
			          foreach ($return_items as $k => $v) {
						$in += $v['cs_type']=="receive"?$v['noitems']:0;
						$out += $v['cs_type']=="orders"?$v['noitems']:0;
						$balance = $in - $out;
			          	$html .= '<tr>
				            <td>'.date("m/d/y",$v['ddate']).'</td>
				            <td>'.$v['ref_no'].'</td>
				            <td>'.$v['cs_name'].'</td>
				            <td>'.$v['cs_address'].'</td>
				            <td>'.($v['cs_type']=="receive"?$v['noitems']:"").'</td>
				            <td>'.($v['cs_type']=="orders"?$v['noitems']:"").'</td>
				            <td>'.$balance.'</td>
			          	</tr>';
			          }
			          
			          $html .= '</tbody>
			        </table>
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <div class="row">
			      
			      <div class="col-xs-6 pull pull-right">

			        
			      </div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->
			  </section>
			  <!-- /.content -->
			</div>
		</body>
	</html>';

			  echo $html;
		}
	}
	
	public function overallInv()
	{
				
		$data_items = $this->model_reports->getOverallInventory();
		$company_info = $this->model_company->getCompanyData(1);

		$html = '<!-- Main content -->
		<!DOCTYPE html>
		<html>
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Inventory System | Order</title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.7 -->
		  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
		  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
		<style>
				.table td{ font-size:10px; }
			</style>
		</head>
		<body onload="window.print();">

		<div class="wrapper">
		  <section class="invoice">
			<!-- title row -->
			<div class="row">
			  <div class="col-xs-12">
				<h2 class="page-header">
					
					<table style="width:100%;text-align:center;margin:0 auto;" cellpadding="0" cellspacing="0">
					<tr>
						<td width="35%" style="text-align:right;"><img src="'.site_url().'fb-logo.png" width="90">	</td>
						<td width="65%" style="text-align:left;line-height:14px;padding-left:5px;">'.$company_info['company_name'].'<br>
					  <small>No. 8 Osme&ntilde;a Village, M.L. Quezon St.,<br>
					  Maguikay, Mandaue City - Cebu, Phil.<br>Tel. 344-2858 / 421-3450<br>
					  VAT REG. TIN: 148-644-746-000</small></td>
					</tr>
					</table>

			        </h2>
			  </div>
			  <!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">
			  
			  <div class="col-sm-4 invoice-col">
				
				<b>REPORT:</b> Overall Inventory Report<br>
				<b>Date:</b> '.date("F d, Y h:ia").' <br>
				
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- Table row -->
			<div class="row" style="padding-top:10px;">
			  <div class="col-xs-12 table-responsive">
				<table class="table table-striped">
				  
				  <tr>
					<th>Generic</th>
					<th>Name</th>
					<th>Expiry</th>
					<th>Lot No.</th>
					<th>Stocks</th>
					<th>Price</th>
					<th>Total</th>
				  </tr>
				  
				  <tbody>'; 
				  
				  $tamount=0;
				  foreach ($data_items as $k => $v) {
					$stocks = ($v['receive_items'] - $v['order_items']);	
					if($stocks>0):
					$total = ($stocks * $v['price']);
					$tamount += $total;
					$html .= '<tr>
						<td>'.$v['generic'].'</td>
						<td>'.$v['name'].'</td>
						<td>'.$v['expiry'].'</td>
						<td>'.$v['sku'].'</td>
						<td>'.$stocks.'</td>
						<td style="text-align:right;">'.number_format($v['price'],2).'</td>
						<td style="text-align:right;">'.number_format($total,2).'</td>
					</tr>';
					endif;
				  }
				  $html .= '<tr style="text-align:right;font-weight:bold;font-size:12px;"><td colspan="6">TOTAL AMOUNT</td><td style="font-size:12px;">'.number_format($tamount,2).'</td></tr>';
				  
				  $html .= '</tbody>
				</table>
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->

			<div class="row">
			  
			  <div class="col-xs-6 pull pull-right">

				
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->
		  </section>
		  <!-- /.content -->
		</div>
		</body>
		</html>';

		  echo $html;
		
	}
	
}	