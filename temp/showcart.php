<?php
	if (isset($_SESSION['giohang'])==true)
	{
         $giohang = $_SESSION['giohang'];

        // Nếu người dùng cập nhật lại giỏ hàng (ấn nút cập nhật)
        if(isset($_POST['capnhat']) && count($giohang) != "")
        {
                $soluong_cn = $_POST['soluong'];
        
                foreach($soluong_cn as $id => $sl)
                {
                        
                        // Nếu như người dùng đặt lại số lượng  = 0  ==> thì ta hủy luôn sản phẩm đó ($id_sp) trong giỏ hàng ($_SESSION['giohang']) 
                        if($sl == 0)
                        {
                                unset($_SESSION['giohang'][$id]);
                        }
                        // Nguoc lại số lượng sp phải là số ta cập nhật lại số lượng giỏ hàng
                        
                        else if($sl > 0 && is_numeric($sl))
                        {
                                $_SESSION['giohang'][$id] = $sl;
                        }
                        // Nguoc lai co the xuat thong bao so luong khong hop le (so luong = char)
                        // refresh lại giỏ hàng
                        header("location: ".$_SERVER['REQUEST_URI']."");
                }
        }

        // nếu giỏ hàng có sản phẩm
        if(count($giohang))
        {
?>
<form action="" method="post">
   <table width="700" border="0" cellpadding="1" cellspacing="0" style="border : solid 1px #e0c5b4;border-radius:5px;">
  <!--DWLayoutTable-->
  	<tr> 
    	<td height="37" colspan="5" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px;border-radius:5px;"><font color="#423127"><strong><font size="3" face="tahoma">GIỎ HÀNG</font></strong></font></td>
  	</tr>
  	<tr> 
    	<td height="40" colspan="5" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  	</tr>
    <tr>
    	<td colspan="5"><table width="680" border="1" cellpadding="0" cellspacing="0" bordercolor="#66CC00" rules="rows" align="center">
        	<tr bgcolor="#33CC00">
    			<td width="12"></td>
                <td height="30" align="center"><font size="2"  color="#000080"><strong>SẢN PHẨM</strong></font></td>
                <td></td>
                <td width="12"></td>
                <td width="68" align="center"><font size="2" color="#000080"><strong>SỐ LƯỢNG</strong></font></td>        	
                <td width="13"></td>				
                <td align="center"  colspan="2"><font size="2"  color="#000080"><strong>THÀNH TIỀN</strong></font></td>       
                <td width="27"></td>  
                <td width="50" align="center"></td>                      
                <td width="17"></td>              
            </tr>
        
     
<?php
                // Duyệt hết giỏ hàng
                $tongcong =0;
                foreach($giohang as $id => $sl)
                {
                        // truy van lay thong tin san pham
                        $truyvan_gh = mysql_query("SELECT * FROM sanpham WHERE masp=$id");
                        $r = mysql_fetch_row($truyvan_gh);
						
						$t=$r[5];
						
?>

	<tr>
    	<td width="12"></td>
        <td align="center" valign="middle" width="214" height="180"> <img src="<?php echo $r[6];?>" width="150" height="150"> </td>
        <td align="center" valign="middle" width="119"> <div><font color="#FF0000" size="3" face="arial"><strong> 
        <?php echo $r[3];?>
        </strong></font></div>
      <div style="padding : 5px 5px 5px 0px;"><font face="arial" size="2">Giá: <?php echo number_format($r[5],0,',','.');?> VNĐ </font></div>
        </div></td>

        <td width="12"></td>
        <td width="68" align="center"><input name="soluong[<?php echo $id; ?>]" type="text" value="<?php echo $sl; ?>" size="4" maxlength="3" /></td>        					
        <td width="13"></td>
        <td width="85" align="right"><?php 
			
		echo number_format($sl*$t,0,',','.'); ?></td>     
        <td width="39">&nbsp;VNĐ</td>   
        <td width="27"></td> 
        <td width="50" align="center"><a href="index.php?page=delcart&id=<?php echo $r[0]; ?>"><div class="icon-del"></div></a></td>        
        <td width="17"></td>              
    </tr>
                        
                      
               
                       
                              

<?php
                        // Tổng tiền
                        $tongcong += $sl*$t;
                }
?>
              
         </table>
        </td>
      </tr>
      <tr>
      	<td height="10"></td>
      </tr>
      <tr>
      	<td width="80"></td>
        <td width="100"><input type="submit" name="xoatc" value="XÓA TẤT CẢ" class="newbt-cn" /></td>
        <td width="10"></td>
        <td width="100"><input type="submit" name="capnhat" value="CẬP NHẬT" class="newbt-cn" /></td>
        <td align="right" width="300"><strong>Tổng cộng: </strong><?php echo number_format($tongcong,0,',','.'); ?> VNĐ&nbsp;&nbsp;</strong></td>
      </tr>
      <tr>
      	<td height="10"></td>
      </tr>
      <tr>
      	
        <td colspan="5" align="right"><font size="2px" face="tahoma">Hình thức thanh toán</font>
       
        <select name="httt" id="httt" style="margin-left:5px; margin-right:10px;">
         <?php
				$sql="select * from hinhthucthanhtoan";
				$chay=mysql_query($sql);
				if (mysql_num_rows($chay))
				{
					while ($ketqua=mysql_fetch_array($chay))
					{
						$mahttt=$ketqua[0];
						$tenhttt=$ketqua[1];
			?>
            	<option value="<?php echo $mahttt;?>" ><?php echo $tenhttt;?></option>
            <?php
						
					}
					
					
				}
			?>
            </select></td>
        
      
      </tr>
      <tr>
        	<td height="20"></td>
            </tr>
     <tr>
           		
       <td> <input type="submit" name="muathem" value="MUA THÊM" class="newbt-tt" style="margin-left:7px;" /></td>
       <td align="right"></td>
                <td></td>
                <td></td>
                <td align="right">
                  <input type="submit" name="thanhtoan" value="THANH TOÁN" class="newbt-tt" style=" margin-right:10px;" /></td>
	        

      
            </tr>
        <tr>
        	<td height="10"></td>
            </tr>
        </table>
        </form>
<?php
        }
        else
        {
?>
<form action="" method="post">
        <table width="700" border="0" cellpadding="1" cellspacing="0" style="border : solid 1px #e0c5b4;">
  <!--DWLayoutTable-->
  	<tr> 
    	<td height="37" colspan="3" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px"><font color="#423127"><strong><font size="3" face="tahoma">Giỏ hàng</font></strong></font></td>
  	</tr>
    <tr>
    	<td height="50"></td>
    </tr>
    <?php
	if (isset($_GET["sc"])==1)
	{
		?>
		<tr>
    	<td align="center">Cảm ơn bạn đã đặt hàng tại website của chúng tôi! </td>
        <td align="center"><input type="submit" name="muathem" value="MUA THÊM" class="newbt-mt" /></td>
    </tr>
	<?php } else {
	?>
    <tr>
    	<td align="center">Bạn chưa có sản phẩm nào. Hãy quay về <a href="index.php">trang chủ</a> và mua sản phẩm!</td>
    </tr>
    <?php } ?>
    <tr>
    	<td height="50"></td>
    </tr>
    </table>
       </form>
<?php
         }
	} else
	{
?>  
		 <table width="700" border="0" cellpadding="1" cellspacing="0" style="border : solid 1px #e0c5b4;">
  <!--DWLayoutTable-->
  	<tr> 
    	<td height="37" colspan="3" valign="middle" style="border-bottom : solid 1px #e0c5b4;background : #f9f4ee;padding-left: 10px"><font color="#423127"><strong><font size="3" face="tahoma">Giỏ hàng</font></strong></font></td>
  	</tr>
    <tr>
    	<td height="50"></td>
    </tr>
    </tr>
    <tr>
    	<td align="center">Bạn chưa có sản phẩm nào. Hãy quay về <a href="index.php">trang chủ</a> và mua sản phẩm!</td>
    </tr>
    <tr>
    	<td height="50"></td>
    </tr>
    </table>
    <div style="height: 10px;"></div>

<?php
         }
