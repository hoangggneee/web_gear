<p>Thêm Bài Viết</p>
<table border="1px"width="100%"style="border-collapse: collapse;">
 <form method="POST"action="modules/quanlybaiviet/xuly.php" enctype="multipart/form-data"> 
 <tr>
      <td>Tên Bài Viết</td>
      <td><input type="text"name="tenbaiviet"></td>
    </tr>
    <tr>
      <td>Hình ảnh</td>
      <td><input type="file" name="hinhanh"></td>
    </tr>
    <tr>
      <td>Tóm tắt</td>
      <td><textarea rows="10" name="tomtat"style="resize: none;"></textarea></td>
    </tr>
    <tr>
      <td>Nội dung</td>
      <td><textarea rows="10" name="noidung"style="resize: none;"></textarea></td>
    </tr>
    <tr>
      <td>Danh mục bài viết</td>
      <td>
          <select name="danhmuc">
            <?php
              $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
              $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
              while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
            ?>
            <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmucbaiviet'] ?></option>
            <?php 
            }
            ?>
          </select>
      </td>
    </tr>
    <tr>
      <td>Tình trạng</td>
      <td>
          <select name="tinhtrang">
            <option value="1">Kích hoạt</option>
            <option value="0">Ẩn</option>
          </select>
      </td>
    </tr>
      <td colspan="2"><input type="submit"name="thembaiviet"value="Thêm bài viết"></td>
    </tr>
</form>
</table>