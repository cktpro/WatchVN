<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	$ma_dh= $_GET['ma_dh'];
	$sl="select * from ct_don_hang join don_hang on ct_don_hang.ma_dh=don_hang.ma_dh join san_pham on ct_don_hang.ma_sp=san_pham.masp join tinh_trang_dh on don_hang.tinh_trang_dh=tinh_trang_dh.id_status where don_hang.ma_dh=".$ma_dh;
	$exec= mysqli_query($connect,$sl);
	$exec2= mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);
?>
<div class="col-xl-24 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
                </div>
                <table style="margin: 20px;max-width:96% ">
	<tr>
		<td colspan="2" class="title">Thông tin khách hàng</td>
	</tr>
	<tr>
		<td>Họ tên khách hàng: </td>
		<td><?php echo $row['tenkh']; ?></td>
	</tr>
	<tr>
		<td>Địa chỉ giao hàng: </td>
		<td><?php echo $row['dia_chi']; ?></td>
	</tr>
	<tr>
		<td>Số điện thoại: </td>
		<td><?php echo $row['sdt']; ?></td>
	</tr>
	<tr>
		<td>Email: </td>
		<td><?php echo $row['email']; ?></td>
	</tr>
</table>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Tình trạng</th>
                        <th>Thành tiền</th>
                      </tr>
                    </thead>
			<tbody>
		<?php 
		$tongtien=0;
		while ($row2= mysqli_fetch_array($exec2)) { ?>
		<tr>
			<td><?php echo ucfirst($row2['loaisp'])."-".$row2['tensp']; ?></td>
			<td><?php echo number_format($row2['don_gia'],0,",",".")."đ"; ?></td>
			<td><?php echo $row2['so_luong']; ?></td>
			<?php if ($row['tinh_trang_dh']=='1') { ?>
                        <td><span class="badge badge-dark"><?php echo $row['Mo_ta']; ?></span></td>
                        <?php } ?>
                        <?php if ($row['tinh_trang_dh']=='2') { ?>
                        <td><span class="badge badge-info"><?php echo $row['Mo_ta']; ?></span></td>
                        <?php } ?>
                        <?php if ($row['tinh_trang_dh']=='3') { ?>
                        <td><span class="badge badge-warning"><?php echo $row['Mo_ta']; ?></span></td>
                        
                        <?php } ?>
                         <?php if ($row['tinh_trang_dh']=='4') { ?>
                        <td><span class="badge badge-success"><?php echo $row['Mo_ta']; ?></span></td>
                        <?php } ?>
                        <?php if ($row['tinh_trang_dh']=='5') { ?>
                        <td><span class="badge badge-danger"><?php echo $row['Mo_ta']; ?></span></td>
                        <?php } ?>
			<td><?php echo number_format($row2['thanhtien'],0,",",".")."đ"; ?></td>
		</tr>

	<?php
		$tongtien+=$row2['thanhtien'];
	 } ?>
	</tbody>
	<tr>
		<td>Tổng tiền: </td>
		<td><?php echo number_format($tongtien,0,",",".")."đ"; ?></td>
			</tr>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>

