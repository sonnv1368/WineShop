<?php 
	if (isset($_GET["idmuc"])==true)
	{

?>
<?php
	include("include/dbconn.php");
	ob_start();
	$idmuc=$_GET["idmuc"];
	$sql="select * from danhmucsp where madanhmuc=$idmuc and trangthai=1";
	$chay=mysql_query($sql);
	while ($kq=mysql_fetch_array($chay))
	{
		$tenmuc=$kq[1];
	}
?>
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="13" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma" style="text-transform:uppercase;"><a href="index.php?page=sp&idmuc=<?php echo $idmuc;?>" class="amain"><div style="text-transform:uppercase;"><?php echo $tenmuc;?></div></a></font></strong></font></td>
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
	  	$sql="SELECT * FROM sanpham WHERE malsp IN (SELECT malsp FROM loaisp WHERE madanhmuc = $idmuc) and trangthai=1 order by masp desc";
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
				$dong=$dong+4;
				$a=$dong-4;
			$sql="SELECT * FROM sanpham WHERE malsp IN (SELECT malsp FROM loaisp WHERE madanhmuc = $idmuc) and trangthai=1 order by masp desc limit $a,4";
			$chay=mysql_query($sql) or die ("loi".mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					$id=$ketqua[0];
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
                        </a>
					</td>
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
	echo "<a href='index.php?page=sp&idmuc=$idmuc&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td>

    </tr>
<?php }?>

<!--------------------------------------------------------------------------->
<?php 
	if (isset($_GET["idloai"])==true)
	{

?>
<?php
	include("include/dbconn.php");
	ob_start();
	$idloai=$_GET["idloai"];
	$sql="select * from loaisp where malsp=$idloai and trangthai=1";
	$chay=mysql_query($sql);
	while ($kq=mysql_fetch_array($chay))
	{
		$tenloai=$kq[2];
	}
?>
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="13" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma" style="text-transform:uppercase;"><a href="index.php?page=sp&idloai=<?php echo $idloai;?>" class="amain"><?php echo $tenloai;?></a></font></strong></font></td>
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
	  	$sql="SELECT * FROM sanpham WHERE malsp = $idloai and trangthai=1";
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
            
	
            <?php
			for ($i=0;$i<4;$i++)
			{
				
				$dong=$dong+4;
				$a=$dong-4;
			$sql="SELECT * FROM sanpham WHERE malsp = $idloai and trangthai=1 order by masp desc limit $a,4";
			$chay=mysql_query($sql) or die ("loi".mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				echo "<tr>";
				while ($ketqua=mysql_fetch_array($chay))
				{
					$id=$ketqua[0];
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
                        </a>
					</td>
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
				?>
	  
    
 </tr>
<?php
				}
				
				}}
				?>
                 

                  
</table>
<div style="height: 10px;"></div>
<tr><td align="center">
     <?php
	 if($t_sodong>16){
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=sp&idloai=$idloai&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}
	 }?>
	</td>

    </tr>
<?php }?>
<!--------------------------------------------------------------------------->


<?php 
	if (isset($_GET["new"])==true)
	{

?>
<?php
	include("include/dbconn.php");
	ob_start();
	$sql="select * from sanpham where trangthai=1 order by id desc";
	$chay=mysql_query($sql);
?>
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="13" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma" style="text-transform:uppercase;"><a href="index.php?page=sp&new" class="amain">SẢN PHẨM MỚI</a></font></strong></font></td>
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
	  	$sql="select * from sanpham where trangthai=1 order by masp desc";
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
				$dong=$dong+4;
				$a=$dong-4;
			$sql="select * from sanpham where trangthai=1 order by masp desc limit $a,4";
			$chay=mysql_query($sql) or die ("loi".mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{
					$id=$ketqua[0];
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
                        </a>
					</td>
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
				?>
	  
    
 </tr>
<?php
				}}}
				?>
                 

                  
</table>
<div style="height: 10px;"></div>
<tr><td align="center">
     <?php
	 if($t_sodong>16){
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=sp&new&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}
	 }?>
	</td>

    </tr>
<?php }?>