<?php
if(!isset($login)){exit();}
include('../connect.php');
$sl2="select * from nhan_vien where username='".$_SESSION['user']."'";
$result2= mysqli_query($connect, $sl2);
$row2= mysqli_fetch_array($result2);

?>
<div class="col-xl-24 col-lg-7 mb-4">
	<div class="card">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
			<form method="post">
				<div class="d-flex float-right">
					<div class="input-group">
						<div class="input-group-prepend py-auto">
							<select onchange="this.form.submit()" class="custom-select w-100 mr-1" name="order" required="">
								<option value="" disabled selected hidden>Hiển thị theo</option>
								<option value="where soluong>0" >Còn hàng</option>
								<option value="where soluong<=0" >Hết hàng</option>
							</select>
						</div>

					</div>

				</div>
			</form>
		</div>
		<div style="max-height: 500px" class="overflow-auto">
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">Mã sản phẩm</th>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Số lượng còn</th>
						<th scope="col">Giá sản phẩm</th>
						<th scope="col">Hình ảnh</th>
						<th scope="col">Loại sản phẩm</th>
						<th scope="col" colspan="3" align="center">Thao tác</th>
					</tr>
				</thead>
				<?php 
				include('../connect.php');
				if (isset($_POST['order'])) {
					$sl="select * from san_pham ".$_POST['order']." order by ngay_them_sp desc";
				}else{
					$sl="select * from san_pham  order by ngay_them_sp desc";
				}
				
				$exec= mysqli_query($connect, $sl);
				while($row= mysqli_fetch_array($exec)){
					?>
					<tr>
						<td><?php echo $row['masp']; ?></td>
						<td><?php echo $row['tensp']; ?></td>
						<td><?php echo $row['soluong']; ?></td>
						<td><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></td>
						<td>
							<img src="../images/<?php echo $row['img']; ?>"  width="60px" height="80px" alt="">
						</td>
						<td><?php echo ucfirst($row['loaisp']); ?></td>
						<td ><a class="btn btn-primary" href="?menu=chi_tiet&masp=<?php echo $row['masp']; ?>">Chi tiết</a></td>
						<td><a  class="btn btn-dark"  href="?menu=sua_sp&masp=<?php echo $row['masp']; ?>">Sửa</a></td>
						<td><a  class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa không?');" href="?menu=xoa_sp&masp=<?php echo $row['masp']; ?>">Xóa</a></td>
					</tr>
				<?php  } ?>
			</table>
		</div>
	</div>
</div>