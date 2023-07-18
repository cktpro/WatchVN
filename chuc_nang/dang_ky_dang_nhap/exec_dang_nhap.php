<?php 
	if(isset($_POST['submit'])){
		include('connect.php');
		$pass= $_POST['password'];
		$pass= md5($pass);
		$pass= md5($pass);
		$sl="select * from thanh_vien where username='".$_POST['username']."' and password='".$pass."'";
		$exec= mysqli_query($connect,$sl);
		$kt = mysqli_num_rows($exec);
		if($kt>0){
			$_SESSION['username']= $_POST['username'];
	echo "<script> alert('Đăng nhập thành công');</script>";
	echo "<script> location.href='javascript: history.back(-1);'; </script>";
		
		}
		else{
			echo "<script> alert('Đăng nhập thất bại'); location.href='javascript: history.back(-1);';  </script>";
		}
	}
	if(isset($_POST['cancel'])){
	echo "<script> location.href='javascript: history.back(-1);'; </script>";
}
?>