<?php
	include('../connect.php');
	$ma_tinhtp= $_POST['ma_tinhtp'];
	$sl= "select * from district where provinceid=".$ma_tinhtp;
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
		echo '<option value="'.$row['districtid'].'">'.$row['type'].' '.$row['name'].'</option>';
		} ?>