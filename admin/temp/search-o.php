<?php
	include("../include/dbconn.php");
?>
<?php
	
	
?>
<fieldset>
  <legend>Tài khoản</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" >
      <tr>
      	<td height="50" width="300"><?php include("temp/search-box-o.php");?></td>
        <td height="50" width="10"></td>
        <td height="50" width="300" align="right"><?php include("temp/search-box-d.php");?></td>
      </tr>
      <tr>
        <td align="center" valign="middle" height="40" colspan="3"><font color="#0000FF" size="4" face="Tahoma"><strong>Kết quả tìm kiếm</strong></font></td>
      </tr>
    </table>
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" >  
      <?php
	
		$keyword = $_GET["keyword"];
		if ($keyword == "") {
			?>
             <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="3" face="Tahoma"><strong>Không được để trống</strong></font></td>
		<?php
		}else
		{
			if ( isset($_GET['trang'])==false )
			{
				$trang = 0 ;
			}
			else
			{
				$trang=$_GET['trang'];
			}
			$sql = mysql_query("select * from dondathang where maddh = $keyword");
			$t_sodong = mysql_num_rows($sql);
			$sotrang = $t_sodong/15;
			$dong=$trang*15;
			if($t_sodong == 0)
			{
				?>
             <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="3" face="Tahoma"><strong>Không có đơn hàng nào</strong></font></td>
		<?php
			}
			else
			{
				$i=$trang*15;
			?>
      <tr>
      	
        <td width="40" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="70" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Mã hóa đơn</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Ngày đặt hàng</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Đã xử lý</strong></font></td>
        <td width="80" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Xem thông tin</strong></font></td>
        
      </tr>
      <?php
		$sql1 = mysql_query("select * from dondathang where maddh = $keyword LIMIT $dong,15") or die(mysql_error());
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$idkh=$ketqua[1];
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
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><input type="checkbox" name="tinhtrang" <?php if ($tinhtrang==1) echo "checked"; ?> disabled="disabled" /></td>
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
			echo "<a href='index.php?page=qldh&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
	   
			}
		}
	  ?>
     
    </table>
</fieldset>
