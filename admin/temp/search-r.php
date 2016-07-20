<?php
	include("../include/dbconn.php");
	ob_start();
?>
<?php
	if (isset($_GET["ob"])==false)
		$ob="desc";
	else
		$ob=$_GET["ob"];
?>
<fieldset>
  <legend>Đánh giá sản phẩm</legend>
    <table width="750" border="0" cellspacing="0" cellpadding="0" >
      <tr>
      	<td colspan="4"><?php include("temp/search-box-r.php");?></td>
        <td align="right" height="40"></td>
      </tr>
      <tr>
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="200" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tên sản phẩm</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><strong><font color="#222222" size="2" face="Tahoma">Điểm trung bình</font></strong></td>
        <td width="75" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><strong>Tổng điểm</strong></font></td>
        <td width="50" align="center" valign="middle" bgcolor="#e5e5e5" style="border:solid 1px #CCCCCC"><strong><font color="#222222" size="2" face="Tahoma">Số lần</font></strong></td>
      </tr>
      <?php
	{
		$keyword = $_GET["keyword"];
		if ($keyword == "") {
			?>
             <td colspan="5" width="40" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#FF0000" size="3" face="Tahoma"><strong>Không được để trống</strong></font></td>
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
	  	$sql="select * from danhgia where id in (select id from sanpham where ten like '%$keyword%')";
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
			$sql0 = mysql_query("select * from danhgia where id in (select id from sanpham where ten like '%$keyword%') order by (diem/dem) $ob LIMIT $dong,15") or die(mysql_error());
			$sodong = mysql_num_rows($sql0);
			while ($ketqua=mysql_fetch_array($sql0))
			{
				$id=$ketqua[0];
				$diem=$ketqua[1];
				$dem=$ketqua[2];
				if ($dem==0)
					$diemtb=0;
				else
        		$diemtb = floor($diem/$dem);
				$sql1="select ten from sanpham where id=$id";
				$row=mysql_fetch_array(mysql_query($sql1));
				$ten=$row[0];
				$i=$i+1;
		?>
       <tr>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $ten;?></font></td>
        <td width="100" align="center" valign="middle" style="border:solid 1px #CCCCCC"><div class="basic" data-average="<?php echo $diemtb;?>" data-id="<?php echo $id;?>"></div>
		<script type="text/javascript">
            $(document).ready(function(){
            $('.basic').jRating({
                     step:true, //cho phep nua ngoi sao
                     length : 5, // so ngoi sao hien thi
                     decimalLength:0, // so thap phan
					 isDisabled:true,
                });
            });
		</script></font></td>
        <td height="75" width="75" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $diem;?></font></td>
        <td width="50" align="center" valign="middle" style="border:solid 1px #CCCCCC"><font color="#222222" size="2" face="Tahoma"><?php echo $dem;?></font></td>
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=search-r&ob={$ob}&keyword={$keyword}&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}}}
	  ?>
     
    </table>
</fieldset>
