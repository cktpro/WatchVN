<?php
if (isset($_SESSION['giohang'])) {
		include('connect.php');
	if(isset($_POST['submit'])){
	$tenkh= $_POST['tenkh'];
	$cmnd= $_POST['cmnd'];
	$email= $_POST['email'];
	$sdt= $_POST['sdt'];
	$diachi= $_POST['diachi'];
if(isset($_SESSION['username'])){
	$sp_mua=$_POST['sp_mua'];
	$masp=$_POST['ma_sp'];
	$gia_sp=$_POST['gia_sp'];
	$list_id= $_POST['list_id'];
}
else{
	foreach($_SESSION['giohang'] as $masp=> $sp){
		$id_array[]= $masp;
		}
	$list_id= implode(',',$id_array);
	$sl= 'select * from san_pham where masp in ('.$list_id.')';
	$exec= mysqli_query($connect, $sl);
	$sp_mua="";
	while($row= mysqli_fetch_array($exec)){
		$soluong= $_SESSION['giohang'][$row['masp']];
		$gia_sp=$row['giasp'];
		$sp_mua= $row['tensp'];		
	}
}	
	$sql2= "select max(ma_dh) from don_hang";
	$qr2= mysqli_query($connect, $sql2);
	$row2= mysqli_fetch_array($qr2);
	$mahd= $row2['max(ma_dh)']+1;
	$sql1= "insert into don_hang(ma_dh,tenkh,email,sdt,dia_chi,sp_mua,tinh_trang_dh) values('".$mahd."','".$tenkh."','".$email."','".$sdt."','".$diachi."','".$sp_mua."',1)";
	$exec1= mysqli_query($connect,$sql1);
	foreach($_SESSION['giohang'] as $masp=> $sp){
		$id_array[]= $masp;
		}
	$list_id= implode(',',$id_array);
	$sl= 'select * from san_pham where masp in ('.$list_id.')';
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
		$soluong= $_SESSION['giohang'][$row['masp']];
		$ma_sp=$row['masp'];
		$gia_sp=$row['giasp'];
		$sql3= "insert into ct_don_hang(ma_dh,ma_kh,ma_sp,don_gia,so_luong,thanhtien) values('".$mahd."','".$cmnd."','".$ma_sp."','".$gia_sp."','".$soluong."','".($gia_sp*$soluong)."')";
		$sql4= "update san_pham set soluong=soluong-".$soluong." where masp=".$ma_sp."";
		$exec3= mysqli_query($connect,$sql3);
		$exec4= mysqli_query($connect,$sql4);
	}
	
		if($exec1){
	$sql= "update san_pham set luot_mua=luot_mua + 1 where masp in (".$list_id.")";
	$ex= mysqli_query($connect, $sql);
			unset($_SESSION['giohang']);
		echo '<p class="alert alert-success">Mua hàng thành công.. Vui lòng giữ liên lạc khi nhân viên giao hàng liên hệ..Bấm <a href="?menu=san_pham">vào đây</a> để quay lại mua hàng</p>';
	}
	else{
		echo "<script> alert('Mua hàng không thành công');  </script>";
	}
}
else{
	echo "<script> location.href='index.php'; </script>";
}
}else{
	echo "<script> location.href='index.php'; </script>";
}
?>