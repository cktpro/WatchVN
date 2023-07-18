<?php 
	session_start();
		include('chuc_nang/quan_tri/security.php');
	if(isset($login)){
 		include('chuc_nang/quan_tri/trang_chu.php');
 		}
 	else{
 		if(isset($_POST['submit'])){
		include('../connect.php');
		$name= $_POST['username'];
		$pass= $_POST['password'];	
		$pass= md5($pass);
		$pass= md5($pass);
		$sl= "select * from quan_tri where name='".$name."' and pass='".$pass."'";
		$result= mysqli_query($connect, $sl);
		$row= mysqli_fetch_assoc($result);
		$kt= mysqli_num_rows($result);
		if($kt>0){
			$_SESSION['user']= $_POST['username'];
			$_SESSION['pass']= $_POST['password'];
			echo "<script>alert('Login Successfull.'); </script>";
 			include('chuc_nang/quan_tri/trang_chu.php');
		}
		else{
			echo "<script>alert('Login Failed.'); </script>";
		}
	}
 		include('chuc_nang/quan_tri/login.php');
 	}
 ?>