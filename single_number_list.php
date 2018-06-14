<?php include_once 'app/inc/header.php'; ?>

<div id="wrapper">

  <?php include 'app/inc/navbar.php';?>
  <?php

     if (isset($_GET['marketer_id']) || $_GET['marketer_id'] != NULL) {
         $id = $_GET['marketer_id'];
     }
?>

<!-- <?php
 

  // if (isset($_GET['delbatch'])) {
  //   $id = $_GET['delbatch'];
  //   $delbatch = $btc->delbatchbyid($id);
  // }
?> -->
<div id="page-wrapper">
<div class="graphs">
  <div class="grid_3 grid_4">
  <h3 class="pull-left"><i class="fa fa-add"></i>Students Contract Numbers</h3>
  <a href="single_number_list.php?marketer_id=<?php echo $user_auth_id ?>" class="btn btn-primary pull-right">Phone Number list</a>
    <?php
      if (isset($delbatch)) {
        echo $delbatch;
      }
    ?>
  </h3>
  </div>
  <div class="grid_3 grid_5">
   <div class="grid_3 grid_5">
   <div class="grid_3 grid_5">
     <h3>Number List</h3>
       <div class="but_list">
	    <div class="col-md-12 page_1">
			<p>Add and modifier to change the appearance of a Number List.</p>
      <table class="table table-bordered">
				<thead>
					<tr>
            <th>#</th>
						<th>Student Name</th>
            <th>Phone Number</th>
						<th>Comment</th>
            <th>Entry Date</th>
            <th>Action</th>
					</tr>
				</thead>
        <?php
            $user_auth_id=Session::get("user_auth_id");
            $get_number_by_id = $mktr->get_number_by_id($user_auth_id);
            if ($get_number_by_id) {
              $i=0;
              while ($result= $get_number_by_id->fetch_assoc()) {
              $i++;
        ?>
				<tbody>
					<tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $result['phone_number_student_name'];?></td>
						<td><?php echo $result['phone_number'];?></td>
						<td><?php echo $result['phone_number_comment'];?></td>
            <td><?php echo date('d F Y',strtotime($result['phone_number_date']));?></td>
            <td><a href="batchedit.php?batch_id=<?php echo $result['batch_id'];?>">Edit</a></td>
					</tr>
				</tbody>
        <?php } } ?>
			</table>                    
		</div>
	   <div class="clearfix"> </div>
	   </div>
     </div>
     <div class="grid_3 grid_5">
  
      <?php include_once 'app/inc/footer.php' ?>

  </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->


<?php include_once 'app/inc/foot.php' ?>
