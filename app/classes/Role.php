<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class role{
		public $db;
	    public $fm;

	    public function __construct(){
		   $this->db = new Database;
		   $this->fm = new Format;
    }

    public function getAllRole(){
		$query = "SELECT * FROM tbl_role ORDER BY role_id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getrolebyid($id){
		$query = "SELECT role_name FROM tbl_role WHERE role_id=$id";
		$result = $this->db->select($query);
		$value = $result->fetch_assoc();
        Session::set("role_name",   $value['role_name']);

		return $result;
	}
  }

?>