<div class="slide mb"> 
            <img width="690px" height="600px" id="banner" src="access/img/slide0.jpg" alt="">
            <button class="btn_slide-left">
                <i class="fa-solid fa-angle-left icon_slide" onclick="pre()" ></i>
            </button>
            <button class="btn_slide-right">
                <i class="fa-solid fa-angle-right icon_slide" onclick="next()"></i>
            </button>
    <div class="list mb">
            <h1 class="mb">Top 5 điện thoại nổi bật</h1>
        <div class="listsp">
            <?php foreach($listdt_popular as $pro):
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
                <div class="btn_more"><a href="">More Mobile Phone</a></div>
        </div>
   
            <h1 class="mb">Top 5 laptop nổi bật</h1>
        <div class="listsp">
            <?php foreach($listlaptop_popular as $pro): extract($pro);
            $linksp = 'index.php?act=spct&id='.$id; ?>
                <div class="pro">
                        <div class="img">
                            <img src="upload/<?php echo $img?>" alt="">
                            <div class="quickview" onclick="detail_pro(<?php echo $id ?>)">Quick view</div>
                        </div>
                        <a href="<?php echo $linksp?> " class="name"><?php echo $name ?></a>
                        <div class="price"><?php echo $price ?></div>
                        <a href="index.php?act=addcart&idpro=<?php echo $id ?>&from=home" class="add_btn">Add to cart</a>
                </div>
            <?php endforeach ?>
                <div class="btn_more"><a href="">More Mobile Phone</a></div>
            </div>
            <h1 class="mb">Top 5 tablet nổi bật</h1>
        <div class="listsp">
            <?php foreach($listtablet_popular as $pro): extract($pro);
            $linksp = 'index.php?act=spct&id='.$id; ?>
                <div class="pro">
                        <div class="img">
                            <img src="upload/<?php echo $img?>" height="60px" alt="">
                            <div class="quickview" onclick="detail_pro(<?php echo $id ?>)">Quick view</div>
                        </div>
                        <a href="<?php echo $linksp?> " class="name"><?php echo $name ?></a>
                        <div class="price"><?php echo $price ?></div>
                        <a href="index.php?act=addcart&idpro=<?php echo $id ?>&from=home" class="add_btn">Add to cart</a>
                </div>
            <?php endforeach ?>    
                <div class="btn_more"><a href="">More Mobile Phone</a></div>
            </div>

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
