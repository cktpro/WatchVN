<?php
	$masp= $_GET['masp'];
	if($masp==0){
		unset($_SESSION['giohang']);
		echo "<script> location.href='?menu=gio_hang'; </script>";
	}
	else{
		unset($_SESSION['giohang'][$masp]);
		if (count($_SESSION['giohang'])==0) {
			unset($_SESSION['giohang']);
		}
		echo "<script> location.href='?menu=gio_hang'; </script>";
	}
	
?>