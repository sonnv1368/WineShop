<?php
		
		$id=$_GET["id"];
		$sql=mysql_query("select * from taikhoan where matk=$id") or die ("Lỗi ".mysql_error());
		if (mysql_num_rows($sql)==1)
		{
			$r=mysql_fetch_array($sql);
			$tk=$r[2];
			$ten=$r[4];
			$gt=$r[5];
			$sdt=$r[6];
			$dc=$r[7];
			$email=$r[8];
			$sql1=mysql_query("select tencapdo from capdo where macapdo=$r[1]");
			$r1=mysql_fetch_array($sql1);
			$capdo=$r1[0];
		

?>
<form id="form1" name="form1" method="post" onsubmit="return check()" action="">
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="5" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px"><font color="#423127"><strong><font size="3" face="tahoma"><div style="text-transform:uppercase;">Thông tin tài khoản</div></font></strong></font></td>
  </tr>
  <tr> 
    <td height="40" colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr> 
    <td height="60" colspan="5" valign="middle" align="center"><font color="#0000ff" size="5"><strong>THÔNG TIN CÁ NHÂN</strong></font></td>
  </tr>
  <tr> 
	<td width="300" height="30">&nbsp;</td>
    <td width="110" align="right">Tài khoản:</td>
    <td width="20">&nbsp;</td>
    <td width="200"><?php echo $tk;?></td>
    <td width="300" height="30">&nbsp;</td>
  </tr>
  <tr> 
	<td width="300" height="30">&nbsp;</td>
    <td width="110" align="right">Họ tên:</td>
    <td width="20">&nbsp;</td>
    <td width="200"><?php echo $ten;?></td>
    <td width="300" height="30">&nbsp;</td>
  </tr>
  <tr> 
	<td width="300" height="30">&nbsp;</td>
    <td width="110" align="right">Giới tính:</td>
    <td width="20">&nbsp;</td>
    <td width="200"><?php if($gt==1)echo "Nam"; else echo "Nữ";?></td>
    <td width="300" height="30">&nbsp;</td>
  </tr>
  <tr> 
	<td width="300" height="30">&nbsp;</td>
    <td width="110" align="right">Số điện thoại:</td>
    <td width="20">&nbsp;</td>
    <td width="200"><?php echo $sdt;?></td>
    <td width="300" height="30">&nbsp;</td>
  </tr>
  <tr> 
	<td width="300" height="30">&nbsp;</td>
    <td width="110" align="right">Địa chỉ:</td>
    <td width="20">&nbsp;</td>
    <td width="200"><?php echo $dc;?></td>
    <td width="300" height="30">&nbsp;</td>
  </tr>
  <tr> 
	<td width="300" height="30">&nbsp;</td>
    <td width="110" align="right">Email:</td>
    <td width="20">&nbsp;</td>
    <td width="200"><?php echo $email;?></td>
    <td width="300" height="30">&nbsp;</td>
  </tr>
  <tr> 
	<td width="300" height="30">&nbsp;</td>
    
    
    <td colspan="3" align="center"><input type="submit" name="doimk" id="doimk" value="Đổi mật khẩu" class="newbt">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="ttdh" id="ttdh" value="Thông tin đơn hàng"  class="newbt"></td>
    <td width="300"></td>
  </tr>
  

  

</table>
</form>
<?php
		}
		else
			echo "Tài khoản không tồn tại";
	
	?>
	
<?php
	if (isset($_POST["ttdh"]))
	{
		header("location:index.php?page=ttdh&id=$id");
	}
	if (isset($_POST["doimk"]))
	{
		header("location:index.php?page=change-pass&id=$id");
	}
?>
