
        <div class="subject_admin">
            <h1>Danh sách người dùng</h1>
            <a href="">ADD</a>
        </div>
        <table class="table_pro_admin">
            <th>
                <td>ID người dùng</td>
                <td>Tên người dùng</td>
                <td>Pass</td>
                <td>Email</td>
                <td>Address</td>
                <td>Số điện thoại</td>
                <td>Role</td>
            </th>
            <?php foreach($listuser as $user): extract($user) ?>
            <tr>
                    <td>
                    <a href="" class="btn_add-admin">Sửa</a>
                    <a href="" class="btn_dele-admin">delete</a>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $user ?></td>
                <td><?php echo $pass ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $tel ?></td>
                <td><?php echo $role ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>