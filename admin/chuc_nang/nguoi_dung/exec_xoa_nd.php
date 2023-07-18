<?php 
include('../connect.php');
if (isset($_GET['ma_nv'])) {
  if ($_GET['ma_nv']==$_SESSION['id_nhan_vien']) {
    echo "<script> alert('Tài khoản này đang được sử dụng.'); location.href='?menu=ql_nhan_vien'; </script>";
  }else{
    $sl="delete from nhan_vien WHERE id = ".$_GET['ma_nv']."";
    $exec= mysqli_query($connect, $sl);
    if ($exec) {
      echo "<script> alert('Đã xóa người dùng.'); location.href='javascript:history.back(-1);'; </script>";
    }else{
      echo "<script> alert('Nhân viên này đang làm việc không thể xóa.'); location.href='javascript:history.back(-1);'; </script>";
    }

  }
}
if (isset($_GET['ma_kh'])) {
  $sl="delete from thanh_vien WHERE ma_kh = ".$_GET['ma_kh']."";
  $exec= mysqli_query($connect, $sl);
  if ($exec) {
    echo "<script> alert('Đã xóa người dùng.'); location.href='javascript:history.back(-1);'; </script>";
  }else{
    echo "<script> alert('Người dùng này đã đặt hàng không thể xóa.'); location.href='javascript:history.back(-1);'; </script>";
  }
}


 ?>
