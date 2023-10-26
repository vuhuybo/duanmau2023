<?php 
    if(isset($_GET['id']) && $_GET['id'] != ''){
        $id = $_GET['id'];
        $sp = load_1sp($id);
        $dm = load_dm_id($sp['iddm']);
        $cmts = load_bl($id);
        // xử lý phần mô tả
        $mota = $sp['mota'];
        $mota = explode('.',$mota); 
        // xử lý view_count
        $count = $sp['luotxem'];
        $count ++;
        count_view($count,$sp['id']);
        // xử lý bình luận
        if(isset($_POST['cmt']) && $_POST['cmt'] != ''){
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
        }
    }
?>
<div class="boxsp">
            <div class="box_left">
                <img class="img_box_left" src="upload/<?php echo $sp['img'] ?>" alt="">
            </div>
            <form class="box_right" action="index.php?act=addcart&idpro=<?php echo $sp['id'] ?>"  method="post">
                <p class="namesp_detail"><?php echo $sp['name'] ?></p>
                <div class="pricesp_detail"><?php echo $sp['price'] ?></div>
                <div class="item">
                    <span>Màu sắc</span>
                    <select name="color" id="">
                        <option value="red">Đỏ</option>
                        <option value="gray">Xám</option>
                        <option value="gold">Vàng</option>
                    </select>
                </div>
                <div class="item">
                    <span>Số lượng</span>  
                    <input type="number" name="count" min="1" value="1">
                </div>
                <div class="item">
                    <span>Địa chỉ</span> 
                    <input type="text" name="address">
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
                <div>
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
            <tr class="tr">
                <td>Kích thước màn hình</td>
                <td><?php echo $mota[0] ?></td>
            </tr>
            <tr >
                <td>Công nghệ màn hình</td>
                <td><?php echo $mota[1] ?></td>
            </tr>
            <tr class="tr">
                <td>Camera sau</td>
                <td><?php echo $mota[2] ?> <br>
                <?php echo $mota[3] ?></td>
            </tr>
            <tr>
                <td>Pin</td>
                <td><?php echo $mota[4] ?></td>
            </tr>
            
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
                $pros = load_5sp_popular($sp['iddm']);
                foreach($pros as $pro): 
                    $linksp = $linksp = 'index.php?act=spct&id='.$pro['id'];
            ?>
                <div class="pro">
                    <div class="img">
                        <img src="upload/<?php echo $pro['img'] ?>" alt="">
                        <div class="quickview" onclick="detail_pro()">Quick view</div>
                    </div>
                    <a href="<?php echo $linksp ?> " class="name"><?php echo $pro['name'] ?></a>
                    <div class="price"><?php echo $pro['price'] ?></div>
                    <a href="" class="add_btn">Add to cart</a>
                </div>
            <?php endforeach ?>
        </div>
    </div>