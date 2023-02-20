<?php
    session_start();
    include('../../admincp/config/config.php');
    //thêm số lượng
    if(isset($_GET['cong'])){
        $id=$_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item ){
            if($cart_item['id']!=$id){
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); 
                $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['soluong']+1;
                if($cart_item['soluong']<=9){ //mỗi sản phẩm mua max là 10 sản phẩm  //
                   
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); 


                }else{
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); 

                }
            }
            $_SESSION['cart'] = $product;
        
        }
        header('Location:../../index.php?quanly=giohang'); //quay về trang giỏ hàng
    }
    //trừ số lượng
    if(isset($_GET['tru'])){
        $id=$_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item ){
            if($cart_item['id']!=$id){
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); 
                $_SESSION['cart'] = $product;
            }else{
                $tangsoluong = $cart_item['soluong']-1;
                if($cart_item['soluong']>1){
                    
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); 


                }else{
                    $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); 

                }
            }
            $_SESSION['cart'] = $product;
        
        }
        header('Location:../../index.php?quanly=giohang'); //quay về trang giỏ hàng
    }
    //xóa sản phẩm
    if(isset($_SESSION['cart']) &&isset($_GET['xoa'])){
        $id=$_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item ){
            if($cart_item['id']!=$id){ //nếu sản phẩm khác id thì thỏa lệnh If này và chạy session product
                $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            }
            $_SESSION['cart'] = $product; //còn sản phẩm còn lại
            header('Location:../../index.php?quanly=giohang'); //quay về trang giỏ hàng
        }
    }
    //xóa tất cả
    if(isset($_GET['xoatatca']) &&$_GET['xoatatca']==1){
        unset($_SESSION['cart']); //chỉ định session cần xóa
        header('Location:../../index.php?quanly=giohang'); //quay về trang giỏ hàng
    }
    //thêm sản phẩm vào giỏ hàng
    if(isset($_POST['themgiohang'])){
        //session_destroy();  //hủy toàn bộ session
        $id=$_GET['idsanpham'];
        $soluong=1;
        $sql ="SELECT * FROM tbl_sanpham WHERE id_sanpham='$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        
        if($row){
            $new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp']));
            //Kiểm Tra session gio hàng tồn tại
            if(isset($_SESSION['cart'])){ 
                $found= false;
                foreach($_SESSION['cart'] as $cart_item ){
                    //nếu dữ liệu trùng
                    if($cart_item['id']==$id){
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                        $found= true;
                    }else{
                        //nếu dữ liệu không trùng
                        $product[]=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    }
                }
                if($found == false){
                    //liên kết dữ liệu new product vớ product
                    $_SESSION['cart'] = array_merge($product,$new_product); //liên kết mãng product với new product
                }else{
                    $_SESSION['cart'] = $product;
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location:../../index.php?quanly=giohang');

    }



?>