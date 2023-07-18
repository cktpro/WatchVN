<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_POST['submit'])){
	include('../connect.php');
	$id=$_POST['id'];
	$img_location ='../images/slideshow/';
	$image_upload = $_FILES['image']['name'];
	$error= $_FILES['image']['error'];
	$tmp_name= $_FILES['image']['tmp_name'];
		if($image_upload==""){
			$image= $_POST['imagename'];
		}
		if($image_upload!=""){
			$image= $image_upload;
			$new_img_location= $img_location.basename($image);
			move_uploaded_file($tmp_name,$new_img_location);
			$old_image_location= $img_location.basename($_POST['imagename']);
			unlink($old_image_location);
		}
	$note= $_POST['note'];
	$sl= "update slideshow set name='".$image."', note='".$note."' where id=".$id;
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Sửa sản phẩm thành công');
		location.href='?menu=ql_slideshow'; </script>";
}
	else{
		echo "<script> alert('Sửa sản phẩm không thành công'); location.href='?menu=ql_slideshow'; </script>";
	}
}
	if(isset($_POST['cancel'])){
		header('location:index.php?menu=ql_slideshow');
	}
?>