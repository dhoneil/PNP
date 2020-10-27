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
        $this->render_template('locations/index', $this->data);	
    }	
}
