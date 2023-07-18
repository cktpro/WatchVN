<?php
	if(!isset($login)){exit();}
?>
<?php
	if(isset($_POST['submit'])){
	include('../connect.php');
	$id= $_POST['id'];
	$title= $_POST['title'];
	$title= mb_strtoupper($title);
	$content= $_POST['content'];
	$loaimenu= $_POST['loaimenu'];
	$sl= "update menu_ngang set title= '".$title."',content= '".$content."',loaimenu= '".$loaimenu."' where id=".$id;
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Sửa menu thành công'); location.href='?menu=ql_menu_ngang';  </script>";
	}
	else{
		echo "<script> alert('Sửa menu không thành công'); location.href='?menu=ql_menu_ngang';  </script>";
	}
}
	if(isset($_POST['cancel'])){
		header('location:?menu=ql_menu_ngang');
	}
?>