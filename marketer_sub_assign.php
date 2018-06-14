<?php include_once 'app/inc/header.php'; ?>

<div id="wrapper">
 <?php include 'app/inc/navbar.php';?>

<?php
    // $addcat = new course;
    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['submit'])) {
        $sub_marketer_add = $mktr->sub_marketer_add($_POST);
    }

?>
    <div id="page-wrapper">
    
    <div class="graphs">
      <div class="col_3">
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="text-center">Assign New Sub Marketer
                <p class="text-center">
                <?php 
                          if (isset($sub_marketer_add)) {
                              echo $sub_marketer_add;
                          }
                       ?>
                  </p>
              </h3>
            </div>
            <div class="panel-body">
              <form action="" method="post" enctype="multipart/form-data">


                <div class="form-group">
                  <label for="main_marketer_auth_id"><b>Supervisor</b></label>
                  <select id="select" name="main_marketer_auth_id" class="form-control1">
                      <option value="">Select Supervisor</option>
                    <?php 
                        $get_main_marketer_name = $mktr->get_main_marketer_name();
                        if ($get_main_marketer_name) {
                            while ($result = $get_main_marketer_name->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $result['user_auth_id'];?>"><?php echo $result['user_auth_full_name'];?></option>
                    <?php } }?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="sub_marketer_auth_id"><b>Sub Marketer Name</b></label>
                  <select id="select" name="sub_marketer_auth_id" class="form-control1">
                      <option value="">Select Sub Name</option>
                    <?php 
                        $get_sub_marketer_name = $mktr->get_sub_marketer_name();
                        if ($get_sub_marketer_name) {
                            while ($result1 = $get_sub_marketer_name->fetch_assoc()) {
                    ?>
                      <option value="<?php echo $result1['user_auth_id'];?>"><?php echo $result1['user_auth_full_name'];?></option>
                    <?php } }?>
                  </select>
                </div>

                <div class="col-md-12">
                    <div class="btn-group">
                      <button type="submit" class="btn btn-success" name="submit">Submit</button>
                      <button type="reset" class="btn btn-warning">Reset</button>
                    </div>
                </div>

               
              </form>
            </div>
            <div class="panel-footer">
              
            </div>
          </div>
      </div>
    </div>










    <?php include_once 'app/inc/footer.php' ?>

  </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->


<?php include_once 'app/inc/foot.php' ?>