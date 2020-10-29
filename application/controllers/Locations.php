<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends Admin_Controller
{
    public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Location';
		$this->load->model('model_locations');
	}
    public function index()
    {
		// $this->data['locations'] = $this->model_locations->getLocationListByCategory();   
		$this->render_template('locations/index', $this->data);	
	}


	public function savelocation()
    {
        $data = array(
            'productcategory_id' => $this->input->post('productcategory_id'),
			'location_name' => ($this->input->post('location_name') == null)?"":strtoupper($this->input->post('location_name')),
			'is_active' => ($this->input->post('is_active') == null)?"":strtoupper($this->input->post('is_active')),
        );

        $create = $this->model_locations->locations($data);
        
        if($create == true) {
            echo json_encode(true);
        }
        else {
            echo json_encode(false);
        }
	}
	public function searchLocationByCategory()
    {
        $category = $this->input->post('productcategory_id');
		$is_active = $this->input->post('is_active');

		$location_by_category = $this->model_locations->getLocationByCategory($category,$is_active);

        $this->load->view('locations/_LocationByCategory',['location_category'=>$category, 'locationss'=>$location_by_category]);

	}

	public function updatelocation()
    { 
		$data = array(
			'location_name' => ($this->input->post('location_name') == null)?"":strtoupper($this->input->post('location_name')),
			'is_active' => ($this->input->post('is_active') == null)?"":strtoupper($this->input->post('is_active')),
		);	

        $update = $this->model_locations->updatelocationv2($data, $this->input->post('ID')); 

        if($update == true) {
            echo json_encode(true);
        }
        else {
            echo json_encode(false);
        }
    }
	// public function getLocationValueById()
	// {
	// 	$location_id = $this->input->post('id');
	// 	if($location_id) {
	// 		$location_data = $this->model_locations->getProductData($product_id);
	// 		echo json_encode($location_data);
	// 	}
	// }		
}
