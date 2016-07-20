<?php
	include("../include/dbconn.php");
	include "libchart/classes/libchart.php";
?>


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
            	<td colspan="4" height="60" align="center"><font color="#0000ff" size="4" face="Tahoma"><strong>Thống kê doanh thu</strong></font></td>
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
					if (isset($_POST["tk"]))
					{
						if (isset($_POST["den"])==false)
						{
							
							if($_POST["luachon"]=="ngay")
							{
								$ngay=$_POST["ngay"];
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$sql="select maddh from dondathang where day(ngaydat)='$ngay' and month(ngaydat)='$thang' and year(ngaydat)='$nam' and trangthai=1";
								
							}
							if($_POST["luachon"]=="thang")
							{
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$sql="select maddh from dondathang where month(ngaydat)='$thang' and year(ngaydat)='$nam' and trangthai=1";
							}
							if($_POST["luachon"]=="nam")
							{
								$nam=$_POST["nam"];
								$sql="select maddh from dondathang where year(ngaydat)='$nam' and trangthai=1";
							}
						}
						else
						{
							echo "<div id='chart_div'></div>";
							if($_POST["luachon"]=="ngay")
							{
								$ngay=$_POST["ngay"];
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$ngay1=$_POST["ngay1"];
								$thang1=$_POST["thang1"];
								$nam1=$_POST["nam1"];
								$date_min="$nam-$thang-$ngay";
								$date_max="$nam1-$thang1-$ngay1";
								$sql="select maddh from dondathang where ngaydat between '$nam-$thang-$ngay' and '$nam1-$thang1-$ngay1' and trangthai=1";
									
								$sql2="select datediff('$nam1-$thang1-$ngay1','$nam-$thang-$ngay')";
								$chay2=mysql_query($sql2);
								$r2=mysql_fetch_row($chay2);
								$days=$r2[0];
								$date_min = date($date_min);
								$date_max = date($date_max);
								$chart = new VerticalBarChart();
									$serie1 = new XYDataSet();
									$serie2 = new XYDataSet();
								for($i=0;$i<=$days;$i++)
								{
									$col1=0;
									$sql3="select maddh from dondathang where ngaydat='$date_min' and trangthai=1";
									$chay3=mysql_query($sql3);
									$col2=mysql_num_rows($chay3);
									while($ketqua3=mysql_fetch_array($chay3))
									{
											$madh=$ketqua3[0];
											$sql4="select ifnull(sum(soluong*dongia),0) from chitietddh where maddh in (".$sql3.")";
											$chay4=mysql_query($sql4);
											$r4=mysql_fetch_row($chay4);
											$col1=$col1+$r4[0];
									}
									$timestamp1 = strtotime(date("Y-m-d", strtotime($date_min)) . " + 1 day");
									$date_min = date('Y-m-d', $timestamp1);
									
									$serie1->addPoint(new Point("$date_min", $col1));
									
									
									$serie2->addPoint(new Point("$date_min", $col2));
									
									
									
								}
									$dataSet = new XYSeriesDataSet();
									$dataSet->addSerie("Doanh thu", $serie1);
									$dataSet->addSerie("Hóa đơn", $serie2);
									$chart->setDataSet($dataSet);
									$chart->getPlot()->setGraphCaptionRatio(0.65);
									$chart->setTitle("THỐNG KÊ DOANH THU");
									$chart->render("demo7.png");
									
							}
							if($_POST["luachon"]=="thang")
							{
								$thang=$_POST["thang"];
								$nam=$_POST["nam"];
								$thang1=$_POST["thang1"];
								$nam1=$_POST["nam1"];
								$date_min="$nam-$thang-1";
								$date_max="$nam1-$thang1-31";
								$sql="select maddh from dondathang where ngaydat between '$nam-$thang-1' and '$nam1-$thang1-31' and trangthai=1";
									
								$sql2="SELECT ifnull(TIMESTAMPDIFF(MONTH, '$nam-$thang-1', '$nam1-$thang1-31'),1)";
								$chay2=mysql_query($sql2);
								$r2=mysql_fetch_row($chay2);
								$days=$r2[0];
								
								$date_min = date($date_min);
								$date_max = date($date_max);
								$chart = new VerticalBarChart();
									$serie1 = new XYDataSet();
									$serie2 = new XYDataSet();
								for($i=0;$i<=$days;$i++)
								{
									$col1=0;
									$sql3="select maddh from dondathang where month(ngaydat)=month('$date_min') and trangthai=1";
									
									$chay3=mysql_query($sql3);
									$col2=mysql_num_rows($chay3);
									while($ketqua3=mysql_fetch_array($chay3))
									{
											$madh=$ketqua3[0];
											$sql4="select ifnull(sum(soluong*dongia),0) from chitietddh where maddh in (".$madh.")";
											$chay4=mysql_query($sql4);
											$r4=mysql_fetch_row($chay4);
											$col1=$col1+$r4[0];
									}
									
									$serie1->addPoint(new Point("$date_min", $col1));
									$serie2->addPoint(new Point("$date_min", $col2));
									$timestamp1 = strtotime(date("Y-m-d", strtotime($date_min)) . " + 1 month");
									$date_min = date('Y-m-d', $timestamp1);
									
									
									
									
								}
									$dataSet = new XYSeriesDataSet();
									$dataSet->addSerie("Doanh thu", $serie1);
									$dataSet->addSerie("Hóa đơn", $serie2);
									$chart->setDataSet($dataSet);
									$chart->getPlot()->setGraphCaptionRatio(0.65);
									$chart->setTitle("THỐNG KÊ DOANH THU");
									$chart->render("demo7.png");
							}
							if($_POST["luachon"]=="nam")
							{
								$nam=$_POST["nam"];
								$nam1=$_POST["nam1"];
								$date_min="$nam-1-1";
								$date_max="$nam1-12-31";
								$sql="select maddh from dondathang where ngaydat between '$nam-1-1' and '$nam1-12-31' and trangthai=1";
								$sql2="SELECT TIMESTAMPDIFF(YEAR, '$nam-1-1', '$nam1-12-31')";
								$chay2=mysql_query($sql2);
								$r2=mysql_fetch_row($chay2);
								$days=$r2[0];
								$date_min = date($date_min);
								$date_max = date($date_max);
								$chart = new VerticalBarChart();
									$serie1 = new XYDataSet();
									$serie2 = new XYDataSet();
								for($i=0;$i<=$days;$i++)
								{
									$col1=0;
									$sql3="select maddh from dondathang where year(ngaydat)=year('$date_min') and trangthai=1";
									$chay3=mysql_query($sql3);
									$col2=mysql_num_rows($chay3);
									while($ketqua3=mysql_fetch_array($chay3))
									{
											$madh=$ketqua3[0];
											$sql4="select ifnull(sum(soluong*dongia),0) from chitietddh where maddh in (".$madh.")";
											
											$chay4=mysql_query($sql4);
											$r4=mysql_fetch_row($chay4);
											$col1=$col1+$r4[0];
									}
									$serie1->addPoint(new Point("$date_min", $col1));
									
									
									$serie2->addPoint(new Point("$date_min", $col2));
									$timestamp1 = strtotime(date("Y-m-d", strtotime($date_min)) . " + 1 year");
									$date_min = date('Y-m-d', $timestamp1);
									
									
									
									
									
								}
									$dataSet = new XYSeriesDataSet();
									$dataSet->addSerie("Doanh thu", $serie1);
									$dataSet->addSerie("Hóa đơn", $serie2);
									$chart->setDataSet($dataSet);
									$chart->getPlot()->setGraphCaptionRatio(0.65);
									$chart->setTitle("THỐNG KÊ DOANH THU");
									$chart->render("demo7.png");
							}
							
							?>
                            
							<div align="center"><img alt="Line chart" src="demo7.png" style="border: 1px solid gray;"/></div>
<?php
						}
						$chay=mysql_query($sql);
						$tong=mysql_num_rows($chay);
						$sql1="select ifnull(sum(soluong*dongia),0) from chitietddh where maddh in (".$sql.")";
						$chay1=mysql_query($sql1);
						$r=mysql_fetch_row($chay1);
						$doanhthu=$r[0];
							
							
						
						?>
       <table width="750" border="0" cellpadding="0" cellspacing="0" align="center">
       <tr>
          		<td width="150"></td>
            	<td>Tổng doanh thu: <?php echo number_format($doanhthu,0,',','.');?> VNĐ</td>
                <td>Tổng hóa đơn: <?php echo $tong;?></td>
                <td width="150"></td>
          </tr>
       </table>
       
       
       <?php
							
					
					}
					?>
</fieldset>

