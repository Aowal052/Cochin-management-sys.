<?php $filePath = realpath(dirname(__FILE__)); ?>
<?php include ($filePath.'/../lib/Session.php');?>
<?php Session::checkSession();?>
<?php include ($filePath.'/../lib/Database.php');?>
<?php include ($filePath.'/../helpers/Format.php');?>
<?php
  spl_autoload_register(function($class){
  	include_once "app/classes/".$class.".php";
  });

	$db    = new Database;
	$fm    = new Format;
	$mktr  = new Marketer;
	$btc   = new Batch;
	$crs   = new Course;
	$usr   = new User;
	$rol   = new Role;
	$dsg   = new Designation;
  $eqmt  = new Equipment;
  $ntc  = new Notice;
	$ul    = new UserLogin;
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<?php
    if (isset($_GET['action']) && $_GET['action']== "logout") {
        Session::destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FEEDBACK</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="assets/css/mdb.min.css">
    <!-- DataTables.net -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css"/>
 
    <!-- Your custom styles (optional) -->
    <style>

    </style>
</head>



		