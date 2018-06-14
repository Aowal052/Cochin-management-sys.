<?php include_once 'app/inc/header.php'; ?>

<?php
	    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['update'])) {
	    	$id = Session::get("user_auth_id");
	        $user_auth_edit = $usr->user_auth_edit($_POST, $id);
	    }

	?>


<?php include_once 'app/inc/navbar.php';?>
<p class=" text-info">May 05,2014,03:00 pm </p>
      </div>
        <div class="container-fluid" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="card-body">Sheena Shrestha</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <a href="edit_image.php?user_id=<?php echo Session::get('user_auth_id');;?>"><img alt="User Pic" src="" class="img-circle img-responsive"></a> </div>
                <div class=" col-md-9 col-lg-9 "> 
                <form action="" method="post">
                	  <table class="table table-user-information">
                	  <?php
                	  	$id = Session::get("user_auth_id");
                	  	$get_user_by_id = $usr->get_all_user_auth_by_id($id);
						    if ($get_user_by_id) {
						    $result= $get_user_by_id->fetch_assoc();

						  }
                	  ?>
                    <tbody>
                      <tr>
                        <td>user_auth_full_name:</td>
                        <td><input type="text" name="user_auth_full_name" value="<?php echo $result['user_auth_full_name']; ?>" ></td>
                      </tr>
                      <tr>
                        <td>user_auth_mobile:</td>
                        <td><input type="text" name="user_auth_mobile" value="<?php echo $result['user_auth_mobile'];;?>"></td>
                      </tr>
                           
                      </tr>
                     <tr>
                     	<td><input type="submit" name="update" value="Update Profile"></td>
                     </tr>
                    </tbody>
                  </table>
                </form>
                  
                
                 </div>
                 </div>

<?php include_once 'app/inc/footer.php' ?>
<?php include_once 'app/inc/foot.php' ?>