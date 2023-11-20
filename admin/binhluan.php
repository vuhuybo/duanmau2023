        <div class="subject_admin">
            <h1>Danh sách bình luận</h1>
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
                    <a data-id="<?php echo $id ?>" class="btn_dele-admin xoacmt">delete</a>
                </td>
                <td> <?php echo $id ?></td>
                <td><?php echo $noidung ?></td>
                <td><?php echo $ngaybinhluan ?></td>
                <td><?php echo $idpro ?></td>
                <td><?php echo $iduser ?></td>
            </tr>
            <?php endforeach ?>
        </table>
        <ul class="count_page" style="text-align: center;" page="<?php echo $page_index ?>"> 
            <?php
             $quatity_pro = count_cmt();
             $count_page = ceil($quatity_pro[0]['COUNT(id)'] / 10);
             for($i = 1;$i <= $count_page;$i ++): ?>
                <li class="index_page" data-page = "<?php echo $i ?>" ><a href="index.php?act=binhluan&page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php endfor ?>
        </ul>
    </div>
</body>