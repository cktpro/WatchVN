<?php
if(!isset($login)){exit();}
include('../connect.php');
$sl1= "select * from nhan_vien where username='".$_SESSION['user']."'";
$exec1= mysqli_query($connect, $sl1);
$row1= mysqli_fetch_array($exec1);
if($row1['quyen_truy_cap']==1){
	?>
	<div class="container-fluid" id="container-wrapper">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Thêm nhân viên </h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="./">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Thêm nhân viên</li>
			</ol>
		</div>
		<div class="col-xl-8 mx-auto">
			<div class="panel-body">
				<p class="alert alert-secondary"><strong>Lưu ý: </strong>Các thông tin có dấu <span style="color: red;">(*)</span> đều là bắt buộc.</p>
				<form action="?menu=exec_them_tt_admin" method="post" role="form" data-toggle="validator">
					<table class="table">
						<tr>
							<td><label for="user">Tên đăng khập:</label> <span style="color: red;">(*)</span></td>
							<td><input type="text" name="username" id="user" class="form-control" placeholder="Nhập tên đăng nhập.." required></td>
						</tr>
						<tr>
							<td><label for="pass">Mật khẩu:</label> <span style="color: red;">(*)</span></td>
							<td><input type="password" name="password" id="pass" class="form-control" placeholder="Nhập mật khẩu.." required></td>
						</tr>
						<tr>
							<td><label for="repass">Nhập lại mật khẩu:</label> <span style="color: red;">(*)</span></td>
							<td><input type="password" name="re-pass" class="form-control" id="repass" placeholder="Nhập lại mật khẩu.." required></td>
						</tr>
						<tr>
							<td><label for="user">Họ tên:</label> <span style="color: red;">(*)</span></td>
							<td><input type="text" name="hoten" id="hoten" class="form-control" placeholder="Nhập tên đăng nhập.." required></td>
						</tr>
						<tr>
							<td><label for="email">Email:</label> <span style="color: red;">(*)</span></td>
							<td><input type="email" name="email" id="email" class="form-control" placeholder="Nhập địa chỉ Email.." required></td>
						</tr>
						<tr>
							<td><label for="sdt">Số điện thoại:</label> <span style="color: red;">(*)</span></td>
							<td><input type="text" name="sdt" id="sdt" class="form-control" placeholder="Nhập số điện thoại.." required></td>
						</tr>
						<tr>
							<td><label for="tinhtp">Quyền truy cập:</label> <span style="color: red;">(*)</span></td>
							<td>
								<select class="form-control" name="quyen_truy_cap" id=quyen_truy_cap" required>
									<option value="">Quyền truy cập</option>
									<option value="1">Quản lý</option>
									<option value="2">Nhân viên bán hàng</option>
									<option value="3">Nhân viên kho</option>

								</select>
							</td>
						</tr>
						<tr>
							<td align="center"><input type="submit" class="btn btn-primary" name="add_admin" value="Đăng ký"></td>
						</form>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

<?php }
else{
	echo "<script> alert('Bạn không có quyền truy cập vào trang này.');  </script>";
}
?>