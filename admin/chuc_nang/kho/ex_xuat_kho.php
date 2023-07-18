<?php
	if(!isset($login)){exit();}
	
?>
<?php 
	include('../connect.php');
		$id_nv=$_SESSION['id_nhan_vien'];
		$ma_dh=$_GET['ma_dh'];
		$date=date("Y-m-d H:i:s");
		$sl="insert into phieu_xuat_kho(id_nhan_vien,madh,ngay_xuat) values(".$id_nv.",".$ma_dh.",'".$date."')";
		$exec= mysqli_query($connect,$sl);
		if ($exec) {
			$sl2='update don_hang set tinh_trang_dh=3 where ma_dh='.$_GET['ma_dh'];
			$exec2= mysqli_query($connect,$sl2);
			if ($exec2) {
				echo "<script> alert('Đã xử lý đơn hàng'); location.href='?menu=xuat_hang'; </script>";
			}else{
				echo "<script> alert('Xin vui lòng thử lại'); location.href='?menu=xuat_hang'; </script>";
			}
		}else{
			echo "<script> alert('Xin vui lòng thử lại'); location.href='?menu=xuat_hang'; </script>";
		}
