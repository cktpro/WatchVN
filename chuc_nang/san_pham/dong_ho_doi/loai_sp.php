<?php
include('connect.php');
if (isset($_GET['id'])) {
	$_SESSION['id_lsp']=$_GET['id'];
}
$loai_sp = $_SESSION['id_lsp'];
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$start = 1;
$page = $page - 1;
$limit = 10;

$sql = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where ct_san_pham.doi_tuong_sd like 3 and loaisp like '%$loai_sp%'";
$ex = mysqli_query($connect, $sql);
$total = mysqli_num_rows($ex);
$total = $total / $limit;
$total = ceil($total);
$_SESSION['so_trang'] = $total;
$start = $limit * $page;
?>
<script>
	$(document).ready(function() {
		$(".nav-item").removeClass("active");
		$("#coupon-page").addClass("active");
		document.title = "Đồng hồ <?php echo ucfirst($loai_sp) ?> đôi";
	});
</script>
<div class="container px-0 mt-2"><img style="width:100%" src="images/banner-doi.webp" alt=""></div>
<div class="main_container" onload="title()">
	<div class="dst_hphukien">
		<h3 class="col-md-5 float-left mt-2 px-0">Đồng Hồ <?php echo ucfirst($loai_sp) ?> Đôi</h3>
		<?php include('../watch/chuc_nang/san_pham/sort.php'); ?>
		<div class="float-right mt-2 pt-1">
			<a href="?menu=coupon_loaisp&id=casio" class="btn btn-sm  btn-outline-primary">Casio</a>
			<a href="?menu=coupon_loaisp&id=ck" class="btn btn-sm  btn-outline-primary">Calvin Klein</a>
			<a href="?menu=coupon_loaisp&id=tissot" class="btn btn-sm  btn-outline-primary">Tissot</a>
		</div>
	</div>
	<div class="product-list">

		<?php
		$sl = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where ct_san_pham.doi_tuong_sd like 3 and loaisp like '%$loai_sp%' order by " . $_SESSION['sort'] . " limit " . $start . "," . $limit;
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
						<a class="mask-link bg-primary" target="_blank" title="Xem chi tiết chính sách bảo hành tại MobileCity" href="?menu=product_info&masp=<?php echo $row['masp']; ?>">Xem chi tiết</a>
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
		<?php include('chuc_nang/phan_trang/phan_trang.php') ?>
	</div>
</div>