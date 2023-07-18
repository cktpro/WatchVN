<?php
if (!isset($_SESSION['username'])) {
  include('dang_nhap.php');

} else {


?>
  <?php
  include('connect.php');
  $sl2 = "select * from thanh_vien where username='" . $_SESSION['username'] . "'";
  $exec2 = mysqli_query($connect, $sl2);
  $row2 = mysqli_fetch_array($exec2);
  ?>
  <div class="main_container">
    <div class="col-xl-9 float-left p-1">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-danger">Lịch sử mua hàng</h6>
        </div>
        <?php
        $sl2 = 'select * from don_hang join tinh_trang_dh on don_hang.tinh_trang_dh=tinh_trang_dh.id_status join ct_don_hang on don_hang.ma_dh=ct_don_hang.ma_dh where ct_don_hang.ma_kh="' . $row2['ma_kh'] . '" group by don_hang.ma_dh order by ngay_mua desc';
        $exec2 = mysqli_query($connect, $sl2);
        $dem = mysqli_num_rows($exec2);
        if($dem==0){ ?>
        <p class="alert alert-warning my-0">Bạn chưa mua sản phẩm nào bấm <a href="index3.php">vào đây</a> để mua sản phẩm!</p>
        <?php }else{ ?>
          <div style="max-height: 565px;overflow-y: auto;" class="table">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>Mã đơn hàng</th>
                  <th>Sản Phẩm Mua</th>
                  <th>Ngày mua</th>
                  <th>Trạng thái</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_array($exec2)) {

                ?>
                  <tr>

                    <td><?php echo $row['ma_dh']; ?></td>
                    <td><?php echo $row['sp_mua']; ?></td>
                    <td><?php echo $row['ngay_mua']; ?></td>
                    <?php if ($row['tinh_trang_dh'] == '1') { ?>
                      <td><span class="badge badge-dark"><?php echo $row['Mo_ta']; ?></span></td>
                    <?php } ?>
                    <?php if ($row['tinh_trang_dh'] == '2') { ?>
                      <td><span class="badge badge-info"><?php echo $row['Mo_ta']; ?></span></td>
                    <?php } ?>
                    <?php if ($row['tinh_trang_dh'] == '3') { ?>
                      <td><span class="badge badge-warning"><?php echo $row['Mo_ta']; ?></span></td>

                    <?php } ?>
                    <?php if ($row['tinh_trang_dh'] == '4') { ?>
                      <td><span class="badge badge-success"><?php echo $row['Mo_ta']; ?></span></td>
                    <?php } ?>
                    <?php if ($row['tinh_trang_dh'] == '5') { ?>
                      <td><span class="badge badge-danger"><?php echo $row['Mo_ta']; ?></span></td>
                    <?php } ?>
                    <?php if ($row['tinh_trang_dh']=='6') { ?>
                        <td><span class="badge badge-info"><?php echo $row['Mo_ta']; ?></span></td>
                        <?php } ?>
                    <td><a href="?menu=chi_tiet_don_hang&ma_dh=<?php echo $row['ma_dh']; ?>" class="btn btn-sm btn-primary">Chi tiết</a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
<!--           <div class="card-footer"></div> -->
                    <?php }?>
      </div>
    </div>
    <div class="col-xl-3 float-left p-1">
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-secondary align-middle">Thông tin thành viên</h6>
        </div>
        <table class="table">
          <tr>
            <td><label>Họ và tên: </label></td>
            <td><?php echo implode(" ", array($row2['first_name'],$row2['last_name'])); ?></td>
          </tr>
          <tr>
            <td><label>Ngày sinh: </label></td>
            <td>
              <?php
              $ngaysinh = $row2['ngaysinh'];
              $array = explode("-", $ngaysinh);
              $nam = $array[0];
              $thang = $array[1];
              $ngay = $array[2];
              $ngaysinh = $ngay . "-" . $thang . "-" . $nam;
              echo $ngaysinh;
              ?>
            </td>
          </tr>
          <tr>
            <td><label>Giới tính: </label></td>
            <td><?php echo $row2['gioitinh']; ?></td>
          </tr>
          <tr>
            <td><label>Địa chỉ: </label></td>
            <td>
              <?php
              echo $row2['diachi'];
              ?>
            </td>
          </tr>
          <tr>
            <td><label>Email: </label></td>
            <td><?php echo $row2['email']; ?></td>
          </tr>
          <tr>
            <td><label>Số điện thoại: </label></td>
            <td><?php echo $row2['sdt_kh']; ?></td>
          </tr>
          <tr align="center">
            <td colspan="2"><a class="btn btn-primary" style="margin-right: 10px;" href="?menu=sua_tt_thanh_vien">Chỉnh sửa</a><a class="btn btn-secondary" href="?menu=change_password">Đổi mật khẩu</a></td>
          </tr>

        </table>
      </div>
    </div>
  </div>

                    <?php } ?>