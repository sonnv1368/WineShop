<?php
	include("../include/dbconn.php");
?>
<?php
	ob_start();
	include("../include/dbconn.php");
?>
<?php
	if (isset($_GET["success"]))
	{
		if ($_GET["success"]==1)
			echo "<script>alert('Sửa thành công!')</script>";
		if ($_GET["success"]==0)
			echo "<script>alert('Lỗi!')</script>";
	}
			
?>
<?php
	$id=$_GET["id"];
	$sql="select * from taikhoan where matk=$id";
	$chay=mysql_query($sql);
	if (mysql_num_rows($chay)>0)
	{
		while ($ketqua=mysql_fetch_array($chay))
		{
			$taikhoan=$ketqua[2];
			$matkhau=$ketqua[3];
			$hoten=$ketqua[4];
			$cap_do=$ketqua[1];
			$khoatk=$ketqua[9];
			$gt=$ketqua[5];
			$dt=$ketqua[6];
			$dc=$ketqua[7];
			$email=$ketqua[8];
		}
		
	}
?>

<fieldset>
	<legend>Sửa tài khoản</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        	<tr>
            	<td width="250" height="50"> </td>
                <td colspan="2" align="center"><font color="#0000ff" size="4" face="Tahoma"><strong>SỬA TÀI KHOẢN</strong></font> </td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên tài khoản</font></td>
                <td valign="middle"> <input name="tentk" type="text" size="30" value="<?php echo $taikhoan;?>" disabled> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên người dùng</font></td>
                <td valign="middle"> <input name="tennd" type="text" size="30" value="<?php echo $hoten;?>"> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Giới tính</font></td>
                <td valign="middle"><input type="radio" name="gt" id="nam" value="1" <?php if($gt==1) echo "checked";?> />
                <label for="gt"></label>
                Nam 
                <input type="radio" name="gt" id="nu" value="0" <?php if($gt==0) echo "checked";?>/>
                <label for="gt"></label>
                Nữ</td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Địa chỉ</font></td>
                <td valign="middle"> <input name="dc" type="text" size="30" value="<?php echo $dc;?>"> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Điện thoại</font></td>
                <td valign="middle"> <input name="dt" type="text" size="30" value="<?php echo $dt;?>"> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Email</font></td>
                <td valign="middle"> <input name="email" type="text" size="30" value="<?php echo $email;?>"> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Khóa</font></td>
                <td valign="middle"><input type="checkbox" name="khoa" id="khoa" <?php if ($khoatk==2) echo "checked";?>></td>
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
                         	<option value="<?php echo $macapdo;?>" <?php if($cap_do==$macapdo) echo "selected";?>><?php echo $capdo;?></option>
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
                <td width="200"><input type="submit" name="sua" id="sua" value="Sửa" onClick="return check();"></td>
                <td width="250"> </td>
            </tr>
				<?php
					if (isset($_POST["sua"]))
					{
						$tentk=$taikhoan;
						$tennd=$_POST["tennd"];
						if (isset($_POST["khoa"]))
							$khoa=2;
						else
							$khoa=1;
						$capdo=$_POST["select1"];
						$gioitinh=$_POST["gt"];
						$diachi=$_POST["dc"];
						$dienthoai=$_POST["dt"];
						$email1=$_POST["email"];
						$sql="update taikhoan set hoten='$tennd', macapdo=$capdo, trangthai=$khoa, gioitinh=$gioitinh, diachi='$diachi', sdt='$dienthoai', email='$email1' where matk=$id";
						echo $sql;
						if (mysql_query($sql))
							header("location:index.php?page=sua_tk&id=".$id."&success=1");
							else
								echo mysql_error();
								
					}
				?>
        
        
    	</table>
    </form>
</fieldset>
<script>
	function check()
	{
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
