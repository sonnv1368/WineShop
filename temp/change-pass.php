<script>
	function check()
	{
		if (form1.mkht.value=="")
		{
			form1.mkht.focus();
			alert("Bạn chưa nhập mật khẩu hiện tại");
			return false;
		}
		if (form1.mkm.value=="")
		{
			form1.mkm.focus();
			alert("Bạn chưa nhập mật khẩu mới");
			return false;
		}
		if (form1.mkm2.value=="")
		{
			form1.mkm2.focus();
			alert("Bạn chưa xác nhận mật khẩu");
			return false;
		}
		if (form1.mkm.value!=form1.mkm2.value)
		{
			form1.mkm2.focus();
			alert("Mật khẩu xác nhận sai");
			return false;
		}
		return true;
	}
</script>
<?php
		
		$id=$_GET["id"];
		$sql=mysql_query("select * from taikhoan where matk=$id") or die ("Lỗi ".mysql_error());
		if ($_SESSION["userid"]!=$id)
		{
			header('location:index.php');
		}
		elseif (mysql_num_rows($sql)==1)
		{
			$r=mysql_fetch_array($sql);
			$mk=$r[3];

		

?>
<form id="form1" name="form1" method="post" onsubmit="return check()" action="">
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="4" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px"><font color="#423127"><strong><font size="3" face="tahoma">Thông tin tài khoản</font></strong></font></td>
  </tr>
  <tr> 
    <td height="30" colspan="4" valign="middle" align="center"></td>
  </tr>
  <tr> 
    <td height="60" colspan="4" valign="middle" align="center"><font color="#0000ff" size="5"><strong>ĐỔI MẬT KHẨU</strong></font></td>
  </tr>
  <tr> 
	<td width="180" height="40">&nbsp;</td>
    <td width="150"><div class="fieldwrapper"><strong>Mật khẩu hiện tại</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="300"><div class="thefield"><input type="password" name="mkht" id="mkht"></div></td>
  </tr>
  <tr> 
	<td width="180" height="40">&nbsp;</td>
    <td width="150"><div class="fieldwrapper"><strong>Mật khẩu mới</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="400"><div class="thefield"><input type="password" name="mkm" id="mkm"></div></td>
  </tr>
  <tr> 
	<td width="180" height="40">&nbsp;</td>
    <td width="150"><div class="fieldwrapper"><strong>Nhập lại</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="300"><div class="thefield"><input type="password" name="mkm2" id="mkm2"></div></td>
  </tr>
  <tr> 
	<td width="180" height="50">&nbsp;</td>
    <td width="150"></td>
    <td width="20">&nbsp;</td>
    <td width="300"><input type="submit" name="doimk" id="doimk" value="ĐỔI MẬT KHẨU" class="newbt" onClick="return check()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="thoat" id="thoat" value="THOÁT"  class="newbt"></td>
  </tr>
  

  

</table>
</form>
<?php
		}
		else
			echo "Tài khoản không tồn tại";
	
	?>
	
<?php
	if (isset($_POST["thoat"]))
	{
		header('location:index.php');
	}
	if (isset($_POST["doimk"]))
	{
		$mkht=$_POST["mkht"];
		if ($mkht==$mk)
		{
			$mkm=$_POST["mkm"];
			$sql=mysql_query("update taikhoan set matkhau=$mkm where matk=$id") or die ("Lỗi ".mysql_error());
			echo "<script>alert('Đổi mật khẩu thành công');</script>";
		}
		else
			echo "<script>alert('Sai mật khẩu');</script>";
	}
?>

