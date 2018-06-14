<?php include_once 'app/inc/header.php'; ?>


<?php include_once 'app/inc/navbar.php';?>


	<?php
	    if ($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['upload'])) {
	    	$id = Session::get("user_auth_id");
	        $pic_upload = $usr->pic_upload($_FILES,$id);
	    }

	?>
    <div id="page-wrapper">
    
		<div class="graphs">
			<div class="col_3">
				<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="text-center">Add User Image</p>
							</h3>
						</div>
						<div class="panel-body">
							<form action="" method="post" enctype="multipart/form-data">
								
								<div class=" form-group">
									<label for="user_auth_image"><b>Profile Picture</b></label>
									<input type="file" class="form-control1" id="" 
									name="user_auth_image" placeholder="user profile image" />
									<span>
										<?php 
							                if (isset($pic_upload)) {
							                    echo $pic_upload;
							                }
							            ?>
									</span>
								</div>

								<div class="col-md-12">
									<div class="btn-group">
										<button type="submit" class="btn btn-success" name="upload">Submit</button>
										<button type="reset" class="btn btn-warning">Reset</button>
									</div>
								</div>
							</form>
						</div>
<?php include_once 'app/inc/footer.php' ?>
<?php include_once 'app/inc/foot.php' ?>