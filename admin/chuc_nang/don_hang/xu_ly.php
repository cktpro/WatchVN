<?php
	if(!isset($login)){exit();}
	
	
?>
<?php 
	include('../connect.php');
	if ($_GET['stt']==1) {
		$sl='update don_hang set tinh_trang_dh=2 where ma_dh='.$_GET['ma_dh'];
	} elseif($_GET['stt']==2){
		$sl='update don_hang set tinh_trang_dh=4  where ma_dh='.$_GET['ma_dh'];
	}
	
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Đã xử lý đơn hàng'); location.href='?menu=don_hang'; </script>";

	}else{
		echo "<script> alert('Xin vui lòng thử lại'); location.href='?menu=don_hang'; </script>";
	}
?>