<?php
	unset($_SESSION['username']);
	echo "<script> alert('Đăng xuất thành công'); location.href='javascript: history.back(-1);';  </script>";
?>