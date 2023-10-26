<?php 
    if(isset($_GET['id']) && $_GET['id'] != ''){
        $id = $_GET['id'];
        dele_cmt($id);
        header('location: index.php?act=binhluan');
    }