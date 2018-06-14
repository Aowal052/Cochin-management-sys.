<?php
  class UserLogin{
    public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }

    public function UserLogin($user_auth_mobile,$user_auth_password){
      $user_auth_mobile     = $this->fm->validation($user_auth_mobile);
      $user_auth_password   = $this->fm->validation($user_auth_password);
      $user_auth_mobile     = mysqli_real_escape_string($this->db->link, $user_auth_mobile);
      $user_auth_password   = mysqli_real_escape_string($this->db->link, $user_auth_password);

      if (empty($user_auth_mobile) || empty($user_auth_password)) {
        $loginmsg = "filds must not be empty";
        Session::set("UserLogin",false);
        return $loginmsg;
      }else{
        $query = "SELECT * FROM tbl_user_auth 
                  WHERE user_auth_mobile = '$user_auth_mobile' 
                    AND user_auth_password = '$user_auth_password'";
        $result = $this->db->select($query);
        if ($result != false) {
            $value = $result->fetch_assoc();
            Session::set("UserLogin",true);
            Session::set("user_auth_id",        $value['user_auth_id']);
            Session::set("user_auth_mobile",    $value['user_auth_mobile']);
            Session::set("user_auth_full_name", $value['user_auth_full_name']);
            Session::set("user_auth_role_id",   $value['user_auth_role_id']);
            header('location:index.php');
        }else{
          $loginmsg = "miss match occured";
          return $loginmsg;
        }
      
        }
        
    }
    public function role_name($id){
      $query = "SELECT role_name FROM tbl_role WHERE role_id = $id";
      $result = $this->db->select($query);
      return $result;
    }

  }

?>