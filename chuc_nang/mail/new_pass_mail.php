<?php
	session_start();
	if ($_GET['id']==md5($_SESSION['random'])) {
		unset($_SESSION['random']);
    	echo "<script>window.location=('http://localhost/watch/index.php?menu=new_pass');</script>";
	}else{
		echo "<script>window.location=('http://localhost/watch/index.php');</script>";
	}
	
?>