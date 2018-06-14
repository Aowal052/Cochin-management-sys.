<?php include_once 'app/inc/header.php'; ?>

<?php
    if (isset($_GET['user_auth_id'])) {
        $user_auth_id = $_GET['user_auth_id'];
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['edit'])) {
        $user_auth_edit = $mktr->sub_marketer_edit($_POST,$user_auth_id);
    }

?>

<?php
    $get_all_user_auth_by_id = $usr->get_all_user_auth_by_id($user_auth_id);
    if ($get_all_user_auth_by_id) {
      
    $result= $get_all_user_auth_by_id->fetch_assoc();

  }
?>

<?php include_once 'app/inc/navbar.php';?>



    <!--Main layout-->
    <main>
        <div class="container-fluid">
      <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 mb-4 mt-4">

                        <!--Form with header-->
                        <div class="card">

                            <div class="card-body">
                              <form action="marketer_sub_edit.php?user_auth_id=<?php echo $result['user_auth_id'] ?>" method="post">
                                  <div class="form-header orange accent-2">
                                      <h3><i class="fa fa-plus"></i> EDIT MAIN MARKETER</h3>
                                  </div>

                                  <div class="text-center">
                                    
                                  </div>

                                  <!--Body-->

                                  <div class="form-group">
                                    <label for="user_auth_full_name"><b>Full Name</b></label>
                                    <input type="text" class="form-control" id="user_auth_full_name" name="user_auth_full_name" placeholder="user_auth_full_name" value="<?php echo $result['user_auth_full_name'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label for="user_auth_mobile"><b>User Mobile</b></label>
                                    <input type="text" class="form-control" id="user_auth_mobile" name="user_auth_mobile" placeholder="user_auth_mobile" value="<?php echo $result['user_auth_mobile'] ?>">
                                  </div>

                                  <div class="form-group">
                                    <label for="user_auth_password"><b>User Password</b></label>
                                    <input type="text" class="form-control" id="user_auth_password" name="user_auth_password" placeholder="user_auth_password" value="<?php echo $result['user_auth_password'] ?>">
                                  </div>
                                  <?php
                                    if (Session::get("user_auth_role_id")==1) {
                                  ?>
                                  <div class="form-group">
                                    <label for="user_auth_role_id"><b>User Role</b></label>
                                    <select id="select" name="user_auth_role_id" class="form-control">

                                        <option value="">Select Role</option>

                                        <?php 
                                            $getrole = $rol->getAllRole();
                                            if ($getrole) {
                                                while ($result_role = $getrole->fetch_assoc()) {
                                        ?>

                                        <option value="<?php echo $result_role['role_id'];?>" 

                                        <?php  
                                          if ($result_role['role_id'] == $result['user_auth_role_id']) {
                                            echo "selected";
                                          }
                                        ?>

                                        ><?php echo $result_role['role_name'];?></option>
                                          
                                        <?php } }?>
                                    </select>
                                   </div>
                                   <?php }else{
                                      
                                    }?>

                                  <div class="text-center mt-4">
                                      <button class="btn btn-orange btn-lg waves-effect waves-light" name="edit">UPDATE</button>
                                  </div>

                              </form>
                            </div>

                        </div>
                        <!--Form with header-->

                    </div>
                    <!--Grid column-->

                </div>
        </div>
    </main>
    <!--Main layout-->

<?php include_once 'app/inc/footer.php' ?>
<?php include_once 'app/inc/foot.php' ?>