<?php
	include("../include/dbconn.php");
?>


<fieldset>
	<legend>Sửa xóa loại sản phẩm</legend>
    <form name="form1" action="" method="post">
   	  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center">
    	  <tr>
    	    <td width="150" height="50">&nbsp;</td>
    	    <td width="300">&nbsp;</td>
    	    <td>&nbsp;</td>
    	    <td>&nbsp;</td>
  	    </tr>
    	  <tr>
    	    <td height="30" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font size="2" face="Tahoma"><strong>STT</strong></font></td>
    	    <td height="30" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font size="2" face="Tahoma"><strong>Loại sản phẩm</strong></font></td>
    	    <td height="30" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font size="2" face="Tahoma"><strong>Sửa</strong></font></td>
    	    <td height="30" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font size="2" face="Tahoma"><strong>Xóa</strong></font></td>
  	    </tr>
    	  
    	    <?php
				$i=0;
				$sql="select * from loaisp";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay)>0)
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$idloai=$ketqua[0];
						$idmuc=$ketqua[1];
						$ten=$ketqua[2];
						$i=$i+1;
			?>
            <tr>
            	<td height="30" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font size="2" face="Tahoma"><?php echo $i;?></font></td>
                <td height="30" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font size="2" face="Tahoma"><?php echo $ten;?></font></td>
                <td height="30" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=sua_lsp&idloai=<?php echo $idloai; ?>"><img src="img/icon-edit.jpg"></a></td>
                <td height="30" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=xoa_lsp&id=<?php echo $idloai; ?>" onClick="return ok()"><img src="img/icon-del.jpg"></a></td>
            </tr>
            
            <?php						
					}
				}
				else
				{
			?>
            
				<td colspan="4" align="center" valign="middle"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">Không có loại sản phẩm nào</font></td>
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
