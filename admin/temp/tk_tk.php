<?php
	include("../include/dbconn.php");
?>
<script language="javascript">
	function chktentk()
	{
		if (ctentk.checked)
		{
			document.getElementById("tentk").disabled=false;
			document.getElementById("tentk").value="";	
		}
		else
		{
			document.getElementById("tentk").disabled=true;
			document.getElementById("tentk").value="";		
		}
	}
	function chktennd()
	{
		if (ctennd.checked)
		{
			document.getElementById("tennd").disabled=false;
			document.getElementById("tennd").value="";	
		}
		else
		{
			document.getElementById("tennd").disabled=true;
			document.getElementById("tennd").value="";		
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
<fieldset>
	<legend>Tìm kiếm nhà cung cấp</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        	<tr>
            	<td width="200" height="50"> </td>
                <td width="130" align="center" colspan="3"><font color="#0000ff" size="4" face="Tahoma"><strong>CHỌN KIỂU TÌM KIẾM</strong></font></td>
                <td width="200"> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td width="50" align="center" valign="middle"><input name="ctentk" type="checkbox" id="ctentk" value="tentk" onclick="chktentk()" />
              <label for="ctentk"></label></td>
              <td align="center" valign="middle" ><font face="tahoma" size="2">Tên tài khoản</font></td>
                <td valign="middle"><div class="thefield"> <input name="tentk" type="text" id="tentk" size="30" disabled="disabled"></div> </td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
              <td width="50" align="center" valign="middle"><input name="ctennd" type="checkbox" id="ctennd" value="tennd" onclick="chktennd()" />
              <label for="ctentk"></label></td>
              <td align="center" valign="middle" ><font face="tahoma" size="2">Tên người dùng</font></td>
                <td valign="middle"><div class="thefield"> <input name="tennd" type="text" id="tennd" size="30" disabled="disabled"></div> </td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="cdiachi" type="checkbox" id="cdiachi" value="dc" onclick="chkdc()" />
                <label for="cdienthoai"></label></td>
                <td align="center" valign="middle" ><font face="tahoma" size="2">Địa chỉ</font></td>
                <td valign="middle"><div class="thefield"> <input name="dc" type="text" id="dc" size="30" disabled="disabled"></div></td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="cdienthoai" type="checkbox" id="cdienthoai" value="dt" onclick="chkdt()" />
              <label for="cdienthoai"></label></td>
              <td align="center" valign="middle" ><font face="tahoma" size="2">Số điện thoại</font></td>
                <td valign="middle"> <div class="thefield"><input name="dt" type="text" id="dt" size="30" disabled="disabled"></div></td>
                
              <td> </td>
            </tr>
            <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="cemail" type="checkbox" id="cemail" value="mail" onclick="chkmail()" />
              <label for="cdienthoai"></label></td>
                <td align="center" valign="middle" ><font face="tahoma" size="2">Email</font></td>
                <td valign="middle"><div class="thefield"> <input name="email" type="text" id="email" size="30" disabled="disabled"></div></td>
                
              <td> </td>
            </tr>
             <tr>
            	<td height="30"> </td>
                <td align="center" valign="middle"><input name="ckhoa" type="checkbox" id="ckhoa" value="khoa" /></td>
                <td align="center" valign="middle" ><font face="tahoma" size="2">Khóa</font></td>
                <td valign="middle">&nbsp;</td>
                
              <td> </td>
            </tr>
            
            <tr>
            	<td height="50"> </td>
                <td colspan="3" align="center"><input class="newbt-cn" type="submit" name="tk" id="tk" value="Tìm kiếm" onClick="return check();">&nbsp;&nbsp;
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
			unset($_SESSION["tk-tk"]);
		}
					if (isset($_POST["tk"]))
					{
						$arr=array();
						if(isset($_POST["ctentk"]))
							array_push($arr,"tendangnhap like '%".$_POST["tentk"]."%'");
						if(isset($_POST["ctennd"]))
							array_push($arr,"hoten like '%".$_POST["tennd"]."%'");
						if(isset($_POST["cdiachi"]))
							array_push($arr,"diachi like '%".$_POST["dc"]."%'");
						if(isset($_POST["cdienthoai"]))
							array_push($arr,"sdt like '%".$_POST["dt"]."%'");
						if(isset($_POST["cemail"]))
							array_push($arr,"email like '%".$_POST["email"]."%'");
						if(isset($_POST["ckhoa"]))
							array_push($arr,"trangthai=2");
						else
							array_push($arr,"trangthai=1");
						
						$str=implode(" and ",$arr);
						$_SESSION["tk-tk"]="select * from taikhoan where $str";
					}
					
				?>
                  <?php
				if (isset($_SESSION["tk-tk"]))
				{
					?>
<div style="height:10px"></div>
    <table width="650" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse;">  
    <tr>
      	<td colspan="6" align="center" valign="middle"><font color="#FF0000" size="4" face="Tahoma"><strong>KẾT QUẢ TÌM KIẾM</strong></font></td>
      </tr>
      <tr>
      	<td colspan="6" align="center" valign="middle" height="10"></td>
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
		$sql=$_SESSION["tk-tk"];
		$chay=mysql_query($sql) or die ("loi".mysql_error());
		$t_sodong = mysql_num_rows($chay);
		$sotrang = $t_sodong/15;
		$dong=$trang*15;
		if ($t_sodong==0)
		{
		?>
        <td colspan="7" width="40" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#FF0000" size="2" face="Tahoma"><strong>Không có tài khoản nào</strong></font></td>
	  <?php }
	  	else
		{
			?>
             <tr>
      	
        <td width="50" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="200" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản</strong></font></td>
        <td width="100" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Cấp độ</strong></font></td>
        <td width="75" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Ngày tạo</strong></font></td>
        <td width="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Khóa</strong></font></td>
        <td width="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Sửa</strong></font></td>
        
      </tr>
      <?php
			$i=$trang*15;
			$sql1=mysql_query($sql." limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$id=$ketqua[0];
				$taikhoan=$ketqua[2];
				$capdo=$ketqua[1];
				$khoa=$ketqua[9];
				$ngay=$ketqua[10];
				$i=$i+1;
				$result=mysql_query("select tencapdo from capdo where macapdo=$capdo");
				while ($kq=mysql_fetch_array($result))
				{
					$tencapdo=$kq[0];
				}
		?>
     
      
       <tr>
        <td width="50" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td width="200" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $taikhoan;?></font></td>
        <td width="100" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $tencapdo;?></font></td>
        <td width="40" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ngay;?></font></td>
        <td width="50" align="center" valign="middle"  style="border:solid 1px #33CC00"><input type="checkbox" name="noibat"<?php if ($khoa==1) echo "checked"; ?> disabled="disabled" /></td>
        <td width="40" align="center" valign="middle"  style="border:solid 1px #33CC00"><a href="index.php?page=sua_tk&id=<?php echo $id; ?>"><img src="img/icon-edit.jpg"></a></td>
        
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=tk_tk&trang={$trang}'>{$s_trang}</a>&nbsp;";
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
