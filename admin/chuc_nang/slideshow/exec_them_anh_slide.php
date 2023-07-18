<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_POST['submit'])){
	include('../connect.php');
	$img_location ='../images/slideshow/';
	if(isset($_FILES['image'])){
		$image = $_FILES['image']['name'];
		$error= $_FILES['image']['error'];
		$tmp_name= $_FILES['image']['tmp_name'];
		$img_location= $img_location.basename($image);
		if($error== 4){
				echo "<script> alert('Không có file nào được chọn'); location.href='?menu=them_anh_slide'; </script>";
			}
			else{
			if(file_exists($img_location)){
				echo "<script> alert('Ảnh đã tồn tại'); location.href='?menu=them_anh_slide'; </script>";
			}
			else
			{
				if(move_uploaded_file($tmp_name, $img_location)){
				}
				else{
					switch($error){
					case 1: echo "<script> alert('Dung lượng file ảnh bạn tải lên vượt quá giới hạn được chỉ định của server'); <script>"; break;
					case 2: echo "<script> alert('Dung lượng file ảnh bạn upload vượt quá dung lượng cho phép max(5000000 byte)'); <script>"; break;
					case 3: echo "<script> alert('Đã xãy ra lỗi trong quá trình upload file ảnh (Có thế do lỗi đường truyền)'); <script>"; break;
					case 4: echo "<script> alert('Không có file được chọn'); <script>"; break;
						}
				}
		}
	}
	$note= $_POST['note'];
	$sl= "insert into slideshow(name,note) values('".$image."','".$note."')";
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Thêm ảnh thành công'); location.href='?menu=ql_slideshow'; </script>";
	}
	else{
		unlink('../images/slideshow'.$image);
		echo "<script> alert('Thêm ảnh không thành công'); location.href='?menu=?menu=ql_slideshow'; </script>";
	}
}
}
	if(isset($_POST['cancel'])){
		header('location:index.php?menu=ql_slideshow');
	}
?>