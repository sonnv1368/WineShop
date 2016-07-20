<?php 
if (isset($_GET["page"])==false)
{
	include("temp/main.php");
}
else
{
	$page=$_GET["page"];
	switch ($page)
	{
		case "search-p":
			include("temp/search-p.php");
			break;
		case "search-g":
			include("temp/search-g.php");
			break;
		case "ct-sp":
			include("temp/ct-sp.php");
			break;
		case "register":
			include("register.php");
			break;
		case "login":
			include("login.php");
			break;
		case "sp":
			include("temp/sp.php");
			break;
		case "addcart":
			include("temp/addcart.php");
			break;
		case "showcart":
			include("temp/showcart.php");
			break;
		case "delcart":
			include("temp/delcart.php");
			break;
		case "personal-details":
			include("temp/personal-details.php");
			break;
		case "change-pass":
			include("temp/change-pass.php");
			break;
		case "ttdh":
			include("temp/ttdh.php");
			break;
		case "lh":
			include("temp/lienhe.php");
			break;
		case "hd":
			include("temp/hoidap.php");
			break;
	}
}



?>