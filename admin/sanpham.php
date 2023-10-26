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
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
