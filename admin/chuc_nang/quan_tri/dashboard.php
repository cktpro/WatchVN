 <?php
  include('chuc_nang/quan_tri/security.php');
  if(!isset($login)){exit();}
?>
<?php
  include('../connect.php');
  $mon=date('d');
  $sl="select * from don_hang join ct_don_hang on don_hang.ma_dh=ct_don_hang.ma_dh where day(ngay_mua)='$mon'";
  $sl2="select count(ma_kh) from thanh_vien where day(ngay_dang_ky)='$mon'";
  $sl3="select count(id_bl) from binh_luan where day(ngay_binh_luan)='$mon'";
  $exec= mysqli_query($connect, $sl);
  $exec2= mysqli_query($connect, $sl2);
  $exec3= mysqli_query($connect, $sl3);
  $row2= mysqli_fetch_array($exec2);
  $row3= mysqli_fetch_array($exec3);
    $thunhap=0;
    $tg_don=0;
    $sp_dagiao=0;
    $sp_duyet=0;
  while($row= mysqli_fetch_array($exec)){
    $tg_don+=1;
    if($row['tinh_trang_dh']==4){
      $sp_dagiao+=1;
      $thunhap += $row['thanhtien'];
    }
    if($row['tinh_trang_dh']==1){
      $sp_duyet+=1;
    }

  }
function thunhapthang($a){
  include('../connect.php');
  $sl4="select sum(thanhtien) from don_hang join ct_don_hang on don_hang.ma_dh=ct_don_hang.ma_dh where month(ngay_mua)='$a' and tinh_trang_dh=4 ";
  $exec4= mysqli_query($connect, $sl4);
  $row4= mysqli_fetch_array($exec4);
  if ($row4['sum(thanhtien)']=="") {
    return 0;
  }
  else{
    return  $row4['sum(thanhtien)'];
  }
}
for($i = 1; $i <= 12; $i++) {
  $thunhapthang[$i]=thunhapthang($i);
}

?>
 <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thống Kê Tháng <?php echo $mon ; ?></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Thống kê</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Thu Nhập </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($thunhap,0,",",".")." đ"; ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?php echo $sp_dagiao ?></span>
                        <span> Sản phẩm được bán ra</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng đơn hàng</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tg_don; ?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> <?php echo $sp_duyet ?></span>
                        <span>Đơn hàng đợi duyệt</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Khách hàng mới</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $row2['count(ma_kh)']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Số Lượt Bình Luận</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row3['count(id_bl)']; ?></div>
 <!--                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span>Since yesterday</span>
                      </div> -->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-25 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Biểu đồ thu nhập hàng tháng</h6>
                  <!-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div> -->
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myAreaChart"></canvas>
                    <!-- Data -->
                    <?php
                    $arrlength = count($thunhapthang);
                    for($x = 1; $x <= $arrlength; $x++) { ?>
                    <input type="hidden" id="<?php echo $x ?>" data="<?php echo $thunhapthang[$x]; ?>">
                   <?php } ?>
                
                    <!-- End data -->
                  </div>
                </div>
              </div>
            </div>
            <!-- Pie Chart -->
            <!-- <div class="col-xl-4 col-lg-5">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products Sold</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Month <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Select Periode</div>
                      <a class="dropdown-item" href="#">Today</a>
                      <a class="dropdown-item" href="#">Week</a>
                      <a class="dropdown-item active" href="#">Month</a>
                      <a class="dropdown-item" href="#">This Year</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <div class="small text-gray-500">Oblong T-Shirt
                      <div class="small float-right"><b>600 of 800 Items</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="small text-gray-500">Gundam 90'Editions
                      <div class="small float-right"><b>500 of 800 Items</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="small text-gray-500">Rounded Hat
                      <div class="small float-right"><b>455 of 800 Items</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 55%" aria-valuenow="55"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="small text-gray-500">Indomie Goreng
                      <div class="small float-right"><b>400 of 800 Items</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="small text-gray-500">Remote Control Car Racing
                      <div class="small float-right"><b>200 of 800 Items</b></div>
                    </div>
                    <div class="progress" style="height: 12px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30"
                        aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a class="m-0 small text-primary card-link" href="#">View More <i
                      class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </div> -->
            <!-- Invoice Example -->
            <?php
  if(!isset($login)){exit();}
?>
                <div class="col-xl-25 col-lg-7 mb-4">
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
                <div style="max-height: 550px;" class="table overflow-auto">
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
                        <?php if ($row['tinh_trang_dh']=='6') { ?>
                        <td><span class="badge badge-info"><?php echo $row['Mo_ta']; ?></span></td>
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
            <!-- Message From Customer-->
            <!-- <div class="col-xl-4 col-lg-5 ">
              <div class="card">
                <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-light">Message From Customer</h6>
                </div>
                <div>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                      <div class="text-truncate message-title">Hi there! I am wondering if you can help me with a
                        problem I've been having.</div>
                      <div class="small text-gray-500 message-time font-weight-bold">Udin Cilok · 58m</div>
                    </a>
                  </div>
                  <div class="customer-message align-items-center">
                    <a href="#">
                      <div class="text-truncate message-title">But I must explain to you how all this mistaken idea
                      </div>
                      <div class="small text-gray-500 message-time">Nana Haminah · 58m</div>
                    </a>
                  </div>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                      <div class="text-truncate message-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                      </div>
                      <div class="small text-gray-500 message-time font-weight-bold">Jajang Cincau · 25m</div>
                    </a>
                  </div>
                  <div class="customer-message align-items-center">
                    <a class="font-weight-bold" href="#">
                      <div class="text-truncate message-title">At vero eos et accusamus et iusto odio dignissimos
                        ducimus qui blanditiis
                      </div>
                      <div class="small text-gray-500 message-time font-weight-bold">Udin Wayang · 54m</div>
                    </a>
                  </div>
                  <div class="card-footer text-center">
                    <a class="m-0 small text-primary card-link" href="#">View More <i
                        class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
          <!--Row-->

          <!-- <div class="row">
            <div class="col-lg-12 text-center">
              <p>Do you like this template ? you can download from <a href="https://github.com/indrijunanda/RuangAdmin"
                  class="btn btn-primary btn-sm" target="_blank"><i class="fab fa-fw fa-github"></i>&nbsp;GitHub</a></p>
            </div>
          </div> -->
</div>