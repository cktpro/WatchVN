<?php
include('../connect.php');
$sl2="select * from nhan_vien where username='".$_SESSION['user']."'";
      $result2= mysqli_query($connect, $sl2);
      $row2= mysqli_fetch_array($result2);
?>
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand bg-gradient-success d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="img/apple-watch.png">
        </div>
        <div class="sidebar-brand-text mx-3">WatchVN</div>
      </a>
      <hr class="sidebar-divider my-0">
      <?php if ($row2['quyen_truy_cap']==1) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Thống Kê</span></a>
      </li>
      <hr class="sidebar-divider">
      <?php } ?>
      <div class="sidebar-heading">
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Quản Lý Sản Phẩm</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu</h6>
            <a class="collapse-item" href="?menu=ql_sanpham">Danh sách sản phẩm</a>
            <a class="collapse-item" href="?menu=ql_sanpham">Cập nhật sản phẩm</a>
          </div>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Bootstrap UI</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bootstrap UI</h6>
            <a class="collapse-item" href="alerts.html">Alerts</a>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
            <a class="collapse-item" href="modals.html">Modals</a>
            <a class="collapse-item" href="popovers.html">Popovers</a>
            <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
          </div>
        </div>
      </li> -->
      <?php if ($row2['quyen_truy_cap']==1) { ?>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Quản lý người dùng</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu</h6>
            <a class="collapse-item" href="?menu=ql_nhan_vien">Quản lý nhân viên</a>
            <a class="collapse-item" href="?menu=ql_khach_hang">Quản lý khách hàng</a>
          </div>
        </div>
      </li>
      <?php } ?>
      <!-- NVkho -->
      <?php if ($row2['quyen_truy_cap']==3 or $row2['quyen_truy_cap']==1) { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Kho hàng</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu</h6>
            <a class="collapse-item" href="?menu=ql_kho">Thống kê nhập/xuất</a>
            <a class="collapse-item" href="?menu=xuat_hang">Xử lý đơn hàng</a>
            <a class="collapse-item" href="?menu=them_sp">Nhập hàng</a>
          </div>
        </div>
      </li>
      <?php } ?>
      <!-- End NVkho -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fab fa-fw fa-wpforms"></i>
          <span>Forms</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Forms</h6>
            <a class="collapse-item" href="form_basics.html">Form Basics</a>
            <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
          </div>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
            <a class="collapse-item" href="datatables.html">DataTables</a>
          </div>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="ui-colors.html">
          <i class="fas fa-fw fa-palette"></i>
          <span>UI Colors</span>
        </a>
      </li> -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
      </div>
      <?php if ($row2['quyen_truy_cap']==2 or $row2['quyen_truy_cap']==1) { ?>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
          aria-controls="collapsePage">
          <i class="fas fa-fw fa-columns"></i>
          <span>Quản lý Đơn Hàng</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu</h6>
            <a class="collapse-item" href="?menu=don_hang">Danh Sách Đơn Hàng</a>
            <a class="collapse-item" href="register.html">Đơn hàng đợi duyệt</a>
            <a class="collapse-item" href="404.html">Đơn hàng đã hủy</a>
            <a class="collapse-item" href="blank.html">Đơn hàng đã giao</a>
          </div>
        </div>
      </li>
      <?php } ?>
<?php if ($row2['quyen_truy_cap']==2 or $row2['quyen_truy_cap']==1) { ?>
      <li class="nav-item">
        <a class="nav-link" href="?menu=binh_luan">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Quản lý bình luận</span>
        </a>
      </li>
      <?php } ?>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>