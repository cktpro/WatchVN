<?php
include('connect.php');
$masp = $_GET['masp'];
$soluong= $_GET['soluong'];
$sp= 0;
if(isset($_SESSION['giohang'][$masp])){
	$sp= $_SESSION['giohang'][$masp] + $soluong;
}
else{
	$sp= $soluong;
}
$sl = "select * from san_pham where masp=".$masp."";
$exec = mysqli_query($connect, $sl);
$row = mysqli_fetch_array($exec);
if ($sp>$row['soluong']) {
	echo "<script> alert('Sản phẩm tạm thời hết hàng'); location.href='javascript:history.back(-1);' </script>";
}else{
$_SESSION['giohang'][$masp]=$sp;
echo "<script> alert('Thêm vào giỏ hàng thành công'); location.href='?menu=san_pham'; </script>";
}
?>