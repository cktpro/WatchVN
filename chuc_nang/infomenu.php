<?php
	$id=$_GET['id'];
	$menu= $_GET['menu'];
	include('connect.php');
	$sl='select * from menu_ngang where loaimenu like "'.$menu.'" and id='.$id;
	$exec = mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);
?>
<p><?php echo $row['title'];?></p>
<p><?php echo $row['content']; ?></p>