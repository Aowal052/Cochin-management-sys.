 <?php
 	$filePath = realpath(dirname(__FILE__));
 ?>

<?php include ($filePath.'/../lib/Session.php');?>

<?php Session::checkLogin();?>
 
<?php include ($filePath.'/../lib/Database.php');?>
<?php include ($filePath.'/../helpers/Format.php');?>
<?php
spl_autoload_register(function($class){
	include_once "app/classes/".$class.".php";
	
});

	$db  = new Database;
	$fm  = new Format;
	$mktr  = new marketer;
	$btc  = new batch;
	$crs = new course;
	$usr = new user();
	$rol = new role;
	$dsg = new Designation;
	$eqmt= new equipment();
	$ul  = new UserLogin;
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Modern an Admin Panel Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		 <!-- Bootstrap Core CSS -->
		<link href="assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="assets/css/signin.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="assets/css/lines.css" rel='stylesheet' type='text/css' />
		<link href="assets/css/font-awesome.css" rel="stylesheet"> 
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
		<!--//webfonts-->  
		<!-- Nav CSS -->
		<link href="assets/css/custom.css" rel="stylesheet">
		<!-- Metis Menu Plugin JavaScript -->
		<script src="assets/js/metisMenu.min.js"></script>
		<script src="assets/js/custom.js"></script>
		<!-- Graph JavaScript -->
		<script src="assets/js/d3.v3.js"></script>
		<script src="assets/js/rickshaw.js"></script>
	</head>
	<body>

		