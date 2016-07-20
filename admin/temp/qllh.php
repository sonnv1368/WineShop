<?php
	include("../include/dbconn.php");
?>
<?php
	
	
?>
<fieldset>
  <legend>Liên hệ</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;" >
      <tr>
      	<td align="center" valign="middle" height="62"><font color="#0000ff" size="4" face="Tahoma"><strong>DANH SÁCH LIÊN HỆ</strong></font></td>
      </tr>
    </table>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" >  
      <tr>
      	
        <td width="40" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="70" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Họ tên</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Số điện thoại</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Địa chỉ</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Email</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Ngày tạo</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Đã xử lý</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Xem thông tin</strong></font></td>
        
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
		if (isset($_GET["tt"])==true)
		{
			$tt=$_GET["tt"];
	  		$sql="select * from lienhe where trangthai=$tt order by malh desc";
		}
		else
		{
			$sql="select * from lienhe order by malh desc";
		}
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="8" width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có liên hệ nào</strong></font></td>
	  <?php }
	  	else
		{
			$i=$trang*15;
			$sql1=$sql." limit $dong,15";
			$chay1=mysql_query($sql1);
			while ($ketqua=mysql_fetch_array($chay1))
			{
				$id=$ketqua[0];
				$hoten=$ketqua[1];
				$sdt=$ketqua[2];
				$dc=$ketqua[3];
				$email=$ketqua[4];
				$nd=$ketqua[5];
				$ngay=$ketqua[6];
				$tt=$ketqua[7];
				$i=$i+1;
				
		?>
       <tr>
        <td width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="70" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $hoten;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $sdt;?></font></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $dc;?></font></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $email;?></font></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ngay;?></font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="tinhtrang" <?php if ($tt==1) echo "checked"; ?> disabled="disabled" /></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #33CC00"><a href="index.php?page=ct-qllh&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
		if (isset($_GET["tt"])==true)
		{
			$tt=$_GET["tt"];
			 echo "<a href='index.php?page=qllh&tt={$tt}&trang={$trang}'>{$s_trang}</a>&nbsp;";			
		}
		else
			echo "<a href='index.php?page=qllh&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
</fieldset>
