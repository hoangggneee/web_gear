<?php 
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan =$_POST['username'];
        $matkhau =md5($_POST['password']);
        $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row); //đếm số dòng của row
        if($count>0){ //điền đúng
            $_SESSION['dangnhap'] = $taikhoan;
            header("Location:index.php"); //nhập đúng thì vào trang hệ quản trị
        }else{
            echo '<script>alert("Tài Khoản Hoặc Mật Khẩu Sai !!!, Vui Lòng Nhập Lại");</script>';
            header("Location:login.php"); //quay về lại từ đầu
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
    body{
        background: white;
    }
    .wrapper-login {
    width: 25%;
    margin: auto;
}
table.table-login {
    width: 79%;
}
table.table-login tr td {
    padding: 10px;
}
</style>
<title>Trang Đăng Nhập Admin</title>
</head>
<body>
<div class="wrapper-login">
    <form action="" autocomplete="off" method="POST">
        <table border="1" class="table-login" style="text-align: center;border-collapse:collapse;">
            <tr>
                <td colspan="2"><h3>Đăng Nhập Admin</h3></td>
            </tr>
            <tr>
                <td>Tài Khoản</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Mật Khẩu</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập "></td>
            </tr>
        </table>
    </form>

</div>
<script type="tex/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" ></script>
</body>
</html>
