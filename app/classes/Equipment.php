<?php
 	$filePath = realpath(dirname(__FILE__));
 ?>
<?php  include_once ($filePath.'/../lib/Database.php');?> 
 <?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
class equipment{
	public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }
    
    public function equipmentInsert($data){
    	$equipment_name = $this->fm->validation($data['equipment_name']);
    	$equipment_quantity = $this->fm->validation($data['equipment_quantity']);

      	$equipment_name 	= mysqli_real_escape_string($this->db->link, $data['equipment_name']);
      	$equipment_quantity  = mysqli_real_escape_string($this->db->link, $data['equipment_quantity']);
      	if (empty($equipment_name)||empty($equipment_quantity)) {
	        $msg = "<span class='text-danger'>Fields name must not be empty </span>";
	        return $msg;
    	}else{
    		$query = "INSERT INTO tbl_equipment(equipment_name,eequipment_quantity) VALUES ('$equipment_name','$equipment_quantity')";
    		$result = $this->db->insert($query);
    		if ($result!=false) {
    			$msg = "toastr.success('Equipment Inserted Successfully.',{timeOut: 4000});";
          return $msg;
    		}
    	}
	}
	
	public function eqipmentAsign($data){
    	$equipment_name 				= $this->fm->validation($data['equipment_name']);
    	$equipment_quantity 			= $this->fm->validation($data['equipment_quantity']);
    	$equipment_assign_eequipment_quantity 	= $this->fm->validation($data['equipment_assign_eequipment_quantity']);
    	$equipment_assign_date 					= $this->fm->validation($data['equipment_assign_date']);

      	$equipment_name 				= mysqli_real_escape_string($this->db->link, $equipment_name);
      	$equipment_quantity  		= mysqli_real_escape_string($this->db->link, $equipment_quantity);
      	$equipment_assign_eequipment_quantity 	= mysqli_real_escape_string($this->db->link, $equipment_assign_eequipment_quantity);
      	$equipment_assign_date  				= mysqli_real_escape_string($this->db->link, $equipment_assign_date);

      	$equipment_assign_date          		= date_create($equipment_assign_date);
        $equipment_assign_date          		= date_format($equipment_assign_date,"Y-m-d");
        $equipment_assign_date 					= mysqli_real_escape_string($this->db->link, $equipment_assign_date);

      	if (empty($equipment_name)||empty($equipment_quantity)||empty($equipment_assign_eequipment_quantity)||empty($equipment_assign_date)) {
	        $msg = "<span class='text-danger'>Fields name must not be empty </span>";
	        return $msg;
    	}else{
    		$query = "INSERT INTO tbl_equipment_assign(equipment_name,equipment_quantity,equipment_assign_eequipment_quantity) VALUES ('$equipment_name','$equipment_quantity','$equipment_assign_eequipment_quantity')";
    		$result = $this->db->insert($query);
    		if ($result!=false) {
    			$msg = "toastr.success('Equipment Assigned Successfully.',{timeOut: 4000});";
	        return $msg;
    		}else{
    			$msg = "toastr.danger('ERROR : Equipment Not Assigned.',{timeOut: 4000});";
    			return $msg;
    		}
    	}
	}

	public function delequipmentbyid($id){
		$query = "DELETE FROM tbl_equipment WHERE equipment_id='$id'";
		$delcat = $this->db->delete($query);
		if($delcat) {
			$msg = "toastr.success('Equipment Deleted Successfully.',{timeOut: 4000});";
        	return $msg;
		}else{
			$msg = "toastr.danger('ERROR : Equipment not Deleted.',{timeOut: 4000});";
        	return $msg;
		}
	}

	public function getAllequipment(){
		$query = "SELECT * FROM tbl_equipment";
		$result= $this->db->select($query);
		return $result;
	}

	public function getEquipmentByUser(){
		$query = "SELECT tbl_user_auth.user_auth_full_name,tbl_equipment.equipment_name,tbl_equipment_assign.*
				FROM tbl_equipment_assign
				INNER JOIN tbl_user_auth
				ON tbl_equipment_assign.equipment_name=tbl_user_auth.user_auth_id
				INNER JOIN tbl_equipment
				ON tbl_equipment_assign.equipment_quantity=tbl_equipment.equipment_id
				ORDER BY equipment_assign_id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function delequipmentAssignID($id){
		$query = "DELETE FROM tbl_equipment_assign WHERE equipment_assign_id='$id'";
		$delcat = $this->db->delete($query);
		if($delcat) {
			$msg = "toastr.success('Equipment Assign Deleted Successfully.',{timeOut: 4000});";
        	return $msg;
		}else{
			$msg = "toastr.danger('ERROR : Equipment Assign Not Deleted.',{timeOut: 4000});";
        	return $msg;
		}
	}

	public function AssingEquipmentUpdate($data,$id){
		$equipment_name 				= $this->fm->validation($data['equipment_name']);
    	$equipment_quantity 			= $this->fm->validation($data['equipment_quantity']);
    	$equipment_assign_eequipment_quantity 	= $this->fm->validation($data['equipment_assign_eequipment_quantity']);
    	$equipment_assign_date 					= $this->fm->validation($data['equipment_assign_date']);

      	$equipment_name 				= mysqli_real_escape_string($this->db->link, $equipment_name);
      	$equipment_quantity  		= mysqli_real_escape_string($this->db->link, $equipment_quantity);
      	$equipment_assign_eequipment_quantity 	= mysqli_real_escape_string($this->db->link, $equipment_assign_eequipment_quantity);
      	$equipment_assign_date  				= mysqli_real_escape_string($this->db->link, $equipment_assign_date);

      	$equipment_assign_date          		= date_create($equipment_assign_date);
        $equipment_assign_date          		= date_format($equipment_assign_date,"Y-m-d");
        $equipment_assign_date 					= mysqli_real_escape_string($this->db->link, $equipment_assign_date);

      	if (empty($equipment_name)||empty($equipment_quantity)||empty($equipment_assign_eequipment_quantity)||empty($equipment_assign_date)) {
	        $msg = "<span class='text-danger'>Fields name must not be empty </span>";
	        return $msg;
    	}else{
    		$query = "UPDATE tbl_equipment_assign
                            SET
                            equipment_name           	= '$equipment_name',
                            equipment_quantity      	= '$equipment_quantity',
                            equipment_assign_eequipment_quantity	= '$equipment_assign_eequipment_quantity',
                            equipment_assign_date             	= '$equipment_assign_date'
                            WHERE equipment_assign_id = $id";
            $result = $this->db->update($query);
            if ($result!=false) {
                $msg = "toastr.success('Equipment Assign Updated Successfully.',{timeOut: 4000});";
        		return $msg;
            }else{
				$msg = "toastr.danger('ERROR : Equipment Assign Not Updated.',{timeOut: 4000});";
	        	return $msg;
			}
    	}
	}

  public function get_all_equipment_by_id($equipment_id){
    $query = "SELECT * FROM tbl_equipment WHERE equipment_id = $equipment_id";
    $result = $this->db->select($query);
    return $result;
  }

  public function equipment_update($data,$id){
    $equipment_name         = $this->fm->validation($data['equipment_name']);
    $equipment_quantity      = $this->fm->validation($data['equipment_quantity']);

    $equipment_name         = mysqli_real_escape_string($this->db->link, $equipment_name);
    $equipment_quantity      = mysqli_real_escape_string($this->db->link, $equipment_quantity);

        if (empty($equipment_name)||empty($equipment_quantity)) {
          $msg = "<span class='text-danger'>Fields name must not be empty </span>";
          return $msg;
      }else{
        $query = "UPDATE tbl_equipment
                            SET
                            equipment_name            = '$equipment_name',
                            equipment_quantity       = '$equipment_quantity'
                            WHERE equipment_id = $id";
            $result = $this->db->update($query);
            if ($result!=false) {
                $msg = "toastr.success('Equipment  Updated Successfully.',{timeOut: 4000});";
            return $msg;
            }else{
        $msg = "toastr.danger('ERROR : Equipment  Not Updated.',{timeOut: 4000});";
            return $msg;
      }
      }
  }


}
?>