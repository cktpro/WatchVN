<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_POST['submit'])){
	include('../connect.php');
	$img_location ='../images/';
	$masp = $_POST['masp'];
	$name = $_POST['name'];
	$name = mb_strtoupper($name);
	$cost = $_POST['cost'];
	$loaisp = $_POST['loaisp'];
	$image_upload = $_FILES['image']['name'];
	$error= $_FILES['image']['error'];
	$tmp_name= $_FILES['image']['tmp_name'];
		if($image_upload==""){
			$image= $_POST['img'];
		}
		if($image_upload!=""){
			$image= $image_upload;
			$new_img_location= $img_location.basename($image);
			move_uploaded_file($tmp_name,$new_img_location);
			$old_image_location= $img_location.basename($_POST['img']);
			unlink($old_image_location);
		}
	$xuat_xu= $_POST['xuat_xu'];
	$kieu_may = $_POST['kieu_may'];
	$duong_kinh = $_POST['duong_kinh'];
	$chat_lieu_vo = $_POST['chat_lieu_vo'];
	$chat_lieu_day = $_POST['chat_lieu_day'];
	$chat_lieu_kinh = $_POST['chat_lieu_kinh'];
	$do_chiu_nuoc= $_POST['do_chiu_nuoc'];
	$kich_thuoc_day = $_POST['kich_thuoc_day'];
	$bao_hanh = $_POST['bao_hanh'];
	$gioi_tinh = $_POST['doi_tuong_sd'];
	$loaisp = $_POST['loaisp'];
	$sl= "update san_pham set tensp='".$name."',giasp=".$cost.",img='".$image."',loaisp='".$loaisp."' where masp=".$masp;
	$sql= "update ct_san_pham set xuat_xu='".$xuat_xu."',kieu_may='".$kieu_may."',duong_kinh='".$duong_kinh."',chat_lieu_vo='".$chat_lieu_vo."',chat_lieu_day='".$chat_lieu_day."',chat_lieu_kinh='".$chat_lieu_kinh."',do_chiu_nuoc='".$do_chiu_nuoc."',kich_thuoc_day='".$kich_thuoc_day."',bao_hanh='".$bao_hanh."',doi_tuong_sd='".$gioi_tinh."'where masp=".$masp;
	$exec1= mysqli_query($connect, $sql);
	$exec= mysqli_query($connect,$sl);
	if($exec){
		if($exec1){
		echo "<script> alert('Sửa sản phẩm thành công');location.href='?menu=ql_sanpham';
		 </script>";
	}
}
	else{
		echo "<script> alert('Sửa sản phẩm không thành công'); location.href='?menu=ql_sanpham'; </script>";
	}
}
	if(isset($_POST['cancel'])){
		header('location:index.php?menu=ql_sanpham');
	}
?>