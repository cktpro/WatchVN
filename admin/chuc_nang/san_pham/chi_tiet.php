<?php
	if(!isset($login)){exit();}
?>
<div class="card mx-4">
<table class="table table-bordered">
<?php 
	include('../connect.php');
	$sl= 'select * from san_pham join ct_san_pham on san_pham.masp= ct_san_pham.masp join danh_muc_sp on ct_san_pham.doi_tuong_sd=danh_muc_sp.id_danh_muc where san_pham.masp='.$_GET['masp'];
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
?>
	 <tr>
      <th scope="col">Tên sản phẩm</th>
      <td><?php echo $row['tensp']; ?></td>
    </tr>
    <tr>
      <th scope="col">Hình ảnh</th>
      <td><img style="width: 70px" src="../images/<?php echo $row['img']; ?>"></td>
    </tr>
    <tr>
      <th scope="col">Giá bán</th>
      <td><?php echo $row['giasp']; ?></td>
    </tr>
    <tr>
      <th scope="col">Số lượng hiện còn</th>
      <td><?php echo $row['soluong']; ?></td>
    </tr>
    <tr>
      <th scope="col">Thương hiệu</th>
      <td><?php echo $row['loaisp']; ?></td>
    </tr>
    <tr>
      <th scope="col">Lượt mua</th>
      <td><?php echo $row['luot_mua']; ?></td>
    </tr>
    <tr>
      <th scope="col">Lượt xem</th>
      <td><?php echo $row['luot_xem']; ?></td>
    </tr>
    <tr>
      <th scope="col">Xuất xứ</th>
      <td><?php echo $row['xuat_xu']; ?></td>
    </tr>
    <tr>
      <th scope="col">Kiểu máy</th>
      <td><?php echo $row['kieu_may']; ?></td>
    </tr>
    <tr>
      <th scope="col">Đường kính</th>
      <td><?php echo $row['duong_kinh']; ?></td>
    </tr>
	<tr>
      <th scope="col">Chất liệu vỏ</th>
      <td><?php echo $row['chat_lieu_vo']; ?></td>
    </tr>
    <tr>
      <th scope="col">Chất liệu dây</th>
      <td><?php echo $row['chat_lieu_day']; ?></td>
    </tr>
    <tr>
      <th scope="col">Chất liệu kính</th>
      <td><?php echo $row['chat_lieu_kinh']; ?></td>
    </tr>
    <tr>
      <th scope="col">Độ chịu nước</th>
      <td><?php echo $row['do_chiu_nuoc']; ?></td>
    </tr>
    <tr>
      <th scope="col">Kích thước dây</th>
      <td><?php echo $row['kich_thuoc_day']; ?></td>
    </tr>
    <tr>
      <th scope="col">Thời gian bảo hành</th>
      <td><?php echo $row['bao_hanh']; ?></td>
    </tr>
    <tr>
      <th scope="col">Đối tượng sử dụng</th>
      <td><?php echo $row['ten_danh_muc']; ?></td>
    </tr>		
</table>
</div>
