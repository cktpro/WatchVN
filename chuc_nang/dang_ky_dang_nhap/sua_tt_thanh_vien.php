<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Thành viên';
	});
</script>
<?php
include('connect.php');
$sl = "select * from thanh_vien where username='" . $_SESSION['username'] . "'";
$exec = mysqli_query($connect, $sl);
$row = mysqli_fetch_array($exec);
$ngaysinh = $row['ngaysinh'];
$array = explode("-", $ngaysinh);
$nam = $array[0];
$thang = $array[1];
$ngay = $array[2];
?>
<div class="main_container px-0">
	<div class="col-md-8 order-md-1 mx-auto my-4">
		<h4 class="alert alert-primary mb-3">Thông tin thành viên</h4>
		<form action="?menu=exec_sua_tt_thanh_vien" method="post" id="form_update">
			<div class="row">
				<div class="col-md-6 mb-3">
					<label for="hoten">Họ</label>
					<input type="text" name="hoten" id="hoten" class="form-control" placeholder="Nhập họ và tên bạn.." value="<?php echo $row['first_name']; ?>" required>
					<div class="invalid-feedback">
						Valid first name is required.
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="cmnd">Tên</label>
					<input required type="text" name="cmnd" id="cmnd" class="form-control" placeholder="Nhập số CMND.." value="<?php echo $row['last_name']; ?>">
					<div class="invalid-feedback">
						Valid last name is required.
					</div>
				</div>
			</div>

			<div class="mb-3">
				<div class="row">
					<div class="col-md-5 mb-3">
						<label for="country">Ngày</label>
						<select class="custom-select d-block w-100" name="ngay" id="ngaysinh" required="">
							<?php for ($i = 1; $i <= 31; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if ($i == $ngay) {
																		echo "selected";
																	} ?>><?php echo "Ngày " . $i; ?></option>
							<?php } ?>
						</select>
						<div class="invalid-feedback">
							Please select a valid country.
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<label for="state">Tháng</label>
						<select class="custom-select d-block w-100" name="thang" required="">
							<?php for ($j = 1; $j <= 12; $j++) { ?>
								<option value="<?php echo $j; ?>" <?php if ($j == $thang) {
																		echo "selected";
																	} ?>><?php echo "Tháng " . $j; ?></option>
							<?php } ?>
						</select>
						<div class="invalid-feedback">
							Please provide a valid state.
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<label for="zip">Năm</label>
						<select class="custom-select d-block w-100" name="nam" id="">
							<?php for ($y = 1946; $y <= date('Y'); $y++) { ?>
								<option value="<?php echo $y; ?>" <?php if ($y == $nam) {
																		echo "selected";
																	} ?>><?php echo "Năm " . $y; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="mb-3">
				<div class="row">
					<div class="col-md-5 mb-3">
						<label for="country">Giới tính</label>
						<select class="custom-select d-block w-100" name="gioitinh" id="gioitinh" required="">
						<option value="Nam" <?php if ($row['gioitinh'] == "Nam") {
													echo "selected";
												} ?>>Nam</option>
							<option value="Nữ" <?php if ($row['gioitinh'] == "Nữ") {
													echo "selected";
												} ?>>Nữ</option>
							<option value="Khác" <?php if ($row['gioitinh'] == "Khác") {
														echo "selected";
													} ?>>Khác</option>
						</select>
						<div class="invalid-feedback">
							Please select a valid country.
						</div>
					</div>
				</div>
			</div>													
			<div class="mb-3">
				<label for="email">Email <span class="text-muted">(Optional)</span></label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">@</span>
					</div>
					<input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ Email.." value="<?php echo $row['email']; ?>" required>
					<div class="invalid-feedback" style="width: 100%;">
						Your username is required.
					</div>
				</div>

				<div class="invalid-feedback">
					Please enter a valid email address for shipping updates.
				</div>
			</div>

			<div class="mb-3">
				<label for="address">Địa chỉ</label>
				<input type="text" name="diachi" id="diachi" class="form-control" placeholder="Tổ, thôn...." value="<?php echo $row['diachi']; ?>" required>
				<div class="invalid-feedback">
					Please enter your shipping address.
				</div>
			</div>

			<div class="mb-3">
				<label for="sdt">Số điện thoại</label>
				<td><input type="text" name="sdt" id="sdt" class="form-control" placeholder="Nhập số điện thoại.." value="<?php echo $row['sdt_kh']; ?>" required>
			</div>
			<!-- <div class="col-md-6 float-left px-5">
				
			</div>
			<div class="col-md-6 float-left px-5">
				<button class="btn btn-primary" type="submit">Continue to checkout</button>
			</div>
			<div class="mb-4"></div> -->
			<div class="row">
				<div class="col text-center">
				<input type="submit" class="btn btn-primary mr-5" name="submit" value="Cập nhật">
				<input type="submit" class="btn btn-danger ml-5" name="cancel" value="Hủy bỏ">
				</div>
			</div>
		</form>
	</div>
</div>
<!-- <div class="main_container p-1">
	<div class="h5 text-center alert alert-primary">Sửa thông tin thành viên</div>
	<div class="panel-body">
		<form action="?menu=exec_sua_tt_thanh_vien" method="post">
			<table class="table">
				<tr>
					<td><label for="hoten">Họ và tên:</label></td>
					<td><input type="text" name="hoten" id="hoten" class="form-control" placeholder="Nhập họ và tên bạn.." value="<?php echo $row['hoten']; ?>" required></td>
				</tr>
				<tr>
					<td><label for="cmnd">Số CMND: </label></td>
					<td><input required type="text" name="cmnd" id="cmnd" class="form-control" placeholder="Nhập số CMND.." value="<?php echo $row['cmnd']; ?>"></td>
				</tr>
				<tr>
					<td><label>Ngày sinh: </label></td>
					<td>
						<select style="width: 100px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="ngay" id="ngaysinh" required>
							<?php for ($i = 1; $i <= 31; $i++) { ?>
								<option value="<?php echo $i; ?>" <?php if ($i == $ngay) {
																		echo "selected";
																	} ?>><?php echo "Ngày " . $i; ?></option>
							<?php } ?>
						</select>
						<select style="width: 100px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="thang" required>
							<?php for ($j = 1; $j <= 12; $j++) { ?>
								<option value="<?php echo $j; ?>" <?php if ($j == $thang) {
																		echo "selected";
																	} ?>><?php echo "Tháng " . $j; ?></option>
							<?php } ?>
						</select>
						<select style="width: 120px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="nam" required>
							<?php for ($y = 1946; $y <= date('Y'); $y++) { ?>
								<option value="<?php echo $y; ?>" <?php if ($y == $nam) {
																		echo "selected";
																	} ?>><?php echo "Năm " . $y; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="gioitinh">Giới tính:</label></td>
					<td>
						<select class="form-control" name="gioitinh" id="gioitinh" required>
							<option value="Nam" <?php if ($row['gioitinh'] == "Nam") {
													echo "selected";
												} ?>>Nam</option>
							<option value="Nữ" <?php if ($row['gioitinh'] == "Nữ") {
													echo "selected";
												} ?>>Nữ</option>
							<option value="Khác" <?php if ($row['gioitinh'] == "Khác") {
														echo "selected";
													} ?>>Khác</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="email">Email:</label></td>
					<td><input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ Email.." value="<?php echo $row['email']; ?>" required></td>
				</tr>
				<tr>
					<td><label for="sdt">Số điện thoại:</label></td>
					<td><input type="text" name="sdt" id="sdt" class="form-control" placeholder="Nhập số điện thoại.." value="<?php echo $row['sdt']; ?>" required></td>
				</tr>
				<tr>
					<td><label for="diachi">Địa chỉ:</label></td>
					<td><input type="text" name="diachi" id="diachi" class="form-control" placeholder="Tổ, thôn...." value="<?php echo $row['diachi']; ?>" required></td>
				</tr>
				<tr>
					<td align="center"><input type="submit" class="btn btn-primary" name="submit" value="Cập nhật"></td>
					<td align="center"><input type="submit" class="btn btn-primary" name="cancel" value="Hủy"></td>
				</tr>
			</table>
		</form>
	</div>
</div> -->