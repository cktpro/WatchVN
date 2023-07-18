<?php
	if(!isset($login)){exit();}

?>
<?php
	if(isset($_GET['menu'])){
	$menu= $_GET['menu'];
	switch($menu){
		case 'menu_ngang': include('chuc_nang/menu_ngang/menu_ngang.php'); break;
		case 'them_menu_ngang': include('chuc_nang/menu_ngang/them_menu_ngang.php'); break;
		case 'ql_menu_ngang': include('chuc_nang/menu_ngang/ql_menu_ngang.php'); break;
		case 'sua_menu_ngang': include('chuc_nang/menu_ngang/sua_menu_ngang.php'); break;
		case 'ql_kho': include('chuc_nang/kho/ql_kho.php'); break;
		case 'ql_khach_hang': include('chuc_nang/nguoi_dung/ql_khach_hang.php'); break;
		case 'ql_nhan_vien': include('chuc_nang/nguoi_dung/ql_nhan_vien.php'); break;
		case 'xuat_hang': include('chuc_nang/kho/don_hang_ship.php'); break;
		case 'binh_luan': include('chuc_nang/binh_luan/binh_luan.php'); break;
		case 'ex_binh_luan': include('chuc_nang/binh_luan/ex_binh_luan.php'); break;
		case 'xuat_kho': include('chuc_nang/kho/ex_xuat_kho.php'); break;
		case 'hoan_kho': include('chuc_nang/kho/ex_hoan_kho.php'); break;
		case 'xoa_menu_ngang': include('chuc_nang/menu_ngang/xoa_menu_ngang.php'); break;
		case 'exec_sua_menu_ngang': include('chuc_nang/menu_ngang/exec_sua_menu_ngang.php'); break;
		case 'exec_them_menu_ngang': include('chuc_nang/menu_ngang/exec_them_menu_ngang.php'); break;
		case 'menu_doc': include('chuc_nang/menu_doc/menu_doc.php'); break;
		case 'them_menu_doc': include('chuc_nang/menu_doc/them_menu_doc.php'); break;
		case 'ql_menu_doc': include('chuc_nang/menu_doc/ql_menu_doc.php'); break;
		case 'sua_menu_doc': include('chuc_nang/menu_doc/sua_menu_doc.php'); break;
		case 'xoa_menu_doc': include('chuc_nang/menu_doc/xoa_menu_doc.php'); break;
		case 'exec_sua_menu_doc': include('chuc_nang/menu_doc/exec_sua_menu_doc.php'); break;
		case 'exec_them_menu_doc': include('chuc_nang/menu_doc/exec_them_menu_doc.php'); break;
		case 'san_pham': include('chuc_nang/san_pham/index.php'); break;
		case 'exec_them_sp': include('chuc_nang/san_pham/exec_them_sp.php'); break;
		case 'exec_sua_sp': include('chuc_nang/san_pham/exec_sua_sp.php'); break;
		case 'ql_sanpham': include('chuc_nang/san_pham/ql_sanpham.php'); break;
		case 'sua_sp': include('chuc_nang/san_pham/sua_sp.php'); break;
		case 'them_sp': include('chuc_nang/san_pham/them_sp.php'); break;
		case 'xoa_sp': include('chuc_nang/san_pham/xoa_sp.php'); break;
		case 'logout': include('chuc_nang/quan_tri/logout.php'); break;
		case 'quan_tri': include('chuc_nang/quan_tri/quan_tri.php'); break;
		case 'quan_ly_admin': include('chuc_nang/quan_tri/quan_ly_admin.php'); break;
		case 'sua_tt_admin': include('chuc_nang/quan_tri/sua_tt_admin.php'); break;
		case 'exec_sua_tt_admin': include('chuc_nang/quan_tri/exec_sua_tt_admin.php'); break;
		case 'xoa_tt_admin': include('chuc_nang/quan_tri/xoa_tt_admin.php'); break;
		case 'exec_them_tt_admin': include('chuc_nang/quan_tri/exec_them_tt_admin.php'); break;
		case 'them_tt_admin': include('chuc_nang/quan_tri/them_tt_admin.php'); break;
		default: include('chuc_nang/quan_tri/content.php'); break;
		case 'them_anh_slide': include('chuc_nang/slideshow/them_anh_slide.php'); break;
		case 'ql_slideshow': include('chuc_nang/slideshow/ql_slideshow.php'); break;
		case 'xoa_anh_slide': include('chuc_nang/slideshow/xoa_anh_slide.php'); break;
		case 'sua_anh_slide': include('chuc_nang/slideshow/sua_anh_slide.php'); break;
		case 'exec_them_anh_slide': include('chuc_nang/slideshow/exec_them_anh_slide.php'); break;
		case 'exec_sua_anh_slide': include('chuc_nang/slideshow/exec_sua_anh_slide.php'); break;
		case 'chi_tiet_don_hang': include('chuc_nang/don_hang/chi_tiet_don_hang.php'); break;
		case 'xoa': include('chuc_nang/don_hang/xoa.php'); break;
		case 'xu_ly': include('chuc_nang/don_hang/xu_ly.php'); break;
		case 'don_hang': include('chuc_nang/don_hang/don_hang.php'); break;
		case 'chi_tiet': include('chuc_nang/san_pham/chi_tiet.php'); break;
		case 'sua_tt_nd': include('chuc_nang/nguoi_dung/exec_sua_tt.php'); break;
		case 'xoa_nd': include('chuc_nang/nguoi_dung/exec_xoa_nd.php'); break;
	}
}
else{
	include('../connect.php');
	$sl2="select * from nhan_vien where username='".$_SESSION['user']."'";
      $result2= mysqli_query($connect, $sl2);
      $row2= mysqli_fetch_array($result2);
      if ($row2['quyen_truy_cap']==1) {
      	include('chuc_nang/quan_tri/dashboard.php');
      }
      elseif($row2['quyen_truy_cap']==2){
      	include('chuc_nang/don_hang/don_hang.php');
      }
      else{
      	include('chuc_nang/kho/ql_kho.php');
      }
	
}
?>