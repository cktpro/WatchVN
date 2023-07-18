<?php
	include('connect.php'); 
	$sql= "select * from thanh_vien where username='".$_SESSION['username']."'";
	$execc= mysqli_query($connect, $sql);
	$row= mysqli_fetch_array($execc);
	$masp=$_POST['masp'];
	$rating = $_POST['selected_rating'];
	$content = $_POST['content'];
	$ma_kh = $row['ma_kh'];
	$date=date("Y-m-d H:i:s");
	$sql2= "select max(id_bl) from binh_luan";
	$execc2= mysqli_query($connect, $sql2);
	$row2= mysqli_fetch_array($execc2);
	if (is_null($row2['max(id_bl)'])) {
		$id_bl= 1;
	}else{
		$id_bl= $row2['max(id_bl)']+1;
	}
	$sql3 ="insert into binh_luan(id_bl,masp,ma_kh,noi_dung_bl,so_sao,ngay_binh_luan) values(".$id_bl.",".$masp.",".$ma_kh.",'".$content."',".$rating.",'".$date."')";
	$execc3= mysqli_query($connect, $sql3);
	if ($execc3) {
		$sql4="select sum(so_sao) / count(so_sao) from binh_luan where masp=".$masp."";
		$execc4= mysqli_query($connect, $sql4);
		$row4= mysqli_fetch_array($execc4);
		$diem_dg= $row4['sum(so_sao) / count(so_sao)'];
		$sql5="update san_pham set diem_danh_gia=".$diem_dg." where masp=".$masp."";
		$execc5= mysqli_query($connect, $sql5);
		if ($execc5) {
			echo "<script> alert('Cảm ơn bạn đã bình luận và đánh giá');</script>";
			echo "<script> location.href='?menu=product_info&masp=".$masp."'; </script>"; 
		}
		
	} ?>