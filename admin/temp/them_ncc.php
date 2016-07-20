<?php
	include("../include/dbconn.php");
?>
<fieldset>
	<legend>Thêm nhà cung cấp</legend>
    <form action="" method="post" name="form1" id="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
    	<td align="center" colspan="4"><font color="#0000ff" size="4" face="Tahoma"><strong>THÊM NHÀ CUNG CẤP</strong></font></td>
    </tr>
        	<tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"> </td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên nhà cung cấp</font></td>
                <td valign="middle"><div class="thefield"> <input name="tenncc" type="text" size="30"></div></td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Địa chỉ</font></td>
                <td valign="middle"><div class="thefield"> <input name="dc" type="text" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Điện thoại</font></td>
                <td valign="middle"> <div class="thefield"><input name="dt" type="text" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Email</font></td>
                <td valign="middle"><div class="thefield"> <input name="email" type="text" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Khóa</font></td>
                <td valign="middle"><input type="checkbox" name="khoa" /> </td>
                <td> </td>
                <td> </td>
            </tr>
            
            <tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"><input class="newbt-cn" type="submit" name="them" id="them" value="Thêm" onClick="return check();"></td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td width="200" height="30"> </td>
                <td colspan="2" align="center" valign="middle"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">
				<?php
					if (isset($_POST["them"]))
					{
						$tenncc=$_POST["tenncc"];
						$dc=$_POST["dc"];
						$dt=$_POST["dt"];
						$email=$_POST["email"];
						if (isset($_POST["khoa"]))
							$khoa=2;
						else
							$khoa=1;
						$sql="select * from nhacungcap where mancc = '$tenncc'";
						if (mysql_num_rows(mysql_query($sql))>0)
							echo "<script>alert('Đã có tài khoản này!');</script>";
						else
						{
						$sql="insert into nhacungcap(tenncc,diachi,dienthoai,email,trangthai) value('$tenncc','$dc','$dt','$email',$khoa)";
						if (mysql_query($sql))
							echo "Thêm thành công";
						}
					}
				?>
				</font></td>
                <td width="250"> </td>
            </tr>
        
        
    	</table>
    </form>
</fieldset>
<script>
var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("email","email","Sai định dạng Email");
	function check()
	{
		if(form1.tencc.value=="")
		{	alert("Bạn chưa điền tên nhà cung cấp");
			form1.tenncc.focus();
			return false;
		}
		if(form1.dc.value=="")
		{	alert("Bạn chưa điền địa chỉ");
			form1.dc.focus();
			return false;
		}
		if(form1.dt.value=="")
		{	alert("Bạn chưa điền điện thoại");
			form1.dt.focus();
			return false;
		}
		if(form1.email.value=="")
		{	alert("Bạn chưa điền email");
			form1.email.focus();
			return false;
		}
		else
			return true;	
	}
</script>
