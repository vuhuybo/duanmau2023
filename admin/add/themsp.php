<?php 
    $error = [];
    if(isset($_GET['name']) && $_GET['name'] == 'chuc'){
        if(isset($_POST['name']) && $_POST['name'] !== ''){
            $name = $_POST['name'];
        }else{
            $error['user'] = 'chưa nhập tên sản phẩm';
        } 

        if(isset($_POST['gia_sp']) && $_POST['gia_sp'] !== ''){
            $price = $_POST['gia_sp'];
        }else{
            $error['price'] = 'chưa nhập giá sản phẩm';
        }
        
        
        
        if(isset($_POST['iddm']) && $_POST['iddm'] !== ''){
            $iddm = $_POST['iddm'];
        }else{
            $error['iddm'] = 'chưa nhập id danh mục';
        }
        
        if(isset($_FILES['img']) && $_FILES['img'] !== ''){
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
        }else{
            $error['no_file'] = 'chưa chọn file';
        }
        // xử lý số lượng các màu sắc
        $colors = $_POST['color'];
        $soluong = $_POST['soluong'];
        $quatyti  = [];
        foreach($colors as $i => $color){
            $quatyti[] = [
                'color' => $color,
                'quatyti' => $soluong[$i]
            ];
        }
        $quatyti = json_encode($quatyti, JSON_UNESCAPED_UNICODE);
        // xử lý thông tin sản phẩm
        $info_pros = $_POST['info_pro'];
        if(isset($_POST['description_sp']) && $_POST['description_sp'] !== ''){
            $mota = $_POST['description_sp'];
        }else{
            $error['discription'] = 'chưa nhập mô tả sản phẩm';
        }
        $description  = [];
        foreach($info_pros as $i => $info_pro){
            $description[] = [
                'name' => $info_pro,
                'value' => $mota[$i]
            ];
        }
        $description = json_encode($description, JSON_UNESCAPED_UNICODE);
        var_dump($description);
        if(empty($error)){
            add_sp($name, $price ,$new_file,$description,$iddm,$quatyti);
            echo '<div style="text-align: center; color: red; " class="div">thêm sản phẩm thành công</div>';
        }
    }
          
?>
<h1 style="text-align: center; margin: 10px 0;">Thêm sản phẩm mới</h1>
<form action="index.php?act=themsp&name=chuc" method="post" enctype="multipart/form-data">
    <div class="item_input">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name">
    </div>
    <div class="error"><?php if(isset($error['user']) && $error['user'] !== '' ){ echo $error['user']; } ?></div>
    <div class="item_input">
        <label for="">Giá sản phẩm</label>
        <input type="number" min="0" name="gia_sp">
    </div>
    <div class="error"><?php if(isset($error['price']) && $error['price'] !== '' ){ echo $error['price']; } ?></div>
    <div class="item_input">
        <label for="">Loại sản phẩm</label>
        <select name="iddm" id="" >
            <option value=""></option>
            <?php foreach($listdm as $dm): extract($dm) ?>
            <option value="<?php echo $id ?>"><?php echo $name ?></option>
            <?php endforeach ?>
        </select> 
    </div>
    <div class="error"><?php if(isset($error['iddm']) && $error['iddm'] !== '' ){ echo $error['iddm']; } ?></div>
    <div class="item_input">
        <label for="">Ảnh</label>
        <input type="file" name="img">
    </div>
    <div class="error">
        <?php 
        if(isset($error['file_size']) && $error['file_size'] !== '' ){ 
            echo $error['file_size']; 
        } else if(isset($error['file_ext']) && $error['file_ext'] !== '' ){
            echo $error['file_ext']; 
        } else if(isset($error['no_file']) && $error['no_file'] !== ''){
            echo $error['no_file']; 
        }
        ?>
    </div>
    <div class="item_input">
        <input type="text" style="border: none; background-color: #f0f0f0;" name="info_pro[]" value="Thông tin pin" readonly>
        <input type="text" name="description_sp[]">
    </div>
    <div class="error"><?php if(isset($error['discription']) && $error['discription'] !== '' ){ echo $error['discription']; } ?></div>
    <div class="item_input">
        <input type="text" style="border: none; background-color: #f0f0f0;" name="info_pro[]" value="Thông tin màn hình" readonly>
        <input type="text" name="description_sp[]">
    </div>
    <div class="error"><?php if(isset($error['discription']) && $error['discription'] !== '' ){ echo $error['discription']; } ?></div>
    <div class="item_input">
        <input type="text" style="border: none; background-color: #f0f0f0;" name="info_pro[]" value="Thông tin Ram" readonly>
        <input type="text" name="description_sp[]">
    </div>
    <div class="error"><?php if(isset($error['discription']) && $error['discription'] !== '' ){ echo $error['discription']; } ?></div>
    <div class="add_form_info">Thêm 1 thông tin trường khác </div>
    
    <div class="item_input " style="margin-bottom: 10px;">
        <label for="">Số lượng các màu</label>
        <div class="input_input">
            <input type="text" name="color[]" placeholder="Nhập màu" style="margin-bottom: 5px;">
            <input type="number" name="soluong[]" placeholder="Số lượng ">
        </div>
        <div class="btn_add_input" style="cursor: pointer; margin: 5px;">Thêm 1 màu</div>
    </div>
    <div class="btn_form " style="margin-bottom: 20px;">
        <input type="submit" value="Thêm">
        <input type="reset" value="Nhập lại">
    </div>
</form>

<?php 
    // if(empty($error)){
    //     echo '<div class="div">thêm sản phẩm thành công</div>';
    // }
?>
