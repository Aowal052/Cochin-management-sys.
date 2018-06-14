<?php include_once 'app/inc/header_login.php'; ?>



<?php
	if ($_SERVER['REQUEST_METHOD'] =='POST') {
		$user_auth_mobile = $_POST['user_auth_mobile'];
		$user_auth_password = $_POST['user_auth_password'];

		$loginChk = $ul->UserLogin($user_auth_mobile,$user_auth_password);
	}

?>


<body id="login">
  <div class="login-logo">
    <a href="index.php"><img src="assets/img/logo_png/48x48.png" alt="FEEDBACK LOGO"/> <h3>FEEDBACK</h3></a>
  </div>
  <h2 class="form-heading">login<br>
	<span style="color: red; text-align: center;"><?php 
	if (isset($loginChk)) {
		echo $loginChk;
	}
	?></span>
  </h2>
  
 
  <div class="app-cam">
	  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<input type="text" class="text" placeholder ="Phone Number" name="user_auth_mobile">
		<input type="password" placeholder ="Password" name="user_auth_password">
		<div class="submit"><input type="submit"></div>
		<ul class="new">
			<li class="new_left"><p><a href="#">Forgot Password ?</a></p></li>
			<li class="new_right"><p class="sign">Back To <a href="index.php"> Home</a></p></li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
</body>
</html>
