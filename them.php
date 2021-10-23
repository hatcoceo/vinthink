<?php 

require 'condb.php';
 ?>
 <?php 
 	if (isset($_POST['them'])) {
 		$hien_tai = $_POST['hien_tai'];
 		$thanh_phan = $_POST['thanh_phan'];
 		$nguoc_lai = $_POST['nguoc_lai'];
 		$khong_can = $_POST['khong_can'];
 		$tang_giam = $_POST['tang_giam'];
 		$ket_hop = $_POST['ket_hop'];
 		if ($hien_tai =="" && $thanh_phan == "" && $nguoc_lai =="" && $khong_can =="" && $tang_giam =="" && $ket_hop =="") {
 			//echo "vui long nhap du lieu";
 			header('location:bindex.php');
 		}else
 		{
 		$sql = "INSERT INTO hoc_lap_trinh (hien_tai, thanh_phan, nguoc_lai, khong_can, tang_giam, ket_hop) VALUES('$hien_tai', '$thanh_phan', '$nguoc_lai', '$khong_can', '$tang_giam', '$ket_hop')";
 		$qr = mysqli_query($connect, $sql);
 		header('location:bindex.php');
 	
 }
}

  ?>
 <form method="POST">
 	<label>hien tai</label> <input type="text" name="hien_tai"> <br>
 	<label>thanh phan</label> <input type="text" name="thanh_phan"> <br>
 	<label>nguoc lai</label> <input type="text" name="nguoc_lai"> <br>
 	<label>khong can</label> <input type="text" name="khong_can"> <br>
 	<label>tang giam</label> <input type="text" name="tang_giam"> <br>
 	<label>ket hop</label> <input type="text" name="ket_hop"> <br>
 	<input type="submit" name="them" value="them">  <br>
 </form>
