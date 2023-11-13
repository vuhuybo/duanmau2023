<div class="layout_cart">
            <div class="overlay_cart" onclick="uncart()"></div>
            <div class="tab_cart">
                        <div class="title">
                            <i class="fa-solid fa-x" onclick="uncart()"></i>
                            <p>Cart</p>
                        </div>
                        <ul class="cart_list-sp">
                            <?php 
                            if(!isset($_SESSION['uid'])){
                                echo 'Đăng nhập để tạo giỏ hàng';
                            }
                            if(isset($_SESSION['uid'])):
                                $carts = load_cart($_SESSION['uid']);
                                foreach($carts as $cart):
                            ?>
                            <li>
                                <div class="item_cart">
                                    <div class=" fl item_cart-img">
                                        <img src="upload/<?php echo $cart['img'] ?>" alt="">
                                    </div>
                                    <div class="fl cart-sp">
                                        <p><?php echo $cart['name'] ?></p>
                                        <p class="price_cart" value = "<?php echo $cart['price'] ?>"><?php echo currency_format($cart['price'])  ?></p>
                                        <input type="number" min="1" value="<?php echo $cart['count'] ?>" name="count_cart" class="count_cart" data-idpro = "<?php echo $cart['id']?>" >
                                    </div>
                                    <button class="btn_remove-cart xoacart" data-iduser = "<?php echo $_SESSION['uid'] ?>" data-idpro = "<?php echo $cart['id']?>" >Xóa</button>
                                </div>
                            </li>
                            <?php endforeach; endif;?>
                        </ul>
                        <div class="total_cart">
                            <div class="total_cart-title">
                                <span>Subtotal</span>
                                <div class="total_price">0</div>
                            </div>
                            <hr>
                            <a href="index.php?act=bill" style="text-decoration: none;"><div class="btn_more buy" >Pay</div></a>
                        </div>
                    </div>
    </div>
    <div class="footer">Chúc pro vip</div>
    <script src="js/chuc.js"></script>
</body>
</html>