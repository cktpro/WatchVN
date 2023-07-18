<?php
	if(!isset($login)){exit();}
?>
<div class="ql_menu_ngang">
	<table>
		<tr>
			<td>Tên menu</td>
			<td>Nội dung</td>
			<td>Loại menu</td>
			<td colspan="2" align="center"><a href="?menu=them_menu_ngang">Thêm</a></td>
		</tr>
<?php 
	include('../connect.php');
	$sl="select * from menu_ngang";
	$exec= mysqli_query($connect,$sl);
	while($row= mysqli_fetch_array($exec)){
?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['content']; ?></td>
			<td><?php echo $row['loaimenu']; ?></td>
			<td><a href="?menu=sua_menu_ngang&id=<?php echo $row['id']; ?>">Sửa</a></td>
			<td><a onclick="return confirm('Bạn có mún xóa menu này không?');" href="?menu=xoa_menu_ngang&id=<?php echo $row['id']; ?>">Xóa</a></td>
		</tr>
<?php } ?>
	</table>
</div>