        <div class="subject_admin">
            <h1>Danh sách bình luận</h1>
            <a href="">ADD</a>
        </div>
        <table class="table_pro_admin">
            <th>
                <td>ID bình luận</td>
                <td>nội dung bình luận</td>
                <td>ngày bình luận</td>
                <td>id sản phẩm</td>
                <td>id người dùng</td>
            </th>
            <?php foreach($listbl as $bl): extract($bl) ?>
            <tr>
                <td>
                    <a href="" class="btn_add-admin">Sửa</a>
                    <a href="" class="btn_dele-admin">delete</a>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $noidung ?></td>
                <td><?php echo $ngaybinhluan ?></td>
                <td><?php echo $idpro ?></td>
                <td><?php echo $iduser ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>