<?php
	include("../include/dbconn.php");
?>

<fieldset>
	<legend>Tìm kiếm nhà cung cấp</legend>
    <form action="" method="post" name="form1" id="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        	<tr>
                <td align="center" colspan="6"><font color="#0000ff" size="4" face="Tahoma"><strong>CHỌN KIỂU TÌM KIẾM</strong></font></td>
            </tr>
            <tr>
                <td align="center" colspan="6" height="20"></td>
            </tr>
            <tr>
            	<td width="200" height="30"> </td>
                <td width="80" align="right" valign="middle"><input name="cten" type="checkbox" id="cten" value="ten" onclick="chkten()" /></td>
              <td align="center" valign="middle" width="130" ><font face="tahoma" size="2">Tên nhà cung cấp</font></td>
                <td valign="middle" width="130"><div class="thefield"> <input name="ten" type="text" id="ten" size="30" disabled="disabled"> </div></td>
                
                <td width="150"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="right" valign="middle"><input name="cdiachi" type="checkbox" id="cdiachi" value="dc" onclick="chkdc()" /></td>
                <td align="center" valign="middle" ><font face="tahoma" size="2">Địa chỉ</font></td>
                <td valign="middle"><div class="thefield"> <input name="dc" type="text" id="dc" size="30" disabled="disabled"></div></td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="right" valign="middle"><input name="cdienthoai" type="checkbox" id="cdienthoai" value="dt" onclick="chkdt()" />
              <label for="cdienthoai"></label></td>
              <td align="center" valign="middle" ><font face="tahoma" size="2">Số điện thoại</font></td>
                <td valign="middle"><div class="thefield"> <input name="dt" type="text" id="dt" size="30" disabled="disabled"></div></td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="right" valign="middle"><input name="cemail" type="checkbox" id="cemail" value="mail" onclick="chkmail()" /></td>
                <td align="center" valign="middle" ><font face="tahoma" size="2">Email</font></td>
                <td valign="middle"><div class="thefield"> <input name="email" type="text" id="email" size="30" disabled="disabled"></div></td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="50"> </td>
                <td> </td>
                <td colspan="2"><input class="newbt-cn" type="submit" name="tk" id="tk" value="Tìm kiếm" onClick="return check();">&nbsp;&nbsp;
&nbsp;                <input class="newbt-cn" type="reset" name="rs" id="rs" value="Reset" /></td>
                
                <td> </td>
            </tr>
            <tr>
            	<td height="20"> </td>
                <td colspan="2" align="center" valign="middle"><font face="Tahoma, Geneva, sans-serif" size="3" color="#FF0000">
				</font></td>
                <td> </td>
            </tr>
    	</table>
    </form>
    <?php
	if(isset($_GET["trang"])==null)
		{
			unset($_SESSION["tk-ncc"]);
		}
					if (isset($_POST["tk"]))
					{
						$arr=array();
						if(isset($_POST["cten"]))
							array_push($arr,"tenncc like '%".$_POST["ten"]."%'");
						if(isset($_POST["cdiachi"]))
							array_push($arr,"diachi like '%".$_POST["dc"]."%'");
						if(isset($_POST["cdienthoai"]))
							array_push($arr,"dienthoai like '%".$_POST["dt"]."%'");
						if(isset($_POST["cemail"]))
							array_push($arr,"email like '%".$_POST["email"]."%'");
						
						$str=implode(" and ",$arr);
						$_SESSION["tk-ncc"]="select * from nhacungcap where $str";
					}
					
				?>
                 <?php
				if (isset($_SESSION["tk-ncc"]))
				{
					?>
<div style="height:10px"></div>
    <table width="750" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" >
      <tr>
      	<td colspan="7" align="center" valign="middle"><font color="#FF0000" size="4" face="Tahoma"><strong>KẾT QUẢ TÌM KIẾM</strong></font></td>
      </tr>
      <tr>
      	<td colspan="7" align="center" valign="middle" height="10"></td>
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
		$sql=$_SESSION["tk-ncc"];
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có nhà cung cấp nào</strong></font></td>
	  <?php }
	  	else
		{
			?>
            <tr>
        <td width="50" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="150" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên nhà cung cấp</strong></font></td>
        <td width="175" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Địa chỉ</strong></font></td>
        <td width="175" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Số điện thoại</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Email</strong></font></td>
        <td width="60" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Khóa</strong></font></td>
        <td width="70" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
      </tr>
      <?php
			$i=$trang*15;
			$sql1=mysql_query($sql." limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$ten=$ketqua[1];
				$diachi=$ketqua[2];
				$dienthoai=$ketqua[3];
				$email=$ketqua[4];
				$khoa=$ketqua[5];
				$i=$i+1;
		?>
       
      
       <tr>
        <td align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ten;?></font></td>
        <td width="100" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $diachi;?></font></td>
        <td width="100" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $dienthoai;?></font></td>
        <td align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $email;?></font></td>
        <td width="50" align="center" valign="middle"  style="border:solid 1px #33CC00"><input type="checkbox" name="noibat"<?php if ($khoa==2) echo "checked"; ?> disabled="disabled" /></td>
        <td align="center" valign="middle"  style="border:solid 1px #33CC00"><a href="index.php?page=sua_ncc&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
        
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=tk_ncc&trang={$trang}'>{$s_trang}</a>&nbsp;";
	}?>
	</td></tr>
       <?php }
		}
	  ?>
     
    </table>
<?php
					}
					?>
</fieldset>


<script language="javascript">
	function chkten()
	{
		if (cten.checked)
		{
			document.getElementById("ten").disabled=false;
			document.getElementById("ten").value="";
		}
		else
		{
			document.getElementById("ten").disabled=true;
			document.getElementById("ten").value="";		
		}
	}
	
	function chkdc()
	{
		if (cdiachi.checked)
		{
			document.getElementById("dc").disabled=false;
			document.getElementById("dc").value="";	
		}
		else
		{
			document.getElementById("dc").disabled=true;
			document.getElementById("dc").value="";		
		}
	}
	
	function chkdt()
	{
		if (cdienthoai.checked)
		{
			document.getElementById("dt").disabled=false;
			document.getElementById("dt").value="";	
		}
		else
		{
			document.getElementById("dt").disabled=true;
			document.getElementById("dt").value="";		
		}
	}
	
	function chkmail()
	{
		if (cemail.checked)
		{
			document.getElementById("email").disabled=false;
			document.getElementById("email").value="";	
		}
		else
		{
			document.getElementById("email").disabled=true;
			document.getElementById("email").value="";		
		}
	}

</script>
<script>
	function check()
	{
		if(form1.name.value=="")
		{	alert("Bạn chưa điền tên loại sản phẩm");
			form1.name.focus();
			return false;
		}
		else
			return true;	
	}
</script>
