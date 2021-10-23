<?php 

require 'condb.php';
 ?>
 <?php 

   if (isset($_GET['id'])) {
     $id = $_GET['id'];
     
   }

  ?>
 <?php 
  if (isset($_POST['sua'])) {
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
    $sql = "UPDATE hoc_lap_trinh SET hien_tai ='$hien_tai', thanh_phan ='$thanh_phan', nguoc_lai ='$nguoc_lai', khong_can = '$khong_can', tang_giam = '$tang_giam', ket_hop = '$ket_hop' WHERE id = '$id'";
    $qr = mysqli_query($connect, $sql);
    header('location:bindex.php');
  
 }
}

  ?>

  <?php 

   $sql = "SELECT * FROM hoc_lap_trinh WHERE id = $id";
   $qr = mysqli_query($connect, $sql);
   $rows = mysqli_fetch_array($qr);

   ?>
 <form method="POST">
  <label>hien tai</label> <input type="text" name="hien_tai" value="<?php  echo $rows['hien_tai'];?>"> <br>
  <label>thanh phan</label> <input type="text" name="thanh_phan" value="<?php  echo $rows['thanh_phan'];?>"> <br>
  <label>nguoc lai</label> <input type="text" name="nguoc_lai" value="<?php  echo $rows['nguoc_lai'];?>"> <br>
  <label>khong can</label> <input type="text" name="khong_can" value="<?php  echo $rows['khong_can'];?>"> <br>
  <label>tang giam</label> <input type="text" name="tang_giam" value="<?php  echo $rows['tang_giam'];?>"> <br>
  <label>ket hop</label> <input type="text" name="ket_hop" value="<?php  echo $rows['ket_hop'];?>"> <br>
  <input type="submit" name="sua" value="sua">  <br>
 </form>
