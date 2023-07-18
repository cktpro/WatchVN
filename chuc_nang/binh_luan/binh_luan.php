	<?php 
	include('connect.php'); 
	$masp=$_GET['masp'];
	$sql= "select * from binh_luan  join thanh_vien on binh_luan.ma_kh=thanh_vien.ma_kh where masp='".$masp."'";
	$execc= mysqli_query($connect, $sql);
	$rowcount=mysqli_num_rows($execc);
	?>
	<div class="comment-box-title"><h4>Bình luận</h4></div>
	<?php if ($rowcount==0) { ?>
		<div class="d-table w-100 py-2" ><p class="alert alert-danger" >Hiện chưa có bình luận hay đánh giá nào</p></div>
	<?php } ?>
	<div class="comment-list">
<?php while ($row= mysqli_fetch_array($execc)) { ?>
		<div class="comment-item">
			<div class="comment-avatar">
				<span class="avatar"><?php echo substr($row['last_name'],0,1); ?></span>
			</div>
			<div class="comment-info">
				<div class="comment-title">
					<div class="comment-name">
						<p class="name"><?php echo $row['last_name'] ?></p>
						<p class="phone"><?php echo str_replace(substr($row['sdt_kh'], -3),"xxx",$row['sdt_kh']); ?></p>
					</div>
					<div class="comment-star">
						<?php for ($i=1; $i <=5 ; $i++) {
							if ($i<=$row['so_sao']) { ?>
								<i class="fa fa-star" aria-hidden="true"></i>
						<?php	}else{ ?>
								<i class="fa fa-star-o" aria-hidden="true"></i>
						<?php } }?>
						
					</div>
					</div>
					<div class="comment-content"><?php echo $row['noi_dung_bl'] ?></div>
					<div class="comment-footer">
						<p class="time"><?php echo $row['ngay_binh_luan'] ?></p>
					</div>
				</div>
				<?php 
				$sql2= "select * from phan_hoi  join nhan_vien on phan_hoi.id_nhan_vien=nhan_vien.id join phan_quyen on nhan_vien.quyen_truy_cap=phan_quyen.id_phan_quyen where id_bl='".$row['id_bl']."'";
				$execc2 = mysqli_query($connect, $sql2);
				$rowcount2=mysqli_num_rows($execc2);
				 ?>
				 <?php if ($rowcount2!=0) {
				 while ($row2=mysqli_fetch_array($execc2)) { ?>
			<div class="comment-child-list">
					<div class="comment-child-item">
						<div class="comment-avatar">
							<img class="avatar_thumb" src="images/admin-male.png" alt="" style="width:40px;height:40px;">
						</div>
						<div class="comment-info">
							<div class="comment-title">
								<div class="comment-name">
									<p class="name"><?php echo $row2['hoten'] ?></p>
									<p class="badge badge-warning"><?php echo $row2['ten_phan_quyen'] ?></p>
								</div>
							</div>
							<div class="comment-content"><?php echo $row2['noi_dung_ph'] ?></div>
							<div class="comment-footer">
								<p class="time"><?php echo $row2['ngay_phan_hoi'] ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php } } ?>

			</div>
  <?php } ?>
		</div>
	</div>