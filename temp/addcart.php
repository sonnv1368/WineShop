<?php
        $id = $_GET["id"];
        if($id != "")
        {
                include("include/dbconn.php");
                $q = mysql_query("SELECT * FROM sanpham WHERE masp =$id and trangthai=1");
                $num_q = mysql_num_rows($q);
                // Nếu tồn tại
                if($num_q == 1)
                {
                        if(isset($_SESSION['giohang'][$id]))
                        {
                                
                                $_SESSION['giohang'][$id] ++;
                        }
                        else // Chưa có trong giỏ hàng (mới chọn)
                        {
                                $_SESSION['giohang'][$id] = 1; // Số lượng mặc định là 1
                        }
                        // Chuyển tức khắc qua trang giỏ hàng
                        header("location: index.php?page=showcart");
                }
                else
                {
                        echo "<p align='center' style='font-size:18;color:red'>Không tồn tại sản phẩm này!</p>";
                        header("refresh:3; index.php?page=showcart");
                }
        }
        else // Nếu không có id truyền vào
        {
                echo "<p align='center' style='font-size:18;color:red'>Access Denny!</p>";
        }

?>