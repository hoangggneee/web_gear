<?php
    include('../../config/config.php');

    $tenbaiviet = $_POST['tenbaiviet'];
    //xử lý hình ảnh
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name']; //bắt buộc có , tmp_name : biến tạm hình ảnh
    $hinhanh = time().'_'.$hinhanh;
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $tinhtrang = $_POST['tinhtrang'];
    $danhmuc = $_POST['danhmuc'];


    if(isset($_POST['thembaiviet'])){
        //thêm 
        $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE('".$tenbaiviet."',
        '".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        header('location:../../index.php?action=quanlybaiviet&query=them');
    }
    elseif(isset($_POST['suabaibiet'])){
        //sửa
        if(!empty($_FILES['hinhanh']['name'])){      //nếu không trống hình ảnh thì vẫn giữ hình ảnh cũ
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
        $sql_update = "UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',hinhanh='".$hinhanh."'
        ,tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id='$_GET[idbaiviet]'";
        //XÓA HÌNH ẢNH CŨ
        $sql = "SELECT * FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";  
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']);
            }
        }else{
            $sql_update = "UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',tomtat='".$tomtat."'
            ,noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id='$_GET[idbaiviet]'";     
        }
        mysqli_query($mysqli,$sql_update);
        header('location:../../index.php?action=quanlybaiviet&query=them');
    }else{
            $id = $_GET['idbaiviet'];
            $sql = "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1";  
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']); //từ trang xử lý vào file uploads tim tên hình ảnh dựa vào id sau đó xóa sản phẩm
            } //lấy dữ liệu dựa trên query làm 1 dữ iệu
            $sql_xoa = "DELETE FROM tbl_baiviet WHERE id='".$id."'"; //lấy sản phấm chứa hình ảnh muốn xóa
            mysqli_query($mysqli,$sql_xoa);
            header('location:../../index.php?action=quanlybaiviet&query=them');
    }

?>