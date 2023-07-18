<?php 
if(isset($_POST['order'])){
    $_SESSION['sort']=$_POST['order'];
	switch($_SESSION['sort']){
		case 'ngay_them_sp desc': $show="Mới nhất";break;
		case 'luot_xem desc' : $show="Phổ biến nhất" ;break ;
		case 'giasp desc':$show="Giá cao nhất";break;
		case 'giasp asc':$show="Giá thấp nhất";break;
		default:$show="Hiển thị theo";
	}
	
}else{$show="Hiển thị theo";}
if(!isset($_SESSION['sort'])){
	$_SESSION['sort']="ngay_them_sp";
}
?>

<div class="col-md-2 float-right mt-2">
		<form method="post">
				<div class="d-flex float-right">
					<div class="input-group">
						<div class="input-group-prepend py-auto">
							<select onchange="this.form.submit()" class="custom-select w-100 mr-1" name="order" required="">
								<option value="" disabled selected hidden><?php echo $show ?></option>
								<option value="ngay_them_sp desc">Mới nhất</option>
								<option value="luot_xem desc">Phổ biến nhất</option>
								<option value="giasp desc">Giá cao nhất</option>
								<option value="giasp asc">Giá thấp nhất</option>

							</select>
						</div>

					</div>

				</div>
			</form>
		</div>