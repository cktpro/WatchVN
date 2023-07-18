<?php
	if(!isset($login)){exit();}
?>

<div class=" card mx-4">
	<form  method="post" action="?menu=exec_them_sp" enctype="multipart/form-data">
		<div class="form-grput">
		<table class="table">
			<tr>
				<td><label for="name">Tên sản phẩm</label></td>
				<td><label for="cost">Giá nhập</label></td>
				<td><label for="cost">Giá bán</label></td>
				<td><label for="soluong">Số lượng</label></td>
				<td class="right"><label for="loaisp">Thương hiệu</label></td>

			</tr>
			<tr>
				<td><input class="form-control" type="text" id="name" name="name" required ></td>
				<td><input class="form-control" type="text" id="cost" name="gia_nhap" required ></td>
				<td><input class="form-control" type="text" id="cost" name="gia_ban" required ></td>
				<td><input class="form-control" type="text" id="soluong" name="soluong" required ></td>
				<td>
					<select class="form-control"   name="loaisp" id="loaisp"  required >
						<option   value="casio">Casio</option>
						<option  value="orient">Orient</option>
						<option  value="seiko">Seiko</option>
						<option  value="op">OP</option>
						<option  value="citizen">Citizen</option>
						<option  value="doxa">Doxa</option>
						<option  value="tissot">Tissot</option>
						<option  value="skmei">Skmei</option>
						<option  value="royalcrown">Royal Crown</option>
						<option  value="ck">CK</option>
					</select class="form-control">
				</td>
			</tr>
		</table >
		<table class="table">
			<tr>
				<td colspan="2">
					<label for="image1">Hình ảnh:</label><br>
				</td>
				<td colspan="2">
					<input class="form-control-file" type="file" id="image" name="image"  required >
				</td>
			</tr>
		</table>
		<table class="table">
			<tr>
				<td><label for="xuat_xu">Xuất xứ</label></td>
				<td><label for="kieu_may">Kiểu máy</label></td>
				<td><label for="duong_kinh">Đường kính</label></td>
				<td><label for="chat_lieu_vo">Chất liệu vỏ</label></td>
			</tr>
			<tr>
				<td><input class="form-control" type="text" id="xuat_xu" name="xuat_xu" required ></td>
				<td><input class="form-control" type="text" id="kieu_may" name="kieu_may" required ></td>
				<td><input class="form-control" type="text" id="duong_kinh" name="duong_kinh" required ></td>
				<td><input class="form-control" type="text" id="chat_lieu_vo" name="chat_lieu_vo" required ></td>
			</tr>
			<tr>
				<td><label for="chat_lieu_day">Chất liệu dây</label></td>
				<td><label for="chat_lieu_kinh">Chất liệu kính</label></td>
				<td><label for="do_chiu_nuoc">Độ chịu nước</label></td>
				<td><label for="kich_thuoc_day">Kích thước dây</label></td>
			</tr>
			<tr>
				<td><input class="form-control" type="text" id="chat_lieu_day" name="chat_lieu_day" required ></td>
				<td><input class="form-control" type="text" id="chat_lieu_kinh" name="chat_lieu_kinh" required ></td>
				<td><input class="form-control" type="text" id="do_chiu_nuoc" name="do_chiu_nuoc" required ></td>
				<td><input class="form-control" type="text" id="kich_thuoc_day" name="kich_thuoc_day" required ></td>
			</tr>
			<tr>
				<td colspan="2" ><label for="bao_hanh">Bảo hành</label></td>
				<td colspan="2"><label for="doi_tuong_sd">Đối tướng sử dụng</label></td>

	
			</tr>
			<tr>
				<td colspan="2"><input class="form-control" type="text" id="bao_hanh" name="bao_hanh" required ></td>
				<td colspan="2"><select class="form-control" name="doi_tuong_sd" id="doi_tuong_sd"  required >
						<option value="1" select class="form-control"ed="1">Đồng hồ nam</option>
						<option value="2">Đồng hồ nữ</option>
						<option value="3">Đồng hồ đôi</option>
					</select class="form-control"></td>

			</tr>
			<tr>
				<td colspan="4"></td>
			</tr>
				
		</table>
		<div class="text-center">
			<input class="btn btn-primary mr-4" type="submit" name="submit" value="Thêm"></td>
				<td><a class="btn btn-danger ml-4" href="#" onclick="history.go(-1)">Hủy</a></td>
		</div>
	</form>
	</div>
</div>