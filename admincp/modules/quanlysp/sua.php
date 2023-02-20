<?php
 $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham= '$_GET[idsanpham]'LIMIT 1";  //Sắp xếp thứ tự từ thấp đến cao
 $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<p>Sửa Sản Phẩm</p>
<table border="1px"width="100%"style="border-collapse: collapse;">
<?php
while($row = mysqli_fetch_array($query_sua_sp)){
?>
 <form method="POST"action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" enctype="multipart/form-data">  <!--đẩy qua hết trang xử lý -->
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" value="<?php echo $row['tensanpham'] ?>" name="tensanpham"></td>   <!--kiểu text auto thêm value : sửa giá trị -->
    </tr>
    <tr>
      <td>Mã sp</td>
      <td><input type="text" value="<?php echo $row['masp'] ?>" name="masp"></td>
    </tr>
    <tr>
      <td>Gía sp</td>
      <td><input type="text" value="<?php echo $row['giasp'] ?>" name="giasp"></td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="text" value="<?php echo $row['soluong'] ?>" name="soluong"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td>
        <input type="file" name="hinhanh">
        <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>"width="100px">
    </td>
    </tr>
    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="10" name="tomtat"style="resize: none;"><?php echo $row['tomtat'] ?></textarea></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><textarea rows="10" name="noidung"style="resize: none;"><?php echo $row['noidung'] ?></textarea></td>
    </tr>
    <tr>
      <td>Danh mục sản phẩm</td>
      <td>
          <select name="danhmuc">
            <?php
              $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY tendanhmuc DESC";
              $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
              while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){     //so sánh id danh mục với vòng lặp tới khi nó chạy sao cho id danh mục bằng id mục của sản phẩm

                
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
            <?php 
              }else{
                  ?>
                  <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                  <?php    
              }
            }
            ?>
          </select>
      </td>
    </tr>
    <tr>
      <td>Tình trạng</td>
      <td>
          <select name="tinhtrang">
            <?php 
            if($row['tinhtrang']==1){

            
            ?>
            <option value="1" selected>Kích hoạt</option>
            <option value="0">Ẩn</option>
            <?php
            }else{
            ?>
              <option value="1">Kích hoạt</option>
            <option value="0" selected>Ẩn</option>
            <?php
            }
            ?>
          </select>
      </td>
    </tr>
      <td colspan="2"><input type="submit"name="suasanpham"value="Sửa Sản Phẩm"></td>
    </tr>
</form>
<?php
}
?>
</table>