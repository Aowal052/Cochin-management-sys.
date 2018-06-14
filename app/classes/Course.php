<?php
 	$filePath = realpath(dirname(__FILE__));
 ?>
<?php  include_once ($filePath.'/../lib/Database.php');?> 
 <?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
class course{
	public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }
    public function courseInsert($courseName,$courseFee,$course_code){
    	$courseName = $this->fm->validation($courseName);
    	$course_code = $this->fm->validation($course_code);
    	$courseFee = $this->fm->validation($courseFee);
      	$courseName = mysqli_real_escape_string($this->db->link, $courseName);
      	$course_code = mysqli_real_escape_string($this->db->link, $course_code);
      	$courseFee = mysqli_real_escape_string($this->db->link, $courseFee);
      	if (empty($courseName)||empty($courseFee)||empty($course_code)) {
	        $msg = "<span class='text-danger'>Fields name must not be empty </span>";
	        return $msg;
    	}else{
    		$query = "INSERT INTO tbl_course(courseName,courseFee,course_code) VALUES ('$courseName','$courseFee','$course_code')";
    		$result = $this->db->insert($query);
    		if ($result!=false) {
    			$msg = "toastr.success('Course Inserted Successfully.',{timeOut: 4000});";
	        	return $msg;
    		}
    	}
	}

	public function getAllCourse(){
		$query = "SELECT tbl_batch.*, tbl_course.* FROM tbl_batch
					INNER JOIN tbl_course
					ON  tbl_batch.batch_id = tbl_course.course_id";
		$result = $this->db->select($query);
		return $result;
	}

	public function getcatid($id){
		$query = "SELECT * FROM tbl_course WHERE cat_id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}



	public function delcoursebyid($id){
		$query = "DELETE FROM tbl_course WHERE course_id='$id'";
		$delcat = $this->db->delete($query);
		if($delcat) {
				$msg = "toastr.success('Course Deleted Successfully.',{timeOut: 4000});";
	        	return $msg;
			}else{
				$msg = "toastr.danger('ERROR : Course Not Deleted.',{timeOut: 4000});";
	        return $msg;
			}
	}
	public function course_edit($courseName,$courseFee,$course_code,$id){
		$courseName 	= $this->fm->validation($courseName);
		$courseFee 		= $this->fm->validation($courseFee);
		$course_code 	= $this->fm->validation($course_code);
		$id 			= $this->fm->validation($id);
      	$courseName 	= mysqli_real_escape_string($this->db->link, $courseName);
      	$courseFee 		= mysqli_real_escape_string($this->db->link, $courseFee);
      	$course_code 	= mysqli_real_escape_string($this->db->link, $course_code);
      	$id	 			= mysqli_real_escape_string($this->db->link, $id);
      	if (empty($courseName)||empty($courseFee)||empty($course_code)) {
	        $msg = "course name must not be empty";
	        return $msg;
		}else{
			$query = "UPDATE tbl_course
					SET
						courseName = '$courseName',
						courseFee  = '$courseFee',
						course_code = '$course_code'
						WHERE
						course_id = '$id'";
			$update = $this->db->update($query);
			if ($update) {
				$msg = "course updated successfully...";
	        	return $msg;
			}else{
				$msg = "course name not updated";
	        return $msg;
			}

		}
	}

	public function get_all_main_course_by_id($course_id){
		$query = "SELECT * FROM tbl_course WHERE course_id = $course_id";
		$result = $this->db->select($query);
		return $result;
	}
	public function course_update($data,$course_id){
		$courseName 	= $this->fm->validation($data['courseName']);
    	$courseFee 		= $this->fm->validation($data['courseFee']);
    	$course_code 	= $this->fm->validation($data['course_code']);

      	$courseName 	= mysqli_real_escape_string($this->db->link, $courseName);
      	$courseFee 		= mysqli_real_escape_string($this->db->link, $courseFee);
      	$course_code 			= mysqli_real_escape_string($this->db->link, $course_code);

      	$query = "UPDATE tbl_course
							SET
		    				courseName		= '$courseName',
		    				courseFee     	= '$courseFee',
		    				course_code 	= '$course_code'
		    				WHERE course_id = '$course_id'";

		    	$result = $this->db->update($query);
	    		if ($result!=false) {
	    			$msg = "<span class = 'success'>Course updated successfully...</span>";
		        	return $msg;
			    }else{
			    	$msg = "<span class = 'error'>Course updated is not successfully...</span>";
			        return $msg;
			    }
	}

}
?>