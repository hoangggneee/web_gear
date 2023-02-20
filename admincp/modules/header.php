<?php 
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangnhap']);
    header('Location:login.php');
}

?>
<p><a style="text-decoration: none;" href="index.php?dangxuat=1">Đăng Xuất : <?php if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                }  ?></a></p>