?>
    <div style="height: 10px;"></div>

<?php
	if (isset($_POST["thanhtoan"]))
	{
		foreach($giohang as $id => $sl)
                {
						// truy van lay thong tin san pham
						$kt=1;
                        $sql1 = mysql_query("SELECT * FROM sanpham WHERE masp=$id and trangthai=1");
		                while($chay1=mysql_fetch_array($sql1))
						{
							if($chay1[7]<$sl)
							{
								$kt=0;
								echo "<script>alert('Xin lỗi! Sản phẩm ".$chay1[3]." đã hết hàng');</script>";
							}
						}
				}
		if ($kt==1)
		{
		$idkh=$_SESSION["userid"];
		$idhttt=$_POST["httt"];
		$sql=mysql_query("insert into dondathang(matk,mahttt,trangthai,ngaydat) value ($idkh,$idhttt,2,curdate())");
		$iddonhang=mysql_insert_id();
			foreach($giohang as $id => $sl)
                {
						// truy van lay thong tin san pham
						
                        $truyvan_gh = mysql_query("SELECT * FROM sanpham WHERE masp=$id and trangthai=1");
		                $r = mysql_fetch_row($truyvan_gh);
						$sql="insert into chitietddh(maddh,masp,soluong,dongia) value($iddonhang,$id,'$sl','$r[5]')";
						mysql_query($sql);
						//$sql1="update sanpham set soluong=soluong-$sl where masp=$id";
//						mysql_query($sql1);
						foreach($_SESSION['giohang'] as $id => $sl)
						{
								unset($_SESSION['giohang'][$id]);        
						}
						header('location:index.php?page=showcart&sc=1');
				}
		}
	}
	if (isset($_POST["xoatc"]))
	{
		header('location:index.php?page=delcart&del_all=true');
	}
	if (isset($_POST["muathem"]))
	{
		header('location:index.php');
	}

	
?>
