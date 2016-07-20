<?php
	session_start();
	ob_start();
?>
<?php
	if (isset($_SESSION["loginad"])==false || $_SESSION["loginad"]!=0)
		header('Location:login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="jquery/jquery/jRating.jquery.css" media="screen" />
<script type="text/javascript" src="jquery/jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery/jquery-ui.js"></script>
<script type="text/javascript" src="jquery/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery/jquery/jRating.jquery.js"></script>

<link href="style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="../js/jscripts/tiny_mce/tiny_mce_dev.js"></script>
<script type="text/javascript" src="../js/gen_validatorv4.js"></script>
<script language="javascript" type="text/javascript" src="../js/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>

<!-- jQuery files -->

<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        skin : "thebigreason",
        plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,autosave",
        file_browser_callback : "tinyBrowser",

        // Theme options
        theme_advanced_buttons1 : "formatselect,justifyleft,justifycenter,justifyright,justifyfull,|,bold,italic,underline,strikethrough,|,bullist,numlist,|,undo,redo,|,link,unlink,|,charmap,image,media,code,preview",
        theme_advanced_buttons2 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        fix_list_elements : true,

        // Replace values for the template plugin
        template_replace_values : {
            username : "Some User",
            staffid : "991234"
        }
    });
	
</script>

</head>
<body style="background:url(img/body.jpg)"> 	
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
    	<td align="right" style="padding-right:30px; padding-top:10px">Xin chào <?php echo ($_SESSION["userad"]);?>  <a href="logout.php" class="logout">Thoát</td>
    </tr>
</table>
<table width="1000" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
		<td><?php include_once("header.php");?></td>
	</tr>
    <tr>
    	<td bgcolor="#0099CC" width="1000" height="26"> </td>
    </tr>
</table>
<table width="1000" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
    	<td width="200" valign="top"><?php include_once("left.php");?></td>
        <td width="800" valign="top"><?php include_once("main.php");?></td>
   	</tr>
</table>
</body>
</html>