<?php include_once 'app/inc/header.php'; ?>

<div id="wrapper">

<?php include 'app/inc/navbar.php';?>
<?php //error_reporting(0);?>
<?php

     if (isset($_GET['id']) || $_GET['id'] != NULL) {
         $id = $_GET['id'];
     }//else if(isset($_GET['marketer_id'])){
      // $marketer_id = $_GET['marketer_id'];
      // $mktr->changeStatus($marketer_id);
     //}else if (isset($_GET['sub_marketer_id'])) {
    // $sub_marketer_id = $_GET['sub_marketer_id'];
    //   $mktr->changeStatus_for_sub_marketer($sub_marketer_id);
    // }else
    // echo "erreo";
?>


<div id="page-wrapper">
<div class="graphs">
<div class="panel panel-info">

			<?php
            $get_all_main_marketer = $mktr->get_one_main_marketer_by_id($id);
            if ($get_all_main_marketer) {
              
              $value= $get_all_main_marketer->fetch_assoc();
              }
          ?>

            <div class="panel-heading">
              <h3 class="panel-title">Profile Of <?php echo $value['user_auth_full_name'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row"><!-- 
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php //echo $result['user_picture']; ?>" class="img-circle img-responsive"> </div> -->
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Full Name:</td>
                        <td><?php echo $value['user_auth_full_name'];?></td>
                      </tr>
                      <tr>
                        <td>User Mobile</td>
                        <td><?php echo $value['user_auth_mobile'];?></td>
                      </tr>
                     
                      <!-- <tr>
                        <td>Email</td>
                        <td><?php //echo $result['user_full_name'];?></td>
                      </tr> -->
                    <tr>
                      
				            <td>Status</td>
				        <!-- <?php
				            // if (isset($status)) {
				            //   while ($status= $status->fetch_assoc()) {
				        ?> -->
                    <td>
                				     <?php 
                                  if($value['user_auth_status']=='0'){ 
                                ?>
                        
                                  <span name="inactive" class="text-danger">Inactive</span>
                                <?php 
                                  }else{ 

                                ?>
                                  <span name="active" class="text-primary">Active</span>
                                <?php
                                  } 
                                ?>
						        </td>
						
                  </tr>
                        
                           
                      
                     
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- ---------------------------------- -->
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Sub Marketer Name</th>
                <th>Phone Number</th>
                <th>Status</th>
              </tr>
            </thead>
                <?php
                    $get_all_marketer = $mktr->get_sub_marketer_by_id($id);
                    if ($get_all_marketer) {
                      $i=0;
                      while ($result= $get_all_marketer->fetch_assoc()) {
                      $i++;
                ?>
            <tbody>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['sub_marketer_name'];?></td>
                <td><?php echo $result['sub_marketer_phone'];?></td>
                <td>
                  <!-- <form action="" method="post"> -->
                                          
                                <?php 
                                  if($result['sub_marketer_status']=='0'){ 
                                ?>
                        
                                  <div name="inactive" >Inactive</div>
                                <?php 
                                  }else{ 

                                ?>
                                  <div name="active" >Active</div>
                                <?php
                                  } 
                                ?>
                          
                          <!-- </form> -->
                </td>


              </tr>
            </tbody>
                <?php } } ?>
          </table>               
        
    <!-- -------------------------- -->
            </div>
            
          </div>
    
 </div>
 </div>
  <!-- .............................................. -->









  <?php include_once 'app/inc/footer.php' ?>

	</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
<?php include_once 'app/inc/foot.php' ?>