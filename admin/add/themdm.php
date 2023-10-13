<h1 style="margin: 20px 0;">Thêm danh mục</h1>
<form action="index.php?act=themdm" method="post" class="form_dm">
    <div class="item_input">
        <label for="">Tên danh mục</label>
        <input type="text" name="name_dm">
    </div>
    <input type="submit" value="Thêm">
    <input type="reset" value="Nhập lại">
    <?php 
        if(isset($_POST['name_dm']) && $_POST['name_dm'] != ''){
            echo '<div style="color: red; font-size: 500; ">Thêm danh mục thành công</div>';
        }
     ?> 
</form>
