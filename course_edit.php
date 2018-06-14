<?php include_once 'app/inc/header.php'; ?>
<?php
    if (isset($_GET['course_id'])) {
        $course_id = $_GET['course_id'];
    }
?>
<?php

    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $course_update = $crs->course_update($_POST,$course_id);
    }

?>


<?php

    $updata_course=$crs->get_all_main_course_by_id($course_id);
    $value = $updata_course->fetch_assoc();
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
                                <form action="course_edit.php?course_id=<?php echo $value['course_id'] ?>" method="post">
	                                <div class="form-header orange accent-2">
	                                    <h3><i class="fa fa-plus"></i> UPDATE COURSES</h3>
	                                </div>

	                                <div class="text-center">
	                                	
	                                </div>
											

	                                <!--Body-->

	                                <div class="form-group">
										<label for="courseName"><b>Course Name</b></label>
										<input type="text" class="form-control" id="courseName" name="courseName" placeholder="Course Name" value="<?php echo $value['courseName']; ?>">
									</div>

									<div class="form-group">
										<label for="course_code"><b>Course Code</b></label>
										<input type="text" class="form-control" id="course_code" name="course_code" placeholder="1111" value="<?php echo $value['course_code']; ?>">
									</div>

									<div class="form-group">
										<label for="courseFee"><b>Course Fee</b></label>
										<input type="number" class="form-control" id="courseFee" name="courseFee" placeholder="00.00 tk" value="<?php echo $value['courseFee']; ?>">
									</div>	

	                                <div class="text-center mt-4">
	                                    <button class="btn btn-orange btn-lg waves-effect waves-light">Update</button>
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
                                    <h3><i class="fa fa-list"></i> COURSE LIST</h3>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-responsive-md">
									<thead>
										<tr>
								            <th>#</th>
											<th>Course Name</th>
								            <th>Course Code</th>
											<th>Course Fee</th>
								            <th class="text-center">Edit</th>
								            <th class="text-center">Delete</th>
										</tr>
									</thead>
							        
									<tbody>
										<?php
								            $getAllCourse = $crs->getAllCourse();
								            if ($getAllCourse) {
								              $i=0;
								              while ($result= $getAllCourse->fetch_assoc()) {
								              $i++;
								        ?>
										<tr>
								            <td><?php echo $i; ?></td>
								            <td><?php echo $result['courseName'];?></td>
											<td><?php echo $result['course_code'];?></td>
											<td><?php echo $result['courseFee'];?></td>
								            
								            <td class="text-center">
								            	<a href="course_edit.php?course_id=<?php echo $result['course_id'];?>" class="btn btn-primary">
								            		<i class="fa fa-pencil"></i>
								            	</a>
								            </td>
								            <td class="text-center">
								            	<a onclick="return confirm('Are You Sure?')" href="?delcourse=<?php echo $result['course_id'];?>" class="btn btn-danger">
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