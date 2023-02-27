<p>XEM ĐƠN HÀNG</p>
<?php
$code = $_GET['code'];
 $sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_sanpham WHERE tbl_cart_details.id_sanpham=tbl_sanpham.id_sanpham AND 
    tbl_cart_details.code_cart='".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";  //Sắp xếp thứ tự từ thấp đến cao
 $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table style="width:100%" border = "1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Mã Đơn Hàng</th>
    <th>Tên Sản Phẩm</th>
    <th>Số Lượng</th>
    <th>Đơn Giá</th>
    <th>Thành Tiền</th>
  </tr>
  <?php
    $i = 0;
    $tongtien = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;
        $thanhtien=$row['giasp']*$row['soluongmua'];
        $tongtien +=$thanhtien;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['code_cart'] ?></td>
    <td><?php echo $row['tensanpham'] ?></td>
    <td><?php echo $row['soluongmua'] ?></td>
    <td><?php echo number_format($row['giasp'],0,',','.').'vnd' ?></td>
    <td><?php echo number_format($row['giasp']*$row['soluongmua'],0,',','.').'vnd' ?></td>
  <?php
    }
    ?>
    <tr>
    <td colspan="6">
      <p>Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'vnd' ?> </p>
       
    </td>
    </tr>
    
</table>