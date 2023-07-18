<?php
include('connect.php');
if(isset($_POST['submit'])){
	$value= $_POST['value'];
	if($value== $_SESSION['captcha']){
		$sql= "select * from thanh_vien";
		$execc= mysqli_query($connect, $sql);
		while($row2= mysqli_fetch_array($execc)){
			if($row2['username']!=$_POST['username'] and $row2['email']!=$_POST['email']){
				$kt=0;
			}else{
				$kt=1;
				echo "Lỗi:".$row2['username']."-".$_POST['username']."-".$row2['email']."-".$_POST['email'];
			}
		}
		if($kt==0){
			$date=date("Y-m-d H:i:s");
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password = md5($password);
			$password = md5($password);
			$repass= $_POST['re-pass'];
			$repass= md5($repass);
			$repass= md5($repass);
			if($password==$repass){
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$ngaysinh = "'".$_POST['nam']."-".$_POST['thang']."-".$_POST['ngay']."'";
				$gioitinh = $_POST['gioitinh'];
				$email = $_POST['email'];
				$sdt = $_POST['sdt'];
				$diachi = $_POST['diachi'];
				$xaphuong = $_POST['xaphuong'];
				$sqll= "select ward.type as wardtype, ward.name as wardname , district.type as districttype, district.name districtname, province.type  as provincetype, province.name as provincename from province join district on province.provinceid=district.provinceid join ward on ward.districtid=district.districtid where ward.wardid='".$xaphuong."'";
				$exc= mysqli_query($connect,$sqll);
				$row1= mysqli_fetch_array($exc); 
				$diachi= $diachi.", ".$row1['wardtype']." ".$row1['wardname'].", ".$row1['districttype']." ".$row1['districtname'].", ".$row1['provincetype']." ".$row1['provincename'];
				$sqlmax= "select max(ma_kh)+1 from thanh_vien";
				$execmax= mysqli_query($connect, $sqlmax);
				$rowmax= mysqli_fetch_array($execmax);
				$ma_kh=$rowmax['max(ma_kh)+1'];
				$sl="insert into thanh_vien values(".$ma_kh.",'".$username."','".$password."','".$first_name."','".$last_name."',".$ngaysinh.",'".$gioitinh."','".$email."','".$sdt."','".$diachi."','".$date."')";
				$exec= mysqli_query($connect,$sl);
				if($exec){
					?>
					<p class="alert alert-success">Đăng ký thành công..<br> Bấm<a href="?menu=dang_nhap"> vào đây </a> để đăng nhập và mua hàng</p>
					<?php 
				}
				else{
					echo "Đăng ký thất bại <br>";
					echo 'Bấm<a href="javascript:history.back(-1);"> vào đây </a> để quay lại trang đăng ký';
					echo $sl;
					echo $date;
				}}
				else{
					echo "<script> alert('Mật khẩu bạn nhập lại chưa chính xác');  location.href='?menu=dang_ky'; </script>";

				}
			}else{
				echo "<script> alert('Tên đăng nhập hoặc email đã có người sử dụng.'); </script>";
			}
		}else{
			echo "<script> alert('Ký tự bạn nhập vào không đúng.'); location.href='?menu=dang_ky'; </script>";
		}
	}
	else{
		if(isset($_POST['cancel'])){
			echo "<script> location.href='index.php'; </script>";
		}
	}
	?>