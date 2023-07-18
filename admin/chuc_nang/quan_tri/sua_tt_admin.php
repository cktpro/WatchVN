<?php
	if(!isset($login)){exit();}
	include('../connect.php');
	$sl1= "select * from quan_tri where name='".$_SESSION['user']."'";
	$exec1= mysqli_query($connect, $sl1);
	$row1= mysqli_fetch_array($exec1);
	if($row1['quyen_truy_cap']==1){
?>
<?php 
	include('../connect.php');
	$sl= "select * from quan_tri where id=".$_GET['id'];
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
?>
<form  action="?menu=exec_sua_tt_admin" method="post">
	<table>
		<tr>
			<td class="right"><label for="username">Username: </label></td>
			<td><input type="text" disabled name="username" id="username" value="<?php echo $row['name']; ?>" required ></td>
		</tr>
		<tr>
			<td class="right"><label for="pass">Password: </label></td>
			<td><input type="password" name="pass" id="pass" value="<?php echo $row['pass']; ?>" required ><input type="hidden" name="id" value="<?php echo $row['id']; ?>" ></td>
		</tr>
		<tr>
			<td class="right"><label for="re_pass">Password: </label></td>
			<td><input type="password" name="re_pass" id="re_pass" value="<?php echo $row['pass']; ?>" required >
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Sửa"></td></form><form action="?menu=exec_sua_tt_admin" method="post">
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
<?php }
	else{
		echo "<script> alert('Bạn không có quyền truy cập vào trang này .'); </script>";
		echo $_SESSION['user'];
	}
?>