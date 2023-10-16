        <div class="subject_admin">
            <h1>Danh sách sản phẩm</h1>
            <a href="">ADD</a>
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
            </th>
            <?php foreach($listsp as $pro): extract($pro) ?>
            <tr>
                <td>
                    <a href="index.php?act=editsp&id=<?php echo $id ?>" class="btn_add-admin">Sửa</a>
                    <a href="#"  onclick="xacnhan()" class="btn_dele-admin">delete</a>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $price ?></td>
                <td><img src="../upload/<?php echo $img ?>" height="40px" width="40px" alt=""></td>
                <td><?php echo $iddm ?></td>
                <td><?php echo $luotxem ?></td>
                <td><?php echo $mota ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
