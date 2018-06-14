<?php include_once 'app/inc/header.php'; ?>
<?php
    if (isset($_GET['equipment_id'])) {
        $equipment_id = $_GET['equipment_id'];
    }
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		$equipment_update   = $eqmt->equipment_update($_POST,$equipment_id);
	}
?>

<?php
  if (isset($_GET['delequipment'])) {
    $id = $_GET['delequipment'];
    $delequipment = $eqmt->delequipmentbyid($id);
  }
?>

<?php
    $updata_equipment=$eqmt->get_all_equipment_by_id($equipment_id);
    $value = $updata_equipment->fetch_assoc();
?> 


<?php include_once 'app/inc/navbar.php';?>



    <!--Main layout-->
    <main>
        <div class="container-fluid">
			<div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mb-4 mt-4">

                        <!--Form with header-->
                        <div class="card">

                            <div class="card-body">
                                <form action="equipment_edit.php?equipment_id=<?php echo $value['equipment_id'] ?>" method="post">
	                                <div class="form-header orange accent-2">
	                                    <h3><i class="fa fa-plus"></i> UPDATE EQUIPMENT</h3>
	                                </div>

	                                <div class="text-center">
	                                	
	                                </div>


	                                <!--Body-->

	                                <div class="form-group">
										<label for="equipment_name"><b>Equipment Name</b></label>
										<input type="text" class="form-control" id="equipment_name" name="equipment_name" placeholder="Equipment Name" value="<?php echo $value['equipment_name']; ?>">
									</div>

									<div class="form-group">
										<label for="quipment_quantity"><b>Equipment Quantity</b></label>
										<input type="text" class="form-control" id="quipment_quantity" name="equipment_quantity" placeholder="Equipment Quantity" value="<?php echo $value['equipment_quantity']; ?>">
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
                    <div class="col-md-6 mb-4 mt-4">

                        <!--Form with header-->
                        <div class="card">

                            <div class="card-body">
                                <div class="form-header orange accent-2">
                                    <h3><i class="fa fa-list"></i> EQUIPMENT LIST</h3>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-responsive-md">
			        				<thead>
			        					<tr>
						                    <th>#</th>
						        			<th>Equipment Name</th>
						                    <th>Quantity</th>
						                    <th class="text-center">Edit</th>
						                    <th class="text-center">Delete</th>
						        		</tr>
						        	</thead>

				      				<tbody>
						              <?php
						                $getAllequipment = $eqmt->getAllequipment();
						                if ($getAllequipment) {
						                  $i=0;
						                  while ($result= $getAllequipment->fetch_assoc()) {
						                  $i++;
						              ?>
				      					<tr>
				                  			<td><?php echo $i; ?></td>
				                  			<td><?php echo $result['equipment_name'];?></td>
				      						<td><?php echo $result['equipment_quantity'];?></td>


								            
								            <td class="text-center">
								            	<a href="equipment_edit.php?equipment_id=<?php echo $result['equipment_id'];?>" class="btn btn-warning">
								            		<i class="fa fa-pencil"></i>
								            	</a>
								            </td>
								            <td class="text-center">
								            	<a onclick="return confirm('Are You Sure?')" href="?delequipment=<?php echo $result['equipment_id'];?>" class="btn btn-danger">
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