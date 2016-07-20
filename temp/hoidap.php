<?php
	include("include/dbconn.php")
?>
<div id="form-hoi-dap">
<form id="form1" name="form1" method="post" onSubmit="return check()" action="">
<table width="700" border="0" cellpadding="0" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  <tr> 
    <td height="37" colspan="5" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma">HỎI ĐÁP</font></strong></font></td>
  </tr>
  <tr> 
    <td height="40" colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr> 
    <td height="40" colspan="5" valign="top" align="center"><font color="#0000ff" size="5px">Hãy đặt câu hỏi với chúng tôi! </font></td>
  </tr>
  <tr> 
	<td width="180" height="40">&nbsp;</td>
    <td width="100"><strong>Tiêu đề</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><div class="thefield"><input name="td" type="text" id="td" size="30"></div></td>
  </tr>
  <tr> 
	<td width="180" height="40">&nbsp;</td>
    <td width="100"><strong>Nội dung</strong></td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><label for="nd"></label>
    <div class="thefield">  <textarea name="nd" id="nd" cols="45" rows="5" style="width: 292px; height: 162px;"></textarea></div></td>
  </tr>
  <tr> 
	<td width="180" height="45">&nbsp;</td>
    <td width="100"><strong>Mã xác nhận</strong></td>
    <td width="20">&nbsp;</td>
    <td width="150" valign="middle"><div class="thefield"><input type="text" name="xacnhan" id="xacnhan" style="height:22px;" /></div></td>
    <td> <img src="../taoma.php"  style="margin-top:2px;" /> <?php if(isset($xn)) echo $xn;?></td>
  </tr>
  
  <tr> 
	<td width="180" height="40">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="400" colspan="2"><input style="margin-top:10px;" type="submit" name="dk" id="dk" value="Đăng câu hỏi" class="newbt" onclick="return check(<?php echo $_SESSION["login"];?>)"></td>
  </tr>
  

  

</table>
</form>
<?php
	


?>
</div>

<div class="box-danhsachcauhoi">
	<div class="title-box-danhsachcauhoi">Danh sách câu hỏi	</div>
 <?php
	$sql="select * from hoidap where trangthai=1";
	$chay=mysql_query($sql);
	while($kq=mysql_fetch_array($chay))
	{
		$tieude=$kq[2];
		$noidung=$kq[3];
		$traloi=$kq[4];
  ?>
    <!--Chỗ này để vòng lặp hiện danh sách câu hỏi -->
    <div class="box-cauhoi">
    <p><strong><span style="color:#F60;">Tiêu đề</span>: <?php echo $tieude;?></strong></p>
    <p><strong><span style="color:#1165d0;">Câu hỏi</span>: 
    <?php echo $noidung;?></strong></p>
                                    
    <p><i><strong style="color:#f90707;">Trả lời</span>: </strong><?php echo $traloi;?>    </i></p>
    </div>
	 <?php
	 		}
?> 
    </div>

</div>
<?php
if (isset($_POST["dk"]))
{
	if ($_SESSION["code"]!=$_POST["xacnhan"])
			$xn="Mã xác nhận sai";
	else
	{
		$tieude=$_POST["td"];
		$noidung=$_POST["nd"];
		$matk=$_SESSION["userid"];
		$sql="insert into hoidap(tieude,noidung,matk,ngaytao) value('$tieude','$noidung',$matk,now())";
		$chay=mysql_query($sql) ;		
		
		
	}
	
}
?>
<script>
	function check(login)
	{
		if (login!=1)
		{
			alert("Bạn chưa đăng nhập");
			return false;
		}
		if (form1.td.value=="")
		{
			alert("Bạn chưa nhập Tiêu đề");
			form1.td.focus();
			return false;	
		}
		if (form1.nd.value=="")
		{
			alert("Bạn chưa nhập Nội dung");
			form1.nd.focus();
			return false;	
		}
		if (form1.code.value=="")
		{
			alert("Bạn chưa nhập Mã xác nhận");
			form1.code.focus();
			return false;	
		}
		
		else return true;
	}
</script>
 