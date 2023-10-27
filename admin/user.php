    <div>
        <div class="subject_admin">
            <h1>Danh sách người dùng</h1>
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
                <td>Name</td>
            </th>
            <?php foreach($listuser as $user): extract($user) ?>
            <tr>
                <td>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $user ?></td>
                <td><?php echo $pass ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $address ?></td>
                <td><?php echo $tel ?></td>
                <td><?php echo $role ?></td>
                <td><?php echo $name ?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>