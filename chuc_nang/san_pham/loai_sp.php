<?php
include('connect.php');
$loai_sp = $_GET['menu'];
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$start = 1;
$page = $page - 1;
$limit = 10;
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp where doi_tuong_sd=".$id." and loaisp like '%$loai_sp%'";
}else{
	$sql = "select * from san_pham where loaisp like '%$loai_sp%'";
}
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
		$("#dropdown-page").addClass("active");
		document.title = "Đồng hồ <?php echo ucfirst($loai_sp) ?>";
	});
</script>
<div class="container py-5 mt-2" style='background-image: url("images/banner_loaisp.jpg");'>
	<div class="container my-5 px-0 text-center">
	<a href="?menu=casio" class="btn btn-lg btn-primary mx-1">CASIO</a>
	<a href="?menu=orient" class="btn btn-lg btn-secondary mx-1">ORIENT</a>
	<a href="?menu=citizen" class="btn btn-lg btn-success mx-1">CITIZEN</a>
	<a href="?menu=seiko" class="btn btn-lg btn-warning mx-1">SEIKO</a>
	<a href="?menu=royalcrown" class="btn btn-lg btn-danger mx-1">ROYAL CROWN</a>
	<a href="?menu=skmei" class="btn btn-lg btn-info mx-1">SKMEI</a>
	<a href="?menu=doxa" class="btn btn-lg btn-outline-warning mx-1">DOXA</a>
	<a href="?menu=tissot" class="btn btn-lg btn-outline-danger mx-1">TISSOT</a>
	<a href="?menu=ck" class="btn btn-lg text-danger bg-light mx-1">CALVIN KLEIN</a>
</div>
</div>
<div class="main_container" onload="title()">
	<div class="dst_hphukien">
		<h3 class="col-md-5 float-left mt-2 px-0">Đồng Hồ <?php echo ucfirst($loai_sp) ?></h3>
		<?php include('sort.php') ?>
			<div class="float-right mt-2 pt-1">
			<a href="?menu=<?php echo $loai_sp ?>&id=1" class="btn btn-sm  btn-outline-primary">Nam</a>
			<a href="?menu=<?php echo $loai_sp ?>&id=2" class="btn btn-sm  btn-outline-primary">Nữ</a>
			<a href="?menu=<?php echo $loai_sp ?>&id=3" class="btn btn-sm  btn-outline-primary">Cặp Đôi</a>
		</div>
	</div>
	<?php if ($total==0) { ?>
		<p id="alert" class="alert alert-primary mb-0 mt-2">Hiện chưa có sản phẩm nào</p>
	<?php } ?>
	
	<div class="product-list">

		<?php
		if (isset($_GET['id'])) {
			$id=$_GET['id'];
			$sl = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where doi_tuong_sd=".$id." and loaisp like '%$loai_sp%' order by " . $_SESSION['sort'] . " limit " . $start . "," . $limit;

		}else{
			$sl = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where loaisp like '%$loai_sp%' order by " . $_SESSION['sort'] . " limit " . $start . "," . $limit;
		}
		
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
						<a class="mask-link" target="_blank" title="Xem chi tiết chính sách bảo hành tại MobileCity" href="/page/chinh-sach-bao-hanh.html">Xem chi tiết</a>
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
		<?php if ($total!=0) {
			include('chuc_nang/phan_trang/phan_trang.php');
		} ?>
	</div>
</div>