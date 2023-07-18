<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	if(isset($_POST['submit'])){
		$user= $_POST['username'];
		$pass= $_POST['pass'];	
		$pass= md5($pass);
		$pass= md5($pass);
		$re_pass= $_POST['re_pass'];	
		$re_pass= md5($re_pass);
		$re_pass= md5($re_pass);
		if($pass==$re_pass){
		$sl= "update quan_tri set pass='".$pass."' where id=".$id;
		$exec= mysqli_query($connect, $sl);
		if($exec){
			echo "<script> alert('Chỉnh sửa thành công'); location.href='?menu=quan_ly_admin'; </script>";
		}
		else{
			echo "<script> alert('Chỉnh sửa không thành công'); location.href='?menu=quan_ly_admin'; </script>";
		}
	}else{
		echo "<script> alert('Mật khẩu bạn nhập lại không đúng.'); location.href='?menu=quan_ly_admin'; </script>";
	}
	}
	if(isset($_POST['cancel'])){
		header('location:?menu=quan_ly_admin');
	}
?>