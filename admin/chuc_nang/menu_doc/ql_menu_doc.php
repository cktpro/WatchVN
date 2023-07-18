<?php
	if(!isset($login)){exit();}
?>
<div class="ql_menu_doc">
	<table>
		<tr>
			<td>Tên menu</td>
			<td>Sub_Menu 1</td>
			<td>Sub_Menu 1(link)</td>
			<td>Sub_Menu 2</td>
			<td>Sub_Menu 2(link)</td>
			<td colspan="2" align="center"><a href="?menu=them_menu_doc">Thêm</a></td>
		</tr>
<?php 
	include('../connect.php');
	$sl="select * from menu_doc";
	$exec= mysqli_query($connect,$sl);
	while($row= mysqli_fetch_array($exec)){
?>
		<tr>
			<td><?php echo $row['title']; ?></td>
			<td><?php echo $row['sub_1']; ?></td>
			<td><?php echo $row['sub_1_link']; ?></td>
			<td><?php echo $row['sub_2']; ?></td>
			<td><?php echo $row['sub_2_link']; ?></td>
			<td><a href="?menu=sua_menu_doc&id=<?php echo $row['id']; ?>">Sửa</a></td>
			<td><a onclick="return confirm('Bạn có mún xóa menu này không?');" href="?menu=xoa_menu_doc&id=<?php echo $row['id']; ?>">Xóa</a></td>
		</tr>
<?php } ?>
	</table>
</div>