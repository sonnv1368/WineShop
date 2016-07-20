<?php
	include("../include/dbconn.php");
	$idloai=$_GET["idloai"];
	$sql="select * from loaisp where malsp=$idloai";
	$chay=mysql_query($sql);
	if (mysql_num_rows($chay)>0)
	{
		while ($ketqua=mysql_fetch_array($chay))
		{
			$idmuc=$ketqua[1];
			$ten=$ketqua[2];
			$trangthai=$ketqua[3];
		}
		
	}
?>
<fieldset>
	<legend>Sửa loại sản phẩm</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
    	<td align="center" colspan="4"><font color="#0000ff" size="4" face="Tahoma"><strong>SỬA LOẠI SẢN PHẨM</strong></font></td>
    </tr>
        	<tr>
            	<td width="200" height="30"> </td>
                <td width="130"> </td>
                <td width="200"> </td>
                <td width="250"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Tên loại sản phẩm</font></td>
                <td valign="middle"><div class="thefield"> <input name="name" type="text" size="30" value="<?php echo $ten;?>"></div> </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Mục sản phẩm</font></td>
                <td valign="middle"> <div class="thefield">
                	<select name="select1">
                    <?php
						$sql="select * from danhmucsp where trangthai=1";
						$chay=mysql_query($sql);
						if (mysql_num_rows($chay)!=0)
						{
							while ($ketqua=mysql_fetch_array($chay))
							{
								$mamuc=$ketqua[0];
								$tenmuc=$ketqua[1];
							?>
                         	<option value="<?php echo $mamuc;?>" <?php if ($idmuc==$mamuc) echo "selected";?>><?php echo $tenmuc;?></option>
                    <?php        
							}
						}
					
					?>
                    </select>
                    </div>
                    
                </td>
                <td> </td>
                <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><font face="tahoma" size="2">Khóa</font></td>
                <td valign="middle"><input type="checkbox" name="khoa"  <?php if ($trangthai==2) echo "checked"; ?> />  </td>
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
						$tenloai=$_POST["name"];
						$idmuc=$_POST["select1"];
						if (isset($_POST["khoa"]))
							$khoa=2;
						else
							$khoa=1;
							
						
						$sql="select * from loaisp where tenlsp='$tenloai' and malsp<>$idloai";
						if (mysql_num_rows(mysql_query($sql))>0)
							echo "<script>alert('Đã có loại sản phẩm này');</script>";
						else
						{
							if ($khoa==2)
							{
								$sql="update sanpham set trangthai=2 where malsp=$idloai";
								mysql_query($sql);			
							}
							$sql="update loaisp set madanhmuc=$idmuc,tenlsp='$tenloai',trangthai=$khoa where malsp=$idloai";
							if (mysql_query($sql))
								header("Location:index.php?page=sua_lsp&idloai=".$idloai."&sc=1");
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
		{	alert("Bạn chưa điền tên loại sản phẩm");
			form1.name.focus();
			return false;
		}
		else
			return true;	
	}
</script>
