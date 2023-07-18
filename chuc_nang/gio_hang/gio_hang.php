<?php
include('connect.php');

if (isset($_SESSION['giohang'])) {
	if (count($_SESSION['giohang']) == 0) {
		unset($_SESSION['giohang']);
?>

		</div>

	<?php
	} else {
		if (isset($_POST['capnhatsp'])) {
			foreach ($_POST['sl_sp'] as $masp => $sp)
				if ($sp == 0 or $sp == "") {
					unset($_SESSION['giohang'][$masp]);
					echo "<script> alert('Đã xóa sản phẩm'); </script>";
					echo "<script> location.href='?menu=gio_hang'; </script>";
				} else {
							if ($sp>$_POST['sl_max']) {
								echo "<script> alert('Hiện chỉ còn ".$_POST['sl_max']." sản phẩm.Vui lòng nhập số lượng nhỏ hơn'); </script>";
								echo "<script> location.href='?menu=gio_hang'; </script>";
							}else{
							$_SESSION['giohang'][$masp] = $sp;
							echo "<script> alert('Cập nhật giỏ hàng thành công'); </script>";
							echo "<script> location.href='?menu=gio_hang'; </script>";
						}				
					}

		}
	?>
		<script type="text/javascript">
			$(document).ready(function() {
				document.title = 'Giỏ hàng (<?php echo $cart; ?>)';
			});
		</script>
		<div class="main_container px-0">
			<form method="post">
				<table class="table">
					<thead class="thead-light"
						<tr style="font-weight: bold;">
							<th>Tên sản phẩm</th>
							<th>Giá sản phẩm</th>
							<th>Hình ảnh</th>
							<th>Số lượng</th>
							<th>Tổng tiền</th>
							<th>Xóa sản phẩm</th>
						</tr>
					</thead>

					<?php
					$tg = 0;
					foreach ($_SESSION['giohang'] as $masp => $sp) {
						$id_array[] = $masp;
					}
					$list_id = implode(',', $id_array);
					include('connect.php');
					$sl = 'select * from san_pham where masp in (' . $list_id . ')';
					$exec = mysqli_query($connect, $sl);
					while ($row = mysqli_fetch_array($exec)) {

					?>
						<tr>
							<input type="hidden" name="sl_max" value="<?php echo $row['soluong'] ?>">
							<td><?php echo $row['tensp'] ?></td>
							<td><img style="width: 50px" src="images/<?php echo $row['img'] ?>"></td>
							<td><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></td>
							<td><input type="text" class="form-control" name="sl_sp[<?php echo $row['masp']; ?>]" size="2" value="<?php echo $_SESSION['giohang'][$row['masp']]; ?>"></td>
							<td><?php $tog = ($row['giasp'] * $_SESSION['giohang'][$row['masp']]);
								echo number_format($tog, 0, ",", ".") . "đ";  ?></td>
							<td ><a class="btn btn-sm btn-danger" href="?menu=del_cart&masp=<?php echo $row['masp']; ?>">Xóa</a></td>
						</tr>
					<?php
						$tg = $tg + $tog;
					}
					?>
					<tr>
						
						<td colspan="4" align="right"><input class="btn btn-sm btn-primary" type="submit" name="capnhatsp" value="Cập nhật sản phẩm"></td>
						<td colspan="2" align="center"><a class="btn btn-sm btn-outline-danger ml-3" href="?menu=del_cart&masp=0">Xóa toàn bộ</a></td>
					</tr>
				</table>
			</form>
			<table class="table">
				<tr style="font-weight: bold;">
					<td  style="font-weight: bold;">Tổng giỏ hàng là:</td>
					<td><span class="text-danger" ><?php echo number_format($tg, 0, ",", ".") . "đ"; ?></span></td>
	
				</tr>
				<tr>
				<td colspan="6" align="center"><form action="?menu=thanh_toan" method="post"><input type="submit" class="btn btn-success btn-lg" name="thanh_toan" value="Thanh toán"></form></td>
				</tr>
			</table>
		<?php }
} elseif (!isset($_SESSION['giohang'])) {
		?>
		<div class="main_container px-0">
			<p class="alert alert-warning my-0">Giỏ hàng bạn trống.. Bấm <a href="?menu=san_pham">vào đây</a> để chọn và mua hàng</p>
		</div>
	<?php
}
	?>
		</div>