<?php include_once 'app/inc/header.php'; ?>

<?php
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $batch_assign = $btc->batch_assign($_POST);
    }
?>

<?php
	if (isset($_GET['del_batch_assign'])) {
		$id = $_GET['del_batch_assign'];
		$delbatch = $btc->delbatchassignbyid($id);
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
	                                    <h3><i class="fa fa-plus"></i> ASSIGN BATCH</h3>
	                                </div>

	                                <div class="text-center">
	                                	
	                                </div>


	                                <!--Body-->

	                                <div class="form-group">
	                                    <label for="batch_time">Select Batch</label>
										<select id="batch_time" name="batch_assign_student_batch_id" class="form-control">
	                            			<option value="">Select Batch</option>
					                        <?php 
					                            $getBatch = $btc->getAllbatch();
					                            if ($getBatch) {
					                                while ($result = $getBatch->fetch_assoc()) {
					                        ?>
				                            <option value="<?php echo $result['batch_id'];?>"><?php echo $result['batch_name'];?></option>
				                            <?php } }?>
				                        </select>
									</div>

	                                <div class="form-group">
	                                    <label for="batch_time">Select Student</label>
										<select id="batch_time" name="batch_assign_student_student_id" class="form-control">
	                            			<option value="">Select Student</option>
					                        <?php 
		                                    $getStudent = $usr->getAllStudent();
			                                    if ($getStudent) {
			                                        while ($result = $getStudent->fetch_assoc()) {
			                                ?>
		                                  <option value="<?php echo $result['user_auth_id'];?>"><?php echo $result['user_auth_full_name'];?>
		                                    
		                                  </option>
		                                  <?php } }?>
				                        </select>
									</div>

	                                <div class="text-center mt-4">
	                                    <button class="btn btn-orange btn-lg waves-effect waves-light">Submit</button>
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
                                    <h3><i class="fa fa-list"></i> ASSIGNED BATCH LIST</h3>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-striped table-bordered table-responsive-md">
									<thead>
										<tr>
								            <th>#</th>
											<th>Batch</th>
								            <th>Student</th>
								            <th class="text-center">Edit</th>
								            <th class="text-center">Delete</th>
										</tr>
									</thead>
							        
									<tbody>
										<?php
								            $batch_assign_list = $btc->batch_assign_list();
								            if ($batch_assign_list) {
								              $i=0;
								              while ($result= $batch_assign_list->fetch_assoc()) {
								              $i++;
								        ?>
										<tr>
								            <td><?php echo $i; ?></td>
								            <td><?php echo $result['batch_assign_student_student_id'];?></td>
											<td><?php echo $result['batch_assign_student_batch_id'];?></td>
								            <td class="text-center">
								            	<a href="batch_edit.php?batch_assign_id=<?php echo $result['batch_assign_student_id'];?>" class="btn btn-primary">
								            		<i class="fa fa-pencil"></i>
								            	</a>
								            </td>
								            <td class="text-center">
								            	<a onclick="return confirm('Are You Sure?')" href="?del_batch_assign=<?php echo $result['batch_assign_student_id'];?>" class="btn btn-danger">
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