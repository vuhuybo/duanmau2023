<?php 
    include '../../PHPMailer/src/Exception.php';
    include '../../PHPMailer/src/PHPMailer.php';
    include '../../PHPMailer/src/SMTP.php';
    include '../../modal/pdo.php';
    include '../../modal/user.php';
    include '../../modal/mailer.php';
    session_start();
    $err = [];
    if(isset($_GET['act']) && $_GET['act'] == 'signup'){
        if(isset($_POST['user']) && $_POST['user'] != ''){
            if(strlen($_POST['user']) >= 6){
                $count = count_user($_POST['user']);
                if($count[0]['COUNT(user)'] == 0 ){
                    $user = $_POST['user'];
                    $_SESSION['user'] = $user;
                }else{
                    $err['user'] = 'Tài khoản đã tồn tại';
                }
            }else{
                $err['user'] ='Tài khoản chưa đủ 6 kí tự';
            }
        }
        if(isset($_POST['email']) && $_POST['email'] != ''){
                $count = count_email($_POST['email']);
                if($count[0]['COUNT(email)'] == 0 ){
                    $email = $_POST['email'];
                }else{
                    $err['email'] = 'Email đã đăng kí tài khoản đã tồn tại';
                }
        }else{
                $err['email'] = 'Chưa nhập email';
            }
        if(isset($_POST['pass']) && $_POST['pass'] != ''){
            $pw = $_POST['pass'];
            $pass = password_hash($pw,PASSWORD_DEFAULT);
        }else{
            $err['nopass'] = 'Chưa nhập mật khẩu';
        }
        if($_POST['pass'] != $_POST['re_pass']){
            $err['pass'] = 'Mật khẩu chưa chính xác';
        }
        // if(isset($_POST['email']) && $_POST['email'] != ''){
        //     $email = $_POST['email'];
        // }else{
        //     $err['email'] = 'Chưa nhập email';
        // }
        if(isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if(isset($_POST['tel']) ){
            $tel = $_POST['tel'];
        }
        if($err == []){
            $verify_code = mt_rand(100000,999999);
            add_user($user,$pass,$email,$address,$tel,'2',$verify_code);
            $mess = ' <h2> Thông tin tài khoản của bạn là: </h2> <br>
            <b>Tài khoản:</b> '.$user.' <br>  <b>Mật khẩu:</b> '.$pw.' <br> 
            <h2 style="text-align: center;">Mã xác nhận của bạn là : '.$verify_code.'</h2>';
            $subject = 'Xác nhận đăng kí tài khoản';
            $to = $email;
            sendEmail($to,$mess,$subject);
            $_SESSION['user_name'] = $user;
            header('location: signup_controller.php');
        }else{
            $_SESSION['err_signup'] = $err;
            header('location: signup.php');
        }
    }
    if(isset($_GET['act']) && $_GET['act'] == 'confirm'){
        $verify_code = $_POST['verify_code'];
        $user = load_one_user($_SESSION['user_name']);
        if($verify_code == $user['code_verify']){
            confirmed_user($_SESSION['user_name']);
            header('location: ../index.php');
        }else{
            echo 'Mã xác nhận chưa chính xác';
        }
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
    <body>
        <h1 class="title_form">Nhập lại mã xác nhận</h1>
        <form action="signup_controller.php?act=confirm" method="POST" class="form_verify">
            <input type="text" name="verify_code">
            <input type="submit" value="Xác nhận">
        </form>
    </body>
    </html>