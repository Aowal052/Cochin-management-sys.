<?php include_once 'app/inc/header.php'; ?>

<?php

    if (isset($_GET['deluser'])) {
    	$id 		= $_GET['deluser'];
    	$deluser 	= $usr->delete_user_by_id($id);
    }
    
?>


<div id="wrapper">

<?php include 'app/inc/navbar.php';?>



<div id="page-wrapper">
	<div class="graphs">

	  	<div class="grid_3">
	  		<div class="panel panel-default">
	  			<div class="panel-heading">
                  <h3 class="pull-left"><i class="fa fa-list"></i> USER LIST</h3>
                  
                  <a href="user_auth_add.php" class="btn btn-primary pull-right">ADD NEW USER</a>
	  			</div>

	  			<div class="panel-body">
	  				<table class="table">
						<thead>
							<tr>
		            			<th>#</th>
		            			<th>image</th>
		            			<th>Titel</th>
								<th>Description</th>
		            			<th>Submitted Date</th>
		            			<th>Action</th>
							</tr>
						</thead>
				        <?php
				            $get_all_notice = $ntc->get_all_notice();
				            if ($get_all_notice) {
				              $i=0;
				              while ($result= $get_all_notice->fetch_assoc()) {
				              $i++;
				        ?>
						<tbody>
							<tr>
					            <td><?php echo $i; ?></td>
					            <td><img src="<?php echo $result['notice_image']; ?>" alt="img" style="height: 60px;width: 60px;"/></td>
					            <td><?php echo $result['notice_titel'];?></td>
								<td><?php echo $result['notice_description'];?></td>
								<td><?php echo date('d F Y',strtotime($result['notice_date']));?></td>


		            			<td>
		            				<a href="user_auth_edit.php?user_auth_id=<?php echo $result['user_auth_id']; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
		            					<i class="glyphicon glyphicon-edit"></i>
		            				</a> 

		            				<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" onclick="return confirm('are you sure')" href="?deluser=<?php echo $result['user_auth_id'];?>">
		            					<i class="glyphicon glyphicon-remove"></i>
		            				</a>
		            			</td>
							</tr>
						</tbody>
		        		<?php } } ?>
					</table> 
	  			</div>
	  		</div>
	  	</div>
	  	
	</div><!-- /.graph -->

		<?php include_once 'app/inc/footer.php' ?>

</div><!-- /#wrapper -->


<?php include_once 'app/inc/foot.php' ?>


