<?php 

require 'condb.php';
 ?>
 <?php 


	$id_noi_dung = $_GET['id_noi_dung'];

	
		$id_tieu_de = $_GET['id_tieu_de'];
		
	$sql = "DELETE FROM noi_dung WHERE id_noi_dung = $id_noi_dung";
	
 $qr = mysqli_query($connect, $sql);
 header('location:show_noi_dung.php?id_tieu_de='.$id_tieu_de);
 


  ?>
