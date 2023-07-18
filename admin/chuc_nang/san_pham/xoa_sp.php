<?php
if(!isset($login)){exit();}
?>
<?php
include('../connect.php');
$masp= $_GET['masp'];
$sl4= "select * from ct_don_hang where ma_sp=".$masp;
$execc4= mysqli_query($connect, $sl4);
$count=mysqli_num_rows($execc4);
if ($count>0) {
	echo "<script> alert('Sản phẩm này đã được đặt hàng không thể xóa'); location.href='?menu=ql_sanpham'; </script>";
}else{
	$sll= "select * from san_pham where masp=".$masp;
	$execc= mysqli_query($connect, $sll);
	$row= mysqli_fetch_array($execc);
	$img_link= '../images/'.$row['img'];
	if(is_file($img_link)){
		unlink($img_link);
	}
	$sl="delete from ct_san_pham where masp=".$masp;
	$sl2="delete from phieu_nhap_sp where masp=".$masp;
	$sl3="delete from san_pham where masp=".$masp;
	$exec= mysqli_query($connect, $sl);
	$exec2= mysqli_query($connect, $sl2);
	$exec3= mysqli_query($connect, $sl3);
	if ($exec and $exec2 and $exec3) {
		echo "<script> alert('Xóa sản phẩm thành công không thể xóa');  </script>";
		echo $sl;
	}
	else{
		echo "<script> alert('Sản phẩm này đã được đặt hàng'); location.href='?menu=ql_sanpham';  </script>";
		echo $sl;
	}
}


?>