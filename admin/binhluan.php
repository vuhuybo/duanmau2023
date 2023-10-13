<h1>Danh sách bình luận</h1>
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
                    <button class="btn_add-admin">add</button>
                    <button class="btn_dele-admin">delete</button>
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