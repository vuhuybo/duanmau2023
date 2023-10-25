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
                <div class="cart"><i class="fa-solid fa-cart-shopping"></i></div>
            </div>
        </header>
        <div class="overlay_cart">
            <div class="layout_cart"></div>
            <div class="tab_cart">
                        <div class="title">
                            <i class="fa-solid fa-x"></i>
                            <p>Cart</p>
                        </div>
                        <ul class="cart_list-sp">
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="../upload/laptop1.jpg" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p>ip13</p>
                                        <p>$500</p>
                                        <input type="number" min="1" value="1" >
                                    </div>
                                    <button class="btn_remove-cart" >Xóa</button>
                                </div>
                            </li>
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="../upload/laptop1.jpg" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p>ip13</p>
                                        <p>$500</p>
                                        <input type="number" min="1" value="1" >
                                    </div>
                                    <button class="btn_remove-cart" >Xóa</button>
                                </div>
                            </li>
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="../upload/laptop1.jpg" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p>ip13</p>
                                        <p>$500</p>
                                        <input type="number" min="1" value="1" >
                                    </div>
                                    <button class="btn_remove-cart" >Xóa</button>
                                </div>
                            </li>
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="../upload/laptop1.jpg" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p>ip13</p>
                                        <p>$500</p>
                                        <input type="number" min="1" value="1" >
                                    </div>
                                    <button class="btn_remove-cart" >Xóa</button>
                                </div>
                            </li>
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="../upload/laptop1.jpg" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p>ip13 sfkf là cái gì đấy cũng dài lắm</p>
                                        <p>$1500</p>
                                        <input type="number" min="1" value="1" >
                                    </div>
                                    <button class="btn_remove-cart" >Xóa</button>
                                </div>
                            </li>
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="../upload/laptop1.jpg" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p>ip13</p>
                                        <p>$1500</p>
                                        <input type="number" min="1" value="1" >
                                    </div>
                                    <button class="btn_remove-cart" >Xóa</button>
                                </div>
                            </li>
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="../upload/laptop1.jpg" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p>ip13</p>
                                        <p>$1500</p>
                                        <input type="number" min="1" value="1" >
                                    </div>
                                    <button class="btn_remove-cart" >Xóa</button>
                                </div>
                            </li>
                        </ul>
                        <div class="total_cart">
                            <div class="total_cart-title">
                                <span>Subtotal</span>
                                <div class="total_value">5000</div>
                            </div>
                            <hr>
                            <div class="btn_more"><a href="">View cart</a></div>
                        </div>
                    </div>
        </div>