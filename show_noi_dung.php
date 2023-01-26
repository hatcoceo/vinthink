<?php 
    /*khoi tao session*/

    session_start();
    $username = $_SESSION['my_session'];
    $id_user = $_SESSION['id_user'];
    
    ?>

<?php 

    /*file ket noi CSDL*/
    require 'condb.php';
    require 'header.php';

?>

<?php 

    /*hien thi tieu de  bai viet [18]*/

    if (isset($_GET['id_tieu_de'])) {

        $id_tieu_de = $_GET['id_tieu_de'];

        $sql = "SELECT * FROM tieu_de WHERE id_tieu_de = $id_tieu_de";

        $qr = mysqli_query($connect, $sql);

        $f_a = mysqli_fetch_array($qr);

        $id_user_csdl = $f_a['id_user'];


        /*chinh chu moi co nut them - sua - xoa o bai viet*/
        if ($id_user == $id_user_csdl ) {

               
           echo $f_a['noi_dung']."<br>"."<br>";

            if ($f_a['mo_ta'] !="") {

              echo "Mô tả: ".$f_a['mo_ta']."<br>"."<br>";

            } else {

              echo "Bài viết chưa có mô tả nào"."<br>"."<br>";

            } ?>

                <table border="1">
            <tr>
                <td>Hiện Tại</td>
                <td>Thành Phần</td>
                <td>Ngược Lại</td>
                <td>Chức Năng</td>
            </tr>
            
            <?php 
                /*hien thi noi dung bai viet*/
                $sql = "SELECT * FROM noi_dung WHERE id_tieu_de = $id_tieu_de ";
                $qr = mysqli_query($connect, $sql);
                while ($f_a = mysqli_fetch_array($qr)) {
                    
                   
            ?>
            <tr>
                <td><?php echo $f_a['hien_tai']; ?></td>

                <td><?php echo $f_a['thanh_phan']; ?></td>

                <td><?php echo $f_a['nguoc_lai']; ?></td>

                <td>
                    <a href="sua.php?id_noi_dung=<?php echo $f_a['id_noi_dung']; ?>&id_tieu_de=<?php echo $id_tieu_de ;?>">Sửa |</a>

                    <a href="xoa.php?id_noi_dung=<?php echo $f_a['id_noi_dung']; ?>&id_tieu_de=<?php echo $id_tieu_de ;?>"> Xóa</a>
                </td>
                    
                <?php } ?>
            

            </tr>

            <!-- dong nay de them hang bang js khi muon them noi dung vao bai viet -->
            <tbody id="tbody"></tbody>

         </table><br>

         <!-- nut them noi dung vao bai viet -->
         <a href="them.php?id=<?php echo $id_tieu_de; ?>">

            <button type="submit" name="them">Thêm </button>

         </a><br><br>

         <!-- nut them hang -->
         <button type="button" onclick="themHang();">Them hang</button><br><br>

         <!-- ham them hang bang js -->
         <script type="text/javascript">

            //var hang = 0;
            function themHang() {
                
                var html = "<tr>";
                //html += "<td>" + hang + "</td>";
                html += "<td> <input name = 'hien_tai[]'></td>";
                html += "<td> <input name = 'thanh_phan[]'></td>";
                html += "<td> <input name = 'nguoc_lai[]'></td>";
                html += "<td> <input name = 'chuc_nang[]'></td>";
                html += "</tr>"
                document.getElementById("tbody").insertRow().innerHTML = html;
            }
           </script>

        <?php } else {
            
            /*khong co nut them - sua - xoa vi khong phai chinh chu*/

            
            echo $f_a['noi_dung']."<br>"."<br>";

            if ($f_a['mo_ta'] !="") {

              echo "Mô tả: ".$f_a['mo_ta']."<br>"."<br>";

            } else {

              echo "Bài viết chưa có mô tả nào"."<br>"."<br>";

            } ?>

                <table border="1">
            <tr>
                <td>Hiện Tại</td>
                <td>Thành Phần</td>
                <td>Ngược Lại</td>
                
            </tr>
            
            <?php 
                /*hien thi noi dung bai viet*/
                $sql = "SELECT * FROM noi_dung WHERE id_tieu_de = $id_tieu_de ";
                $qr = mysqli_query($connect, $sql);
                while ($f_a = mysqli_fetch_array($qr)) {
                    
                   
            ?>
            <tr>
                <td><?php echo $f_a['hien_tai']; ?></td>

                <td><?php echo $f_a['thanh_phan']; ?></td>

                <td><?php echo $f_a['nguoc_lai']; ?></td>

                
                <?php } ?>
            

            </tr>

            <!-- dong nay de them hang bang js khi muon them noi dung vao bai viet -->
            <tbody id="tbody"></tbody>

         </table><br>
         <?php 

        }
    }
