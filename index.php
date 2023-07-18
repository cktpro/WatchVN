<?php
include('connect.php');
session_start();
if (isset($_SESSION['giohang'])) {
  $cart = count($_SESSION['giohang']);
} else {
  $cart = 0;
}
$tg = 0;
if (isset($_SESSION['giohang'])) {
  if (count($_SESSION['giohang']) != 0) {
    foreach ($_SESSION['giohang'] as $masp => $sp) {
      $id_array[] = $masp;
    }
    $list_id = implode(',', $id_array);
    $sl = 'select * from san_pham where masp in (' . $list_id . ')';
    $exec = mysqli_query($connect, $sl);
    while ($row = mysqli_fetch_array($exec)) {
      $tg += $row['giasp'] * $_SESSION['giohang'][$row['masp']];
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>WatchVN - Đồng Hồ Số 1 Việt Nam</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <link rel="stylesheet" type="text/css" href="bootstraps.min.css" />
  <script src="https://kit.fontawesome.com/cc5a5d0454.js" crossorigin="anonymous"></script>
  <script src="jquery/jRating.jquerys.js"></script>
  <script src="jquery/jquery.js"></script>
  <script src="js/ajax.js"></script>
</head>

<body>
  <div id="wrap">
    <!-- Main_Header -->
    <div class="header">
      <div class="container">
        <div id="test" class="header-left">
          <a href="index.php" class="logo"><img src="images/apple-logo.png" alt="" border="0" width="237" height="140" /></a>
        </div>
        <div id="test" class="header-right">
          <?php if (isset($_SESSION['username'])) { ?>
            <a href="?menu=thanh_vien">Xin chào(<?php echo $_SESSION['username'] ?>)</a>
            <a href="?menu=logout">Đăng xuất</a>
          <?php } else { ?>
            <a href="?menu=thanh_vien">Đăng nhập</a>
            <a href="?menu=dang_ky">Đăng ký</a>
          <?php } ?>
        </div>
        <div style="display: inline-block;margin-left: 90px; ">
          <div class="header-center">
            <div class="contact-row">
              <div class="phone inline">
                <i><img src="images/call_icon.png" alt=""> 0357081186</i>
              </div>
              <div class="contact inline">
                <i><img src="images/contact-new.png" alt=""> kimtramcap@gmail.com</i>
              </div>
            </div>
            <form class="example" action="?menu=search" action="post">
              <input type="hidden" name="menu" value="search">
              <input type="text" class="search_input" placeholder="Nhập từ khóa tìm kiếm" name="search" />
              <button type="submit"><i><img style="width: 45px;height: 45px;" src="images/google-web-search.png"></i></button>
            </form>
          </div>
          <div class="header-center">
            <div class="cart_header">
              <a href="?menu=gio_hang" title="Giỏ hàng">
                <span class="cart_header_icon">
                  <img src="images/cart-header.png" alt="Cart">
                </span>
                <span class="box_text">
                  <strong class="cart_header_count">Giỏ hàng <span>(<?php echo $cart ?>)</span></strong>
                  <span class="cart_price">
                    (<?php echo number_format($tg, 0, ",", ".") . "đ"; ?>)
                  </span>
                </span>
              </a>
            </div>
            <div class="user_login">
              <a href="?menu=thanh_vien" title="Tài khoản">
                <div class="user_login_icon">
                  <img src="images/user_header.png" alt="Cart">
                </div>
                <div class="box_text">
                  <strong>Tài khoản</strong>
                  <!--<span class="cart_price">Đăng nhập, đăng ký</span>-->
                </div>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Navbar -->
    <div class="bg-dark">
      <div class="container px-0">
        <nav class="navbar navbar-expand-sm bg-dark nav-dark p-0"">
          <ul class=" nav col-xl-12 p-0">
          <li id="home-page" class="nav-item">
            <a class="nav-link" href="index.php">Trang Chủ</a>
          </li>
          <li id="gt-page" class="nav-item">
            <a class="nav-link" href="index.php">Giới Thiệu</a>
          </li>
          <li id="dropdown-page" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Thương Hiệu
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="?menu=casio">Casio</a>
              <a class="dropdown-item" href="?menu=orient">Orient</a>
              <a class="dropdown-item" href="?menu=citizen">Citizen</a>
              <a class="dropdown-item" href="?menu=seiko">Seiko</a>
              <a class="dropdown-item" href="?menu=royalcrown">Royal Crown</a>
              <a class="dropdown-item" href="?menu=skmei">Skmei</a>
              <a class="dropdown-item" href="?menu=doxa">Doxa</a>
              <a class="dropdown-item" href="?menu=tissot">Tissot</a>
            </div>
          </li>
          <li id="male-page" class="nav-item">
            <a class="nav-link" href="?menu=male">Đồng Hồ Nam</a>
          </li>
          <li id="female-page" class="nav-item">
            <a class="nav-link" href="?menu=female">Đồng Hồ Nữ</a>
          </li>
          <li id="coupon-page" class="nav-item">
            <a class="nav-link" href="?menu=coupon">Đồng Hồ Đôi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Liên Hệ</a>
          </li>

          </ul>
        </nav>
      </div>
    </div>
    <!-- Main-Container -->
      <?php include('chuc_nang/menu.php') ?>
    <!-- <div class="main_container">
    
      <div class="dst_hphukien">
        <h3 style="margin-top: 3px;">Sản Phẩm Bán Chạy</h3>
      </div>
      <div class="product-list">
        <?php for ($i = 0; $i < 5; $i++) { ?>

          <div class="product-list-item">
            <div class="product-item-image">
              <div class="hot-and-new">
                <span class="hot">-10%</span>
                <span class="new">Mới</span>
              </div>
              <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html">
                <img class="lazy" src="images/100_PD7131-83A-399x399.jpg" alt="iphone11-pro-max">
              </a>
              <div class="mask">
                <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html">
                  <div class="mask-title">
                    <div class="icon"></div>
                    <div class="text">Thông số kỹ thuật</div>
                  </div>
                  <ul class="mask-list">
                    <li>BH 12 tháng nguồn, màn hình</li>
                    <li>Đổi mới 30 ngày đầu tiên</li>
                    <li>Tặng ốp lưng, dán cường lực</li>
                    <li>Hỗ trợ phần mềm trọn đời máy</li>
                  </ul>
                </a>
                <a class="mask-link" target="_blank" title="Xem chi tiết chính sách bảo hành tại MobileCity" href="/page/chinh-sach-bao-hanh.html">Bảo hành vàng</a>
              </div>
            </div>
            <div class="product-item-info">
              <div class="product-item-left">
                <p class="name"><a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html">iPhone 8 Plus Cũ (64GB, 256GB) - Fullbox</a></p>
                <p class="price">8.350.000 ₫</p>
              </div>
              <div class="product-item-right">
                <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html" class="add_cart"><img style="width:40px; height:40px;" src="images/bcart.png"></a>
                <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html" class="buy">Mua</a>
              </div>
              <div class="product-item-full-width">
                <ul>
                  <li>
                    <p>1. Tặng:&nbsp;<span style="color: #ff0000;">Cường lực&nbsp;-</span>&nbsp;<span style="color: #ff0000;">Ốp lưng&nbsp;- Tai nghe</span> khi mua BHV</p>
                  </li>
                  <li>
                    <p>2. Giảm:&nbsp;<span style="color: #ff0000;">100K</span> áp dụng HSSV mua BHV tại <span style="color: #ff0000;">398 Cầu Giấy</span></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="pagination">
          <a href="#">First</a>
          <a href="#">&laquo;</a>
          <a href="#">1</a>
          <a class="active" href="#">2</a>
          <a href="#">3</a>
          <a href="#">&raquo;</a>
          <a href="#">Last</a>
        </div>
      </div>
    </div>
    <div class="main_container">
      <div class="dst_hphukien">
        <h3 style="margin-top: 3px;">Đồng Hồ Casio</h3>
      </div>
      <div class="product-list">
        <?php for ($i = 0; $i < 5; $i++) { ?>

          <div class="product-list-item">
            <div class="product-item-image">
              <div class="hot-and-new">
                <span class="hot">-10%</span>
                <span class="new">Mới</span>
              </div>
              <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html">
                <img class="lazy" src="images/100_PD7131-83A-399x399.jpg" alt="iphone11-pro-max">
              </a>
              <div class="mask">
                <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html">
                  <div class="mask-title">
                    <div class="icon"></div>
                    <div class="text">Thông số kỹ thuật</div>
                  </div>
                  <ul class="mask-list">
                    <li>BH 12 tháng nguồn, màn hình</li>
                    <li>Đổi mới 30 ngày đầu tiên</li>
                    <li>Tặng ốp lưng, dán cường lực</li>
                    <li>Hỗ trợ phần mềm trọn đời máy</li>
                  </ul>
                </a>
                <a class="mask-link" target="_blank" title="Xem chi tiết chính sách bảo hành tại MobileCity" href="/page/chinh-sach-bao-hanh.html">Bảo hành vàng</a>
              </div>
            </div>
            <div class="product-item-info">
              <div class="product-item-left">
                <p class="name"><a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html">iPhone 8 Plus Cũ (64GB, 256GB) - Fullbox</a></p>
                <p class="price">8.350.000 ₫</p>
              </div>
              <div class="product-item-right">
                <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html" class="add_cart"><img style="width:40px; height:40px;" src="images/bcart.png"></a>
                <a href="https://mobilecity.vn/apple/iphone-8-plus-cu.html" class="buy">Mua</a>
              </div>
              <div class="product-item-full-width">
                <ul>
                  <li>
                    <p>1. Tặng:&nbsp;<span style="color: #ff0000;">Cường lực&nbsp;-</span>&nbsp;<span style="color: #ff0000;">Ốp lưng&nbsp;- Tai nghe</span> khi mua BHV</p>
                  </li>
                  <li>
                    <p>2. Giảm:&nbsp;<span style="color: #ff0000;">100K</span> áp dụng HSSV mua BHV tại <span style="color: #ff0000;">398 Cầu Giấy</span></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="pagination">
          <a href="#">First</a>
          <a href="#">&laquo;</a>
          <a href="#">1</a>
          <a class="active" href="#">2</a>
          <a href="#">3</a>
          <a href="#">&raquo;</a>
          <a href="#">Last</a>
        </div>
      </div>
    </div> -->
    <!-- Main_Foooter -->
    <footer>
      <div class="container">
        <div class="footer-top">
          <div class="footer-top-item">
            <div class="title">
              <div class="all-icon icon-location"></div>
              Liên Hệ
            </div>
            <div class="footer-top-content">
              <div class="address-group">
                <div class="address-group-title">Đà Nẵng</div>
                <div class="address-group-main">
                  <div class="address-group-item">
                    <address>148/49 Ỷ Lan Nguyên Phi<br> Q.Hải Châu<a href="https://www.google.com/maps/place/148+%E1%BB%B6+Lan+Nguy%C3%AAn+Phi,+Ho%C3%A0+C%C6%B0%E1%BB%9Dng+B%E1%BA%AFc,+H%E1%BA%A3i+Ch%C3%A2u,+%C4%90%C3%A0+N%E1%BA%B5ng,+Vi%E1%BB%87t+Nam/@16.0417946,108.2153048,19.75z/data=!4m5!3m4!1s0x314219ea91bc48d3:0xd826aad56e83b135!8m2!3d16.0417252!4d108.2154286" target="_blank">Xem bản đồ</a></address>
                    <p>Điện thoại: <a href="tel:0357081186">0357.081.186</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-top-item">
            <div class="title">
              <div class="all-icon icon-policy"></div>
              quy định - chính sách
            </div>
            <div class="footer-top-content">
              <ul class="footer-list">
                <li><a href="index.php" >Chính sách bảo hành</a></li>
                <li><a href="index.php" >Chính sách vận chuyển</a></li>
                <li><a href="index.php" >Chính sách đổi trả hàng</a></li>
                <li><a href="index.php" >Chính sách giảm giá</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-top-item">

            <div class="title">
              <div class="all-icon icon-connect"></div>
              Liên kết
            </div>
            <div class="footer-top-content">
              <div class="connect-content">
                <div class="connect-content-item">
                  <div class="all-icon icon-facebook"></div>
                  <a target="_blank" href="https://www.facebook.com/donghorox">Facebook</a>
                </div>
                <div class="connect-content-item">
                  <div class="all-icon icon-youtube"></div>
                  <a target="_blank" href="https://www.youtube.com/channel/UC_f_bLPoWhesoKO20CjqmZg">Youtube</a>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-top-item">
            <div class="footer-top-content">
              <div class="icon-footer">
                <div class="all-icon icon-norton"></div>
                <div class="all-icon icon-notification"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="footer-bottom-item">
            <p>© 2020. Copyright by WatchVN®</p>
          </div>
          <div class="footer-bottom-item">
            <p>Tag: <a href="?menu=casio">đồng hồ casio</a>,<a href="?menu=citizen">đồng hồ citizen</a>,<a href="?menu=doxa">đồng hồ doxa</a> </p>
          </div>
          <div class="footer-bottom-item">
            <p>Phát triển bởi: <a href="https://facebook.com/cktprox/" rel="nofollow" target="_blank">CKTPRO</a></p>
          </div>
        </div>
      </div>
    </footer>
    <script>
      function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
      // Add active class to the current button (highlight it)
    </script>
    <script src="js/jquery.slim.mins.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </div>
</body>

</html>