<?php
	include("include/dbconn.php");
	?>
<form id="form1" name="form1" method="post" onsubmit="return check()" action="">
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="5" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px"><font color="#423127"><strong><font size="3" face="tahoma">ĐĂNG KÝ</font></strong></font></td>
  </tr>
  <tr> 
    <td height="40" colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="5" align="center" height="30"><font size="3" color="#3366FF"><strong>Để sử dụng đầy đủ chức năng của website, xin vui lòng đăng ký tài khoản sử dụng</strong></font></td>
    </tr>
   <tr>
  	<td colspan="5" align="center" height="30"><font size="3" color="#3366FF"><strong>Hãy nhập đầy đủ các thông tin cần thiết dưới đây</strong></font></td>
    </tr>
    <td colspan="5" align="center" height="20"></td>
    </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><div class="fieldwrapper"><strong>Tài khoản</strong></div></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="tk" type="text" id="tk" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Mật khẩu</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="mk" type="password" id="mk" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Nhập lại</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="mk2" type="password" id="mk2" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Họ tên</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="ht" type="text" id="ht" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Giới tính</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="gt" class="radio" type="radio" id="radio" value="1" checked="checked" />
      Nam 
     <input class="radio" type="radio" name="gt" id="radio2" value="0" />
      <label for="gt"></label> 
      Nữ</div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Số điện thoại</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="dt" type="text" id="dt" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Địa chỉ</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="dc" type="text" id="dc" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Email</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="email" type="text" id="email" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100"><strong>Mã xác nhận</strong></td>
    <td width="20">&nbsp;</td>
    <td width="220"><div class="thefield"><input name="xacnhan" type="text" id="xacnhan" size="30"></div></td>
    <td> <img src="../taoma.php"  style="margin-top:2px;" /></td>
  </tr>
   </tr>
    <td colspan="5" align="center" height="20"></td>
    </tr>
  <tr> 
	<td width="180" height="30">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="button"><input type="submit" name="dk" id="dk" value="Đăng ký">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="rs" id="rs" value="Reset"></div></td>
  </tr>
  </tr>
    <td colspan="5" align="center" height="20"></td>
    </tr>
    </tr>
    <td colspan="5" align="center" height="20"></td>
    </tr>
  

  

</table>
</form>
<?php
if (isset($_POST["dk"]))
{ 
	if ($_SESSION["code"]!=$_POST["xacnhan"])
		echo "<script>alert('Mã xác nhận sai');</script>";
	else
	{
		$taikhoan=$_POST["tk"];
		$matkhau=$_POST["mk"];
		$hoten=$_POST["ht"];
		$gioitinh=$_POST["gt"];
		$dienthoai=$_POST["dt"];
		$diachi=$_POST["dc"];
		$email=$_POST["email"];
		
		$sql="select * from taikhoan where tendangnhap='$taikhoan'";
		$chay=mysql_query($sql);
		if (mysql_num_rows($chay)>0)
		{
			echo "<script>alert('Tài khoản đã tồn tại');</script>";
		}
		else
		{
			$sql="insert into taikhoan(macapdo,tendangnhap,matkhau,hoten,gioitinh,sdt,diachi,email,trangthai,ngaytao) value(1,'$taikhoan','$matkhau','$hoten','$gioitinh','$dienthoai','$diachi','$email',1,curdate())";
			if (mysql_query($sql))
			{
				echo "<script>alert('Đăng ký thành công');</script>";
			}
			else
			{
				echo mysql_error();
			}
		}
	}
}
?>
<script>

var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("email","email","Sai định dạng Email");
 
	function check()
	{
		if (form1.tk.value=="")
		{
			alert("Bạn chưa nhập tên tài khoản");
			form1.tk.focus();
			return false;	
		}
		if (form1.mk.value=="")
		{
			alert("Bạn chưa nhập mật khẩu");
			form1.mk.focus();
			return false;	
		}
		if (form1.mk2.value=="")
		{
			alert("Bạn chưa xác nhận mật khẩu");
			form1.mk2.focus();
			return false;	
		}
		if (form1.mk.value!=form1.mk2.value)
		{
			alert("Mật khẩu không khớp");
			form1.mk2.focus();
			return false;	
		}
		if (form1.ht.value=="")
		{
			alert("Bạn chưa nhập họ tên");
			form1.ht.focus();
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
			alert("Bạn chưa nhập địa chỉ");
			form1.dc.focus();
			return false;	
		}
		
		if (form1.email.value=="")
		{
			alert("Bạn chưa nhập email");
			form1.email.focus();
			return false;	
		}
		if (form1.xacnhan.value=="")
		{
			alert("Bạn chưa nhập mã xác nhận");
			form1.xacnhan.focus();
			return false;	
		}
		
		else return true;
	}
</script>
 