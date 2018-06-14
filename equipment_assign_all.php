<?php include_once 'app/inc/header.php'; ?>

<?php
	if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $eqipmentAsign = $eqmt->eqipmentAsign($_POST);
    }
?>

<?php
  if (isset($_GET['delequipmentAssign'])) {
    $id = $_GET['delequipmentAssign'];
    $delequipmentAssign = $eqmt->delequipmentAssignID($id);
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
	                                    <h3><i class="fa fa-plus"></i> ASSIGN EQUIPMENT</h3>
	                                </div>

	                                <div class="text-center">
	                                	
	                                </div>


	                                <!--Body-->

	                                <div class="form-group">
										<label for="equipment_assign_user_id"><b>User Name</b></label>
										<select id="select" name="equipment_assign_user_id" class="form-control">
	                            			<option value="">Select User</option>
					                        <?php 
					                            $get_all_user_auth = $usr->get_all_user_auth();
					                            if ($get_all_user_auth) {
					                                while ($result = $get_all_user_auth->fetch_assoc()) {
					                        ?>
				                            <option value="<?php echo $result['user_auth_id'];?>"><?php echo $result['user_auth_full_name'];?></option>
				                            <?php } }?>
				                        </select>
									</div>
								

									<div class="form-group">
										<label for="equipment_assign_equipment_id"><b>Equipment Name</b></label>
										<select id="select" name="equipment_assign_equipment_id" class="form-control">
	                            			<option value="">Select Equipment</option>
					                        <?php 
					                            $getAllequipment = $eqmt->getAllequipment();
					                            if ($getAllequipment) {
					                                while ($result = $getAllequipment->fetch_assoc()) {
					                        ?>
				                            <option value="<?php echo $result['equipment_id'];?>"><?php echo $result['equipment_name'];?></option>
				                            <?php } }?>
				                        </select>
									</div>

									<div class="form-group">
										<label for="equipment_assign_equipment_quantity"><b>Equipment Quantity</b></label>
										<input type="number" class="form-control" id="equipment_assign_equipment_quantity" name="equipment_assign_equipment_quantity" placeholder="Equipment Quantity">
									</div>

									<div class="form-group">
										<label for="equipment_assign_date"><b>Date</b></label>
										<input type="date" class="form-control" id="equipment_assign_date" name="equipment_assign_date" placeholder="Course Fee">
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
                                    <h3><i class="fa fa-list"></i> EQUIPMENT ASSIGN LIST</h3>
                                </div>

                                <div class="text-center">
                             	</div>

                                <table class="table table-bordered">
			        				<thead>
			        					<tr>
						                    <th>#</th>
						                    <th>User Name</th>
						        			<th>Eqipment Name</th>
						                    <th>Eqipment Quentity</th>
						                    <th>Assigned date</th>
						                    <th>Edit</th>
						                    <th>Delete</th>
			        					</tr>
			        				</thead>

			        				<tbody>
						            <?php
						                $getEquipmentByUser = $eqmt->getEquipmentByUser();
						                if ($getEquipmentByUser) {
						                  $i=0;
						                  while ($result= $getEquipmentByUser->fetch_assoc()) {
						                  $i++;
						            ?>


			      				
			      					<tr>
					                  <td><?php echo $i; ?></td>
					                  <td><?php echo $result['user_auth_full_name'];?></td>
					                  <td><?php echo $result['equipment_name'];?></td>
					      			  <td><?php echo $result['equipment_assign_equipment_quantity'];?></td>
					                  <td><?php echo date('d F Y',strtotime($result['equipment_assign_date']));?></td>
					                  <td><a href="eqipmentAssignedit.php?eqipmentAssign_id=<?php echo $result['equipment_assign_id'];?>">Edit</a></td>

					                   <td><a onclick="return confirm('are you sure')" href="?delequipmentAssign=<?php echo $result['equipment_assign_id'];?>">Delete</a></td>
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