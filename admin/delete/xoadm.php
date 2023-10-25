<?php
if(isset($_GET['id']) && $_GET['id'] != ''){
        $id = $_GET['id'];
        $count = count_id($id);
        if($count[0]['COUNT(iddm)'] > 0){
            echo 'Còn sản phẩm có danh mục này, chưa thể xóa danh mục';
        }else{
            xoa_dm($id);
            header('location: index.php?act=danhmuc');
            echo '123';
        }
    }