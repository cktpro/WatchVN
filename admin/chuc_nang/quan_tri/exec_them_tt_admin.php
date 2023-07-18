<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	if(isset($_POST['add_admin'])){
	$sl1= "select max(id) from nhan_vien";
	$exec1= mysqli_query($connect, $sl1);
	$row1= mysqli_fetch_array($exec1); 
	if (is_null($row1['max(id)'])) {
		$id=1;
	}else{$id=$row1['max(id)']+1;}
	$username=$_POST['username'];
	$hoten=$_POST['hoten'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$quyen_truy_cap=$_POST['quyen_truy_cap'];
	$pass= $_POST['password'];
	$pass= md5($pass);
	$pass= md5($pass);
	$re_pass= $_POST['re-pass'];	
	$re_pass= md5($re_pass);
	$re_pass= md5($re_pass);
	if($pass==$re_pass){
	$sl= "insert into nhan_vien values(".$id.",'".$username."','".$pass."','".$hoten."','".$email."','".$sdt."',".$quyen_truy_cap.")";
	$exec= mysqli_query($connect, $sl);
	if ($exec) {
		echo "<script> alert('Thêm nhân viên thành công.'); location.href='?menu=them_tt_admin'; </script>";
	}

		}else{echo "<script> alert('Mật khẩu bạn nhập lại không đúng.'); location.href='?menu=them_tt_admin'; </script>";}
	}
	echo $sl1;
?>