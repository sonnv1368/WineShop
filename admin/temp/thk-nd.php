<?php
	include("../include/dbconn.php");
?>
<!-- code de-->

<script language="javascript">
	function chon()
	{
		var luachon=document.getElementById("luachon");
		var den=document.getElementById("den");
		document.getElementById("ngay").disabled=true;
		document.getElementById("thang").disabled=true;
		document.getElementById("nam").disabled=true;
		
		document.getElementById("ngay1").disabled=true;
		document.getElementById("thang1").disabled=true;
		document.getElementById("nam1").disabled=true;
		
		
		
		for(var i=0;i<luachon.options.length;i++){
				if(luachon.options[0].selected){
					document.getElementById("ngay").disabled=false;
					document.getElementById("thang").disabled=false;
					document.getElementById("nam").disabled=false;
						if(den.checked==true)
						{
							document.getElementById("ngay1").disabled=false;
							document.getElementById("thang1").disabled=false;
							document.getElementById("nam1").disabled=false;
						}
						else
						{
							document.getElementById("ngay1").disabled=true;
							document.getElementById("thang1").disabled=true;
							document.getElementById("nam1").disabled=true;
						}
						
						
					}
				if(luachon.options[1].selected){
						document.getElementById("thang").disabled=false;
						document.getElementById("nam").disabled=false;
								if(den.checked==true)
						{
						
							document.getElementById("thang1").disabled=false;
							document.getElementById("nam1").disabled=false;
						}
						else
						{
							
							document.getElementById("thang1").disabled=true;
							document.getElementById("nam1").disabled=true;
						}
							
					}	
				if(luachon.options[2].selected){
					document.getElementById("nam").disabled=false;
							if(den.checked==true)
						{
							
							document.getElementById("nam1").disabled=false;
						}
						else
						{
							document.getElementById("nam1").disabled=true;
						}
					}	
			}
		}
	function go(){
		var den=document.getElementById("den");
		var luachon=document.getElementById("luachon");
		if(den.checked)
		{
			if(luachon.options[0].selected){
							document.getElementById("ngay1").disabled=false;
							document.getElementById("thang1").disabled=false;
							document.getElementById("nam1").disabled=false;
					}
					
			if(luachon.options[1].selected){
							document.getElementById("thang1").disabled=false;
							document.getElementById("nam1").disabled=false;
					}	
			if(luachon.options[2].selected){
							document.getElementById("nam1").disabled=false;
					}		
		}
		else
		{
				document.getElementById("ngay1").disabled=true;
				document.getElementById("thang1").disabled=true;
				document.getElementById("nam1").disabled=true;
				
		}
		}	

