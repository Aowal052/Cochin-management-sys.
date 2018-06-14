<?php include_once 'app/inc/header.php'; ?>

<?php
    if (isset($_GET['delmarketer'])) {
    	$id 			= $_GET['delmarketer'];
    	$delmarketer 	= $mktr->delete_marketer_by_id($id);
    }
?>


<?php
	if (isset($_GET['marketer_id'])) {
		$id = $_GET['marketer_id'];
	    $changeStatus = $mktr->changeStatus($id);
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
                                    <h3><i class="fa fa-list"></i> MAIN MARKETER LIST</h3>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-responsive-md">
									<thead>
										<tr>
					            			<th>#</th>
					            			<th>Main Marketer Name</th>
											<th class="text-center">Phone Number</th>
											<th class="text-center">View</th>
											<th class="text-center">Status</th>
											<th class="text-center">Edit</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
							        <?php
							            $get_all_main_marketer = $mktr->get_main_marketer_name();
							            if ($get_all_main_marketer) {
							              $i=0;
							              while ($result= $get_all_main_marketer->fetch_assoc()) {
							              $i++;
							        ?>
									<tbody>
										<tr>
								            <td><?php echo $i; ?></td>
								            <td><?php echo $result['user_auth_full_name'];?></td>
											<td class="text-center"><?php echo $result['user_auth_mobile'];?></td>
											<td class="text-center">
												<a href="marketer_view_sub_marketer.php?id=<?php echo $result['user_auth_id'];?>" class="text-success" data-toggle="tooltip" data-placement="bottom">View Sub Marketer</a>
											</td>
											<td class="text-center">
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
					            				<a href="marketer_main_edit.php?marketer_id=<?php echo $result['user_auth_id']; ?>" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning">
					            					<i class="fa fa-pencil"></i>
					            				</a> 
					            			</td>

					            			<td class="text-center">
					            				<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" onclick="return confirm('are you sure')" href="?delmarketer=<?php echo $result['user_auth_id'];?>">
					            					<i class="fa fa-trash"></i>
					            				</a>
					            			</td>
										</tr>
									</tbody>
					        		<?php } } ?>
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
