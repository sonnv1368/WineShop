<div align="center"><a href="ymsgr:sendim?r.leviathan" mce_href="ymsgr:sendim?r.leviathan" border="0"><img src="http://opi.yahoo.com/online?u=r.leviathan&t=2" mce_src="http://opi.yahoo.com/online?u=r.leviathan&t=2"></a></div>
<table width="246" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
  	<td>&nbsp;</td>
  </tr>
  <tr> 
    <td height="42" valign="top" align="center"><?php include("temp/search-box-p.php");?></td>
  </tr>
  <tr>
  <td align="center">
   <form id="search-g" name="search-g" method="post" action="">
      
      
                      <label for="gia"></label>
        <select name="gia" id="gia" style="width:156px;border:#BCBBBB 1px solid; padding:3px 1px 4px 1px;  font-size:13px; color:#333; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; box-shadow: #CCC 0 0 .25em;">
                        <option value="1">Dưới 1.000.000</option>
                        <option value="2">1.000.000 - 5.000.000</option>
                        <option value="3">5.000.000 - 15.000.000</option>
                        <option value="4">Trên 15.000.000</option>
                      </select>
                 
                        <input type="submit" name="search-g" id="search-g" value="Tìm kiếm" />
        </form>
      
                  </td>
  </tr>
  <?php
  	if (isset($_POST["search-g"]))
	{
		header('location:index.php?page=search-g&keyword='.$_POST["gia"]);
		
	}
  
  ?>
  
</table>
<div style="height : 10px;"></div>
<form action="login_process.php" method="post" name="fLogin">
<table width="246" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td width="246" height="37" valign="middle" background="img/bg_nav.jpg" style="padding-left : 10px;font-size : 14px;font-family:tahoma">
	<font color="#e2e2e2"><strong>ĐĂNG NHẬP</strong></font></td>
  </tr>
  <tr> 
    <td height="42" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #c5c5a3;" >
        <!--DWLayoutTable-->
        <tr> 
          <td colspan="2" width="244" height="7"></td>
        </tr>
        <?php if (isset($_SESSION["login"])==false || $_SESSION["login"]!=1)
		{
			?>
        <tr> 
          <td height="25" width="80" valign="middle" style="padding-left : 15px;">Tài khoản</td>
          <td height="25" width="148" valign="middle"><input type="text" name="user" id="user" style="border-radius:5px; width:120px;"/></td>
        </tr>
        <tr> 
          <td height="25" width="80" valign="middle" style="padding-left : 15px;">Mật khẩu</td>
          <td height="25" width="148" valign="middle"><input type="password" name="pass" id="pass" style="border-radius:5px; width:120px;"/></td>
        </tr>
        <tr> 
          <td height="40" align="left" valign="middle" style="padding-left : 15px;"><input type="submit" name="dn" id="dn" value="Đăng nhập" style="border-radius:5px;" /></td>
          <td height="40" align="left" valign="middle" style="padding-left : 15px;"><a href="index.php?page=register" class="link-nounderline">Hoặc đăng ký</a></td>
        </tr>
        <?php }
			else
			{
		?>
        <tr> 
          <td height="25" colspan="2" valign="middle" style="padding-left : 15px;">Xin chào <a href="index.php?page=personal-details&id=<?php echo $_SESSION["userid"];?>" class="link-nounderline-bold"> <?php echo $_SESSION["user"];?> </a>&nbsp;&nbsp;&nbsp; <a href="logout.php" class="link-nounderline" >Thoát</a></td>
          
        </tr>
        <td colspan="2" height="25" width="80" style="padding-left : 15px;padding-right: 75px;" valign="middle"><a href="index.php?page=showcart" style="text-decoration:none;"><div style="background-image: url(img/giohang.png);background-repeat:no-repeat; background-position:110px top; width: 150px; height:35px; padding-top:12px;" ><img src="img/order.jpg" border="0"><font color="#FFFFFF">&nbsp;&nbsp;&nbsp;<?php if (isset($_SESSION["giohang"])==false) echo "&nbsp;&nbsp;0";
		else
			if (floor(count($_SESSION["giohang"])/10)<1) 
				echo "&nbsp;&nbsp;".count($_SESSION["giohang"]);
			elseif (floor(count($_SESSION["giohang"])/10)<10) 
				echo "&nbsp;".count($_SESSION["giohang"]);
			elseif (floor(count($_SESSION["giohang"])/10)<1) 
				echo count($_SESSION["giohang"]);?></font></div></a></td>
        </tr>
        <?php }?>
        <tr> 
          <td height="8" colspan="2"></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
  <div style="height : 10px;"></div>
<table width="246" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td width="246" height="37" valign="middle" background="img/bg_nav.jpg" style="padding-left : 10px;font-size : 14px;font-family:tahoma">
	<font color="#e2e2e2"><strong>SẢN PHẨM NỔI BẬT</strong></font></td>
  </tr>
  <tr> 
    <td height="42" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #c5c5a3;" >
        <!--DWLayoutTable-->
        <tr> 
          <td width="244" height="7"></td>
        </tr>
        <?php
					$sql = "select * from sanpham where noibat =1 and trangthai=1 limit 5";
					$result = mysql_query($sql);
					
					if(mysql_num_rows ($result)!=0)
					{
						while ($row = mysql_fetch_array($result))
						{
							$id=$row[0];
							$ten=$row[3];
				?>
        <tr> 
          <td height="25" valign="middle" style="padding-left : 15px;">
		  	<img src="img/icon.gif" width="12" style="padding-bottom: -2px;"><a href="index.php?page=ct-sp&id=<?php echo $id?>" class="menu" style="padding-left : 10px"><?php echo $ten?></a> </td>
        </tr>
        <tr> 
          <?php }}?>
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
</table>
<div style="height : 10px;"></div>	
<!------------------------------------->
<table width="246" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td width="246" height="37" valign="middle" background="img/bg_nav.jpg" style="padding-left : 10px;font-size : 14px;font-family:tahoma">
	<font color="#e2e2e2"><strong>THÀNH VIÊN MỚI</strong></font></td>
  </tr>
  <tr> 
    <td height="42" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #c5c5a3;" >
        <!--DWLayoutTable-->
        <tr> 
          <td width="244" height="7"></td>
        </tr>
        <?php
					$sql = "select * from taikhoan order by matk and trangthai=1 desc limit 5";
					$result = mysql_query($sql);
					
					if(mysql_num_rows ($result)!=0)
					{
						while ($row = mysql_fetch_array($result))
						{
							$id=$row[0];
							$tk=$row[2];
				?>
        <tr> 
          <td height="25" valign="middle" style="padding-left : 15px;">
		  	<img src="img/icon.gif" width="12" style="padding-bottom: -2px;"><a href="#" class="menu" style="padding-left : 10px"><?php echo $tk?></a> </td>
        </tr>
        <tr> 
          <?php }}?>
          <td height="8"></td>
        </tr>
      </table></td>
  </tr>
</table>
<div style="height : 10px;"></div>	
<img src="img/right1.jpeg" width="230" height="230"/>
<div style="height : 10px;"></div>	
<img src="img/right2.jpeg" width="230" height="230"/>
<div style="height : 10px;"></div>	
<img src="img/right3.jpeg" width="230" height="230"/>

