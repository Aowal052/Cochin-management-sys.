<?php include_once 'app/inc/header.php'; ?>


<?php
    if (isset($_GET['phone_number_id'])) {
        $phone_number_id = $_GET['phone_number_id'];
    }
?>


<?php
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $Number_Update = $mktr->Number_Update($_POST,$phone_number_id);
    }
?>

<?php
	if (isset($_GET['delPhone_number'])) {
		$id 				= $_GET['delPhone_number'];
		$delPhone_number 	= $mktr->delPhone_numberbyid($id);
	}
?>
<?php
    $get_number_by_id = $mktr->get_number_by_id($phone_number_id);
    if ($get_number_by_id) {
    $result= $get_number_by_id->fetch_assoc();

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
                                <form action="phone_no_edit.php?phone_number_id=<?php echo $result['phone_number_id']; ?>" method="post">
	                                <div class="form-header orange accent-2">
	                                    <h3><i class="fa fa-plus"></i> UPDATE PHONE NUMBER</h3>
	                                </div>

	                                <div class="text-center">
	                                	
	                                </div>


	                                <!--Body-->

	                                <div class="form-group">
										<label for="Phone Number"><b>Add Phone Number</b></label><br>
										<input type="text" class="form-control" id="Phone Number" name="Phone_Number" placeholder="Add Phone Number"
										value="<?php echo $result['phone_number']; ?>">
									</div>
									<div class="form-group">
										<label for="Phone Number"><b>Student Name</b></label><br>
										<input type="text" class="form-control" id="Phone Number" name="student_name" placeholder="Student Name" value="<?php echo $result['phone_number_student_name']; ?>">
									</div>
									<div class="form-group">
										<label for="Phone Number"><b>Comment</b></label><br>
										<input type="text" class="form-control" id="Phone Number" name="comment" placeholder="Comment" value="<?php echo $result['phone_number_comment']; ?>">
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
                                    <h3><i class="fa fa-list"></i> PHONE NUMBER LIST</h3>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-responsive-md">
									<thead>
										<tr>
								            <th>#</th>
								            <th>Student Name</th>
								            <th>Phone Number</th>
											<th>Comment</th>
								            <th>Date</th>
								            <th>User</th>
								            <th>Edit</th>
								            <th>Delete</th>
										</tr>
									</thead>

					        		<tbody>

								          <?php
								              $Number_show = $mktr->Number_show();
								              if ($Number_show) {
								                $i=0;
								                while ($result= $Number_show->fetch_assoc()) {
								                $i++;
								                
								          ?>
										<tr>
								            <td><?php echo $i; ?></td>
								            <td><?php echo $result['phone_number_student_name'];?></td>
								            <td><?php echo $result['phone_number'];?></td>
								            <td><?php echo $result['phone_number_comment'];?></td>
								            <td><?php echo date('d F Y',strtotime($result['phone_number_date']));?></td>
								            <td><?php echo $result['phone_number_user_auth_id'];?></td>
								            <td>
								            	<a href="Phone_no_edit.php?phone_number_id=<?php echo $result['phone_number_id'];?>" class="btn btn-warning">
													<i class="fa fa-pencil"></i>
								            	</a>
								            </td>

								            <td>
								            	<a onclick="return confirm('are you sure')" href="?delPhone_number=<?php echo $result['phone_number_id'];?>" class="btn btn-danger">
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