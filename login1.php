
<form id="form1" name="form1" method="post" onsubmit="return check()" action="login_process.php">
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="4" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px"><font color="#423127"><strong><font size="3" face="tahoma">Đăng ký</font></strong></font></td>
  </tr>
  <tr> 
    <td height="40" colspan="4" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100">Tài khoản</td>
    <td width="20">&nbsp;</td>
    <td width="400"><input name="tk" type="text" id="tk" size="30" value=""></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100">Mật khẩu</td>
    <td width="20">&nbsp;</td>
    <td width="400"><input name="mk" type="password" id="mk" size="30" value=""></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="400"><input type="submit" name="dn" id="dn" value="Đăng nhập"></td>
  </tr>
  

  

</table>
<script>
	function check()
	{
		if (form1.tk.value=="")
		{
			alert("Bạn chưa nhập tên");
			form1.tk.focus();
			return false;	
		}
		if (form1.mk.value=="")
		{
			alert("Bạn chưa nhập mật khẩu");
			form1.mk.focus();
			return false;	
		}
		else return true;
	}
</script>
<?php
	if (isset($_SESSION["login"]))
		if ($_SESSION["login"]!=1)
			echo ("<script> alert('Sai tài khoản hoặc mật khẩu');</script>");
?>