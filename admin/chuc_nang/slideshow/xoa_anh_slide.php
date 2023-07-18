<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	$id=$_GET['id'];
	$sll= "select * from slideshow where id=".$id;
	$execc= mysqli_query($connect,$sll);
	$row= mysqli_fetch_array($execc);
	$img_link= '../images/slideshow/'.$row['name'];
	if(is_file($img_link)){
		unlink($img_link);
	}
	$sl= "delete from slideshow where id=".$id;
	$exec=mysqli_query($connect, $sl);
	if($exec){
		echo "<script> alert('Xóa ảnh thành công'); location.href='?menu=ql_slideshow'; </script>";
	}
	else{
		echo "<script> alert('Xóa ảnh không thành công'); location.href='?menu=ql_slideshow'; </script>";
	}	
?>