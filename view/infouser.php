<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_user = $_SESSION['uid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        if(isset($_POST['sex'])){
            $sex = $_POST['sex'];
        }else{
            $sex = '';
        }
        $birthday = $_POST['birthday'];
        $error = [];
        if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
            $file = $_FILES['img'];
            $filename = $file['name'];
            $filename = explode('.',$filename);
            $ext = end($filename);
            $new_file = md5(uniqid()).'.'.$ext;
            $file_allow = ['png','jpg'];
            if(in_array($ext,$file_allow)){
                $file_size = $file['size']/1024/1024;
                $size_allow = 10;
                if($file_size<= $file_allow){
                    move_uploaded_file($file['tmp_name'],'upload/'.$new_file);
                }else{
                    $error['file_size'] =' size err' ;
                }
            }else{
                $error['file_ext']  = 'file k hợp lệ';
            }
        }else{
            $new_file = 'Chưa có file';
        }
        if(empty($error)){
            update_user($id_user,$sex,$birthday,$tel,$new_file,$name,$email);
        }
        // echo $name.$email.$tel.$sex.$birthday.$new_file
    }
    $id_user = $_SESSION['uid'];
    $user = load_user_id($id_user);
    if(isset($_SESSION['uid'])){
        $list_address = load_address($_SESSION['uid']);
    }else{
        header('location: view/login.php');
    }
    if(isset($_SESSION['uid'])){
        $list_orders = load_list_orders($_SESSION['uid']);
    }
