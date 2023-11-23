<?php
    include '../../modal/pdo.php';
    include '../../modal/user.php';
    include '../../modal/mailer.php';
    session_start();
    if(!empty($_SESSION['err_signup'])){
        $err = $_SESSION['err_signup'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,300;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body style="position: fixed; top: 0; bottom: 0; left: 0; right: 0; display: flex; margin: auto;">
    <form action="signup_controller.php?act=signup" method="post" class="signup">
        <div class="title">
                <h1>Đăng kí</h1>
            </div>

        <div class="input_signup">
            <input type="text" name="user" minlength="6" required placeholder="Tài khoản">
            <div class="err"><?php if(isset($err['user'])){ echo $err['user'];} ?></div>
        </div>
        <div class="input_signup">
            <input type="password" name="pass" require placeholder="Mật khẩu">
            <div class="err"><?php if(isset($err['nopass'])){ echo $err['nopass'];} ?></div>
        </div>
        <div class="input_signup">
            <input type="password" name="re_pass" require placeholder="Nhập lại mật khẩu">
            <div class="err"><?php if(isset($err['pass'])){ echo $err['pass'];} ?></div>
        </div>
        <div class="input_signup">
            <input type="email" name="email" require placeholder="Email">
            <div class="err"><?php if(isset($err['email'])){ echo $err['email'];} ?></div>
        </div>
        <div class="input_signup">
            <input type="text" name="address" placeholder="Địa chỉ">
            <div class="err"></div>
        </div>
        <div class="input_signup">
            <input type="text" name="tel" placeholder="Số điện thoại">
            <div class="err"></div>
        </div>
        <input type="submit" class="btn_more" value="Đăng kí">
    </form>
</body>
</html>