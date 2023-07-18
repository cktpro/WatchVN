                <?php
	if(!isset($login)){exit();}
?>
                <div class="col-xl-24 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Thông kê đơn hàng</h6>
                  <form method="post">
                    <div class="d-flex float-right">
                      <div class="input-group">
                        <div class="input-group-prepend py-auto">
                          <select onchange="this.form.submit()" class="custom-select w-100 mr-1" name="order" required="">
                            <option value="" disabled selected hidden>Hiển thị theo</option>
                            <option value="1" >Đang đợi duyệt</option>
                            <option value="2" >Chờ giao hàng</option>
                            <option value="3" >Đang giao hàng</option>
                            <option value="4" >Giao thành công</option>
                            <option value="5" >Đã bị hủy</option>
                            <option value="6" >Đã hoàn kho</option>
                          </select>
                        </div>

                      </div>

                    </div>
                  </form>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Mã đơn hàng</th>
                        <th>Khách hàng</th>
                        <th>Ngày mua</th>
                        <th>Trạng thái</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php 
	include('../connect.php');
  if (isset($_POST['order'])) {
    $sl="select * from don_hang join tinh_trang_dh on don_hang.tinh_trang_dh=tinh_trang_dh.id_status where tinh_trang_dh=".$_POST['order']." ORDER BY ngay_mua DESC";
  }else{
    $sl="select * from don_hang join tinh_trang_dh on don_hang.tinh_trang_dh=tinh_trang_dh.id_status ORDER BY ngay_mua DESC";
  }
	
	$exec= mysqli_query($connect, $sl);
	while($row=mysqli_fetch_array($exec)){ 
?>
                      <tr>
                      	
                        <td><?php echo $row['ma_dh']; ?></td>
                        <td><?php echo $row['tenkh']; ?></td>
                        <td><?php echo $row['ngay_mua']; ?></td>
                        <?php if ($row['tinh_trang_dh']=='1') { ?>
                        <td><span class="badge badge-dark"><?php echo $row['Mo_ta']; ?></span></td>
                        <td><a class="btn btn-sm btn-outline-primary"  href="?menu=xu_ly&ma_dh=<?php echo $row['ma_dh']; ?>&stt=1">Duyệt đơn hàng</a></td>
                        <?php } ?>
                        <?php if ($row['tinh_trang_dh']=='2') { ?>
                        <td><span class="badge badge-info"><?php echo $row['Mo_ta']; ?></span></td>
                        <td></td>
                        <?php } ?>
                        <?php if ($row['tinh_trang_dh']=='3') { ?>
                        <td><span class="badge badge-warning"><?php echo $row['Mo_ta']; ?></span></td>
                        <td><a class="btn btn-sm btn-outline-success"  href="?menu=xu_ly&ma_dh=<?php echo $row['ma_dh']; ?>&stt=2">Xác nhận thanh toán</a></td>
                        <?php } ?>
                         <?php if ($row['tinh_trang_dh']=='4') { ?>
                        <td><span class="badge badge-success"><?php echo $row['Mo_ta']; ?></span></td>
                        <td></td>
                        <?php } ?>
                        <?php if ($row['tinh_trang_dh']=='5') { ?>
                        <td><span class="badge badge-danger"><?php echo $row['Mo_ta']; ?></span></td>
                        <td></td>

                        <?php } ?>
                        <?php if ($row['tinh_trang_dh']=='6') { ?>
                        <td><span class="badge badge-info"><?php echo $row['Mo_ta']; ?></span></td>
                        <td></td>
                        <?php } ?>
                        <td><a href="?menu=chi_tiet_don_hang&ma_dh=<?php echo $row['ma_dh']; ?>" class="btn btn-sm btn-primary">Chi tiết</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>