<?php
	include("../include/dbconn.php");
?>
	  <?php 
	  	if (isset($_GET["id"])==true)
		{
			$id=$_GET["id"];
			$i=0;
			$sql=mysql_query("select * from hoidap where mach=$id");
			while($ketqua=mysql_fetch_array($sql))
			{
				
				$matk=$ketqua[1];
				$tieude=$ketqua[2];
				$noidung=$ketqua[3];
				$traloi=$ketqua[4];
				$ngay=$ketqua[5];
				$tinhtrang=$ketqua[6];
			}
			
			
		?>
<fieldset>
  <legend>Chi tiết hỏi đáp</legend>
<form id="form1" name="form1" method="post" action="">
    <table width="700" border="0" cellpadding="0" cellspacing="0" align="center">
    	<tr>
        	<td colspan="5" align="center"><font color="#FF0000" size="3" face="Tahoma"><strong>CHI TIẾT HỎI ĐÁP</strong></font></td>
        </tr>
        <tr>
        	<td colspan="5" height="10"></td>
        </tr>
        <tr>
        	<td colspan="5" height="10" align="center"><font color="#6699FF" size="3" face="Tahoma"><strong><?php if ($tinhtrang==2) echo "Chưa xử lý"; else echo "Đã xử lý";?></strong></font></td>
        </tr>
        <tr>
        	<td colspan="5" height="10"></td>
        </tr>
    	<tr>
        	<td width="100" height="20"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản </strong></font></td>
            <td width="139"><?php echo $matk;?></td>
            <td width="80"></td>
            <td width="150">&nbsp;</td>
            <td width="110">&nbsp;</td>
        </tr>
        <tr>
        	<td height="20"><font color="#222222" size="2" face="Tahoma"><strong>Ngày tạo </strong></font></td>
            <td><?php echo $ngay;?></td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td width="21"></td>
        </tr>
         <tr>
        	<td colspan="1" height="20"><strong>Tiêu đề </strong> </td>
            <td colspan="4" height="20"><?php echo $tieude;?> </td>
            
        </tr>
        <tr>
        	<td colspan="1" height="20"><strong>Nội dung </strong></td>
            <td colspan="4" height="20"><?php echo $noidung;?> </td>
            
        </tr>
        <tr>
        	<td colspan="1" height="20"><strong>Trả lời </strong></td>
            <td colspan="4" height="20"><div class="thefield"> <textarea name="tl" id="tl" cols="45" rows="10" style="width: 553px; height: 254px;"><?php echo $noidung;?></textarea></div></td>
            
        </tr>
         
    </table>
    


    <table width="500" cellpadding="0" cellspacing="0" border="0" align="center">
    	<tr>
        	<td height="20"></td>
        </tr>
    	<tr>
        	<?php
				if ($tinhtrang==2)
				{
			?>
        	<td align="right" width="240"><input class="newbt-cn" type="submit" name="xuly" id="xuly" value="Trả lời" /></td>
            <td align="center" width="20"></td>
            <?php } ?>
            <td align="<?php if($tinhtrang==2) echo "left"; else echo "center";?>" width="240"><input class="newbt-cn" type="submit" name="thoat" id="thoat" value="Thoát" /></td>
        </tr>
        <tr>
        	<td height="20"></td>
        </tr>
    </table>
                      </form>
    
     
</fieldset>
<?php
		}
?>

<?php
	if (isset($_POST["thoat"]))
	{
		header('location:index.php?page=qlhd');
	}
	if (isset($_POST["xuly"]))
	{
		$traloi=$_POST["tl"];
		$sql="update hoidap set trangthai=1,traloi='$traloi' where mach=$id";
		mysql_query($sql) or die ("loi ".mysql_error());
		header('location:index.php?page=ct-qlhd&id='.$id.'&sc=1');
	}
?>
<?php
	if (isset($_GET["sc"])==1)
		echo "<script>alert('Đã được xử lý');</script>";
?>