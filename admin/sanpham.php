        <div class="subject_admin">
            <h1>Danh sách sản phẩm</h1>
            <a href="index.php?act=themsp">ADD</a>
        </div>
        <div style="margin: 20px 0;">
            <form action="index.php?act=sanpham" method="post" class="form_search_sp">
                <input type="text" name="keyw" placeholder="Nhập từ khóa">
                <select name="iddm" id="" >
                    <option value="0">Tất cả</option>
                    <?php $listdm = load_dm(); foreach($listdm as $dm): extract($dm) ?>
                    <option value="<?php echo $id ?>"><?php echo $name ?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" value="Tìm kiếm">
            </form>
        </div>
        <table class="table_pro_admin">
            <th>
                <td>ID sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Giá</td>
                <td>Hình ảnh</td>
                <td>ID loại</td>
                <td>Số lượt xem</td>
                <td>Mô tả</td>
                <td>Số lượng</td>
            </th>
            <?php foreach($listsp as $pro): extract($pro) ?>
            <tr>
                <td>
                    <a href="index.php?act=editsp&id=<?php echo $id ?>" class="btn_add-admin">Sửa</a>
                    <a class="btn_dele-admin xoasp" data-id="<?php echo $id ?>">delete</a>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $price ?></td>
                <td><img src="../upload/<?php echo $img ?>" height="40px" width="40px" alt=""></td>
                <td><?php echo $iddm ?></td>
                <td><?php echo $luotxem ?></td>
                <td><?php echo $mota ?></td>
                <td>
                    <?php foreach(json_decode($soluong) as $sl): ?>
                    <span><?php echo $sl->color ?></span>
                    <span><?php echo $sl->quatyti ?></span>
                    <br>
                    <?php endforeach; ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        <ul class="count_page" style="text-align: center;" page ="<?php echo $page_index ?>"> 
            <?php
             $quatity_pro = count_pro();
             $count_page = ceil($quatity_pro[0]['COUNT(id)'] / 10);
             for($i = 1;$i <= $count_page;$i ++): ?>
                <li class="index_page" data-page = "<?php echo $i ?>" ><a href="index.php?act=sanpham&page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php endfor ?>
        </ul>
    </div>
</body>
