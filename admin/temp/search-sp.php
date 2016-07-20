<?php
	include("../include/dbconn.php");

?>

<fieldset>
  <legend>Danh sách sản phẩm</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" >
      <tr>
      	<td colspan="7" height="30" align="left" valign="center"><?php include("temp/search-box-p.php")?></td>
      
      </tr>
      <tr>
        <td colspan="7" align="center" valign="middle" height="40"><font color="#0000FF" size="4" face="Tahoma"><strong>Kết quả tìm kiếm</strong></font></td>
      </tr>
      
<?php
	{
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
			$sql = mysql_query("select * from sanpham where ten like '%$keyword%'");
			$t_sodong = mysql_num_rows($sql);
			$sotrang = $t_sodong/15;
			$dong=$trang*15;
			if($t_sodong == 0)
			{
				?>
             <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="3" face="Tahoma"><strong>Không có sản phẩm nào</strong></font></td>
		<?php
			}
			else
			{
				$i=$trang*15;
				$sql = mysql_query("select * from sanpham where ten like '%$keyword%' LIMIT $dong,15") or die(mysql_error());
				$sodong = mysql_num_rows($sql);
			?>
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
				while ($row = mysql_fetch_array($sql)) 
				{
					$id = $row[0];
					$ten = $row[2];
					$gia = $row[3];
					$anh = $row[4];
					$nb = $row[6];	
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
	echo "<a href='index.php?page=search-p&keyword={$keyword}&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
    <?php
       }}
		}
	}
	
	
	  ?>

    </table>
</fieldset>