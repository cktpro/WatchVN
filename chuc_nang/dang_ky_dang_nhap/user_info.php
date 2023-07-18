
<?php if(isset($_SESSION['giohang'])){
				$cart= count($_SESSION['giohang']);
			} 
		else { $cart=0;} ?>
<?php
	include('connect.php');
	$sl= "select * from thanh_vien where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
?>
<div class="border_box">
        		<div class="product_title"><a href="?menu=thanh_vien">KH:  <?php echo $row['hoten']; ?></a></div>
        			<span>------------------------</span>
        			<div class="product_title"><a href="?menu=gio_hang"><?php echo $cart." Sản Phẩm"; ?></a></a></div>
        			<span>------------------------</span>
        		<div class="product_title"><a href="?menu=change_password">Đổi mật khẩu</a></div>
        			<div class="product_img"><a href=""><img src="" alt="" border="0" /></a></div>
        				<div class="prod_price"><span style="color: grey;"><a href="?menu=logout">Đăng xuất</a></span></div>
      </div>

