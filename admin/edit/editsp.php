<?php 
    if(isset($_GET['id']) && $_GET['id'] != ''){
        $idsp = $_GET['id'];
        $pro = load_1sp($idsp);
    }
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

        if(isset($_POST['description_sp']) && $_POST['description_sp'] !== ''){
            $mota = $_POST['description_sp'];
        }else{
            $error['discription'] = 'chưa nhập mô tả sản phẩm';
        }
        
        if(isset($_POST['iddm']) && $_POST['iddm'] !== ''){
            $iddm = $_POST['iddm'];
        }else{
            $error['iddm'] = 'chưa nhập id danh mục';
        }
        $colors = $_POST['color'];
        $soluong = $_POST['soluong'];
        $quatyti  = [];
        foreach($colors as $i => $color){
            $quatyti[] = [
                'color' => $color,
                'quatyti' => $soluong[$i]
            ];
        }
        // var_dump($quatyti);
        $quatyti = json_encode($quatyti , JSON_UNESCAPED_UNICODE);
        // var_dump($quatyti);
        if(isset($_FILES['img']) && $_FILES['img']['name'] != ''){
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
            $new_file = $pro['img'];
        }
        // xử lý mô tả
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
        if(empty($error)){
            edit_sp($idsp, $name, $price ,$new_file,$mota,$iddm,$quatyti);
            echo '<div style="text-align: center; color: red;">Sửa thành công</div>';
        }
    }
          
?>

<h1 style="text-align: center; margin: 10px 0;">Sửa sản phẩm </h1>
<form action="index.php?act=editsp&name=chuc&id=<?php echo $idsp ?>" method="post" enctype="multipart/form-data">
    <div class="item_input">
        <label for="">Tên sản phẩm</label>
        <input type="text" name="name" value="<?php echo $pro['name'] ?>">
    </div>
    <div class="error"><?php if(isset($error['user']) && $error['user'] !== '' ){ echo $error['user']; } ?></div>
    <div class="item_input">
        <label for="">Giá sản phẩm</label>
        <input type="number" min="0" name="gia_sp" value="<?php echo $pro['price'] ?>">
    </div>
    <div class="error"><?php if(isset($error['price']) && $error['price'] !== '' ){ echo $error['price']; } ?></div>
    
    <div class="error"><?php if(isset($error['discription']) && $error['discription'] !== '' ){ echo $error['discription']; } ?></div>
    <div class="item_input">
        <label for="">Loại sản phẩm</label>
        <select name="iddm" id="" >
            <?php foreach($listdm as $dm){
                extract($dm);
                if($pro['iddm']== $id){
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            } ?>
            <?php foreach($listdm as $dm){
                extract($dm);
                if($pro['iddm'] != $id){
                    echo '<option value="'.$id.'">'.$name.'</option>';
                }
            } ?>
        </select> 
    </div>
    <div class="error"><?php if(isset($error['iddm']) && $error['iddm'] !== '' ){ echo $error['iddm']; } ?></div>
    <div class="item_input">
        <label for="">Ảnh</label>
        <input type="file" name="img" value="">
        <img src="<?php echo '../upload/'.$pro['img'] ?>" height="50px" alt="">
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
    <?php $motas = json_decode($pro['mota'],true);
    if(is_array($motas)): ?>
    <?php foreach($motas as $mota): ?>
    <div class="item_input" style="margin: 10px 0;">
        <input type="text" style="border: none; background-color: #f0f0f0;" name="info_pro[]" value="<?php echo $mota['name'] ?>" readonly>
        <input type="text" name="description_sp[]" value="<?php echo $mota['value'] ?>">
    </div>
    <?php endforeach ?>
    <?php else: ?>
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
    <?php endif ?>    
        <div class="add_form_info">Thêm 1 thông tin trường khác </div>
    <?php $soluong = json_decode($pro['soluong']) ?>
    <div class="item_input" >
        <label for="">Số lượng các màu</label>
        <?php if(is_array($soluong)): ?>
        <?php foreach($soluong as $sl): ?>
        <div class="input_input">
            <input type="text" name="color[]" value="<?php echo  $sl -> color ?>" placeholder="Nhập màu" style="margin-bottom: 5px;">
            <input type="number" name="soluong[]" value="<?php echo  $sl -> quatyti ?>" placeholder="Số lượng ">
        </div>
        <?php endforeach ?>
        <?php else: ?>
        <div class="input_input">
            <input type="text" name="color[]" placeholder="Nhập màu" style="margin-bottom: 5px;">
            <input type="number" name="soluong[]" placeholder="Số lượng ">
        </div>
        <?php endif ?>
        <div class="btn_add_input" style="cursor: pointer; margin: 5px;">Thêm 1 màu</div>
    </div>
    <div class="btn_form">
        <input type="submit" value="Sửa">
    </div>
</form>
<div class="error"></div>
<?php 
?>
