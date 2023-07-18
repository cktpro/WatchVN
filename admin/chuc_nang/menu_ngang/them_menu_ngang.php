<?php
	if(!isset($login)){exit();}
?>
<div class="them_menu">
<form action="?menu=exec_them_menu_ngang" method="post">
	<table>
		<tr>
			<td class="right"><label for="title">Tên menu: </label></td>
			<td><input type="text" id="title" name="title"></td>
		</tr>
		<tr>
			<td class="right"><label for="content">Nội dung: </label></td>
			<td><input type="text" id="content" name="content"></td>
		</tr>
		<tr>
			<td class="right"><label for="loaimenu">Loại menu: </label></td>
			<td><select name="loaimenu" id="loaimenu">
					<option value="none">None</option>
					<option value="san_pham">Sản Phẩm</option>
					<option value="mobile">Điện thoại</option>
					<option value="laptop">Laptop</option>
					<option value="tablet">Tablet</option>
					<option value="phu_kien">Phụ kiện</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Thêm"></td>
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>