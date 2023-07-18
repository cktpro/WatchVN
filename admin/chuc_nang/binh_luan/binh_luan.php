                <?php
	if(!isset($login)){exit();}
?>
                <div class="col-xl-24 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
                  <!-- <a class="m-0 float-right btn btn-danger btn-sm" href="#">Xem thêm <i
                      class="fas fa-chevron-right"></i></a> -->
                </div>
                <div style="max-height: 500px;" class="table overflow-auto">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Người bình luận</th>
                        <th>Nội dung bình luận</th>
                        <th>Điểm đánh giá</th>
                        <th>Ngày bình luận</th>
                        <th>Phản hồi</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php 
	include('../connect.php');
	$sl="select * from binh_luan join thanh_vien on binh_luan.ma_kh=thanh_vien.ma_kh join san_pham on binh_luan.masp=san_pham.masp ORDER BY ngay_binh_luan DESC";
	$exec= mysqli_query($connect, $sl);
	while($row=mysqli_fetch_array($exec)){ 
    $sl2="select * from phan_hoi where id_bl=".$row['id_bl']."";
    $exec2= mysqli_query($connect, $sl2);
    $count=mysqli_num_rows($exec2);
?>
                      <tr>
                        <td><?php echo $row['tensp']; ?></td>
                        <td><img style="width: 80px" src="../images/<?php echo $row['img']; ?>"></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled=""><?php echo $row['noi_dung_bl']; ?></textarea></td>
                        <td><?php echo $row['so_sao']." sao"; ?></td>
                        <td><?php echo $row['ngay_binh_luan']; ?></td>
                        <?php if ($count!=0) { ?>
                          <td><button type="button" id="<?php echo $row['id_bl'];?>" onClick="add_id(this.id)" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter" disabled>Đã phản hồi</button></td>
                        <?php }else{ ?>
                        <td><button type="button" id="<?php echo $row['id_bl'];?>" onClick="add_id(this.id)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Phản hồi</button></td>
                      <?php } ?>
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <form action="?menu=ex_binh_luan" method="post">
            <input type="hidden" id="id_bl" name="id_bl" value="">
          <h5 class="modal-title" id="exampleModalLongTitle">Nội dung phản hồi</h5>
        </div>
        <div class="modal-body">
          <textarea class="form-control" name="noi_dung_ph" id="exampleFormControlTextarea1" rows="4" required=""></textarea>
        </div>
        <div class="modal-footer">
          <input type="submit" name="add_cmt" class="btn btn-primary" value="Lưu">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>

        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  function add_id(id_bl)
  {
    $("#id_bl").val(id_bl);
  }
</script>
