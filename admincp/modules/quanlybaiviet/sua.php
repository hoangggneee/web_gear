<?php
 $sql_sua_bv = "SELECT * FROM tbl_baiviet WHERE id= '$_GET[idbaiviet]'LIMIT 1";  //Sắp xếp thứ tự từ thấp đến cao
 $query_sua_bv = mysqli_query($mysqli,$sql_sua_bv);
?>
<p>Sửa bài viết</p>
<table border="1px"width="100%"style="border-collapse: collapse;">
<?php
while($row = mysqli_fetch_array($query_sua_bv)){
?>
 <form method="POST"action="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>" enctype="multipart/form-data">  <!--đẩy qua hết trang xử lý -->
    <tr>
      <td>Tên bài viết</td>
      <td><input type="text" value="<?php echo $row['tenbaiviet'] ?>" name="tenbaiviet"></td>   <!--kiểu text auto thêm value : sửa giá trị -->
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td>
        <input type="file" name="hinhanh">
        <img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>"width="100px">
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
      <td>Danh mục bài viết</td>
      <td>
          <select name="danhmuc">
            <?php
              $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
              $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
              while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                
                if($row_danhmuc['id_baiviet']==$row['id_danhmuc']){     //so sánh id danh mục với vòng lặp tới khi nó chạy sao cho id danh mục bằng id mục của sản phẩm

                
            ?>
            <option selected value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmucbaiviet'] ?></option>
            <?php 
              }else{
                  ?>
                  <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmucbaiviet'] ?></option>
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
      <td colspan="2"><input type="submit"name="suabaibiet"value="Sửa Bài Viết"></td>
    </tr>
</form>
<?php
}
?>
</table>