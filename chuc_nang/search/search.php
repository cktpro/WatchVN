<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Tìm kiếm';
	});
</script>
<?php
include('connect.php');
$search = $_GET['search'];
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$start = 1;
$page = $page - 1;
$limit = 10;
$sql = "select * from san_pham where tensp like '%$search%' or loaisp like '%$search%'  ";
$ex = mysqli_query($connect, $sql);
$total = mysqli_num_rows($ex);
$total = $total / $limit;
$total = ceil($total);
$_SESSION['so_trang'] = $total;
$start = $limit * $page;
?>
<div class="main_container" onload="title()">
	<div class="dst_hphukien">
		<h3 style="margin-top: 3px;">Kết quả tìm kiếm cho từ khóa '<?php echo $_GET['search']; ?>' là: </h3>
	</div>
	<div class="product-list">

		<?php

		$sl = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where loaisp like '%$search%' or tensp like '%$search%' limit " . $start . "," . $limit;
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
						<a class="mask-link bg-primary"  title="" href="?menu=product_info&masp=<?php echo $row['masp']; ?>">Xem chi tiết</a>
					</div>
				</div>
				<div class="product-item-info">
					<div class="product-item-left">
						<p class="name"><a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo ucfirst($row['loaisp']); ?>&nbsp;-&nbsp;<?php echo $row['tensp']; ?>&nbsp;-&nbsp;<?php echo $row['ten_danh_muc']; ?></a></p>
						<p class="price">8.350.000 ₫</p>
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
		<?php if (isset($_GET['page'])) {
			$page_now = $_GET['page'];
		} else {
			$page_now = 1;
		}
		if ($page_now == 1) { ?>
			<script>
				$(document).ready(function() {
					$("#first").addClass("disabled");
				});
			</script>
		<?php } 
		if ($page_now ==$_SESSION['so_trang'] ) { ?>
			<script>
				$(document).ready(function() {
					$("#last").addClass("disabled");
				});
			</script>
		<?php }
		?>
		<div style="clear: both;">
			<ul class="pagination justify-content-center m-0 p-3">
				<li id="first" class="page-item">
					<a class="page-link" href="?menu=<?php echo $_GET['menu']; ?>&search=<?php echo $search ?>&page=1" tabindex="-1">&laquo;</a>
				</li>
				<?php for ($i = 1; $i <= $_SESSION['so_trang']; $i++) {
					if ($i != $page_now) { ?>
						<li class="page-item"><a class="page-link" href="?menu=<?php echo $_GET['menu']; ?>&search=<?php echo $search ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

					<?php  } else { ?>
						<li class="page-item active"><a class="page-link" href="#"><?php echo $page_now; ?></a></li>
					<?php } ?>
				<?php } ?>
				<li id="last" class="page-item">
					<a class="page-link" href="?menu=<?php echo $_GET['menu']; ?>&search=<?php echo $search ?>&page=<?php echo $_SESSION['so_trang']; ?>">&raquo;</a>
				</li>
			</ul>
		</div>
	</div>
</div>