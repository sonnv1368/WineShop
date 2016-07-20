<?php
	if (isset($_GET["page"])==false)
		include("temp/ht_sp.php");
	else
	{
		$page=$_GET["page"];
		switch ($page)
		{
			case "qlsp":
				include("temp/ht_sp.php");
				break;
			case "them_msp":
				include("temp/them_msp.php");
				break;
			case "tk_msp":
				include("temp/tk_msp.php");
				break;
			case "xoa_msp":
				include("temp/xoa_msp.php");
				break;
			case "sua_msp":
				include("temp/sua_msp.php");
				break;
			case "them_lsp":
				include("temp/them_lsp.php");
				break;
			case "sx_lsp":
				include("temp/sx_lsp.php");
				break;
			case "xoa_lsp":
				include("temp/xoa_lsp.php");
				break;
			case "sua_lsp":
				include("temp/sua_lsp.php");
				break;
			case "them_sp":
				include("temp/them_sp.php");
				break;
			case "ht_msp":
				include("temp/ht_msp.php");
				break;
			case "ht_lsp":
				include("temp/ht_lsp.php");
				break;
			case "sua_sp":
				include("temp/sua_sp.php");
				break;
			case "sx_sp":
				include("temp/sx_sp.php");
				break;
			case "tk_sp":
				include("temp/tk_sp.php");
				break;
			case "search-p":
				include("temp/search-p.php");
				break;
			case "qltk":
				include("temp/ht_tk.php");
				break;
			case "them_tk":
				include("temp/them_tk.php");
				break;
			case "sx_tk":
				include("temp/sx_tk.php");
				break;
			case "xoa_tk":
				include("temp/xoa_tk.php");
				break;
			case "xoa_sp":
				include("temp/xoa_sp.php");
				break;
			case "sua_tk":
				include("temp/sua_tk.php");
				break;
			case "tk_tk":
				include("temp/tk_tk.php");
				break;
			case "search-a":
				include("temp/search-a.php");
				break;
			case "qlbc":
				include("temp/qlbc.php");
				break;
			case "search-r":
				include("temp/search-r.php");
				break;
			case "qldh":
				include("temp/qldh.php");
				break;
			case "tt-dh":
				include("temp/tt-dh.php");
				break;
			case "tk_dh":
				include("temp/tk_dh.php");
				break;
			case "search-o":
				include("temp/search-o.php");
				break;
			case "search-d":
				include("temp/search-d.php");
				break;
			case "qlncc";
				include("temp/ht_ncc.php");
				break;
			case "them_ncc";
				include("temp/them_ncc.php");
				break;
			case "sua_ncc";
				include("temp/sua_ncc.php");
				break;
			case "xoa_ncc";
				include("temp/xoa_ncc.php");
				break;
			case "tk_ncc";
				include("temp/tk_ncc.php");
				break;
			case "qldn";
				include("temp/ht_dn.php");
				break;
			case "them_dn";
				include("temp/them_dn.php");
				break;
			case "sua_dn";
				include("temp/sua_dn.php");
				break;
			case "xoa_dn";
				include("temp/xoa_dn.php");
				break;
			case "search-sp1":
				include("temp/search-sp1.php");
				break;
			case "qllh":
				include("temp/qllh.php");
				break;
			case "qlhd":
				include("temp/qlhd.php");
				break;
			case "ct-qlhd":
				include("temp/ct-qlhd.php");
				break;
			case "ct-qllh":
				include("temp/ct-qllh.php");
				break;
			case "thk-sp":
				include("temp/thk-sp.php");
				break;
			case "thk-nd":
				include("temp/thk-nd.php");
				break;
			case "thk-ncc":
				include("temp/thk-ncc.php");
				break;
			case "thk-dh":
				include("temp/thk-dh.php");
				break;
			case "thk-dt":
				include("temp/thk-dt.php");
				break;
			
		}
		
	}
?>