<?php
	include("../include/dbconn.php");
	ob_start();
?>

<fieldset>
  <legend>Tài khoản</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;">
    <tr>
    	<td align="center" colspan="6"><font color="#0000ff" size="4" face="Tahoma"><strong>DANH SÁCH TÀI KHOẢN</strong></font></td>
    </tr>
      <tr>
      	<td height="50" colspan="5"></td>
        <td align="right" height="50"><button class="newbt-cn" onclick="location.href='?page=them_tk'">THÊM MỚI</button></td>
</td>
      </tr>
    </table>
    <table width="550" border="0" cellspacing="0" cellpadding="0" align="center" >  
      <tr>
      	
        <td width="50" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="200" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Cấp độ</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Khóa</strong></font></td>
        <td width="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
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
	  	$sql="select * from taikhoan";
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có tài khoản nào</strong></font></td>
	  <?php }
	  	else
		{
			$i=$trang*15;
			$sql1=mysql_query("select * from taikhoan order by matk desc limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$taikhoan=$ketqua[2];
				$capdo=$ketqua[1];
				$khoa=$ketqua[9];
				$i=$i+1;
				$result=mysql_query("select tencapdo from capdo where macapdo=$capdo");
				while ($kq=mysql_fetch_array($result))
				{
					$tencapdo=$kq[0];
				}
		?>
       <tr>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $taikhoan;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $tencapdo;?></font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #33CC00"><input type="checkbox" name="noibat"<?php if ($khoa==2) echo "checked"; ?> disabled="disabled" /></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #33CC00"><a href="index.php?page=sua_tk&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=qltk&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
</fieldset>
