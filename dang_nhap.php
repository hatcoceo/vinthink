<?php 
require 'condb.php';
require 'header.php';

 ?>

<?php 
 session_start();
 
	if (isset($_POST['dang_nhap'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];


		$sql = "SELECT * FROM user WHERE username = '$username' AND pass = '$pass'";
		$qr = mysqli_query($connect, $sql);
        
		$count = mysqli_num_rows($qr);
		if ($count <= 0) { echo "khong co ai";}

			if ($count ==1) {
				$_SESSION['my_session'] = $username;

				$f_a = mysqli_fetch_array($qr);
				
				$_SESSION['id_user'] = $f_a['id_user'];
				header('location:bindex.php?id_user='.$f_a['id_user']);
				
		} 
	}
?>

<form method="POST">
<label>Username</label><input type="text" name="username" >
<label>Password</label><input type="password" name="pass" >
<button type="submit" name="dang_nhap">Đăng nhập</button>
</form>

<?php 
require 'footer.php';


 ?>
