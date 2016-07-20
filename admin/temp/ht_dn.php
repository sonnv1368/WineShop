<?php
	include("../include/dbconn.php");
	ob_start();
?>
<fieldset>
  <legend>Hóa đơn nhập hàng</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" >
      <tr>
      	<td height="50" colspan="5"><?php include("temp/search-box-a.php");?></td>
        <td align="right" height="50"><a href="?page=them_dn"><img src="img/add.jpg"></a></td>
      </tr>
    </table>
    <table width="550" border="0" cellspacing="0" cellpadding="0" align="center" >  
      <tr>
      	
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="200" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tên nhà cung cấp</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Ngày nhập hàng</strong></font></td>
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
	  	$sql="select * from hoadonnhap";
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có đơn nhập hàng nào</strong></font></td>
	  <?php }
	  	else
		{
			$i=$trang*15;
			$sql1=mysql_query("select * from hoadonnhap limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$mancc=$ketqua[1];
				$ngay=$ketqua[2];
				$i=$i+1;
				$result=mysql_query("select tenncc from nhacungcap where mancc=$mancc");
				while ($kq=mysql_fetch_array($result))
				{
					$tenncc=$kq[0];
				}
		?>
       <tr>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $taikhoan;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $tencapdo;?></font></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=sua_dn&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=xoa_dn&id=<?php echo $id; ?>" onClick="return ok()"><img src="img/icon-del.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=qldn&trang={$trang}'>{$s_trang}</a>&nbsp;";
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