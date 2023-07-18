<?php
if (!isset($_SESSION['random']) and isset($_SESSION['email']) ) {
include('connect.php');
 if (isset($_POST['new_pass'])) {
  if ($_POST['pass']==$_POST['re-pass']) {
    $pass = $_POST['pass'];
    $pass= md5($pass);
    $pass= md5($pass);
    $sql="update thanh_vien set password='".$pass."' where email='".$_SESSION['email']."'";
    $ex = mysqli_query($connect, $sql);
    if ($ex) { 
      unset($_SESSION['email']);
      unset($_SESSION['random']);
      ?>
      <script>
        $(document).ready(function() {
          document.getElementById('demo').innerHTML = 'Bạn đã thay đổi mật khẩu thành công.hãy nhấn <a href="?menu=thanh_vien">vào đây</a> để đăng nhập';
          $("#register-form").addClass("d-none");
        });
      </script>
    <?php }
  }
} ?>
<div class="main_container">
<h6 id="demo" class="alert alert-success text-center">Hãy nhập mật khẩu mới</h6>
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
                          <input  name="pass" placeholder="Nhập mật khẩu mới" class="form-control disable"  type="password">
                        </div>
                        <div class="input-group mt-3">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input  name="re-pass" placeholder="Nhập lại mật khẩu" class="form-control"  type="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="new_pass" class="btn btn-lg btn-primary btn-block" value="Xác nhận" type="submit">
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
<?php }else{
  echo "<script>window.location=('index.php');</script>";
} ?>