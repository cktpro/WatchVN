<?php
	//if(!isset($login)){exit();}
	include('../connect.php');
	$sl1= "select * from quan_tri where name='".$_SESSION['user']."'";
	$exec1= mysqli_query($connect, $sl1);
	$row1= mysqli_fetch_array($exec1);
	if($row1['quyen_truy_cap']==1){
?>
<table>
	<tr>
		<td>Username</td>
		<td>Password</td>
		<td colspan="2" align="center"><a href="?menu=them_tt_admin">Thêm</a></td>
	</tr>
<?php
	$sl= "select * from quan_tri";
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<tr>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['pass']; ?></td>
		<td><a href="?menu=sua_tt_admin&id=<?php echo $row['id']; ?>">Sửa</a></td>
		<td><a onclick="return confirm('Bạn chắc chắn mún xóa không?');" href="?menu=xoa_tt_admin&id=<?php echo $row['id']; ?>">Xóa</a></td>
	</tr>
<?php } ?>
</table>
<?php }
	else{
		echo "<script> alert('Bạn không có quyền truy cập vào trang này.'); location.href='?menu=?menu=trang_chu'; </script>";
	}
?>