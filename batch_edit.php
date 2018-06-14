<?php include_once 'app/inc/header.php'; ?>
<?php
    if (isset($_GET['batch_id'])) {
        $batch_id = $_GET['batch_id'];
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $batch_edit = $btc->batch_edit($_POST,$batch_id);
    }
?>

<?php
	if (isset($_GET['delbatch'])) {
		$id = $_GET['delbatch'];
		$delbatch = $btc->delbatchbyid($id);
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
                                <form action="batch_edit.php?batch_id=<?php echo $batch_id ?>" method="post">
	                                <div class="form-header orange accent-2">
	                                    <h3><i class="fa fa-plus"></i> UPDATE BATCHS</h3>
	                                </div>

	                                <div class="text-center">
	                                	
	                                </div>


	                                <!--Body-->
									<?php

						                $updata_batch=$btc->get_batch_by_id($batch_id);
						                if ($updata_batch) {
						                    while ($value = $updata_batch->fetch_assoc()) {
							        ?> 
	                                <div class="form-group">
	                                    <label for="batch_time">Course Name</label>
										<select id="batch_time" name="batch_course_id" class="form-control">
	                            			<option value="">Select Course</option>
					                        <?php 
					                            $getAllCourse = $crs->getAllCourse();
					                            if ($getAllCourse) {
					                                while ($result = $getAllCourse->fetch_assoc()) {
					                        ?>

				                            <option
				                                <?php 
				                                    if ($value['batch_course_id']==$result['course_id']) { ?>
				                                        selected = "selected"
				                                   <?php } ?> value="<?php echo $result['course_id']; ?>"><?php
				                                    echo $result['courseName'];
				                                ?> 
				                            </option>

				                            <?php } }?>
				                        </select>
									</div>

	                                <div class="form-group">
	                                    <label for="batch_time">Batch Time</label>
	                                    <input type="time" name="batch_time" id="batch_time" class="form-control"
	                                    value="<?php echo $value['batch_time']; ?>">
	                                </div>

									<div class="form-group">
										<label for="batch_day">Batch Day</label>
											<select class="form-control" name="batch_day" id="batch_day">
											<option>Select one</option>
											<?php
												if ($value['batch_day']==1) { ?>
													<option value="1" selected="selected">sat/mon/wid</option>
													<option value="2">sun/tus/tras</option>
											<?php	}else{ ?>
													<option value="1">sat/mon/wid</option>
													<option value="2" selected="selected">sun/tus/tras</option>

											<?php }
											?>
										</select>
									</div>

									<div class="form-group">
										<label for="batch_derector">Batch Director</label>
										<input type="text" class="form-control" id="batch_derector" name="batch_derector" placeholder="Director Name" value="<?php echo $value['batch_derector']; ?>">
									</div>	

	                                <div class="text-center mt-4">
	                                    <button class="btn btn-orange btn-lg waves-effect waves-light" name="update">Submit</button>
	                                </div>
	                                <?php } }?>
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
                                    <h3 class="text-left"><i class="fa fa-list"></i> BATCH LIST</h3>
                                    <a href="batch_all.php" class="btn btn-primary pull-right" style="margin-top: -42px;">ADD NEW BATCH</a>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-responsive-md">
									<thead>
										<tr>
								            <th>#</th>
											<th>Course Name</th>
								            <th>Batch Time</th>
											<th>Batch Day</th>
								            <th>Batch Derector</th>
								            <th class="text-center">Edit</th>
								            <th class="text-center">Delete</th>
										</tr>
									</thead>
							        
									<tbody>
										<?php
								            $getAllbatch = $btc->getAllbatch();
								            if ($getAllbatch) {
								              $i=0;
								              while ($result= $getAllbatch->fetch_assoc()) {
								              $i++;
								        ?>
										<tr>
								            <td><?php echo $i; ?></td>
								            <td><?php echo $result['courseName'];?></td>
											<td><?php echo date("g:i a", strtotime($result['batch_time']));?></td>
											<td>
												<?php
													if ($result['batch_day']==1) {
													 	echo "Suturday";
													 	echo "<br>";
													 	echo "Monday";
													 	echo "<br>";
													 	echo "Wednesday";
													 } else {
													 	echo "Sunday";
													 	echo "<br>";
													 	echo "Tuesday";
													 	echo "<br>";
													 	echo "Thursday";
													 }

												
												?>
												
											</td>
								            <td><?php echo $result['batch_derector'];?></td>
								            <td class="text-center">
								            	<a href="batch_edit.php?batch_id=<?php echo $result['batch_id'];?>" class="btn btn-primary">
								            		<i class="fa fa-pencil"></i>
								            	</a>
								            </td>
								            <td class="text-center">
								            	<a onclick="return confirm('Are You Sure?')" href="?delbatch=<?php echo $result['batch_id'];?>" class="btn btn-danger">
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