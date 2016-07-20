<?php
	include("../include/dbconn.php");
	$idmuc=$_GET["idmuc"];
	$sql="select * from danhmucsp where madanhmuc=$idmuc";
	$chay=mysql_query($sql);
	if (mysql_num_rows($chay)>0)
	{
		while ($ketqua=mysql_fetch_array($chay))
		{
			$ten=$ketqua[1];
			$khoa=$ketqua[2];
		}
		
	}
?>
<fieldset>
	<legend>Sửa mục sản phẩm</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
    	<td align="center" colspan="4"><font color="#0000ff" size="4" face="Tahoma"><strong>SỬA MỤC SẢN PHẨM</strong></font></td>
    </tr>
        	<tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"> </td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên mục sản phẩm</font></td>
                <td valign="middle"><div class="thefield"> <input name="name" type="text" size="30" value="<?php echo $ten;?>"> </div></td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Khóa</font></td>
                <td valign="middle"><input type="checkbox" name="khoa"  <?php if ($khoa==2) echo "checked"; ?> />  </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"><input class="newbt-cn" type="submit" name="sua" id="sua" value="Sửa" onClick="return check();"></td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td width="200" height="30"> </td>
                <td colspan="2" align="center" valign="middle"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">
				<?php
					if (isset($_POST["sua"]))
					{
						$tenmuc=$_POST["name"];
						$sql="select * from danhmucsp where tendanhmuc='$tenmuc' and madanhmuc<>$idmuc";
						if (isset($_POST["khoa"]))
							$khoa=2;
						else
							$khoa=1;
						
						if (mysql_num_rows(mysql_query($sql))>0)
							echo "<script>alert('Đã có mục sản phẩm này');</script>";
						else
						{
							if ($khoa==2)
							{
								$sql="select * from loaisp where madanhmuc=$idmuc";
								$chay=mysql_query($sql);
								while ($r=mysql_fetch_array($chay))
								{
									$idloai=$r[0];
									$sql1="update sanpham set trangthai=2 where malsp=$idloai";
									mysql_query($sql1);
									$sql2="update loaisp set trangthai=2 where malsp=$idloai";
									mysql_query($sql2);
										
								}
							
							
							}
							$sql="update danhmucsp set tendanhmuc='$tenmuc',trangthai=$khoa where madanhmuc=$idmuc";
							if (mysql_query($sql))
								header("Location:index.php?page=sua_msp&idmuc=".$idmuc."&sc=1");
							else
								echo mysql_error();
						}
					}
				?>
                <?php
                if (isset($_GET["sc"])==true)
				{
					if ($_GET["sc"]==1)
						echo "Sửa thành công";
				}?>
				</font></td>
                <td width="250"> </td>
            </tr>
        
        
    	</table>
    </form>
</fieldset>
<script>
	function check()
	{
		if(form1.name.value=="")
		{	alert("Bạn chưa điền tên mục sản phẩm");
			form1.name.focus();
			return false;
		}
		else
			return true;	
	}
</script>
