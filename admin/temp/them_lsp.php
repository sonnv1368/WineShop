<?php
	include("../include/dbconn.php");
?>
<fieldset>
	<legend>Thêm loại sản phẩm</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
    	<td align="center" colspan="7"><font color="#0000ff" size="4" face="Tahoma"><strong>THÊM LOẠI SẢN PHẨM</strong></font></td>
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
                <td valign="middle"><div class="thefield"> <input name="name" type="text" size="30"></div> </td>
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
                         	<option value="<?php echo $mamuc;?>"><?php echo $tenmuc;?></option>
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
                <td valign="middle"><input type="checkbox" name="khoa" />  </td>
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
						$ten=$_POST["name"];
						$mamuc=$_POST["select1"];
						if (isset($_POST["khoa"]))
							$khoa=2;
						else
							$khoa=1;
						$sql="select * from loaisp where tenlsp='$ten' and madanhmuc=$mamuc";
						if (mysql_num_rows(mysql_query($sql))>0)
							echo "<script>alert('Đã có loại sản phẩm này!');</script>";
						else
						{
						$sql="insert into loaisp(madanhmuc,tenlsp,trangthai) value($mamuc,'$ten',$khoa)";
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
