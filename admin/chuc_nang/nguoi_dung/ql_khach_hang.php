                <?php
	if(!isset($login)){exit();
  include('../connect.php');}
?>
                <div class="col-xl-24 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách thành viên</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>STT</th>
                        <th>Tên đăng nhập</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Ngày đăng ký</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php 
	$sl="select * from thanh_vien";
	$exec= mysqli_query($connect, $sl);
  $i=1;
	while($row=mysqli_fetch_array($exec)){ 
?>
                      <tr>
                      	<td><?php echo $i; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo implode(" ", array($row['first_name'],$row['last_name'])); ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['sdt_kh']; ?></td>
                        <td><?php echo $row['ngay_dang_ky']; ?></td>
                        <td><a href="?menu=sua_tt_nd&ma_kh=<?php echo $row['ma_kh'] ?>" class="btn btn-sm btn-primary">Sửa</a></td>
                        <td><a href="?menu=xoa_nd&ma_kh=<?php echo $row['ma_kh'] ?>" class="btn btn-sm btn-danger">Xóa</a></td>
                        
                      </tr>
                      <?php 
                      $i +=1;
                    } ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>