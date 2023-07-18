<?php 
$sql= "select * from thanh_vien where username='".$_SESSION['username']."'";
$ex= mysqli_query($connect, $sql);
$row2= mysqli_fetch_array($ex);
$cmnd= $row2['ma_kh'];
$tenkh= implode(" ",array($row2['first_name'],$row2['last_name']));
$email= $row2['email'];
$sdt= $row2['sdt_kh'];
$diachi= $row2['diachi'];
foreach($_SESSION['giohang'] as $masp=> $sp){
	$id_array[]= $masp;
}
$list_id= implode(',',$id_array);
$sl= 'select * from san_pham where masp in ('.$list_id.')';
$exec= mysqli_query($connect, $sl);
$sp_mua="";
$tg=0;
$list_product="";

?>
<script type="text/javascript">

	$(document).ready(function() {
		document.title = 'Giỏ hàng';
	});

</script>
<div class="main_container px-0">
	<div class="col-xl-8 float-left mt-3">
		<table class=" table table-bordered text-center">
			<thead>
				<tr>
					<th colspan="6">Thông tin sản phẩm</th>
				</tr>
				<tr>
					<thead class="thead-light">
						<th scope="col">Mã sản phẩm</th>
					<th scope="col">Tên Sản Phẩm</th>
					<th scope="col">Hình Ảnh</th>
					<th scope="col">Đơn Giá</th>
					<th scope="col">Số Lượng</th>
					<th scope="col">Thành Tiền</th>
					</thead>
				</tr>
			</thead>
			<?php 
			while($row= mysqli_fetch_array($exec)){
				$soluong= $_SESSION['giohang'][$row['masp']];
				$gia_sp=$row['giasp'];
				$masp= $row['masp'];
				$tensp=$row['tensp'];
				$sp_mua=$sp_mua." - ".$tensp;
				?>

				<tbody>
					<tr>
						<th scope="row"><?php echo $row['masp'] ?></th>
						<td><?php echo $row['tensp']; ?></td>
						<td><img style="width: 70px" src="images/<?php echo $row['img'];  ?>"></td>
						<td><?php echo number_format($gia_sp,0,",",".")."đ"; ?></td>
						<td><?php echo $soluong; ?></td>
						<td><?php echo number_format(($gia_sp*$soluong),0,",",".")."đ"; ?></td>
					</tr>
				</tbody>

				<?php
				$tg= $tg+ ($soluong*$gia_sp);
			}

			?>
			<tr height="40px" style="font-weight: bold;">
				<td colspan="2">Tổng giá trị đơn hàng:</td>
				<td colspan="4"><span class="text-danger"><?php echo number_format($tg,0,",",".")."đ"; ?></span></td>
			</tr>

		</table>
	</div>
	<div class="col-xl-4 float-left mt-3">
		<table class="table table-bordered" >
				<tr>
					<th>Vui lòng xác nhận địa chỉ giao hàng</th>
				</tr>
			<tr>
				<td>
					<form id="form" action="?menu=hoa_don" method="post">
						<input type="hidden" name="ma_sp" value="<?php echo $masp; ?>">

						<input type="hidden" name="sp_mua" value="<?php echo trim($sp_mua," - "); ?>">

						<input type="hidden" name="so_luong" value="<?php echo $soluong; ?>">

						<input type="hidden" name="gia_sp" value="<?php echo $gia_sp; ?>">

						<input type="hidden" name="tenkh" value="<?php echo $tenkh; ?>">
						<input type="hidden" name="cmnd" value="<?php echo $cmnd; ?>">
						<input type="hidden" name="email" value="<?php echo $email; ?>">
						<input type="hidden" name="sdt" value="<?php echo $sdt; ?>">

						<input type="hidden" name="list_id" value="<?php echo $list_id; ?>">
					
				
				<label for="tinhtp">Địa chỉ giao hàng:</label> <span style="color: red;">(*)</span>
				<textarea class="form-control" name="diachi" id="diachi" rows="3"><?php echo $row2['diachi'] ?></textarea>
				<div class="text-center mt-3">
					<input class="btn btn-primary mr-4" type="submit" name="submit" value="Mua hàng">
					<input class="btn btn-secondary ml-4" type="submit" name="cancel" value="Hủy bỏ">
				</div>

			</form>
			</table>
		</div>
	
					
</div>