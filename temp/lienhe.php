<?php
	include("include/dbconn.php")
?>
<?php
	if(isset($_SESSION["login"]) and ($_SESSION["login"]==1))
	{
		$login=1;
		$userid=$_SESSION["userid"];
		$tendn=$_SESSION["user"];
		$sql="select * from taikhoan where matk=$userid and trangthai=1";
		$chay=mysql_query($sql);
			if (mysql_num_rows($chay)==1)
			{
				while($r=mysql_fetch_array($chay))
				{
				$hoten=$r["Hoten"];
				$sdt=$r["Sdt"];
				$dc=$r["Diachi"];
				$email=$r["Email"];
				}
			}
	}
?>
<form id="form1" name="form1" method="post" onsubmit="return check()" action="">
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="4" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px"><font color="#423127"><strong><font size="3" face="tahoma">LIÊN HỆ</font></strong></font></td>
  </tr>
  <tr>
  	<td height="30"></td>
    </tr>
  <tr>
  	<td colspan="4" align="center"><font color="#0000ff" size="5px">Cửa hàng bán rượu ngoại nhập khẩu</font></td>
  </tr>
  <tr>
  	<td height="30" colspan="4" align="center"><font color="#0000ff" size="4px">Địa chỉ: </font>140 Lý Chính Thắng, P.7, Quận 3, TP.HCM</td>
    </tr>
  <tr> 
    <td height="40" colspan="4" valign="top" align="center">
    	<div><div><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3919.322610470666!2d106.68678741520277!3d10.786584615496178!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f2c50c6fb59%3A0xd86859e8d0355f65!2zMTQwIEzDvSBDaMOtbmggVGjhuq9uZywgNywgRGlzdHJpY3QgMw!5e0!3m2!1svi!2svn!4v1394393484749" width="700" height="450" frameborder="0" style="border:0"></iframe></div>
     <div style="margin-top:15px;">  <font size="4"> Hoặc bạn có thể liên hệ trực tiếp với chúng tôi qua số điện thoại: 0985675439</font></div> </div>
    <p style="margin-top:40px;font-size:22px;"><font color="#CC0000">GỬI YÊU CẦU CHO CHÚNG TÔI</font></p>
    </td>
  </tr>
  <tr> 
	<td width="180" height="35">&nbsp;</td>
    <td width="100"><div class="fieldwrapper"><strong>Họ và tên</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="400"><div class="thefield"><input name="ten" type="text" id="ten" size="30" value="<?php if(isset($login)==1) echo $hoten;?>" <?php if(isset($login)==1) echo "readonly"?> ></div></td>
  </tr>
  <tr> 
	<td width="180" height="35">&nbsp;</td>
    <td width="100"><div class="fieldwrapper"><strong>Số điện thoại</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="400"><div class="thefield"><input name="dt" type="text" id="dt" size="30" value="<?php if(isset($login)==1) echo $sdt;?>"  <?php if(isset($login)==1) echo "readonly"?> ></div></td>
  </tr>
  <tr> 
	<td width="180" height="35">&nbsp;</td>
    <td width="100"><div class="fieldwrapper"><strong>Địa chỉ</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="400"><div class="thefield"><input name="dc" type="text" id="dc" size="30"  value="<?php if(isset($login)==1) echo $dc;?>" <?php if(isset($login)==1) echo "readonly"?>></div></td>
  </tr>
  <tr> 
	<td width="180" height="35">&nbsp;</td>
    <td width="100"><div class="fieldwrapper"><strong>Email</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="400"><div class="thefield"><input name="email" type="text" id="email" size="30"  value="<?php if(isset($login)==1) echo $email;?>" <?php if(isset($login)==1) echo "readonly"?>></div></td>
  </tr>
  <tr> 
	<td width="180" height="35">&nbsp;</td>
    <td width="100"><div class="fieldwrapper"><strong>Nội dung</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="400"><label for="nd"></label>
     <div class="thefield"> <textarea name="nd" id="nd" cols="45" rows="5" style="width: 296px; height: 143px;"></textarea></div></td>
  </tr>
  <tr>
  	<td height="20"></td>
    </tr>
  <tr> 
	<td width="180" height="35">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="400"><input type="submit" name="ok" id="ok" value="Gửi" class="newbt">
    <input type="reset" style="margin-left:30px;" name="rs" id="rs" value="Hủy" class="newbt"></td>
  </tr>
  <tr>
  	<td height="20"></td>
    </tr>

  

</table>
</form>
<?php
if (isset($_POST["ok"]))
{
	$hoten=$_POST["ten"];
	$diachi=$_POST["dc"];
	$dienthoai=$_POST["dt"];
	$email=$_POST["email"];
	$noidung=$_POST["nd"];
	$sql="insert into lienhe(hoten,sdt,diachi,email,noidung,ngaytao) value('$hoten','$dienthoai','$diachi','$email','$noidung',now())";
	if (mysql_query($sql))
	{
		echo "Cảm ơn bạn đã đóng góp ý kiến";
	}
	else
	{
		echo mysql_error();
	}
	
}
?>
<script>

var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("email","email","Sai định dạng Email");
	function check()
	{
		if (form1.ten.value=="")
		{
			alert("Bạn chưa nhập họ tên");
			form1.ten.focus();
			return false;	
		}
		if (form1.email.value=="")
		{
			alert("Bạn chưa nhập email");
			form1.email.focus();
			return false;	
		}
		if (form1.dt.value=="")
		{
			alert("Bạn chưa nhập điện thoại");
			form1.dt.focus();
			return false;	
		}
		
		if (form1.dc.value=="")
		{
			alert("Bạn chưa nhập điện thoại");
			form1.dc.focus();
			return false;	
		}
		if (form1.nd.value=="")
		{
			alert("Bạn chưa nhập nội dung");
			form1.nd.focus();
			return false;	
		}
		else return true;
	}
</script>
 