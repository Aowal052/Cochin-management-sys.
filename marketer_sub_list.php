<?php include_once 'app/inc/header.php'; ?>

<?php
    if (isset($_GET['del_sub_marketer'])) {
    	$id 				= $_GET['del_sub_marketer'];
    	$del_sub_marketer 	= $mktr->delete_sub_marketer_by_id($id);
    }
?>

<?php
	if (isset($_GET['marketer_id'])) {
		$id = $_GET['marketer_id'];
	    $changeStatus_for_sub_marketer = $mktr->changeStatus_for_sub_marketer($id);
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
                                <div class="form-header orange accent-2">
                                    <h3><i class="fa fa-list"></i> SUB MARKETER LIST</h3>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-responsive-md">
									<thead>
										<tr>
					            			<th>#</th>
					            			<th>Full Name</th>
											<th>Phone Number</th>
											<th>Status</th>
											<th class="text-center">Edit</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>

									<tbody>
								        <?php
								            $get_all_marketer = $mktr->get_sub_marketer();
								            if ($get_all_marketer) {
								              $i=0;
								              while ($result= $get_all_marketer->fetch_assoc()) {
								              $i++;
								        ?>
										<tr>
								            <td><?php echo $i; ?></td>
								            <td><?php echo $result['user_auth_full_name'];?></td>
								            <td><?php echo $result['user_auth_mobile'];?></td>
											<td>
												<!-- <form action="" method="post"> -->
						                                      		
	                                            <?php 
	                    							if($result['user_auth_status']=='0'){ 
	                    						?>
													

	                    							<a class="text-danger" name="inactive" href="?marketer_id=<?php echo $result['user_auth_id']; ?>" title="Click To Active">Inactive</a>

	                    						<?php	
	                    							}else{ 

	                    						?>

	                    							<a class="text-success" href="?marketer_id=<?php echo $result['user_auth_id']; ?>" title="Click to Inactive">Active</a>

	                    						<?php
	                    							} 
	                    						?>
			                    			
			                					<!-- </form> -->
											</td>


					            			<td class="text-center">
					            				<a href="user_auth_edit.php?sub_marketer_id=<?php echo $result['user_auth_id']; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
					            					<i class="fa fa-pencil"></i>
					            				</a> 
					            			</td>
											
											<td class="text-center">
					            				<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="?del_sub_marketer=<?php echo $result['user_auth_id'];?>">
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