<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Đăng nhập';
	});
</script>
<div class="main_container">
	<div class="col-xl-6 mx-auto mt-3">
		<p class="alert alert-warning">Bạn chưa đăng nhập.. Vui lòng <a href="?menu=dang_nhap">đăng nhập</a> để tiếp tục.<br></p>
		<form action="?menu=exec_dang_nhap" method="post">
			<table class="table">
				<tr>
					<td><label for="user">Tên đăng nhập: </label></td>
					<td><input class="form-control" type="text" name="username" id="user" placeholder="Nhập tên đăng nhập.." required></td>
				</tr>
				<tr>
					<td><label for="pass">Mật khẩu:</label></td>
					<td><input class="form-control" type="password" name="password" id="pass" placeholder="Nhập mật khẩu.." required></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" class="btn btn-primary" value="Đăng nhập"></td>
				</tr>
			</table>
		</form>
		<p class="alert alert-warning">
			Nếu bạn chưa có tài khoản thì có thể nhấn <a href="?menu=dang_ky">đăng ký</a> để tạo tài khoản mới.Hoặc nhấn <a href="?menu=quen_mat_khau">quên mật khẩu</a> nếu bạn quên mật khẩu của của mình</p>

	</div>
</div>