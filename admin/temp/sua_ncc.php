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
	$sql="select * from nhacungcap where mancc=$id";
	$chay=mysql_query($sql);
	if (mysql_num_rows($chay)>0)
	{
		while ($ketqua=mysql_fetch_array($chay))
		{
			$ten=$ketqua[1];
			$diachi=$ketqua[2];
			$dienthoai=$ketqua[3];
			$email=$ketqua[4];
			$khoa=$ketqua[5];
		}
		
	}
?>

<fieldset>
	<legend>Sửa nhà cung cấp</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
    	<td align="center" colspan="4"><font color="#0000ff" size="4" face="Tahoma"><strong>SỬA NHÀ CUNG CẤP</strong></font></td>
    </tr>
        	<tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"> </td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên tài khoản</font></td>
                <td valign="middle"><div class="thefield"> <input name="tenncc" type="text" size="30" value="<?php echo $ten;?>"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Địa chỉ</font></td>
                <td valign="middle"><div class="thefield"> <input name="dc" type="text" size="30" value="<?php echo $diachi;?>"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Điện thoại</font></td>
                <td valign="middle"><div class="thefield"> <input name="dt" type="text" size="30" value="<?php echo $dienthoai;?>"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Email</font></td>
                <td valign="middle"><div class="thefield"> <input name="email" type="text" size="30" value="<?php echo $email;?>"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Khóa</font></td>
                <td valign="middle"><input type="checkbox" name="khoa" <?php if ($khoa==2) echo "checked"; ?> />  </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"><input class="newbt-cn" type="submit" name="sua" id="sua" value="Sửa" onClick="return check();"></td>
                <td width="250"> </td>
            </tr>
				<?php
					if (isset($_POST["sua"]))
					{
						$tenncc=$_POST["tenncc"];
						$dc=$_POST["dc"];
						$dt=$_POST["dt"];
						$email=$_POST["email"];
						if (isset($_POST["khoa"]))
							$khoa=2;
						else
							$khoa=1;
						$sql="select * from nhacungcap where tenncc='$tenncc' and mancc<>$id";
						if (mysql_num_rows(mysql_query($sql))>0)
							echo "<script>alert('Đã có tên nhà cung cấp này');</script>";
						else
						{
							if ($khoa==2)
							{
								$sql="update sanpham set trangthai=2 where mancc=$id";
								mysql_query($sql);			
							}
						$sql="update nhacungcap set tenncc='$tenncc',diachi='$dc',dienthoai='$dt',email='$email',trangthai=$khoa where mancc=$id";
						if (mysql_query($sql))
							header("location:index.php?page=sua_ncc&id=".$id."&success=1");
							else
								echo mysql_error();
						}
								
					}
				?>
        
        
    	</table>
    </form>
</fieldset>
<script>
	function check()
	{
		if(form1.tenncc.value=="")
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
