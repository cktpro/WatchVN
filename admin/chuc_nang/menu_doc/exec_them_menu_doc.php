<?php
	if(!isset($login)){exit();}
?>
<?php
if(isset($_POST['submit'])){
	include('../connect.php');
	$title= $_POST['title'];
	$title= mb_strtoupper($title);
	$sub_1= $_POST['sub_1'];
	$sub_1_link= $_POST['sub_1_link'];
	$sub_2= $_POST['sub_2'];
	$sub_2_link= $_POST['sub_2_link'];
	$sl= "insert into menu_doc(title,sub_1,sub_1_link,sub_2, sub_2_link) values('".$title."','".$sub_1."','".$sub_1_link."','".$sub_2."','".$sub_2_link."')";
	$exec= mysqli_query($connect,$sl);
	if($exec){
		echo "<script> alert('Thêm menu thành công'); location.href='?menu=ql_menu_doc'; </script>";
	}
	else{
		echo "<script> alert('Thêm menu không thành công'); location.href='?menu=menu_doc'; </script>";
	}
}
if(isset($_POST['cancel'])){
	header('location:?menu=menu_doc');
}
?>