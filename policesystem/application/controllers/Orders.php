<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Orders';

		$this->load->model('model_orders');
		$this->load->model('model_products');
		$this->load->model('model_company');
		$this->load->model('model_customers');
	}

	/* 
	* It only redirects to the manage order page
	*/
	public function index()
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Manage Orders';
		$this->render_template('orders/index', $this->data);		
	}

	/*
	* Fetches the orders data from the orders table 
	* this function is called from the datatable ajax function
	*/
	public function fetchOrdersData()
	{
		$result = array('data' => array());

		$data = $this->model_orders->getOrdersData();

		foreach ($data as $key => $value) {
			
			//if($value['net_amount']=="NaN"){
				// Do nothing...
			//}else{	
			
				$count_total_item = $this->model_orders->countOrderItem($value['id']);
				$date = date('m-d-Y', $value['date_time']);
				$time = date('h:i a', $value['date_time']);

				//$date_time = $date . ' ' . $time;
				$date_time = $date;

				// button
				$buttons = '';

				if(in_array('viewOrder', $this->permission)) {
					$buttons .= '<a target="__blank" href="'.base_url('orders/printDiv/'.$value['id']).'" class="btn btn-default"><i class="fa fa-print"></i></a>';
				}

				if(in_array('updateOrder', $this->permission)) {
					$buttons .= ' <a href="'.base_url('orders/update/'.$value['id']).'" class="btn btn-default"><i class="fa fa-pencil"></i></a>';
				}

				if(in_array('deleteOrder', $this->permission)) {
					$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
				}
				
				$return = ($value['return']=='Yes')?'<span class="label label-info">Return</span>':'';
				
				if($value['paid_status'] == 1) {
					$paid_status = '<span class="label label-success">Paid</span>';	
				}
				else {
					$paid_status = '<span class="label label-warning">Not Paid</span>';
				}

				$result['data'][$key] = array(
					$value['bill_no']."<br>".$return,
					$value['customer_name'],
					$value['customer_phone'],
					$date_time,
					$count_total_item,
					number_format($value['net_amount'],2),
					$paid_status,
					$buttons
				);
			
			//}
			
		} // /foreach

		echo json_encode($result);
	}

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{
		if(!in_array('createOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->data['page_title'] = 'Add Order';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		$this->form_validation->set_rules('customer', 'Customer', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$order_id = $this->model_orders->create();
        	
        	if($order_id) {
				// update ORDER NO or BILL NO..
				$this->model_orders->update_billno( $order_id );
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('orders/update/'.$order_id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('orders/create/', 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        	$this->data['products'] = $this->model_products->getActiveProductData();      	
			$this->data['customers'] = $this->model_customers->getActiveCustomers();   

            $this->render_template('orders/create', $this->data);
        }	
	}

	/*
	* It gets the product id passed from the ajax method.
	* It checks retrieves the particular product data from the product id 
	* and return the data into the json format.
	*/
	public function getProductValueById()
	{
		$product_id = $this->input->post('product_id');
		if($product_id) {
			$product_data = $this->model_products->getProductData($product_id);
			echo json_encode($product_data);
		}
	}

	/*
	* It gets the all the active product inforamtion from the product table 
	* This function is used in the order page, for the product selection in the table
	* The response is return on the json format.
	*/
	public function getTableProductRow()
	{
		$products = $this->model_products->getActiveProductData();
		echo json_encode($products);
	}

	/*
	* If the validation is not valid, then it redirects to the edit orders page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function update($id)
	{
		if(!in_array('updateOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if(!$id) {
			redirect('dashboard', 'refresh');
		}

		$this->data['page_title'] = 'Update Order';

		$this->form_validation->set_rules('product[]', 'Product name', 'trim|required');
		
	
        if ($this->form_validation->run() == TRUE) {        	
        	
        	$update = $this->model_orders->update($id);
        	
        	if($update == true) {
        		$this->session->set_flashdata('success', 'Successfully updated');
        		redirect('orders/update/'.$id, 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('orders/update/'.$id, 'refresh');
        	}
        }
        else {
            // false case
        	$company = $this->model_company->getCompanyData(1);
        	$this->data['company_data'] = $company;
        	$this->data['is_vat_enabled'] = ($company['vat_charge_value'] > 0) ? true : false;
        	$this->data['is_service_enabled'] = ($company['service_charge_value'] > 0) ? true : false;

        	$result = array();
        	$orders_data = $this->model_orders->getOrdersData($id);

    		$result['order'] = $orders_data;
    		$orders_item = $this->model_orders->getOrdersItemData($orders_data['id']);

    		foreach($orders_item as $k => $v) {
    			$result['order_item'][] = $v;
    		}

    		$this->data['order_data'] = $result;

        	$this->data['products'] = $this->model_products->getActiveProductData();
			$this->data['customers'] = $this->model_customers->getActiveCustomers();   			

            $this->render_template('orders/edit', $this->data);
        }
	}

	/*
	* It removes the data from the database
	* and it returns the response into the json format
	*/
	public function remove()
	{
		if(!in_array('deleteOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$order_id = $this->input->post('order_id');

        $response = array();
        if($order_id) {
            $delete = $this->model_orders->remove($order_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed"; 
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the product information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response); 
	}

	/*
	* It gets the product id and fetch the order data. 
	* The order print logic is done here 
	*/
	public function printDiv($id)
	{
		if(!in_array('viewOrder', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		if($id) {
			$order_data = $this->model_orders->getOrdersData($id);
			$orders_items = $this->model_orders->getOrdersItemData($id);
			$company_info = $this->model_company->getCompanyData(1);

			$order_date = date('m-d-Y', $order_data['date_time']);
			$paid_status = ($order_data['paid_status'] == 1) ? "Paid" : "Unpaid";

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
			<style>
				.table2 td{ font-size:12px; }
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
			      
			      <div class="col-xs-8">
			        <b>Customer:</b> '.$order_data['customer_name'].'<br>
			        <b>Address:</b> '.$order_data['customer_address'].' <br />
			        <b>Phone:</b> '.$order_data['customer_phone'].'
			      </div>
				  <div class="col-xs-4 pull pull-right" style="text-align:right;"><b>Reference No.:</b> '.$order_data['bill_no'].'<br><b>Date:</b> '.$order_date.'</div>
			      <!-- /.col -->
			    </div>
			    <!-- /.row -->

			    <!-- Table row -->
			    <div class="row" style="padding-top:10px;">
			      <div class="col-xs-12 table-responsive">
			        <table class="table table-striped">
			          <thead>
			          <tr>
			            <th>Item / Description</th>
			            <th>Price</th>
			            <th>Qty</th>
			            <th>Amount</th>
			          </tr>
			          </thead>
			          <tbody>'; 

			          foreach ($orders_items as $k => $v) {

			          	$product_data = $this->model_products->getProductData($v['product_id']); 
			          	
			          	$html .= '<tr>
				            <td>'.$product_data['name'].'</td>
				            <td>'.number_format($v['rate'],2).'</td>
				            <td>'.$v['qty'].'</td>
				            <td>'.number_format($v['amount'],2).'</td>
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

			        <div class="table-responsive">
			          <table class="table table2">
			            <tr>
			              <th style="width:50%">Total Amount:</th>
			              <td>'.number_format($order_data['gross_amount'],2).'</td>
			            </tr>';

			            if($order_data['service_charge'] > 0) {
			            	$html .= '<tr>
				              <th>Service Charge ('.$order_data['service_charge_rate'].'%)</th>
				              <td>'.$order_data['service_charge'].'</td>
				            </tr>';
			            }

			            if($order_data['vat_charge'] > 0) {
			            	$html .= '<tr>
				              <th>VAT ('.$order_data['vat_charge_rate'].'%)</th>
				              <td>'.number_format($order_data['vat_charge'],2).'</td>
				            </tr>';
			            }
			            
			            
			            $html .=' <tr>
			              <th>Discount:</th>
			              <td>'.$order_data['discount'].'</td>
			            </tr>
			            <tr>
			              <th>Net Amount:</th>
			              <td>'.number_format($order_data['net_amount'],2).'</td>
			            </tr>
			            <tr style="display:none;">
			              <th>Paid Status:</th>
			              <td>'.$paid_status.'</td>
			            </tr>
			          </table>
			        </div>
			      </div>
				  
			      <!-- /.col -->
			    </div><br><br>
				<div class="row">
				
					<div class="col-xs-4 pull pull-left">
					<p>Prepared By: _________________</p>
				  </div>
				  <div class="col-xs-4 pull pull-left">
					<p>Checked By: _________________</p>
				  </div>
				  <div class="col-xs-4 pull pull-left">
					<p>Received By: _________________</p>
				  </div>
				
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

}