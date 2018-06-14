<?php include_once 'app/inc/header.php'; ?>

<div id="wrapper">

	<?php include 'app/inc/navbar.php';?>

	<?php
    if (!isset($_GET['eqipmentAssign_id']) || $_GET['eqipmentAssign_id'] == NULL) {
        echo "<script>windows.location = 'assignequipmentlist.php';</script>";
    }else{
        $id = $_GET['eqipmentAssign_id'];
    if ($_SERVER['REQUEST_METHOD'] =='POST') {
        $AssingEquipmentUpdate = $eqmt->AssingEquipmentUpdate($_POST,$id);
    }else{
    	echo "error";
    }
}

?>
    <div id="page-wrapper">
    
		<div class="graphs">
			<div class="col_3">
				<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-center">Assign Equipment<br>
								<?php
									if (isset($AssingEquipmentUpdate)) {
										echo $AssingEquipmentUpdate;
									}else{
										//echo "not found";
									}
								?>
							</h3>
						</div>
						<div class="panel-body">
							<form action="" method="post">

								<div class="form-group">
									<label for="equipment_assign_user_id"><b>User Name</b></label>
									<select id="equipment_assign_user_id" name="equipment_assign_user_id" class="form-control1">
                            			<option value="">Select User</option>
				                        <?php 
				                            $getAllUser = $usr->getAllUser();
				                            if ($getAllUser) {
				                                while ($result = $getAllUser->fetch_assoc()) {
				                        ?>
			                            <option value="<?php echo $result['user_id'];?>"><?php echo $result['user_full_name'];?></option>
			                            <?php } }?>
			                        </select>
								</div>
							

								<div class="form-group">
									<label for="equipment_assign_equipment_id"><b>Equipment Name</b></label>
									<select id="select" name="equipment_assign_equipment_id" class="form-control1">
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
									<input type="number" class="form-control1" id="equipment_assign_equipment_quantity" name="equipment_assign_equipment_quantity" placeholder="Equipment Quantity">
								</div>

								<div class="form-group">
									<label for="equipment_assign_date"><b>Date</b></label>
									<input type="date" class="form-control1" id="equipment_assign_date" name="equipment_assign_date" placeholder="Course Fee">
								</div>

									<div class="col-md-12">
										<div class="btn-group">
											<button type="submit" name="submit" class="btn btn-success">Update</button>
											<button type="reset" class="btn btn-warning">Reset</button>
										</div>
									</div>
							</form>
						</div>
						<div class="panel-footer">
					        
						</div>
					</div>
			</div>
		</div>

		<?php include_once 'app/inc/footer.php' ?>

	</div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->


<?php include_once 'app/inc/foot.php' ?>