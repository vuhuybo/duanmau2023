<form action="index.php?act=themsp" method="post" enctype="multipart/form-data">
    <div class="item_input">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="name_sp">
    </div>
    <div class="item_input">
        <label for="">Giá sản phẩm</label>
        <input type="number" min="0" class="gia_sp">
    </div>
    <div class="item_input">
        <label for="">Mô tả sản phẩm</label>
        <input type="text" class="description_sp">
    </div>
    <div class="item_input">
        <label for="">Loại sản phẩm</label>
        <select name="iddm" id="">
            <?php foreach($listdm as $dm): extract($dm) ?>
            <option value="<?php echo $id ?>"><?php echo $name ?></option>
            <?php endforeach ?>
        </select> 
    </div>
    <div class="item_input">
        <label for="">Ảnh</label>
        <input type="file" name="img">
    </div>
    <input type="submit" value="Thêm">
    <input type="reset" value="Nhập lại">
    
    <?php
        if(!empty($error)){
            echo '<div class="error">'.$error.'</div>';
        }
    ?>
</form>
<?php
    $error = [];
    if(isset($_POST['name_sp']) && $_POST['name_sp'] != ''){
        if(isset($_POST['name_sp']) && $_POST['name_sp'] != ''){
            $name = $_POST['name_sp'];
        }else $error['user'] = 'chưa nhập tên sản phẩm';

        if(isset($_POST['gia_sp']) && $_POST['gia_sp'] != ''){
            $price = $_POST['gia_sp'];
        }else $error['price'] = 'chưa nhập giá sản phẩm';
        
        if(isset($_POST['description_sp']) && $_POST['description_sp'] != ''){
            $mota = $_POST['description_sp'];
        }else $error['discription'] = 'chưa nhập mô tả sản phẩm';
        
        if(isset($_POST['iddm']) && $_POST['iddm'] != ''){
            $iddm = $_POST['iddm'];
        }else $error['iddm'] = 'chưa nhập id danh mục';
        

        $file = $_FILES['img'];
        $filename = $file['name'];
        $filename = explode('.',$filename);
        $ext = end($filename);
        $new_file = md5(uniqid()).'.'.$ext;
        $file_allow = ['png','jpg'];
        if(in_array($ext,$file_allow)){
            $file_size = $file['size']/1024/1024;
            $size_allow = 10;
            if($file_size<= $file_allow){
                move_uploaded_file($file['tmp_name'],'../upload/'.$new_file);
            }else{
                $error['file_size'] =' size err' ;
            }
        }else{
            $error['file_ext']  = 'file k hợp lệ';
        }
        if(!empty($error)){
            add_sp($name , $price , $new_file , $mota , $iddm);
        }
        }
?>