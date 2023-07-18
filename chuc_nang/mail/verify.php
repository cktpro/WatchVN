<?php
if (isset($_SESSION['random'])) {
 if (isset($_POST['verify'])) {
  if ($_POST['verify']==$_SESSION['random']) {
    unset($_SESSION['random']);
    echo "<script>window.location=('?menu=new_pass');</script>";
  }else{ ?>
      <script>
  $(document).ready(function() {
    document.getElementById('demo').innerHTML = 'Mã xác nhận bạn nhập không chính xác';
  });
</script>
 <?php }
} 
?>

<div class="main_container">
<h6 id="demo" class="alert alert-success text-center">Mã xác nhận đã được gửi tới email của bản.Vui lòng kiểm tra và nhập mã xác nhận vào bên dưới</h6>
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
                          <input id="verify" name="verify" placeholder="Nhập mã xác nhận" class="form-control"  type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Xác nhận" type="submit">
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