<?php
	unset($_SESSION['user']);
	unset($_SESSION['pass']);
	echo "<script>alert('Logout Successfull.'); location.href='index.php';</script>";
?>