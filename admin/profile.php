<?php require_once('inc/top.php');?>
<?php require_once('inc/header.php');?>
<?PHP require_once('classes/Admin.php');?>

<?php
$login=Session::get("adlogin");
if ($login==false) {
header("location:login.php");
}

?>