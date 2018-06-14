<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Designation{
		public $db;
	    public $fm;

	    public function __construct(){
		   $this->db = new Database;
		   $this->fm = new Format;
    }

    public function getAllDesignation(){
		$query = "SELECT * FROM tbl_designation ORDER BY designation_id DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getdesignationbyid($id){
		$query = "SELECT designation_name FROM tbl_designation WHERE designation_id = $id";
		$result = $this->db->select($query);
		return $result;
	}
  }

?>