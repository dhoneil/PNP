<?php

class Model_locations extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
    }
    public function getLocationData($productcategory_id,$id = null)
	{
		if($id) {
			$sql = "SELECT * FROM product_location where productcategory_id = ? and id = ?";
			$query = $this->db->query($sql, array($productcategory_id,$id));
			return $query->row_array();
		}

		$sql = "SELECT * FROM product_location ORDER BY id DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
    public function getActiveProduct_Location()
	{
		$sql = "SELECT * FROM product_location WHERE is_active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}
	public function locations($data)
	{
		if($data) {
			$insert = $this->db->insert('product_location', $data);
			return ($insert == true) ? true : false;
		}
	}
	public function getLocationByCategory($productcategory_id = null ,$is_active = null)
	{
		$sql = "SELECT * FROM product_location where productcategory_id = ? and is_active = ?";
		$query = $this->db->query($sql, array($productcategory_id,$is_active));
		return $query->result_array();
	}
	public function updatelocationv2($data, $id)
	{
		if($data && $id) {
			$this->db->where('ID', $id);
			$update = $this->db->update('product_location', $data);
			return ($update == true) ? true : false;
		}
	}
	
	 public function getLocationListByCategory()
	 {
	 	$sql = "SELECT * FROM product_location";
	 	$query = $this->db->query($sql,array(1));
	 	return $query->result_array();
	}
	public function getLocationListByID()
	 {
 		$sql = "SELECT * FROM product_location";
	 	$query = $this->db->query($sql, array(1));
		return $query->result_array();
	 }
	
	
}