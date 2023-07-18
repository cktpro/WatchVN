<?php 
	include('connect.php');
	$sl='update don_hang set tinh_trang_dh=5 where ma_dh='.$_GET['ma_dh'];
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Đã hủy đơn'); location.href='?menu=thanh_vien'; </script>";

	}else{
		echo "<script> alert('Đơn hàng chưa được xử lý'); location.href='?menu=thanh_vien'; </script>";
	}
?>