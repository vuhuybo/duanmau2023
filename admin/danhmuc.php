        <div class="subject_admin">
            <h1>Danh sách danh mục</h1>
            <a href="index.php?act=themdm">ADD</a>
        </div>
        <table class="table_pro_admin">
            <th>
                <td>ID danh mục</td>
                <td>Tên danh mục</td>
            </th>
            <?php foreach($listdm as $dm): extract($dm) ?>
            <tr>
            <td>
                    <a href="index.php?act=editdm&id=<?php echo $id ?>" class="btn_add-admin">Sửa</a>
                    <a  class="btn_dele-admin xoadm" data-id = "<?php echo $id ?>" >delete</a>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $name ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>