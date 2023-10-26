<div class="layout_cart">
            <div class="overlay_cart" onclick="uncart()"></div>
            <div class="tab_cart">
                        <div class="title">
                            <i class="fa-solid fa-x" onclick="uncart()"></i>
                            <p>Cart</p>
                        </div>
                        <ul class="cart_list-sp">
                            <?php 
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
                                        <p class="price_cart"><?php echo $cart['price'] ?></p>
                                        <input type="number" min="1" value="<?php echo $cart['count'] ?>" name="count" class="count_cart">
                                    </div>
                                    <button class="btn_remove-cart" ><a href="view/xoaspcart.php?idpro=<?php echo $cart['id']?>&iduser=<?php echo $_SESSION['uid'] ?>">Xóa</a></button>
                                </div>
                            </li>
                            <?php endforeach?>
                        </ul>
                        <div class="total_cart">
                            <div class="total_cart-title">
                                <span>Subtotal</span>
                                <div class="total_price">0</div>
                            </div>
                            <hr>
                            <div class="btn_more"><a href="">Pay</a></div>
                        </div>
                    </div>
        </div>
    <div class="footer">Chúc pro vip</div>
    <script src="js/chuc.js"></script>
</body>
</html>