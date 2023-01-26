<?php 
require 'header.php';

require 'condb.php';
 ?>
<?php 

session_start();

if (!isset($_SESSION['my_session'])) {
  header('location:dang_nhap.php');
}
?>
<?php 


    $username = $_SESSION['my_session'];



 ?>
 <?php 


   $sql = "SELECT * FROM user WHERE username = '$username'";
   $qr = mysqli_query($connect, $sql);
    $f_a = mysqli_fetch_array($qr);
    $id_user = $f_a['id_user'];

  ?>

<?php 

   $sql = "SELECT * FROM tieu_de WHERE id_user = $id_user";
   $qr = mysqli_query($connect, $sql);
 while ($f_a = mysqli_fetch_array($qr)) {?>

    <a href="show_noi_dung.php?id_tieu_de=<?php echo $f_a['id_tieu_de'];?>&username=<?php echo $username; ?>"><?php  echo $f_a['noi_dung']."<br>"; ?></a><br>

  <?php } ?>
  

<?php 
require 'footer.php';
?>
