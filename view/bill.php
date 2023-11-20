    <?php
        if(isset($_SESSION['uid'])){
            $list_address = load_address($_SESSION['uid']);
        }else{
            header('location: view/login.php');
        }
        if(isset($_GET['id_one_pro'])){
            $id_one_pro = $_GET['id_one_pro'];
            $count_one = $_GET['count_add'];
            $link = 'index.php?act=bill&id_one_pro='.$id_one_pro.'&count_add='.$count_one;
        }else{
            $link = 'index.php?act=bill';
        }
        ?>
    <form action="<?php echo $link; ?>" style="width: 100%;" method="post">
        <section class="address">
            <h3>Địa chỉ nhận hàng</h3>
            <?php foreach($list_address as $address):
                if($address['status'] == 'default'): ?>
            <input type="text" value="<?php echo $address['id']; ?>" class="address-id" name="id_address" style="display: none;">
            <p class="address-name"><?php echo $address['name'] ?></p>
            <p class="tel-bill"><?php echo $address['tel'] ?></p>
            <p class="location"><?php echo $address['detail_location'].' , '.$address['tinh']; ?></p>
            <?php endif; endforeach ?>
            <div class="change-address">Thay đổi</div>
        </section>
        <section class="bill">
            <div class="bill-header">
                <div class="bill-header-item" style="flex: 6;">
                    <h2>Sản phẩm</h2>
                </div>
                <div class="bill-header-item" style="flex: 2;">Đơn giá</div>
                <div class="bill-header-item" style="flex: 2;">Số lượng</div>
                <div class="bill-header-item" style="flex: 2;">Thành tiền</div>
            </div>
            <?php echo $_GET ?>
            <div class="bill-pro">
                    <?php if(isset($_GET['id_one_pro'])){
                        $id_one_pro = $_GET['id_one_pro'];
                        $pro = load_1sp($id_one_pro);
                        $count_one = $_GET['count_add'];
                        echo '
                        <div class="bill-pro-item">
                        <div class="bill-pro-sanpham" style="flex: 6;">
                        <input style="display: none;" name ="id_pro[]" value = "'.$pro['id'].'">
                        <img src="upload/'.$pro['img'].'" height="40px" width="40px" alt="">
                        <span>'.$pro['name'].'</span>
                        </div>
                        <div class="bill-pro-price" style="flex: 2;">'.currency_format($pro['price']).'</div>
                        <input class="bill-pro-quatity" name="quatity[]" value="'.$count_one.'" style="flex: 2; border: none; text-align: center;" readonly>
                        <div class="bill-pro-subtotal" style="flex: 2;">'. currency_format($pro['price']*$count_one) .'</div>
                        </div>';
                    }else{
                        $id_user = $_SESSION['uid'];
                        $pro = load_cart($id_user);
                        foreach($pro as $p){
                            echo '
                            <div class="bill-pro-item">
                            <div class="bill-pro-sanpham" style="flex: 6;">
                            <input style="display: none;" name ="id_pro[]" value = "'.$p['id'].'">
                            <img src="upload/'.$p['img'].'" height="40px" width="40px" alt="">
                            <span>'.$p['name'].'</span>
                            </div>
                            <div class="bill-pro-price" style="flex: 2;">'.currency_format($p['price']).'</div>
                            <input class="bill-pro-quatity" name="quatity[]" value="'.$p['count'].'" style="flex: 2; border: none; text-align: center;" readonly>
                            <div class="bill-pro-subtotal" style="flex: 2;">'. currency_format($p['price']*$p['count']).'</div>
                            </div>';
                        }
                    }
                    ?>
            </div>
        </section>
        <section class="bill-total">
            <div class="method-pay">
                <div>Phương thức thanh toán</div>
                <div>Thanh toán khi nhận hàng</div>
            </div>
            <div class="total-bill" >
                <div class="total-bill-title" style="flex: 4;">Tổng tiền thanh toán</div>
                <div class="detail-total" style="flex: 2;">
                    <div class="bill-price-pro" >
                        <p>Tổng tiền hàng:</p>
                        <p class="total_price">
                            <?php 
                                if(isset($pro[0]['name'])){
                                    $total_price = 0;
                                    foreach($pro as $p){
                                        $total_price += ($p['price']*$p['count']);
                                    }
                                    echo currency_format($total_price) ;
                                }else{
                                    $total_price = $pro['price']*$count_one;
                                    echo currency_format($total_price);
                                }
                            ?>
                        </p>
                    </div>
                    <div class="bill-ship">
                        <p>Phí vận chuyển:</p>
                        <p>20.000đ</p>
                    </div>
                    <div class="bill-detail-total">
                        <p>Tổng thanh toán:</p>
                        <p class="total_bill"><?php echo currency_format($total_price+20000)?></p>
                    </div>
                </div>
            </div>
            <button type="submit" style="border: none; color: white; cursor: pointer;" class="btn_more">Pay</button>
        </section>
    </form>
    <div class="modal address-checked"  >
        <div class="overlay"></div>
        <div class="modal_content-address">
            <div class="address-header">
                <div class="address-title">Địa chỉ của tôi</div>
                <button class="add-address">Thêm địa chỉ mới</button>
            </div>
            <div class="address-list">
                <?php foreach($list_address as $address): ?> 
                <div class="address-item">
                    <div class="address-item-left" onclick="">
                        <input class="check-address1" style="margin: 10px;" type="radio" name="check-address" id="<?php echo $address['id'] ?>">
                        <label data-id="<?php echo $address['id'] ?>" class="address-item_content" for="<?php echo $address['id'] ?>">
                            <p class="address_address-name"><?php echo $address['name'] ?></p>
                            <p class="address_tel-bill"><?php echo $address['tel'] ?></p>
                            <p class="address_location"><?php echo $address['detail_location'].' , '.$address['tinh']; ?></p>
                        </label>
                    </div>
                    <div class="address-item-right update-address" onclick="update_address(<?php echo $address['id'] ?>)">Cập nhật</div>
                </div>
                <?php endforeach ?>
            </div>
            <div class="address-btn">
                <button class="cancel-address">Cancel</button>
                <div class="cancel-address" onclick="change_address()">Xác nhận</div>
            </div>
        </div>
    
    </div>
    <div class="modal add-address-checked" >
        <div class="overlay"></div>
        <div class="modal_content-add">
            <div class="address-add_title">
                Địa chỉ mới
            </div>
            <form action="index.php?act=add_address" method="post">
                <div class="address-add_item">
                    <input type="text" name="name" placeholder="Họ và tên">
                    <input type="text" name="tel" placeholder="Số điện thoại">
                </div>
                <div class="address-add_item">
                    <input type="text" name="tinh" placeholder="Tỉnh/thành phố, Quận/huyện, Phường/xã">
                </div>
                <div class="address-add_item">
                    <input type="text" style="overflow-wrap: break-word;" name="detail_address" placeholder="Địa chỉ cụ thể">
                </div>
                <div class="address-add_item check_default" style="display: flex;">
                    <input height="15px" type="checkbox" name="check-default" > <span>Đặt làm địa chỉ mặc định</span>
                </div>
                <div class="btn_modal_content-add">
                    <div class="back-address1">Trở lại</div>
                    <button class="" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal update-address-checked" >
        <div class="overlay"></div>
        <div class="modal_content-add">
            <div class="address-add_title">
                Cập nhật địa chỉ của bạn
            </div>
            <form action="" class="form_update_address" method="post">
                <div class="address-add_item">
                    <input type="text" name="name" class="name_update-address"  value="" placeholder="Họ và tên">
                    <input type="text" name="tel" class="tel_update-address" value="" placeholder="Số điện thoại">
                </div>
                <div class="address-add_item">
                    <input type="text" name="tinh" class="tinh_update-address" value="" placeholder="Tỉnh/thành phố, Quận/huyện, Phường/xã">
                </div>
                <div class="address-add_item">
                    <input type="text" class="detail_location_update-address" style="overflow-wrap: break-word;" value="" name="detail_address" placeholder="Địa chỉ cụ thể">
                </div>
                <div class="address-add_item check_default" style="display: flex;">
                    <input height="15px" type="checkbox" name="check-default" > <span>Đặt làm địa chỉ mặc định</span>
                </div>
                <div class="btn_modal_content-add">
                    <div class="back-address2">Trở lại</div>
                    <button class="" type="submit">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id_address =  $_POST['id_address'];
                $pros_id = $_POST['id_pro'];
                $pros_quatity = $_POST['quatity'];
                $pro_to_order  = [];
                $id_user = $_SESSION['uid'];
                foreach($pros_id as $i => $pro_id){
                    $pro_to_order[] = [
                        'pro_id' => $pro_id,
                        'quatyti' => $pros_quatity[$i]
                    ];
                }
                $pro_to_order = json_encode($pro_to_order);
                add_orders($total_price,$id_address,$id_user,$pro_to_order);
                echo '<script>window.location.href="view/odersussesful.php";</script>';
            }
    ?>