?>
<div class="info_user">
    <div class="left_info">
        <div class="left_info-info">
            <img src="upload/<?php echo $user['img'] ?>" alt="">
            <div>
                <div class="left_info-name"><?php echo $user['user'] ?></div>
                <div>
                    <i class="fa-solid fa-pen"></i>
                    <a href="index.php?act=infouser">Sửa hồ sơ</a>
                </div>
            </div>
        </div>
        <div class="left_info-account">
            <div>
                
                <p>Tài khoản của tôi</p>
            </div>
            <ul>
                <li class="info_user-hoso">Hồ sơ</li>
                <li class="info_user-diachi">Địa chỉ</li>
                <li>Đổi mật khẩu</li>
            </ul>
        </div>
        <div class="left_info-orders">
            <p class="info_user-orders">Đơn mua</p>
        </div>
        <div class="left_inof-vouchers">
            <p>Kho voucher</p>
        </div>
    </div>
    <div class="right_info  right_info-info" >
        <div class="right-info_header">
            <h1>Hồ sơ của tôi</h1>
            <p>Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
        </div>
        <div class="right-info_body">
            <form action="index.php?act=infouser" method="post" enctype="multipart/form-data">
                <div class="right-info_item">
                    <p>Tên đăng nhập</p>
                    <input type="text" name="user" readonly value="<?php echo $user['user'] ?>">
                </div>
                <div class="right-info_item">
                    <p>Tên</p>
                    <input type="text" name="name" placeholder="Nhập tên của bạn" value="<?php echo $user['name'] ?>">
                </div>
                <div class="right-info_item">
                    <p>Email</p>
                    <input type="email" name="email"  value="<?php echo $user['email'] ?>">
                </div>
                <div class="right-info_item">
                    <p>Số điện thoại</p>
                    <input type="text" name="tel"  value="<?php echo $user['tel'] ?>">
                </div>
                <div class="right-info_item right-info_item-sex">
                    <p>Giới tính</p>
                    <div>
                        <input type="radio" name="sex" id="" value="nam">  <span>Nam</span>
                        <input type="radio" name="sex" id="" value="nu">  <span>Nữ</span>
                    </div>
                </div>
                <div class="right-info_item">
                    <p>Ngày sinh</p>
                    <input type="date" value="<?php echo $user['birthday'] ?>" placeholder="Ngày sinh của bạn" name="birthday">
                </div>
                <div class="right-info_item">
                    <p>Ảnh đại diện</p>
                    <input type="file"   name="img">
                </div>
                    <p style="text-align: center;"> <?php 
                        if(isset($error['file_size'])){ 
                            echo $error['file_size'];
                        }elseif(isset($error['file_ext'])){
                            echo $error['file_ext'];
                        }
                        ?></p>
                <input type="submit" class="btn_more" value="Lưu">
            </form>
        </div>

    </div>
    <div class="right_info right_info-address" >
        <div class="right_info-address_content" style="padding: 20px;">
            <div class="address-header">
                <div class="address-title">Địa chỉ của tôi</div>
                <button class="add-address">Thêm địa chỉ mới</button>
            </div>
            <div class="address-list">
                <?php foreach($list_address as $address): ?> 
                <div class="address-item">
                    <div class="address-item-left" onclick="">
                        <!-- <input class="check-address1" style="margin: 10px;" type="radio" name="check-address" id="<?php echo $address['id'] ?>"> -->
                        <label data-id="<?php echo $address['id'] ?>" class="address-item_content" for="<?php echo $address['id'] ?>">
                            <p class="address_address-name"><?php echo $address['name'] ?></p>
                            <p class="address_tel-bill"><?php echo $address['tel'] ?></p>
                            <p class="address_location"><?php echo $address['detail_location'].' , '.$address['tinh']; ?></p>
                        </label>
                    </div>
                    <div class="btn-update_address">
                        <div class="address-item-right update-address" onclick="update_address(<?php echo $address['id'] ?>)">Cập nhật</div>
                        <div class="address-item-right delete-address" data-id ="<?php echo $address['id'] ?>" >Xóa</div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        
        </div>
    </div>
    <div class="right_info right_info-orders" >
        <div class="right-info_header">
            <h1>Đơn mua của tôi</h1>
            <p>Quản lí thông tin các đơn mua</p>
        </div>
        <div class="list_orders">
            <?php foreach($list_orders as $order):
                        $list_pro =json_decode($order['product']); ?>
            <div class="oder_item">
                <div class="order_item-id">Mã đơn hàng: <?php echo $order['id'] ?></div>
                <div class="order_item_listpro">
                    <?php
                    $total_price = 0;
                    echo '
                        <div class="bill-header">
                            <div class="bill-header-item" style="flex: 6;">
                                <h2>Sản phẩm</h2>
                            </div>
                            <div class="bill-header-item" style="flex: 2;">Đơn giá</div>
                            <div class="bill-header-item" style="flex: 2;">Số lượng</div>
                            <div class="bill-header-item" style="flex: 2;">Thành tiền</div>
                        </div>';
                    foreach($list_pro as $pro){
                        $p = load_1sp($pro->pro_id);
                        echo '
                        
                        <div class="bill-pro-item">
                            <div class="bill-pro-sanpham" style="flex: 6;">
                                <input style="display: none;" name ="id_pro[]" value = "'.$p['id'].'">
                                <img src="upload/'.$p['img'].'" height="40px" width="40px" alt="">
                                <span>'.$p['name'].'</span>
                            </div>
                            <div class="bill-pro-price" style="flex: 2;">'.currency_format($p['price']).'</div>
                            <input class="bill-pro-quatity" name="quatity[]" value="'.$pro->quatyti.'" style="flex: 2; border: none; text-align: center;" readonly>
                            <div class="bill-pro-subtotal" style="flex: 2;">'. currency_format($p['price']*$pro->quatyti).'</div>
                        </div>';
                        $total_price += $p['price']*$pro->quatyti;
                    } 
                     
                    ?>
                </div>
                <p class="total_bill">Tổng đơn hàng: <?php echo currency_format($total_price+20000)?></p>
                <div class="btn_more detail_order" data-id = '<?php echo $order['id'] ?>' onclick="window.open('index.php?act=order_status&id_order='+<?php echo $order['id'] ?>)">Xem chi tiết đơn hàng</div>
                <div class="btn_more detail_order delete_order" data-id = '<?php echo $order['id'] ?>' >Hủy đơn hàng</div>
            </div>
            <?php endforeach ?>
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
                <input type="text" value="info" name="from" style="display:none">
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