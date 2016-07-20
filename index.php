<?php
	session_start();
	ob_start();
	if (isset($_SESSION["userid"])==false)
	{
		$_SESSION["userid"]=0;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bán rượu</title>
<script src="jquery/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery/jRating.jquery.css" media="screen" />
<link rel="stylesheet" type="text/css" href="jquery/jquery/jquery-ui.css"/>
<!-- jQuery files -->
<script type="text/javascript" src="jquery/jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery/jquery-ui.js"></script>
<script type="text/javascript" src="js/gen_validatorv4.js"></script>
<script type="text/javascript" src="jquery/jquery/jquery.cycle.all.js"></script>
<script type="text/javascript" src="jquery/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="jquery/jquery/jRating.jquery.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body style="background:url(img/background.jpg)"> 
<center>
	<table width="1000" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    	<tr>
        	<td colspan="5" height="300" valign="top"><?php include('temp/slide-show.php');?></td>
       	</tr>
        <tr>
        	<td colspan="5" height="55"><?php include("temp/menu.php");?></td>
        </tr>
         <tr> 
          <td width="17" height="16"></td>
          <td width="700"></td>
          <td width="18"></td>
          <td width="246"></td>
          <td width="19"></td>
        </tr>
        <tr> 
          <td height="27">&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="700" height="27" valign="top"> 
                  <?php include('main.php');?>
                </td>
              </tr>
            </table></td>
          <td>&nbsp;</td>
          <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <!--DWLayoutTable-->
              <tr> 
                <td width="246" height="27" valign="top"> 
                  <?php include('right.php');?>
                </td>
              </tr>
            </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
      <td height="35" colspan="5" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr> 
            <td width="1000" height="35" valign="top"><div id="cssfooter"> 
              <?php include("footer.php");?></div>
            </td>
          </tr>
        </table></td>
    </tr>
    </table>
    
</center>
<div id="div-toTop"><span id="img-back-top" alt="back to top"></span></div>

<script type='text/javascript'>$(function(){$(window).scroll(function(){if($(this).scrollTop()!=0){$('#div-toTop').fadeIn();}else{$('#div-toTop').fadeOut();}});$('#div-toTop').click(function(){$('body,html').animate({scrollTop:0},800);});});</script>
</body>
</html>