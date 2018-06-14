<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>

<?php
class user{
	public $db;
	public $fm;

    public function __construct(){
	   $this->db = new Database;
	   $this->fm = new Format;
    }

    public function user_auth_add($data){
        $user_auth_full_name            = $this->fm->validation($data['user_auth_full_name']);
        $user_auth_mobile               = $this->fm->validation($data['user_auth_mobile']);
        $user_auth_password             = $this->fm->validation($data['user_auth_password']);
        $user_auth_role_id              = $this->fm->validation($data['user_auth_role_id']);
 
        $user_auth_full_name            = mysqli_real_escape_string($this->db->link, $user_auth_full_name);
        $user_auth_mobile               = mysqli_real_escape_string($this->db->link, $user_auth_mobile);
        $user_auth_password             = mysqli_real_escape_string($this->db->link, $user_auth_password);
        $user_auth_role_id              = mysqli_real_escape_string($this->db->link, $user_auth_role_id);


        $phnquery = "SELECT * FROM tbl_user_auth WHERE user_auth_mobile='$user_auth_mobile' LIMIT 1";
        $result    =$this->db->select($phnquery);
        if ($result != false) {
            $msg= "<span class='text-danger'>User Allready Exist.</span>";
            return $msg;
        }

        if (empty($user_auth_full_name) ||empty($user_auth_mobile) ||empty($user_auth_password)||empty($user_auth_role_id)) {
           $msg= "<span class='text-danger'>* Field must not be empty! *</span>";
            return $msg;
        
        }else{

            $query = "INSERT INTO tbl_user_auth(
                                                user_auth_full_name, 
                                                user_auth_mobile,
                                                user_auth_password,
                                                user_auth_role_id) 
                                        VALUES('$user_auth_full_name',
                                                '$user_auth_mobile',
                                                '$user_auth_password',
                                                '$user_auth_role_id')";
            $result = $this->db->insert($query);
            if ($result!=false) {
                $msg = "toastr.success('User Inserted Successfully.',{timeOut: 4000});";
                return $msg;
            }else{
                $msg = "toastr.danger('ERROE : User Not Inserted.',{timeOut: 4000});";
                return $msg;
            }

        }
    }
    public function user_auth_edit($data, $id){
        $id                             = $this->fm->validation($id);
        $user_auth_full_name            = $this->fm->validation($data['user_auth_full_name']);
        $user_auth_mobile               = $this->fm->validation($data['user_auth_mobile']);
        // $user_auth_password             = $this->fm->validation($data['user_auth_password']);
        // $user_auth_role_id              = $this->fm->validation($data['user_auth_role_id']);
 
        $id                             = mysqli_real_escape_string($this->db->link, $id);
        $user_auth_full_name            = mysqli_real_escape_string($this->db->link, $user_auth_full_name);
        $user_auth_mobile               = mysqli_real_escape_string($this->db->link, $user_auth_mobile);
        // $user_auth_password             = mysqli_real_escape_string($this->db->link, $user_auth_password);
        // $user_auth_role_id              = mysqli_real_escape_string($this->db->link, $user_auth_role_id);


        

        if (empty($user_auth_full_name) || empty($user_auth_mobile)) {
           $msg= "<span class='text-danger'>Field must not be empty</span>";
            return $msg;
        
        }else{

            $query = "UPDATE tbl_user_auth SET 
                        user_auth_full_name = '$user_auth_full_name', 
                        user_auth_mobile    = '$user_auth_mobile'

                      WHERE user_auth_id = '$id'";

            $result = $this->db->update($query);
            if ($result!=false) {
                $msg = "toastr.success('User Updated Successfully.',{timeOut: 4000});";
                return $msg;
            }else{
                $msg = "toastr.danger('ERROR : User Not Updated',{timeOut: 4000});";
                return $msg;
            }

        }
    }
    public function get_all_user_auth(){
        $query = "SELECT * FROM tbl_user_auth";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_user_auth_by_id($id){
        $query = "SELECT * FROM tbl_user_auth WHERE user_auth_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function delete_user_by_id($id){
        $query = "DELETE FROM tbl_user_auth WHERE user_auth_id='$id'";
        $deluser = $this->db->delete($query);
        if($deluser) {
            $msg = "toastr.success('User Deleted Successfully',{timeOut: 4000});";
            return $msg;            
            //header('location: user_auth_list.php');
        }else{
            $msg = "user is not deleted";
            return $msg;
        }
    }

    public function change_status_for_user_auth($id){
        $query = "SELECT user_auth_status FROM tbl_user_auth WHERE user_auth_id='$id'";
        $fetch_data = $this->db->select($query)->fetch_assoc();
        if ($fetch_data['user_auth_status'] == 0) {
            $query = "UPDATE tbl_user_auth
                        SET
                        user_auth_status = '1'
                        WHERE user_auth_id = '$id'";

            $result = $this->db->update($query);
            return $result;
        }else{
            $query = "UPDATE tbl_user_auth
                        SET
                        user_auth_status = '0'
                        WHERE user_auth_id = '$id'";

            $result = $this->db->update($query);
            return $result;
        }
    }

    public function getAllStudent(){
        $query = "SELECT * FROM tbl_user_auth WHERE user_auth_role_id = '6'";
        $result = $this->db->select($query);
        return $result;
    }

    public function pic_upload($file,$id){
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['user_auth_image']['name'];
        $file_size = $file['user_auth_image']['size'];
        $file_temp = $file['user_auth_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if (!empty($file_name)) {

                if ($file_size >1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                 }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_user_auth
                                SET
                                user_auth_image = '$uploaded_image' 
                                WHERE user_auth_id ='$id'";

                    $result = $this->db->update($query);
                    if ($result!=false) {
                        $msg = "user image updated successfully...";
                        return $msg; 
                }else{
                    $msg = "user image is not updated";
                    return $msg;
                }

            }
        }
    }
        
}

?>