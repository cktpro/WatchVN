<?php
	if(!isset($login)){exit();}
	
	
?>
<?php 
	include('../connect.php');
	// $sl='update don_hang set tinh_trang_dh=6  where ma_dh='.$_GET['ma_dh'];
	$sl='select * from ct_don_hang  where ma_dh='.$_GET['ma_dh'];
	$exec= mysqli_query($connect,$sl);
	$kt=0;
	while ($row=mysqli_fetch_array($exec)) {
		$so_luong=$row['so_luong'];
		$ma_sp=$row['ma_sp'];
		$sl2="update san_pham set soluong=soluong+".$so_luong." where masp=".$ma_sp."";
		$exec2= mysqli_query($connect,$sl2);
		if ($exec2) {
			$kt=1;
		}
	}
if ($kt==1) {
	$sl3="update don_hang  set tinh_trang_dh=6 where ma_dh=".$_GET['ma_dh']."";
	$exec3= mysqli_query($connect,$sl3);
	if ($exec3) {
		echo "<script> alert('Đã xử lý đơn hàng'); location.href='?menu=xuat_hang'; </script>";
	}else{
		echo "<script> alert('Xin vui lòng thử lại'); location.href='?menu=xuat_hang'; </script>";
	}
}else{
	echo "<script> alert('Xin vui lòng thử lại'); location.href='?menu=xuat_hang'; </script>";
}
?>