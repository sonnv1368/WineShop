<?php
if (isset($_GET["page"])==false)
	$_GET["page"]="qlsp";
if (isset($_GET["page"]))
{
	$page=$_GET["page"];
	if ($page=="qlsp" || $page=="them_lsp" || $page=="tk_lsp" || $page=="them_sp" || $page=="ht_lsp" || $page=="sua_lsp" || $page=="tk_sp" || $page=="search-p" || $page=="sua_sp" || $page=="them_msp" || $page=="tk_msp"|| $page=="ht_msp" || $page=="sua_msp" || $page=="qlncc" || $page=="them_ncc" || $page=="tk_ncc" || $page=="sua_ncc")
	{
?>
<table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099CC">
	<tr>
    	<td width="15" height="40"> </td>
        <td width="170" valign="top">
        	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý nhà cung cấp</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qlncc" class="menu">Danh sách nhà cung cấp</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=them_ncc" class="menu">Thêm nhà cung cấp</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=tk_ncc" class="menu">Tìm kiếm nhà cung cấp</a></td>
                </tr>
            <tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý mục sản phẩm</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=ht_msp" class="menu">Danh sách mục sản phẩm</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=them_msp" class="menu">Thêm mục sản phẩm</a></td>
                </tr>
               <!-- <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=tk_msp" class="menu">Tìm kiếm mục sản phẩm</a></td>
                </tr>-->
            	<tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý loại sản phẩm</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=ht_lsp" class="menu">Danh sách loại sản phẩm</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=them_lsp" class="menu">Thêm loại sản phẩm</a></td>
                </tr>
                <!--<tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=tk_lsp" class="menu">Tìm kiếm loại sản phẩm</a></td>
                </tr>-->
                <tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý sản phẩm</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qlsp" class="menu">Danh sách sản phẩm</a></td>
                </tr>

                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=them_sp" class="menu">Thêm sản phẩm</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=tk_sp" class="menu">Tìm kiếm sản phẩm</a></td>
                </tr>
            </table>
         <td width="15" height="40">&nbsp;</td>
	<tr>
    	<td width="15" height="40">&nbsp;</td>
    </tr>
</table>
	<?php } ?>
    

   
    
<?php
	if ($page=="qltk" || $page=="them_tk" || $page=="sx_tk" || $page=="sua_tk" || $page=="search-a" || $page=="tk_tk")
	{
?>
<table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099CC">
	<tr>
    	<td width="15" height="40"> </td>
        <td width="170" valign="top">
        	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            	<tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý tài khoản</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qltk" class="menu">Danh sách tài khoản</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=them_tk" class="menu">Thêm tài khoản</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=tk_tk" class="menu">Tìm kiếm tài khoản</a></td>
                </tr>
            </table>
         <td width="15" height="40">&nbsp;</td>
	<tr>
    	<td width="15" height="40">&nbsp;</td>
    </tr>
</table>
	<?php } ?>
    <?php
	if ($page=="thk-sp" || $page=="thk-ncc" || $page=="thk-nd" || $page=="thk-dh" || $page=="thk-dt")
	{
?>
<table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099CC">
	<tr>
    	<td width="15" height="40"> </td>
        <td width="170" valign="top">
        	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            	
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=thk-sp" class="menu">Thống kế sản phẩm</a></td>
                </tr>
                <!--<tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=thk-ncc" class="menu">Thống kê nhà cung cấp</a></td>
                </tr>-->
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=thk-nd" class="menu">Thống kê người dùng</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=thk-dh" class="menu">Thống kê đơn hàng</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=thk-dt" class="menu">Thống kê doanh thu</a></td>
                </tr>
            </table>
         <td width="15" height="40">&nbsp;</td>
	<tr>
    	<td width="15" height="40">&nbsp;</td>
    </tr>
</table>
	<?php } ?>
	
    <?php
	if ($page=="qldh" || $page=="tt-dh" || $page=="search-d" || $page=="search-o" || $page=="tk_dh")
	{
?>
<table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099CC">
	<tr>
    	<td width="15" height="40"> </td>
        <td width="170" valign="top">
        	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            	<tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý đơn hàng</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qldh" class="menu">Danh sách đơn hàng</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qldh&tt=2" class="menu">Đơn hàng chưa xử lý</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qldh&tt=1" class="menu">Đơn hàng đã xử lý</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=tk_dh" class="menu">Tìm kiếm đơn hàng</a></td>
                </tr>
            </table>
         <td width="15" height="40">&nbsp;</td>
	<tr>
    	<td width="15" height="40">&nbsp;</td>
    </tr>
</table>
	<?php } ?>
     <?php
	if ($page=="qllh" || $page=="qlhd" || $page=="ct-qllh" || $page=="ct-qlhd" )
	{
?>
<table width="200" border="0" cellpadding="0" cellspacing="0" bgcolor="#0099CC">
	<tr>
    	<td width="15" height="40"> </td>
        <td width="170" valign="top">
        	<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            	<tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý liên hệ</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qllh" class="menu">Danh sách liên hệ</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qllh&tt=2" class="menu">Đơn hàng chưa xử lý</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qllh&tt=1" class="menu">Đơn hàng đã xử lý</a></td>
                </tr>
                <tr>
                	<td class="m_left"><font size="2" color="#FF3300" face="tahoma"><strong>Quản lý hỏi đáp</strong></font>
                    </td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qlhd" class="menu">Danh sách hỏi đáp</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qlhd&tt=2" class="menu">Chưa xử lý</a></td>
                </tr>
                <tr>
                	<td class="m_left"><img src="img/icon.jpg" /><a href="?page=qlhd&tt=1" class="menu">Đã xử lý</a></td>
                </tr>
               
            </table>
         <td width="15" height="40">&nbsp;</td>
	<tr>
    	<td width="15" height="40">&nbsp;</td>
    </tr>
</table>
	<?php } ?>

<?php } ?>

