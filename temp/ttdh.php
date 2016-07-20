<?php
		
		$id=$_GET["id"];
?>


      
	  <?php 
	  
	  	$chay0=mysql_query("select * from dondathang where matk=$id");
		if (mysql_num_rows($chay0)>0)
		{
		while ($ketqua0=mysql_fetch_array($chay0))
			{
				$dh=$ketqua0[0];
				$ngay=$ketqua0[4];
				$i=0;
			?>
            <fieldset>
  <legend><font color="#222222" size="2" face="Tahoma">Ngày đặt hàng: <strong><?php echo $ngay;?></strong></font></legend>
            
            <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" >  
		
        <tr>
        	<td width="30" height="20" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
            <td width="140" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tên sản phẩm</strong></font></td>
            <td width="80" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Đơn giá</strong></font></td>
            <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Số lượng</strong></font></td>
            <td width="100" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Thành tiền</strong></font></td>
            
       </tr>
        <?php
	  		$chay=mysql_query("select * from chitietddh where maddh=$dh");
			while ($ketqua=mysql_fetch_array($chay))
			{
				$idsp=$ketqua[1];
				$dongia=$ketqua[3];
				$soluong=$ketqua[2];
				$thanhtien=$soluong*$dongia;
				$i=$i+1;
				
				$chay1=mysql_query("select sum(soluong*dongia) from chitietddh where maddh=$dh");
				while ($ketqua1=mysql_fetch_array($chay1))
				{
					$tongcong=$ketqua1[0];
				}
				?>
                
       <?php
				
				$result=mysql_query("select tensp from sanpham where masp=$idsp");
				while ($kq=mysql_fetch_array($result))
				{
					$tensp=$kq[0];
				}
		?>

      	
       <tr>
        <td width="30" height="20" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="140" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $tensp;?></font></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo number_format($dongia,0,',','.'); ?> VNĐ</font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $soluong;?></font></td>
		<td width="100" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo number_format($thanhtien,0,',','.');?> VNĐ</font></td>
       </tr>
       
       <?php }
	   ?>
        </table>
       <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" >  
        <tr>
        	<td width="200" height="25" align="center" valign="middle"></td>
            <td width="50" align="right" valign="middle"><font color="#222222" size="2" face="Tahoma"><strong>Tổng cộng</strong></font></td>
            <td width="80" align="center" valign="middle"><font color="#ff0000" size="2" face="Tahoma"><strong><?php echo number_format($tongcong,0,',','.');?> VNĐ</strong></font></td>
            
       </tr>
       </table>
	   
        </fieldset>
        
       <div style="height: 10px;"></div>
       <?php
	    
			}
		}
		else
		{
			?>
            <div align="center">Bạn chưa có đơn đặt hàng nào</div>
            <?php
		}
		  ?>
     
   
    