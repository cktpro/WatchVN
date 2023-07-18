<?php
	include('connect.php');
	$old_password= $_POST['old_password'];	
	$old_password= md5($old_password);
	$old_password=md5($old_password);
	$sql= "select * from thanh_vien where password='".$old_password."' and username='".$_SESSION['username']."'";
	$qr= mysqli_query($connect, $sql);
	$num= mysqli_num_rows($qr);
	if($num>0){
	$password= $_POST['new_password'];
	$password= md5($password);
	$password= md5($password);
	$re_password= $_POST['re_password'];
	$re_password= md5($re_password);
	$re_password= md5($re_password);
	if($password==$re_password){
	$sl="update thanh_vien set password='".$password."' where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect, $sl);
	if(isset($exec)){
		?>
	<p class="alert alert-success">Đổi mật khẩu thành công.<br>Bấm <a href="?menu=thanh_vien">vào đây</a> để quay lại.</p>
		<?php
	}
	else{
		?>
	<p class="alert alert-danger">Đổi mật khẩu thất bại.<br>Bấm <a href="javascript: history.back(-1);">vào đây</a> để quay lại.</p>
		<?php
	}
	}else{
		echo "<script> alert('Mật khẩu bạn nhập lại không đúng');</script>";
		echo "<script> location.href='javascript: history.back(-1);'; </script>";	
	}
}else{
	echo "<script> alert('Mật khẩu củ không đúng');</script>";
	echo "<script> location.href='javascript: history.back(-1);'; </script>";	
}
	
?>