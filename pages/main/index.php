<?php
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}else{
    $page = 1;
}
if($page == ''|| $page == 1){
    $begin = 0;
}else{
    $begin = ($page*3)-3; // bắt đầu sản phẩm 3
}
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  
    ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,3"; //giới hạn 1 trang là 3 sản phẩm
    $query_pro = mysqli_query($mysqli,$sql_pro);
    

?>
 <h3>SẢN PHẨM MỚI NHẤT</h3>
                <ul class = "product_list" >
                    <?php
                    while($row = mysqli_fetch_array($query_pro)){

                    ?>
                <li>
                <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                        <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" >
                        <p class ="Title_product"><?php echo $row['tensanpham'] ?></p>
                        <p class ="Price_product"><?php echo number_format($row['giasp'],0,',','.').'vnd' ?></p>
                        <p style="text-align: center; color:black"><?php echo $row['tendanhmuc'] ?></p>
                        </a>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>
                <div style="clear: both;"></div>
                    <style>
                        ul.list_trang {
                            /* float: right; */
                            padding: 0;
                            margin: 0;
                            list-style: none;
                            text-decoration: none;
                        }
                        ul.list_trang li {
                            text-align: center;
                            margin: 5px;
                            float: left;
                            background: #b5ff0054;
                            display: block;
                            padding: 6px 18px;
                            /* text-decoration: none; */
                        }
                        ul.list_trang li a {
                            color: black;
                            text-align: center;
                            text-decoration: none;
                            
                            
                        }
                        
                    </style>
                     <?php 
                    $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
                    $row_count = mysqli_num_rows($sql_trang);
                    $trang = ceil($row_count/3); //hàm làm tròn
                    ?>
                    <p>Trang Hiện Tại: <?php echo $page ?>/<?php echo $trang ?></p>
                   
                <ul class="list_trang">
                    <?php

                        for($i=1; $i<=$trang;$i++){

                        
                    ?>
                        <li <?php if($i == $page){ echo 'style="background:red;"';}else{echo '';} ?>><a href="index.php?trang=<?php echo $i ?>"><?php echo $i  ?></a></a></li>
                    <?php
                    }
                    ?>

                </ul>