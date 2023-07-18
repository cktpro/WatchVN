<?php
	if(!isset($login)){exit();}
?>
<?php 
	include('../connect.php');
	$id= $_GET['id'];
	$sl='select * from menu_ngang where id='.$id;
	$exec= mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);	
?>
<div class="sua_menu">
<form action="?menu=exec_sua_menu_ngang" method="post">
	<table>
		<tr>
			<td class="right"><label for="title">Tên menu: </label></td>
			<td><input type="hidden" name="id" value="<?php echo $row['id']; ?>"><input type="text" id="title" name="title" value="<?php echo $row['title']; ?>"></td>
		</tr>
		<tr>
			<td class="right"><label for="content">Nội dung: </label></td>
			<td><input type="text" id="content" name="content" value="<?php echo $row['content']; ?>"></td>
		</tr>
		<tr>
			<td class="right"><label for="loaimenu">Loại menu: </label></td>
			<td><select name="loaimenu" id="loaimenu">
					<option value="none" <?php if($row['loaimenu']== 'none') echo "selected"; ?> >None</option>
					<option value="san_pham" <?php if($row['loaimenu']== 'san_pham') echo "selected"; ?> >Sản Phẩm</option>
					<option value="mobile" <?php if($row['loaimenu']== 'mobile') echo "selected"; ?> >Điện thoại</option>
					<option value="laptop" <?php if($row['loaimenu']== 'laptop') echo "selected"; ?> >Laptop</option>
					<option value="tablet" <?php if($row['loaimenu']== 'tablet') echo "selected"; ?> >Tablet</option>
					<option value="phu_kien" <?php if($row['loaimenu']== 'phu_kien') echo "selected"; ?> >Phụ kiện</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Sửa"></td>
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>