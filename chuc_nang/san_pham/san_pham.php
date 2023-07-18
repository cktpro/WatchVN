<!--  -->
<?php
include('connect.php');
?>
  <script>
	$(document).ready(function() {
		$(".nav-item").removeClass("active");
		$("#home-page").addClass("active");
	});
</script>
<div class="main_container">
	<div class="dst_hphukien">
		<h3 style="margin-top: 3px;">Sản Phẩm Mới Nhất</h3>
	</div>
	<div class="product-list">
		<?php
		$sl = "select * from san_pham   join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc order by ngay_them_sp desc  limit 0,5 ";
		$exec = mysqli_query($connect, $sl);
		while ($row = mysqli_fetch_array($exec)) {
		?>
			<div class="product-list-item">
				<div class="product-item-image">
					<div class="hot-and-new">
						<?php if ($row['soluong']<=0) { ?>
							<span class="hot">Hết hàng</span>
						<?php }else{ ?>
						<span class="new">Còn hàng</span>
					<?php } ?>
					</div>
					<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>">
						<img class="lazy" src="images/<?php echo $row['img']; ?>" alt="<?php echo $row['tensp']; ?>">
					</a>
					<div class="mask">
						<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>">
							<div class="mask-title">
								<div class="icon"></div>
								<div class="text">Thông số kỹ thuật</div>
							</div>
							<ul class="mask-list">
								<li>Xuất xứ <?php echo $row['xuat_xu']; ?></li>
								<li>Kiểu máy <?php echo $row['kieu_may']; ?></li>
								<li>Đường kính <?php echo $row['duong_kinh']; ?></li>
								<li>Bảo hành <?php echo $row['bao_hanh']; ?> </li>
							</ul>
						</a>
						<a class="mask-link bg-primary" target="_blank" title="" href="">Xem chi tiết</a>
					</div>
				</div>
				<div class="product-item-info">
					<div class="product-item-left">
						<p class="name"><a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo ucfirst($row['loaisp']); ?> - <?php echo $row['tensp']; ?> - <?php echo $row['ten_danh_muc']; ?></a></p>
						<p class="price"><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></p>
					</div>
					<div class="product-item-right">
						<a href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1" class="add_cart"><img style="width:40px; height:40px;" src="images/bcart.png"></a>
						<a href="?menu=mua_ngay&masp=<?php echo $row['masp']; ?>&soluong=1" class="buy">Mua</a>
					</div>
					<div class="product-item-full-width">
						<ul>
							<li>
								<p>1. Hoàn lại tiền gấp&nbsp;<span style="color: #ff0000;">gấp đôi&nbsp;</span>nếu phát hiện&nbsp;<span style="color: #ff0000;">hàng giả&nbsp;- hàng nhái</span></p>
							</li>
							<li>
								<p>2. Sai Kích Cỡ? Không Ưng Ý? Đổi Hàng Trong &nbsp;<span style="color: #ff0000;">7 Ngày</span></p>
							</li>
						</ul>
					</div>
				</div>

			</div>
		<?php }
		?>
	</div>
