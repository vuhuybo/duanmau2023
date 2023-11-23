<?php 
    include '../../PHPMailer/src/Exception.php';
    include '../../PHPMailer/src/PHPMailer.php';
    include '../../PHPMailer/src/SMTP.php';
    include '../../modal/pdo.php';
    include '../../modal/user.php';
    include '../../modal/mailer.php';
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $_POST['email'];
        $verify_code = mt_rand(100000,999999);
        forget_pass($email,$verify_code);
        $mess = ' <h2 style="text-align: center;">Mã xác nhận của bạn là : '.$verify_code.'</h2>';
        $subject = 'Quên mật khẩu ';
        $to = $email;
        sendEmail($to,$mess,$subject);
        $_SESSION['email'] = $email;
        header('location: forget_controller.php');
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
        <h1 class="title_form" style="text-align: center;"> Quên mật khẩu</h1>
        <form action="forget_pass.php" method="post" class="form_verify">
            <input type="text" name="email" placeholder="Nhập email của bạn">
            <input type="submit" value="Next" style="color: white; width: 200px;">
        </form>
    </body>
    </html>