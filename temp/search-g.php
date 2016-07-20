<?php
	$keyword=$_GET["keyword"];
?>
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="13" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma" style="text-transform:uppercase;">KẾT QUẢ TÌM KIẾM: <?php if ($keyword==1)
		{
				echo " Dưới 1.000.000";
		}
		if ($keyword==2)
		{
				echo " 1.000.000 - 5.000.000";
		}
		if ($keyword==3)
		{
				echo " 5.000.000 - 15.000.000";
		}
		if ($keyword==4)
		{
				echo " Trên 15.000.000";
		}
		
		?></a></font></strong></font></td>
  </tr>
  <tr> 
    <td height="20" colspan="12" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>


   <?php
   		
	  	if ( isset($_GET['trang'])==false )
		{
			$trang = 0 ;
		}
		else
		{
			$trang=$_GET['trang'];
		}
		if ($keyword==1)
		{
				$sql="select * from sanpham where dongia < 1000000 and trangthai=1";
		}
		if ($keyword==2)
		{
				$sql="select * from sanpham where dongia between 1000000 and 5000000 and trangthai=1";
		}
		if ($keyword==3)
		{
				$sql="select * from sanpham where dongia between 5000000 and 15000000 and trangthai=1";
		}
		if ($keyword==4)
		{
				$sql="select * from sanpham where dongia >15000000 and trangthai=1";
		}
	  	
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/16;
		$dong=$trang*16;
		if ($t_sodong==0)
		{
		?>
          <tr> 
         <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có sản phẩm nào</strong></font></td></tr>
 <?php }
	  	else
		{
			?>
            
	<tr>
            <?php
			for ($i=0;$i<4;$i++)
			{
				$dong=$dong+$i*4;
				if ($keyword==1)
			{
					$sql="select * from sanpham where dongia < 1000000 and trangthai=1 limit $dong,4";
			}
			if ($keyword==2)
			{
					$sql="select * from sanpham where dongia between 1000000 and 5000000 and trangthai=1 limit $dong,4";
			}
			if ($keyword==3)
			{
					$sql="select * from sanpham where dongia between 5000000 and 15000000 and trangthai=1 limit $dong,4";
			}
			if ($keyword==4)
			{
					$sql="select * from sanpham where dongia >15000000 and trangthai=1 limit $dong,4";
			}
			$chay=mysql_query($sql) or die ("loi".mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					$id=$ketqua[0];
					$idloai=$ketqua[2];
					$ten=$ketqua[3];
					$ten=$ketqua[3];
					$title=$ten;
					$num_char=mb_strlen($ten,"UTF-8");
					if ($num_char>30)
					{
						$cut=mb_substr($ten,0,30);	
						$ten=mb_substr($cut, 0, strrpos($cut, ' '))."...";
						
					}
					$gia=$ketqua[5];
					$anh=$ketqua[6];
					$soluong=$ketqua[7];
			?>
			   
    <td width="5"></td>
	    <td width="160" valign="top">	
	<table width="160" border="0" cellpadding="0" cellspacing="0">
        <!--DWLayoutTable-->
        <tr> 
          <td width="160" height="220" valign="top">
          	<a href="index.php?page=ct-sp&id=<?php echo $id?>" style="text-decoration:none;">
          	<div title="<?php echo $title;?>">
                        <table width="160" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
               				<tr> 
                				<td width="160" height="220" align="center" valign="top" class="product-main">
									<div style="height:150px;display:table-cell;vertical-align:bottom"><img src="<?php echo $anh?>" border="0" class="mainimage"></div>
									<br> 
                                      <div style="font-family : tahoma;padding: 5px 0px 5px 0px "> 
                                        <font color="#EA430B"><?php echo $ten?></font> </div>
                                      <font color="#db8331">Giá : <?php echo number_format($gia,0,',','.');?> VNĐ</font></strong>
                                    <br />
                                    <div style="padding : 5px 5px 5px 0px;"><font face="arial" size="2" color="#3A8CEF">Số lượng: <?php echo $soluong;?></font></div>
                                      </td>
                                     
			              </tr>
            			</table>
                        </div></a></td>
          <td width="11" valign="top">
		  <table width="100%" border="0" cellpadding="0" cellspacing="0" >
              <!--DWLayoutTable-->
              <tr> 
                <td width="11" height="220">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="19" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="160" height="19"></td>
              </tr>
            </table></td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
	     
	             <?php
				}
				?>
	  
    
 </tr>
<?php
				}}}
				?>
                 

                  
</table>
<div style="height: 10px;"></div>
<tr><td align="center">
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=search-g&keyword={$keyword}&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td>

    </tr>