</div>
<div class="main_container">
	<div class="dst_hphukien">
		<h3 style="margin-top: 3px;">Sản Phẩm Bán Chạy</h3>
	</div>
	<div class="product-list">
		<?php
		$sl = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc order by luot_mua desc limit 0,5 ";
		$exec = mysqli_query($connect, $sl);
		while ($row = mysqli_fetch_array($exec)) {
		?>
			<div class="product-list-item">
				<div class="product-item-image">
					<div class="hot-and-new">
						<?php if ($row['soluong']<=0) { ?>
							<span class="hot">Hết hàng</span>
						<?php }else{ ?>
						<span class="new">Còn hàng</span>
					<?php } ?>
					</div>
					<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>">
						<img class="lazy" src="images/<?php echo $row['img']; ?>" alt="<?php echo $row['tensp']; ?>">
					</a>
					<div class="mask">
						<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>">
							<div class="mask-title">
								<div class="icon"></div>
								<div class="text">Thông số kỹ thuật</div>
							</div>
							<ul class="mask-list">
								<li>Xuất xứ <?php echo $row['xuat_xu']; ?></li>
								<li>Kiểu máy <?php echo $row['kieu_may']; ?></li>
								<li>Đường kính <?php echo $row['duong_kinh']; ?></li>
								<li>Bảo hành <?php echo $row['bao_hanh']; ?> </li>
							</ul>
						</a>
						<a class="mask-link bg-primary" target="_blank" title="Xem chi tiết chính sách bảo hành tại MobileCity" href="">Xem chi tiết</a>
					</div>
				</div>
				<div class="product-item-info">
					<div class="product-item-left">
						<p class="name"><a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo ucfirst($row['loaisp']); ?> - <?php echo $row['tensp']; ?> - <?php echo $row['ten_danh_muc']; ?></a></p>
						<p class="price"><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></p>
					</div>
					<div class="product-item-right">
						<a href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1" class="add_cart"><img style="width:40px; height:40px;" src="images/bcart.png"></a>
						<a href="?menu=mua_ngay&masp=<?php echo $row['masp']; ?>&soluong=1" class="buy">Mua</a>
					</div>
					<div class="product-item-full-width">
						<ul>
							<li>
								<p>1. Hoàn lại tiền gấp&nbsp;<span style="color: #ff0000;">gấp đôi&nbsp;</span>nếu phát hiện&nbsp;<span style="color: #ff0000;">hàng giả&nbsp;- hàng nhái</span></p>
							</li>
							<li>
								<p>2. Sai Kích Cỡ? Không Ưng Ý? Đổi Hàng Trong &nbsp;<span style="color: #ff0000;">7 Ngày</span></p>
							</li>
						</ul>
					</div>
				</div>

			</div>
		<?php }
		?>
	</div>
</div>
<div class="main_container">
	<div class="dst_hphukien">
		<h3 style="margin-top: 3px;">Sản Phẩm Được Xem Nhiều</h3>
	</div>
	<div class="product-list">
		<?php
		$sl = "select * from san_pham   join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc order by luot_xem desc limit 0,5 ";
		$exec = mysqli_query($connect, $sl);
		while ($row = mysqli_fetch_array($exec)) {
		?>
			<div class="product-list-item">
				<div class="product-item-image">
					<div class="hot-and-new">
						<?php if ($row['soluong']<=0) { ?>
							<span class="hot">Hết hàng</span>
						<?php }else{ ?>
						<span class="new">Còn hàng</span>
					<?php } ?>
					</div>
					<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>">
						<img class="lazy" src="images/<?php echo $row['img']; ?>" alt="<?php echo $row['tensp']; ?>">
					</a>
					<div class="mask">
						<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>">
							<div class="mask-title">
								<div class="icon"></div>
								<div class="text">Thông số kỹ thuật</div>
							</div>
							<ul class="mask-list">
								<li>Xuất xứ <?php echo $row['xuat_xu']; ?></li>
								<li>Kiểu máy <?php echo $row['kieu_may']; ?></li>
								<li>Đường kính <?php echo $row['duong_kinh']; ?></li>
								<li>Bảo hành <?php echo $row['bao_hanh']; ?> </li>
							</ul>
						</a>
						<a class="mask-link bg-primary" target="_blank" title="Xem chi tiết chính sách bảo hành tại MobileCity" href="">Xem chi tiết</a>
					</div>
				</div>
				<div class="product-item-info">
					<div class="product-item-left">
						<p class="name"><a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo ucfirst($row['loaisp']); ?> - <?php echo $row['tensp']; ?> - <?php echo $row['ten_danh_muc']; ?></a></p>
						<p class="price"><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></p>
					</div>
					<div class="product-item-right">
						<a href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1" class="add_cart"><img style="width:40px; height:40px;" src="images/bcart.png"></a>
						<a href="?menu=mua_ngay&masp=<?php echo $row['masp']; ?>&soluong=1" class="buy">Mua</a>
					</div>
					<div class="product-item-full-width">
						<ul>
							<li>
								<p>1. Hoàn lại tiền gấp&nbsp;<span style="color: #ff0000;">gấp đôi&nbsp;</span>nếu phát hiện&nbsp;<span style="color: #ff0000;">hàng giả&nbsp;- hàng nhái</span></p>
							</li>
							<li>
								<p>2. Sai Kích Cỡ? Không Ưng Ý? Đổi Hàng Trong &nbsp;<span style="color: #ff0000;">7 Ngày</span></p>
							</li>
						</ul>
					</div>
				</div>

			</div>
		<?php }
		?>
	</div>
