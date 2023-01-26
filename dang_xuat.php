<?php 

session_start();

if (isset($_SESSION['my_session'])) {
	unset($_SESSION['my_session']);
	header('location:dang_nhap.php');
}
 ?>
