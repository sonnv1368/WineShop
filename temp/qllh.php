<?php
	include("../include/dbconn.php");
?>
<?php
	
	
?>
<fieldset>
  <legend>Đơn hàng</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" >
      <tr>
      	<td align="center" valign="middle" height="62"><font color="#FF0000" size="4" face="Tahoma"><strong>DANH SÁCH ĐƠN HÀNG</strong></font></td>
      </tr>
    </table>
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" >  
      <tr>
      	
        <td width="40" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="70" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Mã hóa đơn</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Ngày đặt hàng</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Đã xử lý</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Xem thông tin</strong></font></td>
        
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
	  		$sql="select * from dondathang where matt=$tt";
		}
		else
		{
			$sql="select * from dondathang order by maddh desc";
		}
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có đơn đặt hàng nào</strong></font></td>
	  <?php }
	  	else
		{
			$i=$trang*15;
			$sql1=$sql." limit $dong,15";
			$chay1=mysql_query($sql1);
			while ($ketqua=mysql_fetch_array($chay1))
			{
				$id=$ketqua[0];
				$idkh=$ketqua[1];
				$httt=$ketqua[2];
				$ngay=$ketqua[4];
				$tinhtrang=$ketqua[3];
				$i=$i+1;
				$result=mysql_query("select tendangnhap from taikhoan where matk=$idkh");
				while ($kq=mysql_fetch_array($result))
				{
					$taikhoan=$kq[0];
				}
		?>
       <tr>
        <td width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="70" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $id;?></font></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $taikhoan;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $ngay;?></font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><input type="checkbox" name="tinhtrang" <?php if ($tinhtrang==2) echo "checked"; ?> disabled="disabled" /></td>
        <td width="80" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=tt-dh&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
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
			 echo "<a href='index.php?page=qldh&tt={$tt}&trang={$trang}'>{$s_trang}</a>&nbsp;";			
		}
		else
			echo "<a href='index.php?page=qldh&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
</fieldset>
