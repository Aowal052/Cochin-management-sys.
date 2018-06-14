<?php
 	$filePath = realpath(dirname(__FILE__));
 ?>
<?php  include_once ($filePath.'/../lib/Database.php');?> 
 <?php include_once ($filePath.'/../helpers/Format.php');?>


<?php
class Notice{
	public $db;
    public $fm;

    public function __construct(){
       $this->db = new Database;
       $this->fm = new Format;
    }

    public function notice_add($data,$file){
        $notice_title           = $this->fm->validation($data['notice_title']);
        $notice_desc            = $this->fm->validation($data['notice_desc']);
 
        $notice_title           = mysqli_real_escape_string($this->db->link, $notice_title);
        $notice_desc            = mysqli_real_escape_string($this->db->link, $notice_desc);

        $permited               = array('jpg', 'jpeg', 'png', 'gif');
        $file_name              = $file['notice_image']['name'];
        $file_size              = $file['notice_image']['size'];
        $file_temp              = $file['notice_image']['tmp_name'];

        $div                    = explode('.', $file_name);
        $file_ext               = strtolower(end($div));
        $unique_image           = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image         = "uploads/".$unique_image;

        if (empty($notice_title) ||empty($notice_desc)) {
            $img= "<span class='error'>Field must not be empty</span>";
            return $img;
        }elseif ($file_size >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!</span>";
        }elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_notice(notice_title,
                                        notice_desc,
                                        notice_image) 
                                VALUES('$notice_title',
                                        '$notice_desc',
                                        '$uploaded_image')";

            $result = $this->db->insert($query);
            if ($result!=false) {
                $msg = "toastr.success('Notice Inserted Successfully.',{timeOut: 4000});";
                return $msg; 
            }else{
                $msg = "toastr.danger('ERROR : Noticer Not Inserted.',{timeOut: 4000});";
                return $msg;
            }
        }
    }

    public function get_all_notice(){
        $query = "SELECT * FROM tbl_notice ORDER BY notice_id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_notice_by_id($id){
        $select_query = "SELECT * FROM tbl_notice WHERE notice_id = '$id'";
        $select_result = $this->db->select($select_query);
        $select_fetch = $select_result->fetch_assoc();

        $query = "DELETE FROM tbl_notice WHERE notice_id='$id'";
        $delnotice = $this->db->delete($query);
        if($delnotice) {
            unlink($select_fetch['notice_image']);
            $msg = "toastr.success('Notice Deleted Successfully.',{timeOut: 4000});";
            echo "<script>window.location.href='notice_all.php'</script>";
            return $msg;
        }else{
            $msg = "toastr.danger('ERROR : Noticer Not Deleted.',{timeOut: 4000});";
            return $msg;
        }
    }

    public function get_notice_by_id($id){
        $query = "SELECT * FROM tbl_notice WHERE notice_id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function notice_edit($data,$file, $id){
        $id                             = $this->fm->validation($id);
        $notice_title            = $this->fm->validation($data['notice_title']);
        $notice_desc               = $this->fm->validation($data['notice_desc']);
 
        $id                             = mysqli_real_escape_string($this->db->link, $id);
        $notice_title            = mysqli_real_escape_string($this->db->link, $notice_title);
        $notice_desc               = mysqli_real_escape_string($this->db->link, $notice_desc);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['notice_image']['name'];
        $file_size = $file['notice_image']['size'];
        $file_temp = $file['notice_image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if (empty($notice_title)||empty($notice_desc)) {
           $img = "<span class='error'>Fields must not be empty</span>";
           return $img;
        }else{
            if (!empty($file_name)) {

                if ($file_size >1048567) {
                echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                 }else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_notice
                                SET
                                notice_title = '$notice_title',
                                notice_desc  = '$notice_desc',
                                notice_image = '$uploaded_image'
                                WHERE notice_id = '$id'";

                    $result = $this->db->update($query);
                    if ($result!=false) {
                        $msg = "Notice updated successfully...";
                        return $msg; 
                }else{
                    $msg = "Notice is not updated";
                    return $msg;
                }

            }
        }else{
                $query = "UPDATE tbl_notice
                                SET
                                notice_title = '$notice_title',
                                notice_desc = '$notice_desc'
                                WHERE notice_id = '$id'";

                    $result = $this->db->update($query);
                    if ($result!=false) {
                        $msg = "Notice updated successfully...";
                        return $msg; 
                }else{
                    $msg = "<span style='color: red'>Notice is not updated</span>";
                    return $msg;
                }

            }
        }
        
        

       
    }

}
?>