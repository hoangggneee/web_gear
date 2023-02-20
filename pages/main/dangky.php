<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $dienthoai = $_POST['dienthoai'];
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."'
        ,'".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){   //thông báo đăng ký thành công
            echo '<p style="color:green">Đăng Ký Thành Công !</p>'; 
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli); //khi đăng ký tk mới  
            header('Location:index.php?quanly=giohang');
        }
        
    }
?>


<p>Đăng Ký Thành Viên</p>
<style>
    table.dangky tr td{
        padding: 5px;
    }
</style>
<form action="" method="POST" >
<table class="dangky" border="1" width="50%" style="border-collapse:collapse;">
    <tr>
        <td>Họ Và Tên</td>
        <td><input type="text" size="50" name="hovaten"></td> 
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" size="50" name="email"></td> 
    </tr>
    <tr>
        <td>Điện Thoại</td>
        <td><input type="text"size="50" name="dienthoai"></td> 
    </tr>
    <tr>
        <td>Địa Chỉ</td>
        <td><input type="text"size="50" name="diachi"></td> 
    </tr>
    <tr>
        <td>Mật Khẩu</td>
        <td><input type="password"size="50" name="matkhau"></td> 
    </tr>
    <tr>
        <td><input type="submit" name="dangky" value="Đăng Ký"></td> 
        <td><a style="text-decoration: none;" href="index.php?quanly=dangnhap">Đăng Nhập nếu có tài khoản</a></td> 
    </tr>
</table>
</form>