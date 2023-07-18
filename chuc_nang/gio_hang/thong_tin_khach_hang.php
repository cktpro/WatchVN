<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Giỏ hàng';
    });

</script><p class="alert alert-success">Bạn có thể <a href="?menu=dang_ky">đăng ký</a> làm thành viên để có thể nhận được nhiều ưu đãi hơn từ chúng tôi.<br>Hoặc có thể mua hàng trực tiếp không cần đăng ký thành viên trực tiếp qua form đăng ký bên dưới.</p>
<p class="alert alert-warning"><strong>Chú ý:</strong> Các thông tin có dấu <span style="color: red;">(*)</span> đều là bắt buộc.</p>
<form id="form" action="?menu=hoa_don" method="post">
	<table class="table">
		<tr>
			<td><label for="tenkh">Họ và tên: </label> <span style="color: red;">(*)</span></td>
			<td><input type="text" class="form-control" name="tenkh" id="tenkh" placeholder="Nhập họ và tên.." required ></td>
		</tr>
		<tr>
			<td><label for="cmnd">Số CMND:</label> <span style="color: red;">(*)</span></td>
			<td><input type="text" class="form-control" name="cmnd" id="cmnd" placeholder="Nhập số CMND.." required ></td>
		</tr>
		<tr>
			<td><label for="email">Email:</label> <span style="color: red;">(*)</span></td>
			<td><input type="email" class="form-control" name="email" id="email" placeholder="Nhập địa chỉ Email.." required ></td>
		</tr>
		<tr>
			<td><label for="sdt">Sdt:</label> <span style="color: red;">(*)</span></td>
			<td><input type="text" class="form-control" name="sdt" id="sdt" placeholder="Nhập số điện thoại.." required></td>
		</tr>
		<tr>
			<td><label for="diachi">Địa chỉ:</label> <span style="color: red;">(*)</span></td>
			<td><input type="text" class="form-control" name="diachi" id="diachi" placeholder="Tổ, thôn.." required></td>
		</tr>
		<tr>
			<td><label for="tinhtp">Tỉnh/TP:</label> <span style="color: red;">(*)</span></td>
			<td>
				<select  class="form-control"  name="tinhtp" id="tinhtp" required>
					<option value="">--Tỉnh/Thành phố--</option>
					<?php 
						include('connect.php');
						$sl= "select * from province";
						$exec= mysqli_query($connect, $sl);
						while($row= mysqli_fetch_array($exec)){	
					?>
					<option value="<?php echo $row['provinceid']; ?>"><?php echo $row['type']." ".$row['name']; ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="quanhuyen">Quận/Huyện:</label> <span style="color: red;">(*)</span></td>
			<td>
				<select  class="form-control"  name="quanhuyen" id="quanhuyen" required>
					<option value="">--Quận/Huyện--</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="xaphuong">Xã/phường:</label> <span style="color: red;">(*)</span></td>
			<td>
				<select class="form-control"  name="xaphuong" id="xaphuong" required>
					<option value="">--Xã/Phường--</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><input class="btn btn-primary" type="submit" name="submit" value="Mua hàng"></td></form>
			<td><form action="?menu=hoa_don" method="post"><input class="btn btn-primary" type="submit" name="cancel" value="Hủy"></form></td>
		</tr>
	</table>