<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$sl= "delete from don_hang where ma_dh=".$_GET['ma_dh'];
	$exec= mysqli_query($connect, $sl);
	if($exec){
		echo "<script> alert('Xóa đơn hàng thành công'); location.href='?menu=don_hang'; </script>";
	}else{
		echo "<script> alert('Xóa đơn hàng thất bại'); location.href='?menu=don_hang'; </script>";
	}
?>