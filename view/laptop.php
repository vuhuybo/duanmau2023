<div class="subject_admin">
            <h1>Danh sách điện thoại</h1>
        </div>
        <div style="margin: 20px 0;">
            <form action="index.php?act=laptop" method="post" class="form_search_sp">
                <input type="text" name="keyw" placeholder="Nhập từ khóa">
                <input type="submit" value="Tìm kiếm">
            </form>
            <div class="listsp" style="margin-top: 20px;">
            <?php foreach($listlaptop as $pro):
                extract($pro);
                $linksp = 'index.php?act=spct&id='.$id; ?>
                <div class="pro">
                    <div class="img">
                            <img src="upload/<?php echo $img?>" alt="">
                            <div class="quickview"  onclick="detail_pro(<?php echo $id ?>)">Quick view</div>
                    </div>
                        <a href="<?php echo $linksp?> " class="name"><?php echo $name ?></a>
                        <div class="price"><?php echo $price ?></div>
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
                                <td>Kích thước màn hình</td>
                                <td>6.1 inches</td>
                            </tr>
                            <tr >
                                <td>Công nghệ màn hình</td>
                                <td>Super Retina XDR OLED</td>
                            </tr>
                            <tr class="tr">
                                <td>Camera sau</td>
                                <td>Camera góc rộng: 12MP, f/1.6 <br>
                                    Camera góc siêu rộng: 12MP, ƒ/2.4</td>
                            </tr>
                            <tr>
                                <td>Pin</td>
                                <td>3240mAh</td>
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
                    <div class="add_btn" style="opacity: 1;margin-top: 10px; margin-right: 90px;">Add to cart</div>
                </div>
            </div>
        </div>