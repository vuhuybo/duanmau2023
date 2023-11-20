    <?php
    if( ($_SERVER['REQUEST_METHOD'] == 'POST') ){
        $id_order  = $_POST['id_order'];
        $id_user = $_POST['id_user'];
        $listorder = load_order_filter($id_order,$id_user);

    }else{
        if(isset($_GET['page'])){
            $index = $_GET['page'];
            $page_index = $_GET['page'];
        }else{
            $index = 1;
            $page_index = 1;
        }
        $index = ($index - 1 )*10;
        $listorder = load_all_order($index,10);
    }
     ?>
    <div class="subject_admin">
        <h1>Danh sách đơn hàng</h1>
    </div>
    <div style="margin: 20px 0;">
        <form action="index.php?act=order" method="post" class="form_search_sp">
            <input type="text" name="id_order" placeholder="Nhập mã bill" value="">
            <input type="text" name="id_user" placeholder="Nhập mã người dùng" value="">
            <input type="submit" value="Tìm kiếm">
        </form>
    </div>
    <table class="table_pro_admin">
        <th>
            <td>ID đơn hàng</td>
            <td>Sản phẩm</td>
            <td>Trạng thái</td>
            <td>Tổng giá</td>
            <td>Ngày đặt</td>
            <td>Địa chỉ nhận</td>
            <td>ID người mua</td>
        </th>
        <?php foreach($listorder as $order): extract($order); $listpro = json_decode($product);  ?>
        <?php   $status = load_status_order($id);?>
        <tr>
            <td>
                <?php if(!$status):  $status['status'] = 'Đơn hàng đang chờ xác nhận'?>
                <a href="index.php?act=editorder&id=<?php echo $id ?>" class="btn_add-admin confirm_order">Xác nhận</a>
                
                <?php endif ?>
                <a class="btn_dele-admin xoa_order" data-id="<?php echo $id ?>">delete</a>
            </td>
            <td> <?php echo $id ?></td>
            <td>
                <ul style="list-style: none;">
                    <?php foreach($listpro as $pro): $sp =  load_1sp($pro->pro_id)?>
                        <li><?php echo $sp['name'].' x '.$pro->quatyti ?></li>
                    <?php endforeach ?>    
                </ul>
            </td>
            <td><?php echo $status['status'] ?></td>
            <td><?php echo currency_format($total_price) ?></td>
            <td><?php echo $ngay_dat ?></td>
            <td><?php echo $detail_location.','.$tinh ?></td>
            <td><?php echo $id_user ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <ul class="count_page" style="text-align: center;" page ="<?php echo $page_index ?>"> 
        <?php
         $quatity_pro = count_order();
         $count_page = ceil($quatity_pro[0]['COUNT(id)'] / 10);
         for($i = 1;$i <= $count_page;$i ++): ?>
            <li class="index_page" data-page = "<?php echo $i ?>" ><a href="index.php?act=order&page=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php endfor ?>
    </ul>
</div>
</body>