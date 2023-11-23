<?php
    include '../../PHPMailer/src/Exception.php';
    include '../../PHPMailer/src/PHPMailer.php';
    include '../../PHPMailer/src/SMTP.php';
    include '../../modal/pdo.php';
    include '../../modal/user.php';
    include '../../modal/mailer.php';
    session_start();
    if(isset($_GET['act']) && $_GET['act'] == 'confirm'){
        $user = load_one_user_email($_SESSION['email']);
        if($_POST['verify_code'] == $user['code_verify']){
            confirmed_user($user['user']);
            header('location: repass.php');
        }else{
            echo 'Mã xác nhận không chính xác';
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
    <h1 style="text-align: center;" class="title_form">Nhập mã xác nhận</h1>
    <form action="forget_controller.php?act=confirm" method="post" style="margin: auto;" class="form_verify">
        <input type="text" name="verify_code" placeholder="Nhập mã xác nhận">
        <input type="submit" value="Xác nhận">
    </form>
</body>
</html>