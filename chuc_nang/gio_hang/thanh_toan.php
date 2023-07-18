<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Giỏ hàng';
    });

</script>
<?php
	if(isset($_SESSION['username'])){
		include('chuc_nang/gio_hang/thanh_vien_form.php');
	}
	else{
?>
<?php include('chuc_nang/dang_ky_dang_nhap/dang_nhap.php'); ?>
<?php
	}
?>