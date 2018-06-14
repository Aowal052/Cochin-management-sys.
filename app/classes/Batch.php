<?php $filePath = realpath(dirname(__FILE__));?>
<?php include_once ($filePath.'/../lib/Database.php');?> 
<?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
	class batch{
		public $db;
	    public $fm;

	    public function __construct(){
	       $this->db = new Database;
	       $this->fm = new Format;
	    }
	    public function batchInsert($data){
	    	$batch_course_id 	= $this->fm->validation($data['batch_course_id']);
	    	$batch_time 		= $this->fm->validation($data['batch_time']);
	    	$batch_day 			= $this->fm->validation($data['batch_day']);
	    	$batch_derector 	= $this->fm->validation($data['batch_derector']);

	      	$batch_course_id 	= mysqli_real_escape_string($this->db->link, $batch_course_id);
	      	$batch_time 		= mysqli_real_escape_string($this->db->link, $batch_time);
	      	$batch_day 			= mysqli_real_escape_string($this->db->link, $batch_day);
	      	$batch_derector 	= mysqli_real_escape_string($this->db->link, $batch_derector);

	      	if (empty($batch_course_id)||empty($batch_time)||empty($batch_day)||empty($batch_derector)) {
		        $msg = "<span class='text-danger'>Fields name must not be empty </span>";
		        return $msg;
	    	}else{
	    		$query = "INSERT INTO tbl_batch(batch_course_id,batch_time,batch_day,batch_derector) VALUES ('$batch_course_id','$batch_time','$batch_day','$batch_derector')";
	    		$result = $this->db->insert($query);
	    		if ($result!=false) {
	    			$msg = "toastr.success('Batch Inserted Successfully.',{timeOut: 4000});</span>";
		        	return $msg;
	    		}else{
	    			$msg = "toastr.danger('ERROR : Batch Not Inserted.',{timeOut: 4000});";
		        	return $msg;
	    		}
	    	}
		}

		public function getAllbatch(){
			$query = "SELECT tbl_batch.*, tbl_course.* FROM tbl_batch
					INNER JOIN tbl_course
					ON  tbl_batch.batch_id = tbl_course.course_id
					ORDER BY tbl_batch.batch_id DESC";

			$result = $this->db->select($query);
			return $result;
		}

		public function delbatchbyid($id){
			$query = "DELETE FROM tbl_batch WHERE batch_id='$id'";
			$delcat = $this->db->delete($query);
			if($delcat) {
				$msg = "toastr.success('Batch Deleted Successfully.',{timeOut: 4000});";
	        	return $msg;
			}else{
				$msg = "toastr.danger('ERROR : Batch Not Deleted.');";
	        	return $msg;
			}
		}

		public function get_batch_by_id($id){
			$query = "SELECT * FROM tbl_batch WHERE batch_id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function batch_assign($data){
	    	$batch_assign_student_student_id 	= $this->fm->validation($data['batch_assign_student_student_id']);
	    	$batch_assign_student_batch_id 		= $this->fm->validation($data['batch_assign_student_batch_id']);

	      	$batch_assign_student_student_id 	= mysqli_real_escape_string($this->db->link, $batch_assign_student_student_id);
	      	$batch_assign_student_batch_id 		= mysqli_real_escape_string($this->db->link, $batch_assign_student_batch_id);

	      	if (empty($batch_assign_student_student_id)||empty($batch_assign_student_batch_id)) {
		        $msg = "<span class='text-danger'>Fields name must not be empty </span>";
		        return $msg;
	    	}else{
	    		$query = "INSERT INTO tbl_batch_assign_student(
	    									batch_assign_student_student_id,
	    									batch_assign_student_batch_id) 
	    							VALUES ('$batch_assign_student_student_id',
	    									'$batch_assign_student_batch_id')";
	    		$result = $this->db->insert($query);
	    		if ($result!=false) {
	    			$msg = "toastr.success('Batch Assigned Successfully.',{timeOut: 4000});";
		        	return $msg;
	    		}else{
	    			$msg = "toastr.danger('ERROR : Batch Not Assigned',{timeOut: 4000});";
		        	return $msg;
	    		}
	    	}

		}

		public function batch_assign_list(){
			$query = "SELECT * FROM tbl_batch_assign_student ORDER BY batch_assign_student_id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function delbatchassignbyid($id){
			$query = "DELETE FROM tbl_batch_assign_student WHERE batch_assign_student_id='$id'";
			$delcat = $this->db->delete($query);
			if($delcat) {
				$msg = "toastr.success('Batch Assign Deleted Successfully.',{timeOut: 4000});";
	        	return $msg;
			}else{
				$msg = "toastr.danger('ERROR !!! Not deleted.');";
	        return $msg;
			}
		}

		public function batch_edit($data,$id){
	    	$batch_course_id 	= $this->fm->validation($data['batch_course_id']);
	    	$batch_time 		= $this->fm->validation($data['batch_time']);
	    	$batch_day 			= $this->fm->validation($data['batch_day']);
	    	$batch_derector 	= $this->fm->validation($data['batch_derector']);

	      	$batch_course_id 	= mysqli_real_escape_string($this->db->link, $batch_course_id);
	      	$batch_time 		= mysqli_real_escape_string($this->db->link, $batch_time);
	      	$batch_day 			= mysqli_real_escape_string($this->db->link, $batch_day);
	      	$batch_derector 	= mysqli_real_escape_string($this->db->link, $batch_derector);

	      	$query = "UPDATE tbl_batch
								SET
			    				batch_course_id= '$batch_course_id',
			    				batch_time     = '$batch_time',
			    				batch_day 	   = '$batch_day',
			    				batch_derector = '$batch_derector'
			    				WHERE batch_id  = '$id'";

			    	$result = $this->db->update($query);
		    		if ($result!=false) {
		    			$msg = "<span class = 'success'>batch updated successfully...</span>";
			        	return $msg;
				    }else{
				    	$msg = "<span class = 'error'>batch updated is not successfully...</span>";
				        return $msg;
				    }
		}
	}
?>