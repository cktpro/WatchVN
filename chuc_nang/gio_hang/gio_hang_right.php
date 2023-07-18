<?php 
if(isset($_SESSION['username'])){
		$tk= "Xin chào ".$_SESSION['username'];
	}
	else
	{
		$tk= "Bạn chưa đăng nhập";
	}
if(isset($_SESSION['giohang'])){
				$cart= count($_SESSION['giohang']);
			} 
		else { $cart=0;} ?>
<div class="shopping_cart">
        <div class="cart_title">Giỏ hàng</div>
        <div class="cart_title"><span style="color: black;" ><?php echo $tk; ?></span></span></div>
        <div class="cart_details"> <?php echo $cart ?> sản phẩm <br />
          <span class="border_cart"></span> Tổng tiền: <span class="price"><?php?></span> </div>
        <div class="cart_icon"><a href="?menu=gio_hang" title="header=[Checkout] body=[&nbsp;] fade=[on]"><img src="images/shoppingcart.png" alt="" width="48" height="48" border="0" /></a></div>
         <div class="cart_title">Giỏ hàng</div>
</div>