<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="13" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px; border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma"><a href="index.php?page=sp&new" class="amain">SẢN PHẨM MỚI</a></font></strong></font></td>
  </tr>
  <tr> 
    <td height="20" colspan="12" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  <tr> 
  <?php		
			$sql="select * from sanpham where trangthai=1 order by masp desc limit 0,4";
			$chay=mysql_query($sql) or die (mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					$id=$ketqua[0];
					$idloai=$ketqua[2];
					$sql1="select * from loaisp where malsp=$idloai and trangthai=1";
					$chay1=mysql_query($sql1) or die (mysql_error());
					if (mysql_num_rows($chay1)>0)
					{
						while ($kq=mysql_fetch_array($chay1))
						{
							$idmuc=$kq[2];
						}
					}
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
					$noidung=$ketqua[4];
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
                        </div>
                        </a>
                    </td>
          			<td width="11" valign="top">
		  				<table width="100%" border="0" cellpadding="0" cellspacing="0" >
              <!--DWLayoutTable-->
              				<tr> 
                				<td width="11" height="220">&nbsp;</td>
              				</tr>
            			</table>
                    </td>
        		</tr>
        		<tr> 
          			<td height="19" valign="top">
                    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              				<tr> 
                				<td width="160" height="19"></td>
              				</tr>
            			</table>
                    </td>
          			<td>&nbsp;</td>
        		</tr>
      		</table>
        </td>
	     <td width="5"></td>
	             
	  
    

<?php
				}}
				?>
                  </tr>
     <tr> 
  <?php		
			$sql="select * from sanpham where trangthai=1 order by masp desc limit 4,4";
			$chay=mysql_query($sql) or die (mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					$id=$ketqua[0];
					$idloai=$ketqua[2];
					$sql1="select * from loaisp where malsp=$idloai and trangthai=1";
					$chay1=mysql_query($sql1) or die (mysql_error());
					if (mysql_num_rows($chay1)>0)
					{
						while ($kq=mysql_fetch_array($chay1))
						{
							$idmuc=$kq[2];
						}
					}
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
					$noidung=$ketqua[4];
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
									<div style="height:150px;display:table-cell;vertical-align:bottom"><img src="<?php echo $anh;?>" border="0" class="mainimage"></div>
									<br> 
                                      <div style="font-family : tahoma;padding: 5px 0px 5px 0px "> 
                                        <font color="#EA430B"><?php echo $ten?></font> </div>
                                      <font color="#db8331">Giá : <?php echo number_format($gia,0,',','.');?> VNĐ</font></strong>
                                    <br />
                                    <div style="padding : 5px 5px 5px 0px;"><font face="arial" size="2" color="#3A8CEF">Số lượng: <?php echo $soluong;?></font></div>
                                      </td>
                                      
			              </tr>
            			</table>
                        </div>
                        </a></td>
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
	     <td width="5"></td>
	             
	  
    

<?php
				}}
				?>
                 
                  </tr>
</table>
<div style="height: 10px;"></div>

<?php
	$sql0="SELECT * FROM danhmucsp where trangthai=1 order by madanhmuc asc";
			$chay0=mysql_query($sql0) or die (mysql_error());
			if (mysql_num_rows($chay0)>0)
			{
				while ($ketqua0=mysql_fetch_array($chay0))
				{
					$idmuc=$ketqua0[0];
					$tenmuc=$ketqua0[1];
					


?>

<!-------------------------------------------------------->
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="13" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma"><a href="index.php?page=sp&idmuc=<?php echo $idmuc;?>" class="amain"><div style="text-transform:uppercase;"><?php echo $tenmuc;?></div></a></font></strong></font></td>
  </tr>
  <tr> 
    <td height="20" colspan="12" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
  <tr> 
  <?php		
			$sql="SELECT * FROM sanpham WHERE malsp IN (SELECT malsp FROM loaisp WHERE madanhmuc = $idmuc and trangthai=1) and trangthai=1 order by masp desc LIMIT 0 , 4";
			$chay=mysql_query($sql) or die (mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					$id=$ketqua[0];
					$idloai=$ketqua[2];
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
					$noidung=$ketqua[4];
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
            </div>
            </a></td>
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
	     <td width="5"></td>
	             
	  
    

<?php
				}}
				?>
                  </tr>
     <tr> 
  <?php		
			$sql="SELECT * FROM sanpham WHERE malsp IN (SELECT malsp FROM loaisp WHERE madanhmuc = $idmuc and trangthai=1) and trangthai=1 order by masp desc LIMIT 4 , 4";
			$chay=mysql_query($sql) or die (mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					
					$id=$ketqua[0];
					$idloai=$ketqua[2];
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
					$noidung=$ketqua[4];
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
            </div>
            </a></td>
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
	     <td width="5"></td>
	             
	  
    

<?php
				}
			}
				?>
                    
                  </tr>
</table>
<div style="height: 10px;"></div>
<?php
				}
			}


?>
