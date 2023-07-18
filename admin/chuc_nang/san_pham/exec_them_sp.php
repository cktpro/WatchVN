<?php
if(!isset($login)){exit();}
?>
<?php
if(isset($_POST['submit'])){
	include('../connect.php');
	$img_location ='../images/';
	if($_FILES['image']['name']!=""){
		$image = $_FILES['image']['name'];
		$error= $_FILES['image']['error'];
		$tmp_name= $_FILES['image']['tmp_name'];
		$img_local= $img_location.basename($image);
		if(move_uploaded_file($tmp_name, $img_local)){

		}else{
			unlink('../images/'.$image);
		}
		$date=date("Y-m-d H:i:s");
		$name = $_POST['name'];
		$name= mb_strtoupper($name);
		$gia_nhap = $_POST['gia_nhap'];
		$cost = $_POST['gia_ban'];
		if($cost ==""){
			echo "<script> alert('Giá sản phẩm không được để trống'); </script> ";
		}
		$sql= "select max(masp) from san_pham";
		$qr= mysqli_query($connect, $sql);
		$row= mysqli_fetch_array($qr);
		if (is_null($row['max(masp)'])) {
			$row['max(masp)']=0;
		}
		$masp= $row['max(masp)']+1;
		$soluong=$_POST['soluong'];
		if($soluong==""){
			$soluong=0;
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
		$id_nhan_vien=$_SESSION['id_nhan_vien'];
		$sl= "insert into san_pham(masp,tensp,giasp,soluong,img,loaisp) values(".$masp.",'".$name."',".$cost.",".$soluong.",'".$image."','".$loaisp."')";
		$sl1= "insert into ct_san_pham(masp,xuat_xu,kieu_may,duong_kinh,chat_lieu_vo,chat_lieu_day,chat_lieu_kinh,do_chiu_nuoc,kich_thuoc_day,bao_hanh,doi_tuong_sd) values(".$masp.",'".$xuat_xu."','".$kieu_may."','".$duong_kinh."','".$chat_lieu_vo."','".$chat_lieu_day."','".$chat_lieu_kinh."','".$do_chiu_nuoc."','".$kich_thuoc_day."','".$bao_hanh."','".$gioi_tinh."')";
		$sl2= "insert into phieu_nhap_sp(id_nhan_vien,masp,gia_nhap,gia_ban,soluong,tong_tien_chi) values(".$id_nhan_vien.",".$masp.",".$gia_nhap.",".$cost.",'".$soluong."','".$soluong*$gia_nhaps."')";
		$exec= mysqli_query($connect,$sl);
		if ($exec) {
			$exec1= mysqli_query($connect,$sl1);
		}
		if ($exec and $exec1) {
			$exec2= mysqli_query($connect,$sl2);
		}
		if($exec and $exec1 and $exec2 ){
			echo "<script> alert('Thêm sản phẩm thành công'); location.href='?menu=?menu=ql_sanpham'; </script>";

		}
		else{
			echo "<script> alert('Thêm sản phẩm không thành công'); location.href='?menu=?menu=ql_sanpham'; </script>";
		}
	}
}
?>