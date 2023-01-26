<?php 


require 'condb.php';
 ?>
 <?php 

$id_comment = $_GET['id_comment'];
echo $id_comment;
$sql = "SELECT * FROM comment WHERE id_comment = $id_comment";
$qr = mysqli_query($connect, $sql);
$f_a = mysqli_fetch_array($qr);
  ?>
  <?php 

if (isset($_POST['sua'])) {
	$comment = $_POST['comment'];
	$sql1 = "UPDATE comment SET comment = '$comment' WHERE id_comment = $id_comment";
	$qr1 = mysqli_query($connect, $sql1);

}

   ?>
  <form method="POST">
  	<label>Comment</label><input type="text" name="comment" value="<?php echo $f_a['comment']; ?>">
  	<button type="submit" name="sua">Sua</button>
  	


  </form>
