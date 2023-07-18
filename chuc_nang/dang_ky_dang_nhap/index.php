<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Captcha</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
		session_start();
		if(isset($_POST['submit'])){
			$value= $_POST['value'];
			if($value== $_SESSION['captcha']){
				$message="Correct Captcha";
			}
			else{
				$message="Incorrect Captcha";
			}
		}
	?>
	<h1>Tạo Captcha</h1>
	<form action="" method="post">
		<table>
			<tr>
				<td><img src="captcha.php" alt=""></td>
				<td></td>
			</tr>
			<tr>
				<td><input type="text" name="value" placeholder="Nhập captcha.."></td>
				<td><?php if(isset($message)){
					echo $message;
					} ?></td>
			</tr>
			<tr>
				<td><input type="submit" name="submit" value="Submit"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>