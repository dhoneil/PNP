<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Customers';

		$this->load->model('model_customers');
	}

	/* 
	* It only redirects to the manage customers page
	*/
	public function index()
	{

		$this->render_template('customers/index', $this->data);	
	}	

	/*
	* It checks if it gets the customers id and retreives
	* the customers information from the customers model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchCustomersDataById($id) 
	{
		if($id) {
			$data = $this->model_customers->getcustomerData($id);
			echo json_encode($data);
		}

		return false;
	}

	/*
	* Fetches the customers value from the customers table 
	* this function is called from the datatable ajax function
	*/
	public function fetchCustomersData()
	{
		$result = array('data' => array());

		$data = $this->model_customers->getCustomerData();

		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			$buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
			
			$buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';	

			$status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

			$result['data'][$key] = array(
				$value['customer_name'],
				$value['customer_address'],
				$value['customer_phone'],
				$status,
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}

	/*
	* Its checks the customers form validation 
	* and if the validation is successfully then it inserts the data into the database 
	* and returns the json format operation messages
	*/
	public function create()
	{
		
		$response = array();

		$this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
		$this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
		$this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');
		$this->form_validation->set_rules('active', 'Active', 'trim|required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
        	$data = array(
        		'customer_name' => $this->input->post('customer_name'),
	        	'customer_address' => $this->input->post('customer_address'),
	        	'customer_phone' => $this->input->post('customer_phone'),
        		'active' => $this->input->post('active'),	
        	);

        	$create = $this->model_customers->create($data);
        	if($create == true) {
        		$response['success'] = true;
        		$response['messages'] = 'Succesfully created';
        	}
        	else {
        		$response['success'] = false;
        		$response['messages'] = 'Error in the database while creating the brand information';			
        	}
        }
        else {
        	$response['success'] = false;
        	foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}
        }

        echo json_encode($response);
	}

	/*
	* Its checks the customers form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function update($id)
	{

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_customer_name', 'Customer Name', 'trim|required');
			$this->form_validation->set_rules('edit_customer_address', 'Customer Address', 'trim|required');
			$this->form_validation->set_rules('edit_customer_phone', 'Customer Phone', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'customer_name' => $this->input->post('edit_customer_name'),
	        		'customer_address' => $this->input->post('edit_customer_address'),
	        		'customer_phone' => $this->input->post('edit_customer_phone'),
	        		'active' => $this->input->post('edit_active'),	
	        	);

	        	$update = $this->model_customers->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* It removes the customers information from the database 
	* and returns the json format operation messages
	*/
	public function remove()
	{
		$customer_id = $this->input->post('customer_id');

		$response = array();
		if($customer_id) {
			$delete = $this->model_customers->remove($customer_id);
			if($delete == true) {
				$response['success'] = true;
				$response['messages'] = "Successfully removed";	
			}
			else {
				$response['success'] = false;
				$response['messages'] = "Error in the database while removing the brand information";
			}
		}
		else {
			$response['success'] = false;
			$response['messages'] = "Refersh the page again!!";
		}

		echo json_encode($response);
	}
	
	public function getCustomerValueById()
	{
		$customer_id = $this->input->post('customer_id');
		if($customer_id) {
			$product_data = $this->model_customers->getCustomerData($customer_id);
			echo json_encode($product_data);
		}
	}

}