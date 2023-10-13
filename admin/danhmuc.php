<h1>Danh sách danh mục</h1>
        <table class="table_pro_admin">
            <th>
                <td>ID danh mục</td>
                <td>Tên danh mục</td>
            </th>
            <?php foreach($listdm as $dm): extract($dm) ?>
            <tr>
                <td>
                    <button class="btn_add-admin">add</button>
                    <button class="btn_dele-admin">delete</button>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $name ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>