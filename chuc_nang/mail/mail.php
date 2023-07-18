<?php
if (isset($_SESSION['email'])) {
    $email=$_SESSION['email'];
    $random=rand(1000,9999);
    //goi thu vien
    include('class.smtp.php');
    include "class.phpmailer.php"; 
    $nFrom = "Hệ Thống WatchVN";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'kimtramboy@gmail.com';  //dia chi email cua ban 
    $mPass = 'tram250399';       //mat khau email cua ban
    $nTo = 'Huudepzai'; //Ten nguoi nhan
    $mTo = $email;   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = "Xin chào!<br>Bạn đã yêu cầu đặt lại mật khẩu.Hãy nhập mã xác nhận dưới đây hoặc nhấn <a href='http://localhost/watch/chuc_nang/mail/new_pass_mail.php?id=".md5($random)."'>vào đây</a> để tiến hành đổi mật khẩu của bạn.Mã xác nhận là: ".$random;   // Noi dung email
    $title = 'Đặt lại mật khẩu của bạn';   //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";    // sever gui mail.
    $mail->Port       = 465;         // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo('info@freetuts.net', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo 'Co loi!';
         
    } else {
        $_SESSION['random']=$random;
        echo "<script>window.location=('?menu=verify');</script>";
    }
}else{
  echo "<script>window.location=('index.php');</script>";
}
?>