</div>

<!-- <div class="panel panel-primary">
      <div class="panel-heading">Orient</div>
      <div class="panel-body">
<div class="product">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
	<?php
	include('connect.php');
	$sl = 'select * from san_pham where loaisp="orient" limit 0,4';
	$exec = mysqli_query($connect, $sl);
	while ($row = mysqli_fetch_array($exec)) {
	?>
	<div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3">
		<div class="img img-thumbnail col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
		</div>
		<div class="title">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
		</div>
		<div class="cost">
			<span><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></span>
		</div>
		<div class="buy">
			<a class="btn btn-primary" href="?menu=product_info&masp=<?php echo $row['masp']; ?>">Chi tiết</a>
			<a class="btn btn-warning" href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1"><b class="fa fa-cart-plus"></b></a>
		</div>
	</div>
<?php }
?>
	<div class="text-center">
		<a href="?menu=orient" class="text-center btn btn-default">Xem thêm</a>
	</div>
	</div>

</div>
</div>
</div>
<div class="panel panel-primary">
      <div class="panel-heading">Seiko</div>
      <div class="panel-body">
<div class="product">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
	<?php
	include('connect.php');
	$sl = 'select * from san_pham where loaisp="seiko" limit 0,4';
	$exec = mysqli_query($connect, $sl);
	while ($row = mysqli_fetch_array($exec)) {
	?>
	<div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3">
		<div class="img img-thumbnail col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
		</div>
		<div class="title">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
		</div>
		<div class="cost">
			<span><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></span>
		</div>
		<div class="buy">
			<a class="btn btn-primary" href="?menu=product_info&masp=<?php echo $row['masp']; ?>">Chi tiết</a>
			<a class="btn btn-warning" href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1"><b class="fa fa-cart-plus"></b></a>
		</div>
	</div>
<?php }
?>		
	<div class="text-center">
		<a href="?menu=seiko" class="text-center btn btn-default">Xem thêm</a>
	</div>
	</div>

</div>
</div>
</div>
<div class="panel panel-primary">
      <div class="panel-heading">OP</div>
      <div class="panel-body">
<div class="product">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="product">
	<?php
	include('connect.php');
	$sl = 'select * from san_pham where loaisp="op" limit 0,4';
	$exec = mysqli_query($connect, $sl);
	while ($row = mysqli_fetch_array($exec)) {
	?>
	<div class="sp img-thumbnail col-xs-12 col-sm-6 col-md-6 col-lg-3">
		<div class="img img-thumbnail col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
		</div>
		<div class="title">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
		</div>
		<div class="cost">
			<span><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></span>
		</div>
		<div class="buy">
			<a class="btn btn-primary" href="?menu=product_info&masp=<?php echo $row['masp']; ?>">Chi tiết</a>
			<a class="btn btn-warning" href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1"><b class="fa fa-cart-plus"></b></a>
		</div>
	</div>
<?php }
?>		
	<div class="text-center">
		<a href="?menu=op" class="text-center btn btn-default">Xem thêm</a>
	</div>
	</div>

</div>
</div>
</div> -->