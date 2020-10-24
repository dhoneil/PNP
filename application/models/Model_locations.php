<?php

class Model_locations extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
    }
    
    public function getActiveProduct_Location()
	{
		$sql = "SELECT * FROM product_location WHERE is_active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
}