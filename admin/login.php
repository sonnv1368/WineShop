<?php
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body >
<form id="form1" name="form1" method="post" onsubmit="return check()" action="login_process.php">
  <table>
    	<tr>
        	<td height="160"> </td>
        </tr>
    </table>
  <table width="425" height="304" border="0" align="center" cellpadding="0" cellspacing="0" background="img/login.jpg">
    <tr>
      <td width="197" height="120">&nbsp;</td>
      <td width="18">&nbsp;</td>
      <td width="210">&nbsp;</td>
    </tr>
    <tr>
      <td height="34">&nbsp;</td>
      <td colspan="2"></label>
      <input name="name" type="text" id="name" size="25" /></td>
    </tr>
    <tr>
      <td height="43">&nbsp;</td>
      <td colspan="2"><input name="pass" type="password" id="pass" size="25" /></td>
    </tr>
    <tr>
      <td align="right"><input type="submit" name="Submit" id="button" value="Login" /></td>
      <td>&nbsp;</td>
      <td>  <input type="reset" name="button2" id="button2" value="Cancel" /></td>
    </tr>
    <tr>
      <td height="19">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="69">&nbsp;</td>
      <td>&nbsp;</td>
      <td><label for="textfield3"></label></td>
    </tr>
  </table>
</form>
<script>
	function check()
	{
		if (form1.name.value=="")
		{
			alert("Bạn chưa nhập tên");
			form1.name.focus();
			return false;	
		}
		if (form1.pass.value=="")
		{
			alert("Bạn chưa nhập mật khẩu");
			form1.pass.focus();
			return false;	
		}
		else return true;
	}
</script>
<?php
	if (isset($_GET["sc"]))
		if ($_GET["sc"]==0)
			echo ("<script> alert('Sai tài khoản hoặc mật khẩu');</script>");
?>

</body>
</html>