<?php
	include("../include/dbconn.php");
	ob_start();
?>
<fieldset>
  <legend>Nhà cung cấp</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
    <tr>
    	<td align="center" colspan="7"><font color="#0000ff" size="4" face="Tahoma"><strong>DANH SÁCH NHÀ CUNG CẤP</strong></font></td>
    </tr>
     <tr>
        <td align="right" height="40" colspan="7" >
<button class="newbt-cn" onclick="location.href='?page=them_ncc'">THÊM MỚI</button></td>
      </tr>
      <tr>
        <td height="40" width="50" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="150" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên nhà cung cấp</strong></font></td>
        <td width="175" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Địa chỉ</strong></font></td>
        <td width="175" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Số điện thoại</strong></font></td>
        <td width="100" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Email</strong></font></td>
        <td width="60" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Khóa</strong></font></td>
        <td width="70" align="center" valign="middle"  bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
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
	  	$sql="select * from nhacungcap";
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có nhà cung cấp nào</strong></font></td>
	  <?php }
	  	else
		{
			$i=$trang*15;
			$sql1=mysql_query("select * from nhacungcap order by mancc desc limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$ten=$ketqua[1];
				$diachi=$ketqua[2];
				$dienthoai=$ketqua[3];
				$email=$ketqua[4];
				$khoa=$ketqua[5];
				$i=$i+1;
		?>
       <tr>
        <td align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ten;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $diachi;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $dienthoai;?></font></td>
        <td align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $email;?></font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="noibat"<?php if ($khoa==2) echo "checked"; ?> disabled="disabled" /></td>
        <td align="center" valign="middle" style="border:solid 1px #33CC00"><a href="index.php?page=sua_ncc&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=qlncc&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
</fieldset>
