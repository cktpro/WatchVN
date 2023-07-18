<?php
include('connect.php');
$sl = 'select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where san_pham.masp=' . $_GET['masp'];
$exec = mysqli_query($connect, $sl);
$row = mysqli_fetch_array($exec);
$sql = "update san_pham set luot_xem=luot_xem + 1 where masp=" . $_GET['masp'];
$ex = mysqli_query($connect, $sql);
$avg = $row['diem_danh_gia'];
?>
<script>
	$(document).ready(function() {
		$(".jRating").jRating();
	});
</script>
<section class="main_container">
	<div class="product-title">
		<h1 class="title">Đồng hồ <?php echo ucfirst($row['loaisp']); ?>-<?php echo $row['tensp']; ?></h1>
		<div class="rating-show-start">
			<?php 
				if ($avg==0) {
					$star=5;
				} else{
					$star=$avg;
				}
			 for ($i=1; $i <= 5 ; $i++) {
				if ($i<=$star) { ?>
					<i class="fa fa-star" aria-hidden="true"></i>
				<?php	} else { ?>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				<?php }
			} ?>
		</div>
	</div>
	<div class="product-content-box">
		<div class="product-slide-image">
			<div class="product_image">
				<li class="active"><img class="lazy" src="images/<?php echo $row['img']; ?>" alt=""></li>
			</div>
		</div>
		<div class="product-price-box">
			<div class="product-price-content">
				<div class="price-and-color">
					<div class="price_location">
						<p>Giá: </p>
					</div>
					<p class="price"><?php echo number_format($row['giasp'], 0, ",", ".") . " đ"; ?></p>
					<p class="price-old"><?php echo number_format($row['giasp'] * 1.2, 0, ",", ".") . " đ"; ?></p>

				</div>
				<div class="status-box">
					<?php if ($row['soluong']<=0) { ?>
						<p>Tình trạng :<span class="badge badge-danger mx-1" >Tạm thời hết hàng</span></p>
					<?php } else { ?>
						<p>Tình trạng :<span class="badge badge-success mx-1" >Còn hàng</span></p>
					<?php }  ?>
				</div>
			</div>
			<div class="sale-box">
				<p class="sale-box-title">Khuyến mãi</p>
				<ul>
					<li>

						<p>1. Hoàn Lại Tiền&nbsp;<span style="color: #ff0000;">Gấp Đôi&nbsp;</span>Nếu Phát Hiện <span style="color: #ff0000;">Hàng Giả</span>  - <span style="color: #ff0000;">Hàng Nhái</span>.</p>
					</li>
					<li>
						<p>2. Miễn phí giao nhận toàn quốc.</p>
					</li>
					<li>
						<p>3. Bảo hành <span style="color: #ff0000;">1 đổi 1</span>trong vòng 7 ngày</p>
					</li>
				</ul>
			</div>

			<div class="buy-box">
				<a href="?menu=mua_ngay&masp=<?php echo $row['masp']; ?>&soluong=1" class="buy-now">Mua ngay <span>Giao hàng tận nơi miễn phí</span></a>
				<a href="?menu=addcart&masp=<?php echo $row['masp']; ?>&soluong=1" class="buy-pay-later">Thêm giỏ hàng <span>Thêm sản phẩm vào giỏ hàng</span></a>
			</div>
			<div class="product-address">
				<span><strong>0969.120.120</strong> (HN)</span>
				<span><strong>0965.123.123</strong> (HCM)</span>
				<span><strong>096.123.9797</strong> (ĐN)</span>
			</div>
		</div>
		<div class="product-related-box">
			<?php
			include('connect.php');
			$sl2 = "select * from san_pham join ct_san_pham on san_pham.masp=ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where loaisp='".$row['loaisp']."' and doi_tuong_sd='".$row['doi_tuong_sd']."' and tensp!='".$row['tensp']."' limit 0,2 ";
			$exec2 = mysqli_query($connect, $sl2);
			?>
			<div class="product-related-list">
				<?php while ($row2 = mysqli_fetch_array($exec2)) { 
				if ($row2['tensp']!=$row['tensp']) { ?>
				<div class="product-related-item">
					<div class="product-related-image">
						<a target="_blank" href="https://mobilecity.vn/xiaomi/xiaomi-redmi-k30i-5g.html">
							<img class="lazy" src="images/<?php echo $row2['img']; ?>"  alt="" >
						</a>
					</div>
					<div class="product-related-content">
						<p class="name"><a target="_blank" href="https://mobilecity.vn/xiaomi/xiaomi-redmi-k30i-5g.html"><?php echo ucfirst($row2['loaisp']); ?>-<?php echo $row2['tensp']; ?></a></p>
						<p class="price"><?php echo number_format($row2['giasp'], 0, ",", ".") . " đ"; ?></p>
					</div>
				</div>
				<?php } ?> 
			</div>
		<?php } ?>
		</div>
	<div class="product-content-box">
		<div class="product-info-box">
			<div class="product-info-title">Thông số kỹ thuật</div>
			<div class="product-info-content">
				<table>
					<tbody>
						<tr>
							<td>Xuất xứ:</td>
							<td><?php echo $row['xuat_xu'] ?></td>
						</tr>
						<tr>
							<td>Kiểu máy:</td>
							<td><?php echo $row['kieu_may'] ?></td>
						</tr>
						<tr>
							<td>Đường kính:</td>
							<td><?php echo $row['duong_kinh'] ?></td>
						</tr>
						<tr>
							<td>Chất liệu vỏ:</td>
							<td><?php echo $row['chat_lieu_vo'] ?></td>
						</tr>
						<tr>
							<td>Chất liệu dây:</td>
							<td><?php echo $row['chat_lieu_day'] ?></td>
						</tr>
						<tr>
							<td>Chất liệu kính:</td>
							<td><?php echo $row['chat_lieu_kinh'] ?></td>
						</tr>
						<tr>
							<td>Độ chịu nước:</td>
							<td><?php echo $row['do_chiu_nuoc'] ?></td>
						</tr>
						<tr>
							<td>Kích thước dây:</td>
							<td><?php echo $row['kich_thuoc_day'] ?></td>
						</tr>
						<tr>
							<td>Bảo hành:</td>
							<td><?php echo $row['bao_hanh'] ?></td>
						</tr>
						<tr>
							<td>Đối tượng sử dụng:</td>
							<td><?php echo $row['doi_tuong_sd'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="product-video-box">
			<div class="product-video-title">Bình luận & Đánh giá</div>
			<div class="comment-box" id="comment">
				<div class="comment-box-title">
					<h4>Hỏi đáp &amp; đánh giá đồng hồ <?php echo ucfirst($row['loaisp']); ?>-<?php echo $row['tensp']; ?></h4>
				</div>
				<?php
				if (isset($_SESSION['username'])) {
					include('chuc_nang/binh_luan/form_binh_luan.php');
				}else{ ?>
					<div class="d-table w-100 py-2"><p class="alert alert-warning">Vui lòng <a href="?menu=thanh_vien">đăng nhập</a> để bình luận và đánh giá</p></div>
				<?php } ?>
				
			</div>

		</div>
<?php include('chuc_nang/binh_luan/binh_luan.php') ?>
<!-- 		<div class="product-content-right">
			<div class="product-summary" style="position: relative; top: 0px; width: 100%;">
				<p class="product-summary-title">Xiaomi Redmi K30 (RAM 6GB, 8GB)</p>
				<p class="product-summary-price">4.550.000 ₫</p>
				<div class="sale-box">
					<p class="sale-box-title">Khuyến mãi</p>
					<ul>
						<li>
							<p>1. Tặng:&nbsp;<span style="color: #ff0000;">Cường lực&nbsp;-</span>&nbsp;<span style="color: #ff0000;">Ốp lưng&nbsp;- Tai nghe</span> khi mua BHV</p>
						</li>
						<li>
							<p>2. Giảm:&nbsp;<span style="color: #ff0000;">100K</span> áp dụng HSSV mua BHV tại <span style="color: #ff0000;">398 Cầu Giấy</span></p>
						</li>
						<li>
							<p>3. Mua: Dán cường lực 5D chỉ <span style="color: #ff0000;">99K</span></p>
						</li>
						<li>
							<p>4. Giảm 100K khi mua BHV và đặt hàng tại:&nbsp;<a title="https://goo.gl/PH4Pw9" href="https://www.messenger.com/t/dienthoaixiaomigiare.vn">Đây</a></p>
						</li>
						<li>
							<p>5. Cam kết bán iPhone RẺ nhất VN:&nbsp;<a title="iPhone giá RẺ" href="https://goo.gl/6xKTMo">CLICK</a></p>
						</li>
					</ul>
				</div>
				<div class="buy-box">
					<a href="javascript:;" class="buy-now">Mua ngay <span>Giao hàng tận nơi miễn phí</span></a>
					<a target="_blank" href="https://mobilecity.vn/mua-tra-gop/xiaomi-redmi-k30.html" class="buy-pay-later">MUA TRẢ GÓP <span>Lãi suất thấp</span></a>
				</div>
				<div class="product-summary-address">
					<span><strong>0969.120.120</strong> (HN)</span>
					<span><strong>0965.123.123</strong> (HCM)</span>
					<span><strong>096.123.9797</strong> (ĐN)</span>
				</div>
			</div>
		</div> -->
	</div>
</section>
<!-- <div class="center_content">
	<form>
		<input type="hidden" name="menu" value="addcart">
		<input type="hidden" name="soluong" value=1>
		<input type="hidden" name="masp" value="<?php echo $row['masp'] ?>">
		<div class="center_title_bar"><?php echo $row['tensp']; ?></div>
		<div class="prod_box_big">
			<div class="top_prod_box_big"></div>
			<div class="center_prod_box_big">
				<div class="product_img_big"> <a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]"><img class="img-thumbnail" src="images/<?php echo $row['img']; ?>" alt="" border="0" /></a>
					<div class="thumbs"> <a href="" title="header=[Thumb1] body=[&nbsp;] fade=[on]"><img class="img-thumbnail2" src="images/<?php echo $row['img']; ?>" alt="" border="0" /></a> <a href="" title="header=[Thumb2] body=[&nbsp;] fade=[on]"><img class="img-thumbnail2" src="images/<?php echo $row['img']; ?>" alt="" border="0" /></a> <a href="" title="header=[Thumb3] body=[&nbsp;] fade=[on]"><img class="img-thumbnail2" src="images/<?php echo $row['img']; ?>" alt="" border="0" /></a> </div>
				</div>
				<div class="details_big_box">
					<div class="product_title_big"><?php echo $row['tensp']; ?></div>
					<div class="prod_price_big"><span class="reduce">350$</span> <span class="price"><?php echo number_format($row['giasp'], 0, ",", ".") . "đ"; ?></span></div>
					<div class="jRating" data-average="<?php echo $avg; ?>" data-id="1"> </div>
					<span style="font-size: 14px; ">(Bảo hành 12 tháng)</span><br>
					<div class="specifications"> Trạng trái: <span class="blue"><?php if ($row['soluong'] > 0) {
																					echo '<span style="color: blue; font-size: 13px; ">Còn hàng</span>';
																				} else {
																					echo '<span style="color: red; font-size: 13px; ">Hết hàng</span>';
																				} ?></span><br />
						Xuất xứ: <span class="blue"><?php echo $row['xuat_xu']; ?></span><br />
						Kiểu máy: <span class="blue"><?php echo $row['kieu_may']; ?></span><br />
						Đường kính: <span class="blue"><?php echo $row['duong_kinh']; ?></span><br />
						Chất liệu vỏ: <span class="blue"><?php echo $row['chat_lieu_vo']; ?></span><br />
						Chất liệu dây: <span class="blue"><?php echo $row['chat_lieu_day']; ?></span><br />
						Chất liệu kính: <span class="blue"><?php echo $row['chat_lieu_kinh']; ?></span><br />
						Độ chịu nước: <span class="blue"><?php echo $row['do_chiu_nuoc']; ?></span><br />
						Kích thước dây: <span class="blue"><?php echo $row['kich_thuoc_day']; ?></span><br />
						Bảo hành: <span class="blue"><?php echo $row['bao_hanh']; ?></span><br />
						Đối tượng sử dụng: <span class="blue"><?php echo $row['ten_danh_muc']; ?></span><br />
					</div>
					<input type="submit" class="btn btn-outline-info" style="font-size: 12px height:auto;" value="Giỏ hàng">
					<a href="?menu=mua_ngay&masp=<?php echo $row['masp']; ?>&soluong=1" class="btn btn-outline-warning">Mua Ngay</a>
				</div>
			</div>
	</form>
	<div class="bottom_prod_box_big"></div>