?>

<?php 

    /*luu lai noi dung them vao bai viet*/
    $sql = "SELECT * FROM tieu_de WHERE id_tieu_de = '$id_tieu_de'";

    $qr = mysqli_query($connect, $sql);

    $f_a = mysqli_fetch_array($qr);

?>


<!-- hien thi luot thich -->
<label>Lượt thích: <?php echo $f_a['luot_like'] ;?> </label>

<!-- thich bai viet -->
<a href="thich.php?id_tieu_de=<?php echo $id_tieu_de;?>&username=<?php echo $username; ?>">&nbsp &nbsp &nbsp Thích</a><br>

<!-- post binh luan -->
<form method="POST">

    <label>Bình luận:</label><br>

    <textarea placeholder="Nhập bình luận của bạn" name="binh_luan"></textarea><br><br>

    <button type="submit" name="gui_binh_luan">Gửi bình luận</button>
</form>

<?php 
    if (isset($_POST['gui_binh_luan'])) {

        $binh_luan = $_POST['binh_luan'];


        $sql = "INSERT INTO comment(comment, username, id_tieu_de) VALUES('$binh_luan', '$username', '$id_tieu_de')";

        $qr = mysqli_query($connect, $sql);

        header('location:show_noi_dung.php?id_tieu_de='.$id_tieu_de.'&username='.$username);
    }

?>
 <?php 
    /*hien thi so dem binh luan*/

    $sql11 = "SELECT * FROM comment WHERE id_tieu_de = $id_tieu_de ";

    $qr11 = mysqli_query($connect, $sql11);

    $n_r = mysqli_num_rows($qr11);

?>

<label>Có <?php echo $n_r; ?> bình luận.</label><br><br>


<?php 
    /*hien thi noi dung binh luan*/

    $sql = "SELECT * FROM comment WHERE id_tieu_de = $id_tieu_de ORDER BY id_comment DESC LIMIT 10";

    $qr = mysqli_query($connect, $sql);
    

    while( $f_a = mysqli_fetch_array($qr)) {

        echo $f_a['username']."<br>";

        if ( $f_a['username'] == $username) {
 
    
        echo $f_a['comment']; 
?>      <a href="sua_comment.php?id_comment=<?php echo $f_a['id_comment']; ?>">&nbsp &nbsp &nbsp Sửa</a>

        <a href="xoa_comment.php?id_comment=<?php echo $f_a['id_comment']; ?>">&nbsp &nbsp &nbsp Xóa </a><br><br>
    
    <?php

    } else {
           
           echo $f_a['comment']; ?>
           <a href="bao_cao_comment.php?id_comment=<?php echo $f_a['id_comment']; ?>">&nbsp &nbsp &nbsp Báo cáo</a><br><br>
       <?php } 
           

 } ?>



 
<a href="bindex.php"><button type="button">Trang chủ </button></a>

<?php 
// cap nhat so luot xem bai viet
$sql = "UPDATE tieu_de SET luot_xem = luot_xem + 1 WHERE id_tieu_de = '$id_tieu_de'";
$qr = mysqli_query($connect, $sql);


 ?>

 <?php 
    /*hien thi luot xem bai viet*/
    $sql = "SELECT * FROM tieu_de WHERE id_tieu_de = '$id_tieu_de'";

    $qr = mysqli_query($connect, $sql);

    $f_a = mysqli_fetch_array($qr);

?>
<br><br><label>Lượt xem bài viết: <?php echo $f_a['luot_xem'] ;?></label>

<?php 

    
    require 'footer.php';

?>
