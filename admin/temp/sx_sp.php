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
  <legend>Sửa xóa sản phẩm</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" >
      <tr>
      	<td colspan="6"><?php include("temp/search-box-p.php");?></td>
        <td align="right" height="40"><a href="?page=them_sp"><img src="img/add.jpg"></td>
      </tr>
      <tr>
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="200" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tên sản phẩm</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Giá</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Ảnh</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Nổi bật</strong></font></td>
        <td width="40" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
        <td width="40" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Xóa</strong></font></td>
      </tr>
    <?php
	  	if ( isset($_GET['trang'])==false )
		{
			$trang = 0 ;
		}
		else
		{
			$trang=$_GET['trang'];
		}
	  	$sql="select * from sanpham";
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có sản phẩm nào</strong></font></td>
	  <?php }
	  	else
		{
			$i=$trang*15;
			$sql1=mysql_query("select * from sanpham limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$ten=$ketqua[2];
				$gia=$ketqua[3];
				$anh=$ketqua[4];
				$nb=$ketqua[6];
				$i=$i+1;
		?>
       <tr>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $ten;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $gia;?></font></td>
        <td height="75" width="75" align="center" valign="middle" style="border:solid 1px #CCCCCC"><img src="../<?php echo $anh;?>" height="73" width="73"></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><input type="checkbox" name="noibat"<?php if ($nb==1) echo "checked"; ?> disabled="disabled" /></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=sua_sp&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=xoa_sp&id=<?php echo $id; ?>" onClick="return ok()"><img src="img/icon-del.jpg"></a></td>
       </tr>
        <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=sx_sp&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
</fieldset>
<script>
	function ok()
	{
		return confirm("Bạn có chắc chắn muốn xóa?");
		
	}

</script>