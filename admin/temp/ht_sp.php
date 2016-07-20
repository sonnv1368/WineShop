<?php
	include("../include/dbconn.php");
	ob_start();
?>





<fieldset>
  <legend>Sản phẩm</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;" >
    <tr>
    	<td align="center" colspan="7"><font color="#0000ff" size="4" face="Tahoma"><strong>DANH SÁCH SẢN PHẨM</strong></font></td>
    </tr>
      <tr>
        <td align="right" height="40" colspan="7" >
<button class="newbt-cn" onclick="location.href='?page=them_sp'">THÊM MỚI</button></td>
      </tr>
      <tr>
        <td width="50" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="300" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên sản phẩm</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Giá</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Ảnh</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Nổi bật</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Khóa</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
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
        <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có sản phẩm nào</strong></font></td>
	  <?php }
	  	else
		{
			$i=$trang*15;
			$sql1=mysql_query("select * from sanpham order by masp desc limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$ten=$ketqua[3];
				$gia=$ketqua[5];
				$anh=$ketqua[6];
				$nb=$ketqua[8];
				$tt=$ketqua[10];
				$i=$i+1;
		?>
       <tr>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ten;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo number_format($gia,0,',','.');?> VNĐ</font></td>
        <td height="75" width="75" align="center" valign="middle" style="border:solid 1px #33CC00"><img src="../<?php echo $anh;?>" height="73" width="73"></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="noibat"<?php if ($nb==1) echo "checked"; ?> disabled="disabled" /></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="khoa"<?php if ($tt==2) echo "checked"; ?> disabled="disabled" /></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><a href="index.php?page=sua_sp&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=qlsp&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
</fieldset>
