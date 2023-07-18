<?php 
include('connect.php');
if (isset($_POST['recover-submit'])) {
  $text=$_POST['email'];
  $sql="select * from thanh_vien where username='".$text."' or email='".$text."'";
  $ex = mysqli_query($connect, $sql);
  $kt = mysqli_num_rows($ex);
  if ($kt==1) {
    $row=mysqli_fetch_array($ex);
    $_SESSION['email']=$row['email'];
    echo "<script>window.location=('?menu=mail');</script>";
  }
  } 
?>
<div class="main_container">
<?php if (isset($kt)) {
  if ($kt==0) { ?>
<h6 class="alert alert-danger text-center">Tên tài khoản hoặc email không tồn tại</h6>
<?php }} ?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4 mx-auto my-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Quên mật khẩu?</h2>
                  <p>Bạn có thể khôi phục mật khẩu của mình tại đây.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="Nhập email hoặc tên tài khoản" class="form-control"  type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Quên mật khẩu" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
</div>