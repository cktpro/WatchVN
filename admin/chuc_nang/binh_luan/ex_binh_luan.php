<?php
	if(!isset($login)){exit();}
	
?>
<?php
	include('../connect.php'); 
	if (isset($_POST['add_cmt'])) {
		$id_bl=$_POST['id_bl'];
		$nd=$_POST['noi_dung_ph'];
		$date=date("Y-m-d H:i:s");
		$id_nv=$_SESSION['id_nhan_vien'];
		$sl="insert into phan_hoi(id_bl,id_nhan_vien,noi_dung_ph,ngay_phan_hoi) values(".$id_bl.",".$id_nv.",'".$nd."','".$date."')";
		$exec= mysqli_query($connect, $sl);
		if ($exec) {
			echo "<script> alert('Đã lưu nội dung phản hồi'); location.href='?menu=binh_luan'; </script>";
		}else{
			echo "<script> alert('Vui lòng thử lại'); location.href='?menu=binh_luan'; </script>";
		}
	}
 ?>

		