</script>
<fieldset>
	<legend>Thống kê doanh thu</legend>
    <form action="" method="post" name="form1">
    	<table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
        
        	<tr>
            	<td colspan="4" height="60" align="center"><font color="#0000ff" size="4" face="Tahoma"><strong>Thống kê người dùng</strong></font></td>
            </tr>
        	<tr>
           	  <td width="150" height="30">&nbsp;</td>
              <td width="100" align="right">Theo&nbsp;</td>
                <td width="300">
                  <select name="luachon" id="luachon" onclick="chon()">
                    <option value="ngay" >Ngày</option>
                    <option value="thang">Tháng</option>
                    <option value="nam">Năm</option>
                </select></td>
              <td width="150">&nbsp;</td>
              
            
          </tr>
          <tr>
           	  <td width="150" height="30">&nbsp;</td>
              <td width="100">&nbsp;</td>
                <td width="300">Ngày 
                  <select name="ngay" id="ngay" >
                  <script language="javascript">
				  	for(var i=1;i<=31;i++)
					{
						document.write("<option value='"+i+"'>"+i+"</option>");
					}
				  </script>
                  	
                </select>
                  &nbsp;&nbsp;&nbsp;Tháng 
                  <select name="thang" id="thang" >
                  <script language="javascript">
				  	for(var i=1;i<=12;i++)
					{
						document.write("<option value='"+i+"'>"+i+"</option>");
					}
					</script>
                  </select>&nbsp;&nbsp;&nbsp;Năm
                  <select name="nam" id="nam" >
                  <script language="javascript">
				  	var d=new Date();
					var year= d.getFullYear();
				  	for(var i=year;i>=1990;i--)
					{
						document.write("<option value='"+i+"'>"+i+"</option>");
					}
					</script>
                  </select></td>
              <td width="150">&nbsp;</td>
              
            
          </tr>
           <tr>
           	  <td width="150" height="30">&nbsp;</td>
              <td width="100" align="right">Đến
                <input type="checkbox" name="den" id="den" onclick="go()" />&nbsp;</td>
                <td width="300">Ngày 
                  <select name="ngay1" id="ngay1" disabled="disabled">
                  <script language="javascript">
				  	for(var i=1;i<=31;i++)
					{
						document.write("<option value='"+i+"'>"+i+"</option>");
					}
				  
				  </script>
                </select>
                  &nbsp;&nbsp;&nbsp;Tháng 
                  <select name="thang1" id="thang1" disabled="disabled" >
                  <script language="javascript">
				  	for(var i=1;i<=12;i++)
					{
						document.write("<option value='"+i+"'>"+i+"</option>");
					}
					</script>
                  </select>&nbsp;&nbsp;&nbsp;Năm
                  <select name="nam1" id="nam1" disabled="disabled" >
                   <script language="javascript">
				  	var d=new Date();
					var year= d.getFullYear();
				  	for(var i=year;i>=1990;i--)
					{
						document.write("<option value='"+i+"'>"+i+"</option>");
					}
					</script>
                  </select></td>
              <td width="150">&nbsp;</td>
              
            
          </tr>
          <tr>
          		<td></td>
            	<td colspan="2" height="60" align="center"><input type="submit" name="tk" id="tk" value="Thống kê" /></td>
                <td></td>
          </tr>
          
            
            
                	</table>
    </form>
    <?php
		if(isset($_GET["trang"])==null)
		{
			unset($_SESSION["thk-nd"]);
		}
					if (isset($_POST["tk"]))
					{
						if (isset($_POST["den"])==false)
						{
							
							if($_POST["luachon"]=="ngay")
							{
								$ngay=$_POST["ngay"];
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$sql="day(ngaytao)='$ngay' and month(ngaytao)='$thang' and year(ngaytao)='$nam'";
								
							}
							if($_POST["luachon"]=="thang")
							{
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$sql="month(ngaytao)='$thang' and year(ngaytao)='$nam'";
							}
							if($_POST["luachon"]=="nam")
							{
								$nam=$_POST["nam"];
								$sql="year(ngaytao)='$nam'";
							}
						}
						else
						{
							if($_POST["luachon"]=="ngay")
							{
								
								$ngay=$_POST["ngay"];
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$ngay1=$_POST["ngay1"];
								$thang1=$_POST["thang1"];
								$nam1=$_POST["nam1"];
								$sql="ngaytao between '$nam-$thang-$ngay' and '$nam1-$thang1-$ngay1'";
							}
							if($_POST["luachon"]=="thang")
							{
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$thang1=$_POST["thang1"];
								$nam1=$_POST["nam1"];
								$sql="ngaytao between '$nam-$thang-1' and '$nam1-$thang1-31'";
								
							}
							if($_POST["luachon"]=="nam")
							{
								$nam=$_POST["nam"];
								$nam1=$_POST["nam1"];
								$sql="ngaytao between '$nam-1-1' and '$nam1-12-31'";
							}
							
						}		
						$_SESSION["thk-nd"]="SELECT tendangnhap,ngaytao,count(*) FROM `taikhoan`,dondathang WHERE  dondathang.matk=taikhoan.matk and ".$sql." group by taikhoan.matk";
					}
					?>
	 <?php
				if (isset($_SESSION["thk-nd"]))
				{
					?>
<div style="height:10px"></div>
    <table width="750" border="0" cellspacing="0" cellpadding="0" align="center"  style="border-collapse:collapse;">
      <tr>
      	<td colspan="7" align="center" valign="middle" ><font color="#FF0000" size="4" face="Tahoma"><strong>KẾT QUẢ THỐNG KÊ</strong></font></td>
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
		$sql=$_SESSION["thk-nd"];
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
      	<td colspan="7" align="center" valign="middle" height="10"></td>
      </tr>
       <tr>
        <td width="50" height="40" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>STT</strong></font></td>
        <td width="150" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Tên tài khoản</strong></font></td>
        <td width="175" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Ngày tạo</strong></font></td>
        <td width="175" align="center" valign="middle" bgcolor="#33CC00" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><strong>Số lượng đơn hàng</strong></font></td>
      </tr>
      <?php
			$i=$trang*15;
			$sql1=mysql_query($sql." limit $dong,15");
			while ($ketqua=mysql_fetch_array($sql1))
			{
				$ten=$ketqua[0];
				$ngay=$ketqua[1];
				$soluong=$ketqua[2];
				$i=$i+1;
		?>
      
      
       <tr>
        <td align="center" valign="middle" style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $i;?></font></td>
        <td align="center" valign="middle"  style="border:solid 1px #33CC00""><font color="#222222" size="2" face="Tahoma"><?php echo $ten;?></font></td>
        <td width="100" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $ngay;?></font></td>
        <td width="100" align="center" valign="middle"  style="border:solid 1px #33CC00"><font color="#222222" size="2" face="Tahoma"><?php echo $soluong;?></font></td>
        
       </tr>
       <?php }
	   	if($t_sodong>15){
	   ?>
	 <tr><td>
     <?php
	   for ( $trang = 0; $trang < $sotrang; $trang ++ )
	{
		$s_trang=$trang+1;
	echo "<a href='index.php?page=thk-nd&trang={$trang}'>{$s_trang}</a>&nbsp;";
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