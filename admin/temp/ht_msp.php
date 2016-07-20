<?php
	include("../include/dbconn.php");
?>

<?php
	if (isset($_GET["success"]))
	{
		if ($_GET["success"]==1)
			echo "<script>alert('Xóa thành công!')</script>";
		if ($_GET["success"]==0)
			echo "<script>alert('Lỗi!')</script>";
	}
			
?>
<fieldset>
	<legend>Danh sách mục sản phẩm</legend>
   
   	  <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;" >
      <tr>
    	<td align="center" colspan="4"><font color="#0000ff" size="4" face="Tahoma"><strong>DANH SÁCH MỤC SẢN PHẨM</strong></font></td>
    </tr>
    	  <tr>
        <td align="right" height="40" colspan="4" >
<button class="newbt-cn" onclick="location.href='?page=them_msp'">THÊM MỚI</button></td>
      </tr>
      </table>
      <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;" >
      
    	  <tr>
    	    <td height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>STT</strong></font></td>
    	    <td height="40" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>Mục sản phẩm</strong></font></td>
            <td height="40" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>Khóa</strong></font></td>
    	    <td height="40" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><strong>Sửa</strong></font></td>
    	    
  	    </tr>
    	  
    	    <?php
				$i=0;
				$sql="select * from danhmucsp order by madanhmuc desc";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay)>0)
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$idmuc=$ketqua[0];
						$ten=$ketqua[1];
						$khoa=$ketqua[2];
						$i=$i+1;
			?>
            <tr>
            	<td height="30" align="center" valign="middle"  style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><?php echo $i;?></font></td>
                <td height="30" align="center" valign="middle" style="border:solid 1px #33CC00"><font size="2" face="Tahoma"><?php echo $ten;?></font></td>
                <td width="50" align="center" valign="middle"  style="border:solid 1px #33CC00"><input type="checkbox" name="khoa"<?php if ($khoa==2) echo "checked"; ?> disabled="disabled" /></td>
                <td height="30" align="center" valign="middle"  style="border:solid 1px #33CC00"><a href="index.php?page=sua_msp&idmuc=<?php echo $idmuc; ?>"><img src="img/icon-edit.jpg"></a></td>
            </tr>
            
            <?php						
					}
				}
				else
				{
			?>
            
				<td colspan="4" align="center" valign="middle"  style="border:solid 1px #33CC00"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">Không có mục sản phẩm nào</font></td>
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
<script>
	function ok()
	{
		return confirm("Bạn có chắc chắn muốn xóa?");
		
	}

</script>