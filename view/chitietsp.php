<?php 

    if(isset($_GET['id']) && $_GET['id'] != ''){
        $id = $_GET['id'];
        $sp = load_1sp($id);
        $dm = load_dm_id($sp['iddm']);
        $cmts = load_bl($id);
        // xử lý view_count
        $count = $sp['luotxem'];
        $count ++;
        count_view($count,$sp['id']);
        // xử lý bình luận
            if(isset($_POST['cmt']) && $_POST['cmt'] != ''){
                if(isset($_SESSION['uid'])){
                    $noidung = $_POST['cmt'];
                    $idpro = $sp['id'];
                    if(isset($_SESSION['uid'])){
                        $iduser = $_SESSION['uid'];
                    }else{
                        $iduser = 1;
                    }
                    $ngaybinhluan = date('Y-m-d');
                    add_bl($noidung,$iduser,$idpro,$ngaybinhluan);
                    header('location:index.php?act=spct&id='.$sp['id']);
                }else{
                    header('location: view/login.php');
                }
            }
          
        
    }
?>
<div class="boxsp">
            <div class="box_left">
                <img class="img_box_left" src="upload/<?php echo $sp['img'] ?>" alt="">
            </div>
            <form class="box_right" action="index.php?act=addcart&idpro=<?php echo $sp['id'] ?>"  method="post">
                <p class="namesp_detail"><?php echo $sp['name'] ?></p>
                <div class="pricesp_detail"><?php echo currency_format($sp['price']);  ?></div>
                <div class="item">
                    <span>Màu sắc</span>
                    <select class="detail_pro-color" name="color" id="">
                        <?php 
                            foreach(json_decode($sp['soluong']) as $color): ?>
                            <option value="<?php echo $color->color ?>"><?php echo $color->color ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="item">
                    <span>Địa chỉ</span> 
                    <select name="address" id="">
                        <option value="HN">Hà Nội</option>
                        <option value="gray">TP. Hồ Chí Minh</option>
                    </select>
                </div>
                <div class="item">
                    <span>Số lượng</span>  
                    <input type="number" class="count_pro_cart" max = "<?php echo json_decode($sp['soluong'])[0]->quatyti ?>" data-quatyti = "<?php echo htmlspecialchars($sp['soluong'], ENT_QUOTES, 'UTF-8'); ?>" name="count_cart" min="1" value="1">
                </div>
                <div class="item">
                    <span>Dung lượng</span>
                    <div class="radio">
                        <input type="radio" name="dungluong" value="128GB"> <span>128GB</span> 
                    </div>
                    <div class="radio">
                        <input type="radio" name="dungluong" value="256GB"> <span>256GB</span> 
                    </div>
                    <div class="radio">
                        <input type="radio" name="dungluong" value="1TB"> <span>1TB</span>                    
                    </div>
                </div>
                <div style=" display: flex; justify-content: center; gap: 50px;">
                    <button class="add_cart" type="submit" name="action" value="add">Thêm vào giỏ hàng</button>
                    <button class="buy" type="submit" name="action" value="bill">Mua ngay</button>
                </div>
                <hr class="hr_sp">
                <div class="sp_service">
                    <div class="item_sevice">
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                        <p>Trả hàng trong 7 ngày</p>
                    </div>
                    <div class="item_sevice">
                        <i class="fa-solid fa-shield-heart"></i>
                        <p>Hàng chính hãng 100%</p>
                    </div>
                    <div class="item_sevice">
                        <i class="fa-solid fa-car-side"></i>
                        <p>Miễn phí vận chuyển</p>
                    </div>
                </div>
                <div class="share_sp">
                    <p>Chia sẻ:</p>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-facebook-messenger"></i>
                </div>
            </form>
    </div>
    <div class="descriptione_sp">
        <p>MÔ TẢ SẢN PHẨM</p>
        <table>
            <?php
                // xử lý chi tiết thông tin sản phẩm  
                $motas = json_decode($sp['mota'],true);
                $i = 0;
                foreach($motas as $mota): if($i % 2 == 0): 
            ?>
            <tr class="tr">
                <td><?php echo $mota['name'] ?></td>
                <td><?php echo $mota['value'] ?></td>
            </tr>
            <?php else: ?>
            <tr >
                <td><?php echo $mota['name'] ?></td>
                <td><?php echo $mota['value'] ?></td>
            </tr>
            <?php  endif; $i++; endforeach;  ?>            
        </table>
    </div>
    <div class="danhgia">
        <p>ĐÁNH GIÁ SẢN PHẨM</p>
        <?php foreach($cmts as $cmt ):
            $user = load_user_id($cmt['iduser']);?>
        <div class="person">
            <img src="upload/<?php echo $user['img']; ?>" alt="">
            <div class="comment">
                <p class="nameuser"><?php echo $user['name']; ?></p>
                <div class="time_phanloai">
                    <p class="time"><?php echo $cmt['ngaybinhluan']; ?></p>
                    <p class="phanloai">Phân Loại : <?php echo $dm['name'] ?></p>
                </div>
                <div class="cmt_detail"><?php echo $cmt['noidung'] ?></div>
            </div>
        </div>
        <?php endforeach ?>
        
            <form action="<?php echo 'index.php?act=spct&id='.$sp['id']; ?>" method="post">
                    <input type="text" name="cmt" placeholder="Nhập bình luận của bạn">
                    <input type="submit" value="Bình luận">
            </form>
        </div>
        <div class="goiy_sp">
            <p>Sản phẩm tương tự</p>
            <div class="listsp">
            <?php 
                $pros = load_5sp_popular($sp['iddm'],$sp['id']);
                foreach($pros as $pro): 
                    $linksp = $linksp = 'index.php?act=spct&id='.$pro['id'];
            ?>
                <div class="pro">
                    <div class="img">
                        <img src="upload/<?php echo $pro['img'] ?>" alt="">
                        <div class="quickview" onclick="detail_pro(<?php echo $pro['id'] ?>)">Quick view</div>
                    </div>
                    <a href="<?php echo $linksp ?> " class="name"><?php echo $pro['name'] ?></a>
                    <div class="price"><?php echo currency_format($pro['price'])  ?></div>
                    <a href="" class="add_btn">Add to cart</a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="modal">
        <div class="overlay" onclick="undetail_pro()"></div>
        <div class="modal_content">
            <div class="close" onclick="undetail_pro()">
                <i class="fa-solid fa-x"></i>
            </div>
            <img src="" class="imgdetail" alt="">
            <div class="detail_pro">
                <div class="namedetail mb50">ss</div>
                <div class="pricedetail mb50">1000$</div>
                <!-- <div class="dungluong mb50"> Dung lượng: 128GB</div> -->
                <div class="description_pro mb50">
                    <p>Thông số kĩ thuật</p>
                    <table>
                        <tr class="tr">
                            <td>Màn hình</td>
                            <td class="des_manhinh">6.1 inches</td>
                        </tr>
                        <tr >
                            <td>Công nghệ chip</td>
                            <td class="des_chip">Super Retina XDR OLED</td>
                        </tr>
                        <tr class="tr">
                            <td>Bộ nhớ</td>
                            <td class="des_bonho"> </td>
                        </tr>
                        <tr>
                            <td>Pin</td>
                            <td class="des_pin">3240mAh</td>
                        </tr>
                        
                    </table>
                </div>
                <div class="color mb50">

                    <p for="">Màu sắc</p>
                    <select name="" id="">
                        <option value="red">Đỏ</option>
                        <option value="gray">Xám</option>
                        <option value="gold">Vàng</option>
                    </select>
                </div>
                <a class="add_btn them_cart" href="" style="opacity: 1;margin-top: 10px; margin-right: 90px;">Add to cart</a>
            </div>
        </div>
    </div>