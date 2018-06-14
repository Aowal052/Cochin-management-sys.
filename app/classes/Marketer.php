<?php
 	$filePath = realpath(dirname(__FILE__));
 ?>
<?php  include_once ($filePath.'/../lib/Database.php');?> 
 <?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
class marketer{
	public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }
    
    public function main_marketer_add($data){
    	$marketer_name             		= $this->fm->validation($data['marketer_name']);
        $marketer_address                = $this->fm->validation($data['marketer_address']);
        $marketer_phone              = $this->fm->validation($data['marketer_phone']);
 
        $marketer_name            		= mysqli_real_escape_string($this->db->link, $marketer_name);
        $marketer_address               = mysqli_real_escape_string($this->db->link, $marketer_address);
        $marketer_phone             = mysqli_real_escape_string($this->db->link, $marketer_phone);

        if (empty($marketer_name) ||empty($marketer_address) ||empty($marketer_phone)) {
           $msg= "Field must not be empty";
            return $msg;
        
        }else{

            $query = "INSERT INTO tbl_marketer_main(marketer_name, marketer_address,marketer_phone) 
                                VALUES('$marketer_name','$marketer_address','$marketer_phone')";
            $result = $this->db->insert($query);
            if ($result!=false) {
                $msg = "User inserted successfully...";
                return $msg;
            }else{
                $msg = "User is not inserted";
                return $msg;
            }

        }
    }

    public function sub_marketer_add($data){
    	$main_marketer_id      = $data['main_marketer_auth_id'];
        $sub_marketer_id       = $data['sub_marketer_auth_id'];
 
        $main_marketer_id      = mysqli_real_escape_string($this->db->link, $main_marketer_id);
        $sub_marketer_id       = mysqli_real_escape_string($this->db->link, $sub_marketer_id);




        if (empty($main_marketer_id) ||empty($sub_marketer_id)) {
           $msg= "Field must not be empty";
            return $msg;
        }else{
            $userquery  = "SELECT * FROM tbl_marketer_sub_assaign WHERE sub_marketer_auth_id='$sub_marketer_id' LIMIT 1";
            $result     =$this->db->select($userquery);
            if ($result != false) {
                $msg = "<span class='text-danger'>User Allready Assigned.</span>";
                return $msg;
            }
            $query = "INSERT INTO tbl_marketer_sub_assaign(main_marketer_auth_id, 
                                                       sub_marketer_auth_id) 
                                               VALUES('$main_marketer_id',
                                                      '$sub_marketer_id')";
            $result = $this->db->insert($query);
            if ($result!=false) {
                $msg = "toastr.success('Sub Marketer Inserted Successfully.',{timeOut: 4000});";
                return $msg;
            }else{
                $msg = "toastr.danger('ERROR : Sub Marketer Not Inserted',{timeOut: 4000});";
                return $msg;
            }

        }
    }

    public function get_main_marketer_name(){
    	$query = "SELECT * FROM tbl_user_auth WHERE user_auth_role_id = '4'";
    	$result = $this->db->insert($query);
    	return $result;
    }

     public function changeStatus($id){
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
    public function get_sub_marketer(){
        $query = "SELECT * FROM tbl_user_auth WHERE user_auth_role_id = '5' ORDER BY user_auth_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_sub_marketer_by_id($id){
       $query = "SELECT tbl_user_auth.user_auth_full_name,tbl_marketer_sub_assaign.*
                FROM tbl_marketer_sub_assaign
                INNER JOIN tbl_user_auth
                ON tbl_marketer_sub_assaign.main_marketer_auth_id=tbl_user_auth.user_auth_id
                WHERE main_marketer_auth_id = '$id'
                ORDER BY sub_marketer_id DESC";
        $result = $this->db->insert($query);
        return $result;
    }
    public function changeStatus_for_sub_marketer($id){
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
    public function get_main_marketer($id){
        $query = "SELECT tbl_user_auth.*,tbl_marketer_sub_assaign.*
                    FROM tbl_marketer_sub_assaign
                    INNER JOIN tbl_user_auth
                    ON tbl_marketer_sub_assaign.main_marketer_auth_id=tbl_user_auth.user_auth_id
                    WHERE user_auth_id = '$id'
                    ORDER BY sub_marketer_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    // public function main_marketer_edit($data,$marketer_id){
    //     $marketer_name          = $this->fm->validation($data['marketer_name']);
    //     $marketer_address       = $this->fm->validation($data['marketer_address']);
    //     $marketer_phone         = $this->fm->validation($data['marketer_phone']);
 
    //     $marketer_name          = mysqli_real_escape_string($this->db->link, $marketer_name);
    //     $marketer_address       = mysqli_real_escape_string($this->db->link, $marketer_address);
    //     $marketer_phone         = mysqli_real_escape_string($this->db->link, $marketer_phone);




    //     if (empty($marketer_name) ||empty($marketer_address) ||empty($marketer_phone)) {
    //        $msg= "Field must not be empty";
    //         return $msg;
        
    //     }else{

    //        $query = "UPDATE tbl_marketer_main
    //                     SET
    //                     marketer_name = '$marketer_name',
    //                     marketer_address = '$marketer_address',
    //                     marketer_phone = '$marketer_phone'
    //                     WHERE marketer_id = '$marketer_id'";
    //         $result = $this->db->update($query);
    //         if ($result!=false) {
    //             $msg = "toastr.success('Main Marketer Updated Successfully.',{timeOut: 4000});";
    //             return $msg;
    //         }else{
    //             $msg = "toastr.danger('ERROR : Main Marketer Not Updated.',{timeOut: 4000});";
    //             return $msg;
    //         }

    //     }
    // }

    public function get_all_main_marketer_by_id($id){
        $query = "SELECT * FROM tbl_marketer_main WHERE marketer_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_marketer_by_id($id){
        $query = "DELETE FROM tbl_user_auth WHERE user_auth_id='$id'";
        $deluser = $this->db->delete($query);
        if($deluser) {
            $msg = "toastr.success('Marketer Deleted Successfully.',{timeOut: 4000});";
            return $msg;
        }else{
            $msg = "toastr.danger('ERROR : Marketer Not Deleted.',{timeOut: 4000});";
            return $msg;
        }
    }

    public function delete_sub_marketer_by_id($id){
        $query = "DELETE FROM tbl_user_auth WHERE user_auth_id='$id'";
        $deluser = $this->db->delete($query);
        if($deluser) {
            $msg = "toastr.success('Sub Marketer Deleted Successfully.',{timeOut: 4000});";
            return $msg;
        }else{
            $msg = "toastr.danger('ERROR : Sub Marketer Not Deleted.',{timeOut: 4000});";
            return $msg;
        }
    }

    public function Number_Insert($data){

      $Phone_Number = $this->fm->validation($data['Phone_Number']);
      $user_auth_id = Session::get("user_auth_id"); 
      $student_name = $this->fm->validation($data['student_name']);
      $comment      = $this->fm->validation($data['comment']);

      $Phone_Number = mysqli_real_escape_string($this->db->link, $Phone_Number);
      $user_auth_id = mysqli_real_escape_string($this->db->link, $user_auth_id);
      $student_name = mysqli_real_escape_string($this->db->link, $student_name);
      $comment      = mysqli_real_escape_string($this->db->link, $comment);

      if (empty($Phone_Number)||empty($user_auth_id)) {
           $msg= "Field must not be empty";
            return $msg;
      }else{
        $query = "INSERT INTO tbl_phone_number(
                                phone_number_user_auth_id,
                                phone_number,
                                phone_number_student_name, 
                                phone_number_comment) 
                            VALUES('$user_auth_id',
                                    '$Phone_Number',
                                    '$student_name',
                                    '$comment')";
        $result = $this->db->insert($query);
        if ($result!=false) {
            $msg = "toastr.success('Phone Number Inserted Successfully.',{timeOut: 4000});";
            return $msg;
        }else{
            $msg = "toastr.danger('ERROR : Phone Number Not Inserted.',{timeOut: 4000});";
            return $msg;
        }
      }
    }

    public function Number_Update($data,$id){
        $id                  = $this->fm->validation($id);
        $Phone_Number        = $this->fm->validation($data['Phone_Number']);
        $student_name        = $this->fm->validation($data['student_name']);
        $comment             = $this->fm->validation($data['comment']);
 
        $id                  = mysqli_real_escape_string($this->db->link, $id);
        $Phone_Number        = mysqli_real_escape_string($this->db->link, $Phone_Number);
        $student_name        = mysqli_real_escape_string($this->db->link, $student_name);
        $comment             = mysqli_real_escape_string($this->db->link, $comment);

        if (empty($Phone_Number)||empty($student_name)||empty($comment)) {
            $msg = "<span class='text-danger'>Fields must not be empty</span>";
            return $msg;
        }else{

            $query = "UPDATE tbl_phone_number SET 
                        phone_number                = '$Phone_Number', 
                        phone_number_student_name   = '$student_name',
                        phone_number_comment        = '$comment'

                        WHERE phone_number_id = '$id'";

            $result = $this->db->update($query);
            if ($result!=false) {
                $msg = "toastr.success('Number Updated Successfully.',{timeOut: 4000});";
                return $msg;
            }else{
                $msg = "toastr.danger('ERROR : Number Not Updated',{timeOut: 4000});";
                return $msg;
            }

        }
    }

    public function Number_show(){
        $query = "SELECT * FROM tbl_phone_number";
        $result = $this->db->insert($query);
        return $result;
    }

    public function delPhone_numberbyid($id){
        $query = "DELETE FROM tbl_phone_number WHERE phone_number_id='$id'";
        $deluser = $this->db->delete($query);
        if($deluser) {
            $msg = "toastr.success('Phone Number Deleted Successfully.',{timeOut: 4000});";
            return $msg;
        }else{
            $msg = "toastr.danger('ERROR : Phone Number Not Deleted.',{timeOut: 4000});";
            return $msg;
        }
    }

    public function getAllMarketerName(){
        $query = "SELECT user_auth_full_name FROM tbl_user_auth WHERE user_auth_role_id = '4'";
        $result = $this->db->insert($query);
        return $result;
    }

    public function get_sub_marketer_name(){
        $query = "SELECT * FROM tbl_user_auth WHERE user_auth_role_id = '5'";
        $result = $this->db->insert($query);
        return $result;
    }

    public function get_one_main_marketer_by_id($id){
        $query = "SELECT * FROM tbl_user_auth WHERE user_auth_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_number_by_id($id){
        $query = "SELECT * FROM tbl_phone_number WHERE phone_number_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function main_marketer_edit($data, $id){
        $id                             = $this->fm->validation($id);
        $user_auth_full_name            = $this->fm->validation($data['user_auth_full_name']);
        $user_auth_mobile               = $this->fm->validation($data['user_auth_mobile']);
        $user_auth_password             = $this->fm->validation($data['user_auth_password']);
        $user_auth_role_id              = $this->fm->validation($data['user_auth_role_id']);
 
        $id                             = mysqli_real_escape_string($this->db->link, $id);
        $user_auth_full_name            = mysqli_real_escape_string($this->db->link, $user_auth_full_name);
        $user_auth_mobile               = mysqli_real_escape_string($this->db->link, $user_auth_mobile);
        $user_auth_password             = mysqli_real_escape_string($this->db->link, $user_auth_password);
        $user_auth_role_id              = mysqli_real_escape_string($this->db->link, $user_auth_role_id);


        

        if (empty($user_auth_full_name) || empty($user_auth_mobile) || empty($user_auth_password) || empty($user_auth_role_id)) {
           $msg= "<span class='text-danger'>Field must not be empty</span>";
            return $msg;
        
        }else{

            $query = "UPDATE tbl_user_auth SET 
                        user_auth_full_name = '$user_auth_full_name', 
                        user_auth_mobile    = '$user_auth_mobile',
                        user_auth_password  = '$user_auth_password',
                        user_auth_role_id   = '$user_auth_role_id'

                      WHERE user_auth_id = '$id'";

            $result = $this->db->update($query);
            if ($result!=false) {
                header('Location:marketer_main_list.php');
                $msg = "toastr.success('User Updated Successfully.',{timeOut: 4000});";
                return $msg;
            }else{
                $msg = "toastr.danger('ERROR : User Not Updated',{timeOut: 4000});";
                return $msg;
            }

        }
    }

    public function sub_marketer_edit($data, $id){
        $id                             = $this->fm->validation($id);
        $user_auth_full_name            = $this->fm->validation($data['user_auth_full_name']);
        $user_auth_mobile               = $this->fm->validation($data['user_auth_mobile']);
        $user_auth_password             = $this->fm->validation($data['user_auth_password']);
        $user_auth_role_id              = $this->fm->validation($data['user_auth_role_id']);
 
        $id                             = mysqli_real_escape_string($this->db->link, $id);
        $user_auth_full_name            = mysqli_real_escape_string($this->db->link, $user_auth_full_name);
        $user_auth_mobile               = mysqli_real_escape_string($this->db->link, $user_auth_mobile);
        $user_auth_password             = mysqli_real_escape_string($this->db->link, $user_auth_password);
        $user_auth_role_id              = mysqli_real_escape_string($this->db->link, $user_auth_role_id);


        

        if (empty($user_auth_full_name) || empty($user_auth_mobile) || empty($user_auth_password) || empty($user_auth_role_id)) {
           $msg= "<span class='text-danger'>Field must not be empty</span>";
            return $msg;
        
        }else{

            $query = "UPDATE tbl_user_auth SET 
                        user_auth_full_name = '$user_auth_full_name', 
                        user_auth_mobile    = '$user_auth_mobile',
                        user_auth_password  = '$user_auth_password',
                        user_auth_role_id   = '$user_auth_role_id'

                      WHERE user_auth_id = '$id'";

            $result = $this->db->update($query);
            if ($result!=false) {
                header('Location:marketer_sub_list.php');
                return $msg;
            }else{
                $msg = "toastr.danger('ERROR : User Not Updated',{timeOut: 4000});";
                return $msg;
            }

        }
    }




}
?>