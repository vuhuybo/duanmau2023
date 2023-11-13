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

        if(isset($_POST['soluong']) && $_POST['soluong'] !== ''){
            $soluong = $_POST['soluong'];
        }else{
            $error['soluong'] = 'chưa nhập số lượng sản phẩm';
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
        if(empty($error)){
            edit_sp($idsp, $name, $price ,$new_file,$mota,$iddm,$soluong);
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
    <div class="item_input">
        <label for="">Số lượng sản phẩm</label>
        <input type="number" min="0" name="soluong" value="<?php echo $pro['soluong'] ?>">
    </div>
    <div class="error"><?php if(isset($error['soluong']) && $error['soluong'] !== '' ){ echo $error['soluong']; } ?></div>
    <div class="item_input">
        <label for="">Mô tả sản phẩm</label>
        <textarea cols="40" rows="8" type="" name="description_sp" value="<?php echo $pro['mota'] ?>"><?php echo $pro['mota'] ?></textarea>
    </div>
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
    
    <div class="btn_form">
        <input type="submit" value="Sửa">
    </div>
</form>
<div class="error"></div>
<?php 
?>
