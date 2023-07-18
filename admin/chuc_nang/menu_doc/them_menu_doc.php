<?php
	if(!isset($login)){exit();}
?>
<div class="them_menu">
<form action="?menu=exec_them_menu_doc" method="post">
	<table>
		<tr>
			<td class="right"><label for="title">Tên menu: </label></td>
			<td><input type="text" id="title" name="title"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_1">Sub_Menu 1:</label></td>
			<td><input type="text" id="sub_1" name="sub_1"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_1_kink">Sub_Menu 1 (link):</label></td>
			<td><input type="text" id="sub_1_link" name="sub_1_link"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_2">Sub_Menu 1:</label></td>
			<td><input type="text" id="sub_2" name="sub_2"></td>
		</tr>
		<tr>
			<td class="right"><label for="sub_2_kink">Sub_Menu 2 (link):</label></td>
			<td><input type="text" id="sub_2_link" name="sub_2_link"></td>
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Thêm"></td>
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>