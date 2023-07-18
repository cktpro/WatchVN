                <?php
	if(!isset($login)){exit();}
    include('../connect.php');
?>
                <div class="col-xl-24 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Thống kê nhập hàng</h6>
                  <!-- <a class="m-0 float-right btn btn-danger btn-sm" href="#">Xem thêm <i
                      class="fas fa-chevron-right"></i></a> -->
                </div>
                <div style="max-height: 400px" class="table overflow-auto">
                  <table class="table table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th>Mã phiếu nhập</th>
                        <th>Nhân viên nhập</th>
                        <th>Sản phẩm</th>
                        <th>Giá nhập</th>
                        <th>Giá bán</th>
                        <th>Số lượng</th>
                        <th>Ngày nhập</th>
                        <th>Tổng tiền</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php 
	$sl="select * from phieu_nhap_sp join nhan_vien on phieu_nhap_sp.id_nhan_vien=nhan_vien.id join san_pham on phieu_nhap_sp.masp=san_pham.masp ORDER BY ngay_nhap DESC";
	$exec= mysqli_query($connect, $sl);
	while($row=mysqli_fetch_array($exec)){ 
?>
                      <tr>
                      	
                        <td><?php echo $row['ma_pn']; ?></td>
                        <td><?php echo $row['hoten']; ?></td>
                        <td><?php echo $row['tensp']; ?></td>
                        <td><?php echo number_format($row['gia_nhap']) ?></td>
                        <td><?php echo number_format($row['gia_ban']) ?></td>
                        <td><?php echo $row['soluong']; ?></td>
                        <td><?php echo $row['ngay_nhap']; ?></td>
                        <td><?php echo number_format($row['tong_tien_chi']) ?></td>
                        <!-- <td><a href="?menu=chi_tiet_don_hang&ma_dh=<?$row['tong_tien_chi']p,đhp echo $row['ma_dh']; ?>" class="btn btn-sm btn-primary">Chi tiết</a></td> -->
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <hr>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Thống kê xuất hàng</h6>
                  <!-- <a class="m-0 float-right btn btn-danger btn-sm" href="#">Xem thêm <i
                      class="fas fa-chevron-right"></i></a> -->
                </div>
                <div style="max-height: 400px" class="table overflow-auto">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Mã phiếu xuất</th>
                        <th>Nhân viên thực hiện</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày xuất</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
  $sl="select * from phieu_xuat_kho join nhan_vien on phieu_xuat_kho.id_nhan_vien=nhan_vien.id join don_hang on phieu_xuat_kho.madh=don_hang.ma_dh ORDER BY ngay_xuat DESC";
  $exec= mysqli_query($connect, $sl);
  while($row=mysqli_fetch_array($exec)){
?>
                      <tr>
                        <td><?php echo $row['ma_px']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['ma_dh']; ?></td>
                        <td><?php echo $row['ngay_xuat']; ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
<!-- Xuat hang -->
                  