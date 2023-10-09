<div class="list mb">
            <h1 class="mb">Tất cả sản phẩm</h1>
        <div class="listsp">
            <?php foreach($allsp as $pro): extract($pro) ?>
                <div class="pro">
                    <div class="img">
                            <img src="access/img/<?php echo $img?>" alt="">
                            <div class="quickview" onclick="detail_pro()">Quick view</div>
                    </div>
                        <a href=" " class="name"><?php echo $name ?></a>
                        <div class="price"><?php echo $price ?></div>
                        <a href="" class="add_btn">Add to cart</a>
                </div>
            <?php endforeach ?>
                <!-- <div class="pro">
                    <div class="img">
                        <img src="access/img/13-removebg-preview.png" alt="">
                        <a href="" class="quickview">Quick view</a>
                    </div>
                    <a href=" " class="name">Iphone 12 pro max xanh dương</a>
                    <div class="price">1000$</div>
                    <a href="" class="add_btn">Add to cart</a>
                </div> -->
                
                <div class="btn_more"><a href="">More Mobile Phone</a></div>
        </div>

    </div>
    <div class="modal">
        <div class="overlay" onclick=""></div>
        <div class="modal_content">
            <div class="close" onclick="undetail_pro()">
                <i class="fa-solid fa-x"></i>
            </div>
            <img src="access/img/iphone-12-pro-max-xanh-duong-new-600x600-200x200-1.jpg" alt="">
            <div class="detail_pro">
                <div class="namedetail mb50">Iphone 12 pro max</div>
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
