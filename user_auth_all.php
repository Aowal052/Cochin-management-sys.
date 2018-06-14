<?php include_once 'app/inc/header.php'; ?>

<?php     
  if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['add_user'])) {
      $user_auth_add = $usr->user_auth_add($_POST);
  }
?>

<?php
  if (isset($_GET['deluser'])) {
    $id     = $_GET['deluser'];
    $deluser  = $usr->delete_user_by_id($id);
  }
?>

<?php
  if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $change_status_for_user_auth = $usr->change_status_for_user_auth($id);
  }
?>

<?php include_once 'app/inc/navbar.php';?>



    <!--Main layout-->
    <main>
        <div class="container-fluid">
      <div class="row">

                    <!--Grid column-->
                    <div class="col-md-4 mb-4 mt-4">

                        <!--Form with header-->
                        <div class="card">

                            <div class="card-body">
                              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                  <div class="form-header orange accent-2">
                                      <h3><i class="fa fa-plus"></i> ADD NEW USER</h3>
                                  </div>

                                  <div class="text-center">
                                    
                                  </div>

                                  <!--Body-->

                                  <div class="form-group">
                                    <label for="user_auth_full_name"><b>Full Name</b></label>
                                    <input type="text" class="form-control" id="user_auth_full_name" name="user_auth_full_name" placeholder="Example : Md.Mamun Ahmed">
                                  </div>

                                  <div class="form-group">
                                    <label for="user_auth_mobile"><b>User Mobile</b></label>
                                    <input type="number" class="form-control" id="user_auth_mobile" name="user_auth_mobile" placeholder="Example : 01740 483 311">
                                  </div>

                                  <div class="form-group">
                                    <label for="user_auth_password"><b>User Password</b></label>
                                    <input type="text" class="form-control" id="user_auth_password" name="user_auth_password" placeholder="Password">
                                  </div>

                                  <div class="form-group">
                                    <label for="user_auth_role_id"><b>User Role</b></label>
                                    <select id="select" name="user_auth_role_id" class="form-control">

                                        <option value="">Select Role</option>

                                        <?php 
                                            $getrole = $rol->getAllRole();
                                            if ($getrole) {
                                                while ($result = $getrole->fetch_assoc()) {
                                        ?>

                                        <option value="<?php echo $result['role_id'];?>"><?php echo $result['role_name'];?></option>
                                          
                                        <?php } }?>
                                    </select>
                                  </div>

                                  <div class="text-center mt-4">
                                      <button class="btn btn-orange btn-lg waves-effect waves-light" name="add_user">ADD</button>
                                  </div>

                              </form>
                            </div>

                        </div>
                        <!--Form with header-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-8 mb-4 mt-4">

                        <!--Form with header-->
                        <div class="card">

                            <div class="card-body">
                                <div class="form-header orange accent-2">
                                    <h3><i class="fa fa-list"></i> USER LIST</h3>
                                </div>

                                <div class="text-center">
                                </div>

                                <table class="table table-striped table-bordered table-responsive-md">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Mobile</th>
                                      <th>Role</th>
                                      <th>Joining Date</th>
                                      <th>Status</th>
                                      <th class="text-center">Edit</th>
                                      <th class="text-center">Delete</th>
                                    </tr>
                                  </thead>
                      
                                  <tbody>
                                    <?php
                                        $get_all_user_auth = $usr->get_all_user_auth();
                                        if ($get_all_user_auth) {
                                          $i=0;
                                          while ($result= $get_all_user_auth->fetch_assoc()) {
                                          $i++;

                                    ?>
                                    <tr>
                                      <td><?php echo $i; ?></td>
                                      <td><?php echo $result['user_auth_full_name'];?></td>
                                      <td><?php echo $result['user_auth_mobile'];?></td>
                                      <td><?php echo $result['user_auth_role_id'];?></td>
                                      <td><?php echo date('d F Y',strtotime($result['user_auth_joining_date']));?></td>
                                      <td>
                                        <!-- <form action="" method="post"> -->
                                                                      
                                                  <?php 
                                                    if($result['user_auth_status']=='0'){ 
                                                  ?>
                                          

                                                    <a class="text-danger" name="inactive" href="?user_id=<?php echo $result['user_auth_id']; ?>" title="Click To Active">Inactive</a>

                                                  <?php 
                                                    }else{ 

                                                  ?>

                                                    <a class="text-success" href="?user_id=<?php echo $result['user_auth_id']; ?>" title="Click to Inactive">Active</a>

                                                  <?php
                                                    } 
                                                  ?>
                                                
                                                <!-- </form> -->
                                      </td>


                                      <td>
                                        <a href="user_auth_edit.php?user_auth_id=<?php echo $result['user_auth_id']; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
                                          <i class="fa fa-pencil"></i>
                                        </a> 

                                      </td>
                                      <td>

                                        <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" onclick="return confirm('are you sure')" href="?deluser=<?php echo $result['user_auth_id'];?>">
                                          <i class="fa fa-trash"></i>
                                        </a>
                                      </td>
                                    </tr>
                                    <?php } } ?>
                                  </tbody>
                  
                                </table> 


                                  
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