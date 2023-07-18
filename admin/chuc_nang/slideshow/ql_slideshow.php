<?php
	if(!isset($login)){exit();}
?>
<table>
	<tr>
		<td>Tên file</td>
		<td>Hình ảnh</td>
		<td>Ghi chú</td>
		<td colspan="2" align="center"><a href="?menu=them_anh_slide">Thêm</a></td>
	</tr>
<?php
	include('../connect.php');
	$sl= "select * from slideshow";
	$exec = mysqli_query($connect,$sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<tr>
		<td><?php echo $row['name']; ?></td>
		<td><img src="../images/slideshow/<?php echo $row['name']; ?>" width="360px" height="150px" alt=""></td>
		<td><?php echo $row['note']; ?></td>
		<td><a href="?menu=sua_anh_slide&id=<?php echo $row['id']; ?>">Sửa</a></td>
		<td><a onclick="return confirm('Bạn có mún xóa ảnh này?');" href="?menu=xoa_anh_slide&id=<?php echo $row['id']; ?>">Xóa</a></td>
	</tr>
<?php } ?>
</table