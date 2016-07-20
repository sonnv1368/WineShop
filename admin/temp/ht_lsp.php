<?php
	include("../include/dbconn.php");
?>

<fieldset>
	<legend>Danh sách loại sản phẩm</legend>
    
   	  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center"  style="border-collapse:collapse;">
      <tr>
    	<td align="center" colspan="4"><font color="#0000ff" size="4" face="Tahoma"><strong>DANH SÁCH LOẠI SẢN PHẨM</strong></font></td>
    </tr>
    
    	  <tr>
        <td align="right" height="40" colspan="4" >
<button class="newbt-cn" onclick="location.href='?page=them_lsp'">THÊM MỚI</button></td>
      </tr>
      </table>
      <form name="form1" action="" method="post">
   	  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center"  style="border-collapse:collapse;">
      
    	  <tr>
    	    <td height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>STT</strong></font></td>
    	    <td height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>Loại sản phẩm</strong></font></td>
            <td height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>Khóa</strong></font></td>
    	    <td height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>Sửa</strong></font></td>
    	    
  	    </tr>
    	  
    	    <?php
				$i=0;
				$sql="select * from loaisp order by malsp desc";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay)>0)
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$idloai=$ketqua[0];
						$idmuc=$ketqua[1];
						$ten=$ketqua[2];
						$khoa=$ketqua[3];
						$i=$i+1;
			?>
            <tr>
            	<td height="30" align="center" valign="middle"  style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><?php echo $i;?></font></td>
                <td height="30" align="center" valign="middle"  style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><?php echo $ten;?></font></td>
                <td width="50" align="center" valign="middle"  style="border:solid 1px #33CC00"><input type="checkbox" name="noibat" <?php if ($khoa==2) echo "checked"; ?> disabled="disabled" /></td>
                <td height="30" align="center" valign="middle"  style="border:solid 1px #33CC00"><a href="index.php?page=sua_lsp&idloai=<?php echo $idloai; ?>"><img src="img/icon-edit.jpg"></a></td>
            </tr>
            
            <?php						
					}
				}
				else
				{
			?>
            
				<td colspan="4" align="center" valign="middle"  style="border:solid 1px #33CC00"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">Không có loại sản phẩm nào</font></td>
            <?php } ?>

  	    
    	  <tr>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
  	    </tr>
  	  </table>
    </form>


</fieldset>
