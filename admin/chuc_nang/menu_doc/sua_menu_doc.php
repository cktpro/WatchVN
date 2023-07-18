<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$id= $_GET['id'];
	$sl='select * from menu_doc where id='.$id;
	$exec= mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);	
?>
<div class="sua_menu">
<form action="?menu=exec_sua_menu_doc" method="post">
	<table>
		<tr>
			<td class="right"><label for="title">Tên menu: </label></td>
			<td><input type="hidden" name="id" value="<?php echo $row['id']; ?>"><input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_1">Sub_Menu 1:</label></td>
			<td><input type="text" id="sub_1" name="sub_1" value="<?php echo $row['sub_1']; ?>"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_1_kink">Sub_Menu 1 (link):</label></td>
			<td><input type="text" id="sub_1_link" name="sub_1_link" value="<?php echo $row['sub_1_link']; ?>"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_2">Sub_Menu 1:</label></td>
			<td><input type="text" id="sub_2" name="sub_2" value="<?php echo $row['sub_2']; ?>"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_2_kink">Sub_Menu 2 (link):</label></td>
			<td><input type="text" id="sub_2_link" name="sub_2_link" value="<?php echo $row['sub_2_link']; ?>"></td>
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Sửa"></td>
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>