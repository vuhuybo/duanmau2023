<?php include '../modal/sanpham.php'; ?>
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
    <script src="../js/chuc.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <li><a href="">Home</a></li>
                <li><a href="">Shop all</a></li>
                <li><a href="">Mobile phones</a></li>
                <li><a href="">Tablets</a></li>
                <li><a href="">Phụ kiện</a></li>
            </nav>
            <div class="login">
                <a href="view/logout.php">Đăng xuất</a>
                <div class="cart"><a href=""><i class="fa-solid fa-cart-shopping"></i></a></div>
            </div>
        </header>
 <div class="tab_cart">
            <div class="title">
                <i class="fa-solid fa-x"></i>
                <p>Cart</p>
            </div>
            <?php 
                $sp_carts = load_cart($_SESSION['uid']);
                foreach($sp_carts as $sp_cart):
            ?>
            <div class="item_cart">
                <div class="img">
                    <img src="upload/<?php echo $sp_cart['img'] ?>" alt="">
                </div>
                <div class="cart-sp">
                    <p><?php echo $sp_cart['name'] ?></p>
                    <p><?php echo $sp_cart['price'] ?></p>
                    <div class="sl">
                        <input type="number" min="1" value="1">
                        <button class="btn_plus">+</button>
                        <button class="btn_milus">-</button>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <div class="total_cart">
                <span>Subtotal</span>
                <div class="total_value"></div>
            </div>
            <hr>
            <div class="btn_more"><a href="">View cart</a></div>
        </div>