<?php 
	session_start(); 
?>
<div class="header col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="logo col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<img class="header_logo" src="images/logo3.png" alt="">
	</div>
	<div class="search col-xs-12 col-sm-8 col-md-6 col-lg-6">
		<form class="" action="?menu=search" action="post">
			<input type="hidden" name="menu" value="search">
			<input class="form-control" type="search" name="search" placeholder="Nhập tên sản phẩm..">
			<button type="submit" class="form-control" name="submit"><span class="fa fa-search"></span></button>
		</form>
	</div>
	<div >
	<?php  
	if(isset($_SESSION['username'])){
		echo "xin chào ".$_SESSION['username']."";
	}
	else
	{
		echo "đăng nhập";
	}
?>
	</div>
	<div class="cart col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<a class="btn btn-warning" href="?menu=gio_hang"><span class="fa fa-shopping-cart"></span> ()</a>
	</div>
	<div class="responsive_log">
		<a href="?menu=dang_nhap" class="btn btn-primary">Đăng nhập</a>
		<a href="?menu=dang_ky" class="btn btn-primary">Đăng ký</a>	
	</div>
</div>
