<?php 


require 'condb.php';
 ?>
 <?php 


$id_comment = $_GET['id_comment'];
 
 $sql = " DELETE FROM comment WHERE id_comment = $id_comment ";
 $qr = mysqli_query($connect, $sql);
 header('location:');

  ?>
