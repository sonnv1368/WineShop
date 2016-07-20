<?php
	include("../include/dbconn.php");
?>
<fieldset>
  <legend>Tài khoản</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center" >
      <tr>
      	<td height="50" colspan="5"><?php include("temp/search-box-a.php");?></td>
      </tr>
      <tr>
        <td align="center" valign="middle" height="40"><font color="#0000FF" size="4" face="Tahoma"><strong>Kết quả tìm kiếm</strong></font></td>
      </tr>
    </table>
    <table width="550" border="0" cellspacing="0" cellpadding="0" align="center" >  
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
			$sql = mysql_query("select * from user where taikhoan like '%$keyword%'");
			$t_sodong = mysql_num_rows($sql);
			$sotrang = $t_sodong/15;
			$dong=$trang*15;
			if($t_sodong == 0)
			{
				?>
             <td colspan="7" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="3" face="Tahoma"><strong>Không có tài khoản nào</strong></font></td>
		<?php
			}
			else
			{
				$i=$trang*15;
			?>
      <tr>
      	
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="200" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Cấp độ</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Khóa</strong></font></td>
        <td width="40" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
        <td width="40" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Xóa</strong></font></td>
      </tr>

	  <?php
	  		$sql1 = mysql_query("select * from user where taikhoan like '%$keyword%' LIMIT $dong,15") or die(mysql_error());
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$taikhoan=$ketqua[1];
				$capdo=$ketqua[4];
				$khoa=$ketqua[5];
				$i=$i+1;
				
				$result=mysql_query("select capdo from capdo where id=$capdo");
				while ($kq=mysql_fetch_array($result))
				{
					$tencapdo=$kq[0];
				}
		?>
       <tr>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $taikhoan;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $tencapdo;?></font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><input type="checkbox" name="noibat"<?php if ($khoa==1) echo "checked"; ?> disabled="disabled" /></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=sua_tk&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
        <td width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><a href="index.php?page=xoa_tk&id=<?php echo $id; ?>" onClick="return ok()"><img src="img/icon-del.jpg"></a></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
		echo "<a href='index.php?page=search-a&keyword={$keyword}&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}}
	  ?>
     
    </table>
</fieldset>
<script>
	function ok()
	{
		return confirm("Bạn có chắc chắn muốn xóa?");	
	}
</script>