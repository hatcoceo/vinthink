<?php 
require 'header.php';

require 'condb.php';
 ?>

<?php 

 require 'condb.php';

?>

<?php 

  session_start();

  if (!isset($_SESSION['my_session'])) {

    header('location:dang_nhap.php');

  }

  /*session nay khoi tao tu trang dang nhap*/
    
    
     if (!isset($_SESSION['luot_truy_cap']))

      $_SESSION['luot_truy_cap'] = 0;
      else {
          $_SESSION['luot_truy_cap'] ++;
      }
      
?>
<?php 


    $username = $_SESSION['my_session'];

    /*lay id vua dang nhap dua vao $session['id_user'] tao o file dang_nhap.php khi nguoi dung dang nhap ma khong su dung $_GET */
    $id_user = $_SESSION['id_user'];
    



 ?>
 <?php 


   $sql = "SELECT * FROM user WHERE username = '$username'";
   $qr = mysqli_query($connect, $sql);
    $f_a = mysqli_fetch_array($qr);
    $id_user = $f_a['id_user'];

  ?>




<!-- form tim kiem -->

  <form method="POST">

    <input type="text" name="ti_ki" > 

    <button type="submit" name="sub_mit">Tìm kiếm </button>

  </form>

<!-- end -->

<a href="dang_xuat.php">

  <button type="button">Đăng xuât</button>

</a> <br> <br>


<label>Xin chào: <?php echo $_SESSION['my_session']; ?></label><br><br>

<!-- viet chuc nang kim kiem -->
  <?php 

    if (isset($_POST['sub_mit'])) {

      $ti_ki = $_POST['ti_ki'];
     
      $sql = "SELECT * FROM tieu_de WHERE noi_dung LIKE '%$ti_ki%' AND trang_thai = 'công khai' ";

      $qr = mysqli_query($connect, $sql);

      while ($f_a = mysqli_fetch_array($qr)) { 

        ?>

        <a href="show_noi_dung.php?id_tieu_de=<?php echo $f_a['id_tieu_de']; ?>">

          <?php echo $f_a['noi_dung']."<br>"."<br>"; ?>
            
        </a>
   <?php } } ?>


  <a href="danh_sach_bai_viet.php">Danh sách bài viết</a><br><br>

  <a href="them_bai_viet.php?id_user=<?php echo $id_user;?>&username=<?php echo $username;?>">Thêm bài viế́t</a><br><br>

 <label>Lựơt truy cập trang: </label><?php echo $_SESSION['luot_truy_cap'];?> 
 
 
 <?php 
require 'footer.php';
 ?>
 

