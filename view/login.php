<?php 
    include '../modal/pdo.php';
    include '../modal/user.php';
    $err = [];
    session_start();
    if(isset($_GET['act']) && $_GET['act'] != ''){
        if(isset($_POST['username']) && $_POST['username'] != ''){
            $username = $_POST['username'];
            $user = load_one_user($username);
            if($user){
                if(isset($_POST['password']) && $_POST['password'] != ''){
                    $password = $_POST['password'];               
                    if(password_verify($password,$user['pass']) && $user['code_verify'] == 0){
                        $_SESSION['uid'] = $user['id'];
                        $_SESSION['role'] = $user['role'];
                        if($user['role'] == 2){
                            header('location: ../index.php?act=home');
                        }else{
                            header('location: ../admin/index.php');
                        }
                    }else{
                        $err['pass'] = 'Mật khẩu không chính xác';
                    }
                }else{
                    $err['pass'] = 'Chưa nhập mật khẩu';
                }     
            }else{
                $err['user']= 'Tài khoản không chính xác';
            }
        }else{
            $err['user']= 'Chưa nhập tài khoản';
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fontawesome-free-6.4.2-web/fontawesome-free-6.4.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,500;0,700;1,300;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body style="position: fixed; top: 0; bottom: 0; left: 0; right: 0; display: flex; margin: auto;">
    <!-- <div class="login"> -->
        <form action="login.php?act=login" method="post" class="login" >
            <div class="title">
                <h1>Đăng nhập</h1>
                <a href="register/signup.php">Đăng kí</a>
            </div>
            <div class="input_login">
                <input type="text" name="username" require placeholder="Tài khoản">
                <div class="err_login"><?php if(isset($err['user']) && $err['user'] != ''){ echo $err['user'];} ?></div>
            </div>
            <div class="input_login">
                <input type="password" name="password" require placeholder="Mật khẩu">
                <div class="err_login"><?php if(isset($err['pass']) && $err['pass'] != ''){ echo $err['pass'];} ?></div>
            </div>
            <input type="submit" class="btn_more" value="Đăng nhập">
            <a href="forget_pass/forget_pass.php">Quên mật khẩu</a>
        </form>
    <!-- </div> -->
</body>
</html>
