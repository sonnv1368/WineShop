<?php
        // Nếu xóa 1 sản phẩm
        if(isset($_GET['id']))
        {
                unset($_SESSION['giohang'][$_GET['id']]);
                header("location: index.php?page=showcart");
        }
        // Xóa tất cả (với dk giỏ hàng phải có)
        if(isset($_GET['del_all']) && count($_SESSION['giohang']))
        {
                foreach($_SESSION['giohang'] as $id => $sl)
                {
                        unset($_SESSION['giohang'][$id]);        
                }
                header("location: index.php?page=showcart");
        }        

?>