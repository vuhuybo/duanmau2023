<div class="subject_admin">
            <h1>Danh sách điện thoại</h1>
        </div>
        <div style="margin: 20px 0;">
            <form action="index.php?act=laptop" method="post" class="form_search_sp">
                <input type="text" name="keyw" placeholder="Nhập từ khóa">
                <input type="submit" value="Tìm kiếm">
            </form>
            <div class="listsp mb" style="margin-top: 20px;">
            <?php foreach($listlaptop as $pro):
                extract($pro);
                $linksp = 'index.php?act=spct&id='.$id; ?>
                <div class="pro">
                    <div class="img">
                            <img src="upload/<?php echo $img?>" alt="">
                            <div class="quickview"  onclick="detail_pro(<?php echo $id ?>)">Quick view</div>
                    </div>
                        <a href="<?php echo $linksp?> " class="name"><?php echo $name ?></a>
                        <div class="price"><?php echo currency_format($price)  ?></div>
                        <a href="index.php?act=addcart&idpro=<?php echo $id ?>&from=home" class="add_btn">Add to cart</a>
                </div>
            <?php endforeach ?>
                <!-- <div class="btn_more"><a href="">More Mobile Phone</a></div> -->
        </div>
        <div class="modal">
            <div class="overlay" onclick=""></div>
            <div class="modal_content">
                <div class="close" onclick="undetail_pro()">
                    <i class="fa-solid fa-x"></i>
                </div>
                <img src="" class="imgdetail" alt="">
                <div class="detail_pro">
                    <div class="namedetail mb50">ss</div>
                    <div class="pricedetail mb50">1000$</div>
                    <div class="dungluong mb50"> Dung lượng: 128GB</div>
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