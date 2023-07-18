<?php
	if(isset($_GET['menu'])){
		$menu= $_GET['menu'];
		switch($menu){ 
			case 'info': include('chuc_nang/infomenu.php'); break;
			case 'san_pham': include('chuc_nang/san_pham/san_pham.php'); break;
			case 'product_info': include('chuc_nang/san_pham/product_info.php'); break;
			case 'gio_hang': include('chuc_nang/gio_hang/gio_hang.php'); break;
			case 'addcart': include('chuc_nang/san_pham/add_cart.php'); break;
			case 'del_cart': include('chuc_nang/gio_hang/del_cart.php'); break;
			case 'chi_tiet_don_hang': include('chuc_nang/dang_ky_dang_nhap/chi_tiet_don_hang.php'); break;
			case 'thanh_toan': include('chuc_nang/gio_hang/thanh_toan.php'); break;
			case 'hoa_don': include('chuc_nang/gio_hang/hoa_don.php'); break;
			case 'dang_ky': include('chuc_nang/dang_ky_dang_nhap/dang_ky.php'); break;
			case 'contact': include('contact.php'); break;
			case 'quen_mat_khau': include('chuc_nang/mail/quen_mat_khau.php'); break;
			case 'mail': include('chuc_nang/mail/mail.php'); break;
			case 'new_pass': include('chuc_nang/mail/new_pass.php'); break;
			case 'verify': include('chuc_nang/mail/verify.php'); break;
			case 'dang_nhap': include('chuc_nang/dang_ky_dang_nhap/dang_nhap.php'); break;
			case 'dang_ky_dang_nhap': include('chuc_nang/dang_ky_dang_nhap/dang_ky_dang_nhap.php'); break;
			case 'exec_dang_ky': include('chuc_nang/dang_ky_dang_nhap/exec_dang_ky.php'); break;
			case 'exec_dang_nhap': include('chuc_nang/dang_ky_dang_nhap/exec_dang_nhap.php'); break;
			case 'casio': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'orient': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'seiko': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'citizen': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'doxa': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'ck': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'royalcrown': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'skmei': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'tissot': include('chuc_nang/san_pham/loai_sp.php'); break;
			case 'male': include('chuc_nang/san_pham/dong_ho_nam/male.php'); break;
			case 'male_loaisp': include('chuc_nang/san_pham/dong_ho_nam/loai_sp.php'); break;
			case 'female_loaisp': include('chuc_nang/san_pham/dong_ho_nu/loai_sp.php'); break;
			case 'coupon_loaisp': include('chuc_nang/san_pham/dong_ho_doi/loai_sp.php'); break;
			case 'female': include('chuc_nang/san_pham/dong_ho_nu/female.php'); break;
			case 'coupon': include('chuc_nang/san_pham/dong_ho_doi/coupon.php'); break;
			case 'thanh_vien_form': include('chuc_nang/gio_hang/thanh_vien_form.php'); break;
			case 'thanh_vien': include('chuc_nang/dang_ky_dang_nhap/thanh_vien.php'); break;
			case 'sua_tt_thanh_vien': include('chuc_nang/dang_ky_dang_nhap/sua_tt_thanh_vien.php'); break;
			case 'exec_sua_tt_thanh_vien': include('chuc_nang/dang_ky_dang_nhap/exec_sua_tt_thanh_vien.php'); break;
			case 'change_password': include('chuc_nang/dang_ky_dang_nhap/change_password.php'); break;
			case 'exec_change_password': include('chuc_nang/dang_ky_dang_nhap/exec_change_password.php'); break;
			case 'search': include('chuc_nang/search/search.php'); break;
			case 'khach_hang': include('chuc_nang/gio_hang/thong_tin_khach_hang.php'); break;
			case 'logout': include('chuc_nang/dang_ky_dang_nhap/logout.php'); break;
			case 'rate': include('chuc_nang/rate/rate.php'); break;
			case 'binh_luan': include('chuc_nang/binh_luan/binh_luan.php'); break;
			case 'exec_binh_luan': include('chuc_nang/binh_luan/exec_binh_luan.php'); break;
			case 'mua_ngay': include('chuc_nang/gio_hang/mua_ngay.php'); break;
			case 'xu_ly': include('chuc_nang/gio_hang/huy_don.php'); break;
			case 'huong_dan_mua_hang': include('chuc_nang/footer/huong_dan_mua_hang.php'); break;
			default: include('chuc_nang/san_pham/san_pham.php');
		}
	}
	else{
		// include('chuc_nang/homepage.php');
		include('banner.php');
		include('chuc_nang/san_pham/san_pham.php');
	}
	
?>