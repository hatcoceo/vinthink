<?php 
require 'header.php';

require 'condb.php';

 ?>

  

  <script>
      function quay_lai_trang_truoc(){
          history.back();
      }
  </script>

  <?php 
if (isset($_GET['id'])) {
    $id_tieu_de = $_GET['id'];
}



 $sql = "SELECT * FROM tieu_de WHERE id_tieu_de = $id_tieu_de";
 $qr = mysqli_query($connect, $sql);
 $f_a = mysqli_fetch_array($qr);
 echo $f_a['noi_dung'];
?>
 <?php 

if (isset($_GET['id'])) {
    
    $id_tieu_de = $_GET['id'];
    
    if (isset($_POST['button'])) {
        $hien_tai = ucfirst($_POST['hien_tai']);
        $thanh_phan = $_POST['thanh_phan'];
        $nguoc_lai = $_POST['nguoc_lai'];
        $sql = "INSERT INTO noi_dung(hien_tai, thanh_phan, nguoc_lai, id_tieu_de ) VALUES ('$hien_tai', '$thanh_phan', '$nguoc_lai', $id_tieu_de)";
        $qr = mysqli_query($connect, $sql);
        
            //header('location:show_noi_dung.php?id='.$id_tieu_de2);
    }
}
?>
<br><br><form method="POST">
    <table border="1">
    <tr>
        <td>Hien Tai</td>
        <td>Thanh Phan</td>
        <td>Nguoc Lai</td>
        
    </tr>
    
     <?php 

     $sql = "SELECT * FROM noi_dung WHERE id_tieu_de = $id_tieu_de ";
     $qr = mysqli_query($connect, $sql);
     while ($f_a = mysqli_fetch_array($qr)) {?>
        <tr>
        <td><?php echo $f_a['hien_tai']; ?></td>
        <td><?php echo $f_a['thanh_phan']; ?></td>
        <td><?php echo $f_a['nguoc_lai']; ?></td>
        
     <?php } ?>
     </tr>
     <tr>
         <td><input type="text" name="hien_tai" autofocus></td>
         <td><input type="text" name="thanh_phan"></td>
         <td><input type="text" name="nguoc_lai"></td>
         
     </tr>
     
</table><br>

<button name="button">Them</button>
</form>
<a href="bindex.php"><button type="button">Trang Chu</button></a> 
<a href="show_noi_dung.php?id_tieu_de=<?php echo $id_tieu_de ?>"><button type="button" >Quay lại trang trước</button></a>

<?php 

require 'footer.php';

 ?>

  
