
<p>GIỎ HÀNG
  <?php
  if(isset($_SESSION['dangky'])){
    echo 'xin chào ' .'<span style="color: red">'.$_SESSION['dangky'].'</span>'; //in ra tên khách hàng
    // echo $_SESSION['id_khachhang']; //in ra id khách hàng
  }
  ?>
</p>
<?php 
    if(isset($_SESSION['cart'])){
    }
?>
<table style="width:100%; text-align: center; border-collapse:collapse;" border="1";>
  <tr>
    <th>STT</th>
    <th>Mã Sản Phẩm</th>
    <th>Tên Sản Phẩm</th>
    <th>Hình Ảnh</th>
    <th>Số Lượng</th>
    <th>Gía Sản Phẩm</th>
    <th>Thành Tiền</th>
    <th>Quản Lý</th>
  </tr>
    <?php 
    if(isset($_SESSION['cart'])){
        $i=0;
       $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
            $tongtien+=$thanhtien;  //$tongtien+$thanhtien
            $i++;
    
    ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masp'] ?></td>
    <td><?php echo $cart_item['tensanpham'] ?></td>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>"width="150px"></td>
    <td>
      <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a><!--Cộng -->
    <?php echo $cart_item['soluong'] ?>
    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"> <i class="fa-solid fa-minus"></i> </a><!--Trừ -->
  
  </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnd' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnd'; ?></td>
   <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-trash"></i></a></td>   <!--xóa -->
  </tr>
  <?php
        }// kết thúc forech
    ?>
     <tr>
    <td colspan="8">
      <p>Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'vnd' ?></p>
       <p style="float :right;"><a class="xoa_all" href="pages/main/themgiohang.php?xoatatca=1">Xóa Tất Cả</a></p>
        <div style="clear: both;"></div>
        <?php 
        if(isset($_SESSION['dangky'])){
        ?>
        <p><a href="pages/main/thanhtoan.php">Đặt Hàng</a></p>
        <?php
        }else{ 
        ?>
        <p><a style="text-decoration: none;" href="index.php?quanly=dangky">Đăng Ký Đặt Hàng</a></p>
        <?php
      }
        ?>
        
       
    </td>
     
  </tr>
    <?php    
    }else{
     ?>
     <tr>
    <td colspan="8"><p>Hiện Tại Giỏ Hàng Trống, Vui Lòng Chọn Sản Phẩm Để Thanh Toán</p><a><i class="fa-regular fa-cart-circle-xmark"></i><a> 
      <a style="text-decoration: none;" href="index.php"><i class="fa-solid fa-house"></i> Trang Chủ</a> </td>
  </tr>
     <?php  
    }
     ?>

</table>