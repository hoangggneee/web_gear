<?php
 $sql_lietke_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY thutu DESC";  //Sắp xếp thứ tự từ thấp đến cao
 $query_lietke_danhmucbv = mysqli_query($mysqli,$sql_lietke_danhmucbv);
?>
<p>Liệt Kê Danh Mục Bài Viết</p>
<table style="width:100%" border = "1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Tên Danh Mục</th>
    <th>Quản Lý</th>

  </tr>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmucbv)){
        $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['tendanhmucbaiviet'] ?></td>
    <td>
        <a href="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet'] ?>"> Xóa</a>| <a href="
        ?action=quanlydanhmucbaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet'] ?>">Sửa</a>
    </td>
  </tr>
  <?php
    }
    ?>
    
</table>