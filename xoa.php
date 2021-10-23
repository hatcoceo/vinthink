<?php  

require 'condb.php';


?>

<?php 

   if (isset($_GET['id'])) {
     $id = $_GET['id'];
     
   }

  ?>
  <?php 
  $sql = "DELETE FROM hoc_lap_trinh WHERE id = $id ";
  $qr = mysqli_query($connect, $sql);
  header('location: bindex.php');



   ?>
