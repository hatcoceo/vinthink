<?php 

require 'condb.php';
require 'header.php';
 ?>
  <script>
      function quay_lai_trang_truoc(){
          history.back();
      }
  </script>
  
<?php 
	if (isset($_GET['id_noi_dung'])) {
			$url_id = $_GET['id_noi_dung'];
			$id_tieu_de = $_GET['id_tieu_de'];
		

		if (isset($_POST['button'])) {
			$hien_tai = $_POST['hien_tai'];
			$thanh_phan = $_POST['thanh_phan'];
      $nguoc_lai = $_POST['nguoc_lai'];
			$sql = "UPDATE noi_dung SET hien_tai = '$hien_tai', thanh_phan = '$thanh_phan', nguoc_lai = '$nguoc_lai' WHERE id_noi_dung = $url_id ";
			$qr = mysqli_query($connect, $sql);
      header('location:show_noi_dung.php?id_tieu_de='.$id_tieu_de);
		}
	}

?>
<?php 
  $sql = "SELECT * FROM noi_dung WHERE id_noi_dung = $url_id ";
  $qr = mysqli_query($connect, $sql);
  $f_a = mysqli_fetch_array($qr);

?>
  <form method="POST">
  <label>Hiện Tại </label> <input type="text" name="hien_tai" value="<?php echo $f_a['hien_tai'] ;?>" >
  <label>Thành Phần </label> <input type="text" name="thanh_phan" value="<?php echo $f_a['thanh_phan'] ;?>">
  <label>Ngược Lại</label> <input type="text" name="nguoc_lai" value="<?php echo $f_a['nguoc_lai'] ;?>">

  <button type="submit" name="button">Gửi</button>
  </form>
 <a href="bindex.php"><button type="button">Trang Chủ</button></a> 
 <button type="button" onclick="quay_lai_trang_truoc()">Quay lại trang trước</button>
 <?php
 require 'footer.php';
 ?>
