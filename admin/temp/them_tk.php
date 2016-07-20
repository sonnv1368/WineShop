<?php
	include("../include/dbconn.php");
?>
<fieldset>
	<legend>Thêm tài khoản</legend>
    <form action="" method="post" name="form1" id="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        	<tr>
            	<td width="250" height="50"> </td>
                <td colspan="2" align="center"> <font color="#0000ff" size="4" face="Tahoma"><strong>THÊM TÀI KHOẢN</strong></font></td>
                <td width="200"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên tài khoản</font></td>
                <td valign="middle"><div class="thefield"> <input name="tentk" type="text" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Mật khẩu</font></td>
                <td valign="middle"><div class="thefield"> <input name="mk" type="password" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Nhập lại</font></td>
                <td valign="middle"><div class="thefield"> <input name="mk2" type="password" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên người dùng</font></td>
                <td valign="middle"><div class="thefield"> <input name="tennd" type="text" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Giới tính</font></td>
                <td valign="middle"><input name="gt" type="radio" id="radio" value="1" checked="checked" />
                Nam 
                <input type="radio" name="gt" id="radio2" value="0" />
              Nữ</td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Địa chỉ</font></td>
                <td valign="middle"><div class="thefield"> <input name="dc" type="text" size="30"> </div></td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Điện thoại</font></td>
                <td valign="middle"><div class="thefield"> <input name="dt" type="text" size="30"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Email</font></td>
                <td valign="middle"><div class="thefield"> <input name="email" type="text" size="30"> </div></td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Khóa</font></td>
                <td valign="left"><input type="checkbox" name="khoa" id="khoa"></td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Cấp độ</font></td>
                <td valign="middle"> 
                	<select name="select1">
                    <?php
						$sql="select * from capdo";
						$chay=mysql_query($sql);
						if (mysql_num_rows($chay)!=0)
						{
							while ($ketqua=mysql_fetch_array($chay))
							{
								$macapdo=$ketqua[0];
								$capdo=$ketqua[1];
							?>
                         	<option value="<?php echo $macapdo;?>"><?php echo $capdo;?></option>
                    <?php        
							}
						}
					
					?>
                    </select>
                    
                    
                </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"><input type="submit" name="them" id="them" value="Thêm" onClick="return check();">&nbsp;&nbsp;&nbsp; <input type="reset" name="rs" id="rs" value="Reset" /></td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td width="200" height="30"> </td>
                <td colspan="2" align="center" valign="middle"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">
				<?php
					if (isset($_POST["them"]))
					{
						$tentk=$_POST["tentk"];
						$mk=$_POST["mk"];
						$tennd=$_POST["tennd"];
						if (isset($_POST["khoa"]))
							$khoa=2;
						else
							$khoa=1;
						$capdo=$_POST["select1"];
						$gt=$_POST["gt"];
						$dc=$_POST["dc"];
						$dt=$_POST["dt"];
						$email=$_POST["email"];
						$sql="select * from taikhoan where tendangnhap = '$tentk'";
						if (mysql_num_rows(mysql_query($sql))>0)
							echo "<script>alert('Đã có tài khoản này!');</script>";
						else
						{
						$sql="insert into taikhoan(tendangnhap,matkhau,hoten,gioitinh,sdt,diachi,email,macapdo,trangthai,ngaytao) value('$tentk','$mk','$tennd',$gt,$dt,'$dc','$email',$capdo,$khoa,curdate())";
						if (mysql_query($sql))
							echo "Thêm thành công";
							else
							echo mysql_error();
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
		if(form1.tentk.value=="")
		{	alert("Bạn chưa điền tài khoản");
			form1.tentk.focus();
			return false;
		}
		if(form1.mk.value=="")
		{	alert("Bạn chưa điền mật khẩu");
			form1.mk.focus();
			return false;
		}
		if(form1.mk2.value=="")
		{	alert("Bạn chưa nhập lại mật khẩu");
			form1.mk2.focus();
			return false;
		}
		if(form1.mk.value!=form1.mk2.value)
		{	alert("Mật khẩu không khớp");
			form1.mk.focus();
			return false;
		}
		if(form1.tennd.value=="")
		{	alert("Bạn chưa điền tên người dùng");
			form1.tennd.focus();
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
