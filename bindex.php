<?php 
require 'condb.php';
 ?>
 <?php 

session_start();
if (!isset($_SESSION['mySession'])) {
       header('location:login.php');
}

  ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vinthink</title>
    <link rel="stylesheet" href="style.css">
</head>
 <?php 

require 'timkiem.php';
  ?>
 <table >
 	<tr>
 		<th>Hien Tai</th>
 		<th>Thanh Phan</th>
 		<th>Nguoc Lai</th>
 		<th>Khong Can</th>
 		<th>Tang Giam</th>
 		<th>Ket Hop</th>
        <th>Thay Doi</th>
 		<th><a href="them.php">Them</a></th>
 	</tr>
<?php
          $sql = "SELECT * FROM hoc_lap_trinh";
          $qr = mysqli_query($connect, $sql);
          while ($rows = mysqli_fetch_array($qr)) { ?>
        
          <tr>
              <td><?php echo $rows['hien_tai'];?></td>
              <td><?php echo $rows['thanh_phan'];?></td>
              <td><?php echo $rows['nguoc_lai'];?></td>
              <td><?php echo $rows['khong_can'];?></td>
              <td><?php echo $rows['tang_giam'];?></td>
              <td><?php echo $rows['ket_hop'];?></td>
              <td><?php echo $rows['thay_doi'];?></td>
              
              <td><a href="sua.php?id=<?php echo $rows['id'];?>">Sua</a><a href="xoa.php?id=<?php echo $rows['id']; ?>">--Xoa</a></td>
          </tr>

    <?php
         }
         ?>

 </table> <br>
 
 <label><a href="thembang.php">them bang</a></label><br><br>
 <a href="logout.php"><button type="submit" name="dangxuat">dang xuat</button></a>
 <script src="script.js"></script>
 </body>
</html>
