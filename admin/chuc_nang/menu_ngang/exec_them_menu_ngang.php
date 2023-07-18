<?php
	if(!isset($login)){exit();}
?>
<?php
if(isset($_POST['submit'])){
	include('../connect.php');
	$title= $_POST['title'];
	$title= mb_strtoupper($title);
	$content= $_POST['content'];
	$loaimenu= $_POST['loaimenu'];
	$sl= "insert into menu_ngang(title,content,loaimenu) values('".$title."','".$content."','".$loaimenu."')";
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Thêm menu thành công'); location.href='?menu=ql_menu_ngang'; </script>";
	}
	else{
		echo "<script> alert('Thêm menu không thành công'); location.href='?menu=menu_ngang'; </script>";
	}
}
if(isset($_POST['cancel'])){
	header('location:?menu=menu_ngang');
}
?>