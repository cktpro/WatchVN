<?php 
	include('connect.php');
	$sl= "update san_pham set rate".$_POST['rate']."=rate".$_POST['rate']." + 1 where masp=".$_POST['masp'];
	$exec= mysqli_query($connect, $sl);
	if($exec){
?>
	<p class="alert alert-success">Đánh giá thành công. Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi. Bấm<a href="javascript:history.back(-1);"> vào đây </a>để quay lại trang sản phẩm.</p>
<?php 
	}
	else{
?>
	<p class="alert alert-warning">Đánh giá thất bại. Bấm<a href="javascript:history.back(-1);"> vào đây </a>để quay lại trang sản phẩm.</p>
    
<?php
	}
	?>