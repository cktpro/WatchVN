 <?php 
  session_start();
    include('chuc_nang/quan_tri/security.php');
  if(isset($login)){
    include('chuc_nang/quan_tri/trang_chu.php');
    }
  else{
    if(isset($_POST['cktpro'])){
    include('../connect.php');
    $name= $_POST['username'];
    $pass= $_POST['password'];  
    $pass= md5($pass);
    $pass= md5($pass);
    $sl= "select * from nhan_vien where username='".$name."' and pass='".$pass."'";
    $result= mysqli_query($connect, $sl);
    $row= mysqli_fetch_assoc($result);
    $kt= mysqli_num_rows($result);
    if($kt>0){
      $_SESSION['user']= $_POST['username'];
      $_SESSION['pass']= $_POST['password'];
      $sl2="select * from nhan_vien where username='".$_SESSION['user']."'";
      $result2= mysqli_query($connect, $sl2);
      $row2= mysqli_fetch_array($result2);
      $_SESSION['name']=$row2['hoten'];
      $_SESSION['id_nhan_vien']=$row2['id'];
      echo "<script>alert('Đăng nhập thành công.'); </script>";
      echo "<script>window.location=('http://localhost/watch/admin/');</script>";
    }
    else{
      echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác vui lòng đăng nhập lại.'); </script>";
    }
  }
    include('chuc_nang/quan_tri/login.php');
    
  }
 ?>