</div>
<div style="width: 825px;float: left;margin: 0 0 0 15px;">
	<div class="tab">
		<button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Bình luận</button>


		<button class="tablinks" onclick="openCity(event, 'Paris')">Đánh giá</button>

	</div>

	<div id="London" class="tabcontent">

		<?php if (isset($_SESSION['username'])) {
			include('chuc_nang/binh_luan/binh_luan.php');
		}
		?>
		<table class="table">
			<tr>
				<td class="alert alert-success"><label>Nhận xét</label></td>
			</tr>
			<?php
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			} else {
				$page = 1;
			}
			$start = 1;
			$page = $page - 1;
			$limit = 5;
			$sl2 = "select * from binh_luan join thanh_vien on binh_luan.cmnd=thanh_vien.cmnd where masp=" . $_GET['masp'] . " limit " . $page . "," . $limit;
			$exec2 = mysqli_query($connect, $sl2);
			$total = mysqli_num_rows($exec2);
			$total = $total / $limit;
			$total = ceil($total);
			$start = $limit * $page;
			if (mysqli_fetch_array($exec2) == "") { ?>
				<tr>
					<td>
						<span style="padding-left: 10px;">Chưa có bình luận nào</span>
					</td>
				</tr>
			<?php } ?>
			<?php
			while ($row2 = mysqli_fetch_array($exec2)) {
			?>
				<tr>
					<td>
						<label><?php echo $row2['hoten']; ?>:</label><br>
						<span style="padding-left: 10px;"><?php echo $row2['noi_dung']; ?></span>
					</td>
				</tr>
			<?php } ?>
			<tr>
				<td align="center">
					<nav>
						<ul class="pagination">
							<?php
							for ($i = 1; $i <= $total; $i++) {
							?>
								<li><a href="?menu=&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php } ?>
						</ul>
					</nav>
				</td>
			</tr>
		</table>
	</div>

	<div id="Paris" class="tabcontent">
		<?php include('chuc_nang/rate/rate_form.php'); ?>
	</div>
	<script>
		function openCity(evt, cityName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";

		}
		document.getElementById("defaultOpen").click();
	</script>
</div>

</div>

<head>
	</body> -->