<?php include_once 'app/inc/header.php'; ?>

<?php

    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $courseName = $_POST['courseName'];
        $courseCode = $_POST['course_code'];
        $courseFee = $_POST['courseFee'];
        $courseInsert = $crs->courseInsert($courseName,$courseFee,$courseCode);
    }

?>

<?php
  if (isset($_GET['delcourse'])) {
    $id = $_GET['delcourse'];
    $delcourse = $crs->delcoursebyid($id);
  }
?>

<?php
    if (isset($_GET['action']) && $_GET['action']== "logout") {
        Session::destroy();
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
	                                    <h3><i class="fa fa-plus"></i> ADD NEW COURSE</h3>
	                                </div>

	                                <div class="text-center">
	                                	
	                                </div>


	                                <!--Body-->

	                                <div class="form-group">
										<label for="courseName"><b>Course Name</b></label>
										<input type="text" class="form-control" id="courseName" name="courseName" placeholder="Course Name">
									</div>

									<div class="form-group">
										<label for="course_code"><b>Course Code</b></label>
										<input type="text" class="form-control" id="course_code" name="course_code" placeholder="1111">
									</div>

									<div class="form-group">
										<label for="courseFee"><b>Course Fee</b></label>
										<input type="number" class="form-control" id="courseFee" name="courseFee" placeholder="00.00 tk">
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