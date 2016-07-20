<?php
	if (isset($_SESSION["login"])==false)
	{
		$_SESSION["login"]=2;
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="5" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma">CHI TIẾT SẢN PHẨM</font></strong></font></td>
  </tr>
  <tr> 
    <td height="20" colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr> 
    <td width="17" height="16"></td>
    <td width="350"></td>
    <td width="16"></td>
    <td width="300"></td>
    <td width="15"></td>
  </tr>
  <?php	
						
			if (isset($_GET["id"]))
			{
				$id = $_GET["id"];
				$sql = "select * from sanpham where masp = $id and trangthai=1";
				$result = mysql_query($sql);
				
				if(mysql_num_rows ($result)!=0)
				{
					while ($row = mysql_fetch_array($result))
					{	
						$idloai=$row[2];
						$idncc=$row[1];
						$sql1="select * from nhacungcap where mancc=$idncc and trangthai=1";
						$chay1=mysql_query($sql1);
						while($kq=mysql_fetch_array($chay1))
						{
							$tenncc=$kq[1];	
						}
						$ten = $row[3];
						$gia = $row[5];
						$anh = $row[6];
						$nd = $row[4];
						$sl=$row[7];
						list($width, $height, $type, $attr) = getimagesize($anh);
					
			?>
  <tr> 
    <td height="305">&nbsp;</td>
    <td valign="middle" align="center"> <img src="<?php echo $anh?>" width="<?php if($width>250){echo "250";}else{}?>" style=""> </td>
    <td>&nbsp;</td>
    <td valign="top"> <div><font color="#FF0000" size="3" face="arial"><strong> 
        <?php echo $ten;?>
        </strong></font></div>
      <div style="padding : 5px 5px 5px 0px;"><font face="arial" size="2"><strong>Giá 
        : </strong>
        <?php echo number_format($gia,0,',','.');?>
        VNĐ </font></div>
        <div style="padding : 5px 5px 5px 0px;"><font face="arial" size="2"><strong>Số lượng 
        : </strong>
        <?php echo $sl;?></font></div>
        
        <div style="padding : 5px 5px 5px 0px;"><font face="arial" size="2"><strong>Nhà cung cấp 
        : </strong>
        <?php echo $tenncc;?></font></div>
        <div> <a href="index.php?page=addcart&id=<?php echo $id?>" onclick="return check(<?php echo $_SESSION["login"];?>)"><img src="img/order.jpg" border="0"></a></div>
      
      <div style="padding : 20px 5px 5px 0px;"><font face="arial" size="2"> 
        <?php echo $nd?></font>
        </div></td>
    <td>&nbsp;</td>
  </tr>
  <?php }}}?>
  <tr> 
    <td height="13"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  
  
  <tr> 
    <td height="7"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr> 
    <td height="76" colspan="5" valign="top">
	<table width="698" border="0" cellpadding="0" cellspacing="0" >
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="12" valign="middle" style="border-bottom : solid 1px #e0c5b4;border-top : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;">
		<font color="#423127"><strong><font size="3" face="tahoma">SẢN PHẨM CÙNG LOẠI
		</font></strong></font>
	</td>
  </tr>
  <tr> 
    <td height="20" colspan="12" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr> 
   <?php		
			$sql="SELECT * FROM sanpham WHERE malsp = $idloai and masp !=$id and trangthai=1 order by masp desc LIMIT 0 , 4";
			$chay=mysql_query($sql) or die (mysql_error());
			if (mysql_num_rows($chay)>0)
			{
				while ($ketqua=mysql_fetch_array($chay))
				{$ten=$ketqua[3];
					$title=$ten;
					$num_char=mb_strlen($ten,"UTF-8");
					if ($num_char>30)
					{
						$cut=mb_substr($ten,0,30);	
						$ten=mb_substr($cut, 0, strrpos($cut, ' '))."...";
						
					}
					$id=$ketqua[0];
					$idloai=$ketqua[2];
					$gia = $ketqua[5];
					$anh = $ketqua[6];
					$nd = $ketqua[4];
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
		  </td>
        </tr>
        <tr> 
          <td height="19" valign="top"><table width="160" border="0" cellpadding="0" cellspacing="0">
              <tr> 
                <td width="160" height="19"></td>
              </tr>
            </table></td>
          <td>&nbsp;</td>
        </tr>
     </table>
	</td>
   <?php }}?>
           
  </tr>
  
</table></td>

  </tr>
  <tr> 
    <td height="7"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
<!-------------------------------------------------------->
<script>
	function check(login,num)
	{
		if (login!=1)
		{
			alert("Bạn chưa đăng nhập");
			return false;
		}
		else if (num==0)
		{
			alert("Đã hết hàng");
			return false;
		}
		else
			return true;
	}

</script>
 