<?php
 $sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet= '$_GET[idbaiviet]'LIMIT 1";  //Sắp xếp thứ tự từ thấp đến cao
 $query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);
?>
<p>Sửa Danh Mục Bài Viết</p>
<table border="1px"width="50%"style="border-collapse: collapse;">
<?php
        while($dong = mysqli_fetch_array($query_sua_danhmucbv)){
    ?>
    <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?idbaiviet=<?php echo $dong['id_baiviet'] ?>">
    <tr>    
      <td>Tên Danh Mục Bài Viết</td>
      <td><input type="text" value="<?php echo $dong['tendanhmucbaiviet'] ?>"name="tendanhmucbaiviet"> </td>
    </tr>
    <tr>
    <td>Thứ Tự</td>
      <td><input type="text" value="<?php echo $dong['thutu'] ?>"name="thutu"> </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit"name="suadanhmucbaiviet"value="Cập Nhật Danh Mục Bài Viết"></td>
    </tr>
    </form>
<?php
    }

?>
</table>