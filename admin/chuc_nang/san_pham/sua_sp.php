<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	$masp=$_GET['masp'];
	$sl= 'select * from san_pham join ct_san_pham on san_pham.masp= ct_san_pham.masp where san_pham.masp='.$masp;
	$exec= mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);
?>
<div class="card mx-4">
	<form style="margin: 20px;" method="post" action="?menu=exec_sua_sp" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td><label for="name">Tên sản phẩm</label></td>
				<td><label for="cost">Giá</label></td>
				<td><label for="soluong">Số lượng</label></td>
				<td class="right"><label for="loaisp">Loại sản phẩm</label></td>

			</tr>
			<tr>
				<td><input type="text" id="name" name="name"  value="<?php echo $row['tensp']; ?>" ></td>
				<td><input type="text" id="cost" name="cost"  value="<?php echo $row['giasp']; ?>" ></td>
				<td><input type="text" id="soluong" name="soluong"  value="<?php echo $row['soluong']; ?>" disabled></td>
				<td>
					<select name="loaisp" id="loaisp"   >
						<option value="casio" <?php if($row['loaisp']=="casio"){echo "selected";} 
						else{echo "";}
						  ?> >Casio</option>
						<option value="orient" <?php if($row['loaisp']=="orient"){echo "selected"; }
						else{echo "";}
						 ?> >Orient</option>
						<option value="seiko" <?php if($row['loaisp']=="seiko"){echo "selected"; }
						else{echo "";}  ?> >Seiko</option>
						<option value="op" <?php if($row['loaisp']=="op"){echo "selected"; }
						else{echo "";} ?> >OP</option>
						<option value="citizen" <?php if($row['loaisp']=="citizen"){echo "selected"; }
						else{echo "";} ?> >Citizen</option>
						<option value="doxa" <?php if($row['loaisp']=="doxa"){echo "selected"; }
						else{echo "";} ?> >Doxa</option>
						<option value="tissot" <?php if($row['loaisp']=="tissot"){echo "selected"; }
						else{echo "";} ?> >Tissot</option>
						<option value="royalcrown" <?php if($row['loaisp']=="royalcrown"){echo "selected"; }
						else{echo "";} ?> >Royal Crown</option>
						<option value="ck" <?php if($row['loaisp']=="ck"){echo "selected"; }
						else{echo "";} ?> >CK</option>
					</select>
				</td>
			</tr>
		</table>
		<table class="table">
			<tr>
				<td class="right">
					<label for="image1">Ảnh:</label><br>
				<td>
					<input type="hidden" name="masp" value="<?php echo $row['masp']; ?>">
					<input type="hidden" name="img" value="<?php echo $row['img']; ?>">
					<img src="../images/<?php echo $row['img']; ?>" alt="" name="img" width="60px" height="80px" ><input type="file" id="image" name="image"   ><br>
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
				<td><input type="text" id="xuat_xu" name="xuat_xu"  value="<?php echo $row['xuat_xu']; ?>" ></td>
				<td><input type="text" id="kieu_may" name="kieu_may"  value="<?php echo $row['kieu_may']; ?>" ></td>
				<td><input type="text" id="duong_kinh" name="duong_kinh"  value="<?php echo $row['duong_kinh']; ?>" ></td>
				<td><input type="text" id="chat_lieu_vo" name="chat_lieu_vo"  value="<?php echo $row['chat_lieu_vo']; ?>" ></td>
			</tr>
			<tr>
				<td><label for="chat_lieu_day">Chất liệu dây</label></td>
				<td><label for="chat_lieu_kinh">Chất liệu kính</label></td>
				<td><label for="do_chiu_nuoc">Độ chịu nước</label></td>
				<td><label for="kich_thuoc_day">Kích thước dây</label></td>
			</tr>
			<tr>
				<td><input type="text" id="chat_lieu_day" name="chat_lieu_day"  value="<?php echo $row['chat_lieu_day']; ?>" ></td>
				<td><input type="text" id="chat_lieu_kinh" name="chat_lieu_kinh"  value="<?php echo $row['chat_lieu_kinh']; ?>" ></td>
				<td><input type="text" id="do_chiu_nuoc" name="do_chiu_nuoc"  value="<?php echo $row['do_chiu_nuoc']; ?>" ></td>
				<td><input type="text" id="kich_thuoc_day" name="kich_thuoc_day"  value="<?php echo $row['kich_thuoc_day']; ?>" ></td>
			</tr>
			<tr>
				<td><label for="bao_hanh">Bảo hành</label></td>
				<td><label for="gioi_tinh">Đối tượng dùng</label></td>
			</tr>
			<tr>
				<td><input type="text" id="bao_hanh" name="bao_hanh"  value="<?php echo $row['bao_hanh']; ?>" ></td>
				<td><select name="doi_tuong_sd" id="loaisp"   >
						<option value="1" <?php if($row['doi_tuong_sd']==1){echo "selected";} 
						else{echo "";}
						  ?> >Đồng hồ nam</option>
						<option value="2" <?php if($row['doi_tuong_sd']==2){echo "selected"; }
						else{echo "";}
						 ?> >Đồng hồ nữ</option>
						<option value="3" <?php if($row['doi_tuong_sd']==3){echo "selected"; }
						else{echo "";}  ?> >Đồng hồ đôi</option>
					</select></td>
			</tr>
		</table>
				<div class="text-center">
					<input class="btn btn-primary mr-4" type="submit" name="submit" value="Sửa">
				<a href="?menu=ql_sanpham" class="btn btn-secondary ml-4">Hủy</a>
				</div>
	</form>
</div>