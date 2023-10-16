<?php 
    if(isset($_GET['id']) && $_GET['id'] !=''){
        $iddm = $_GET['id'];
        $dm = load_dm_id($iddm);
    }
    if(isset($_POST['name_dm']) && $_POST['name_dm'] != ''){
        $iddm = $dm['id'];
        $name_dm = $_POST['name_dm'];
        edit_dm($iddm,$name_dm);
        echo '<div style="color: red; text-align: center; font-size: 500; ">Sửa danh mục thành công</div>';
    }
?>
<h1 style="margin: 20px 0; text-align: center; ">Sửa danh mục</h1>
<form action="index.php?act=editdm&id=<?php echo $dm['id'] ?>" method="post" class="form_dm">
    <div class="item_input">
        <label for="">Tên danh mục</label>
        <input type="text" name="name_dm" value="<?php echo $dm['name'] ?>">
    </div>
    <div class="btn_form">
        <input style="margin: 10px;" type="submit" value="Sửa">
    </div> 
</form>
