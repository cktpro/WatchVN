                <?php
  if(!isset($login)){exit();
  include('../connect.php');}
?>
                <div class="col-xl-24 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách nhân viên</h6>
                  <a class="m-0 float-right btn btn-success" href="?menu=them_tt_admin">Thêm nhân viên</a>
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
                        <th>Quyền truy cập</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
  $sl="select * from nhan_vien";
  $exec= mysqli_query($connect, $sl);
  $i=1;
  while($row=mysqli_fetch_array($exec)){
?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['hoten']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['sdt']; ?></td>
                        <td><?php echo $row['quyen_truy_cap']; ?></td>
                        <td><a href="?menu=sua_tt_nd&ma_nv=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Sửa</a></td>
                        <td><a href="?menu=xoa_nd&ma_nv=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">Xóa</a></td>
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