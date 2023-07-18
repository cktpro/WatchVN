<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	$id= $_GET['id'];
	$sl="delete from menu_doc where id=".$id;
	$exec= mysqli_query($connect, $sl);
	if($exec){
		echo "<script> alert('Xóa menu thành công'); location.href='?menu=ql_menu_doc'; </script>";
	}
?>