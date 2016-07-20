<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Pluggin jRating : Ajax rating system with jQuery</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="jquery/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery/jRating.jquery.css" media="screen" />
<!-- jQuery files -->
<script type="text/javascript" src="jquery/jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery/jRating.jquery.js"></script>
<link rel="stylesheet" href="style.css" type="text/css" />
	<style type="text/css">
		body {margin:15px;font-family:Arial;font-size:13px}
		a img{border:0}
		.datasSent, .serverResponse{margin-top:20px;width:470px;height:73px;border:1px solid #F0F0F0;background-color:#F8F8F8;padding:10px;float:left;margin-right:10px}
		.datasSent{width:200px;position:fixed;left:680px;top:0}
		.serverResponse{position:fixed;left:680px;top:100px}
		.datasSent p, .serverResponse p {font-style:italic;font-size:12px}
		.exemple{margin-top:15px;}
		.clr{clear:both}
		pre {margin:0;padding:0}
		.notice {background-color:#F4F4F4;color:#666;border:1px solid #CECECE;padding:10px;font-weight:bold;width:600px;font-size:12px;margin-top:10px}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.basic').jRating({
                step:false, // no half-star when mousemove
	            length : 5, // nb of stars
                decimalLength:0, // number of decimal in the rate  
                /*/
                onError : function(){
            	    alert('Error : Khong the binh chon nhieu lan');
          	     }
                   */ 
            });
            
        });
	</script>
</head>
<body>
<div class="exemple">
	<em>Exemple 1 (<strong>Basic exemple without options</strong>) :</em>
	<div class="basic" data-average="12" data-id="1"></div>
</div>
<div class="datasSent">
	Datas sent to the server :
	<p></p>
</div>
<div class="serverResponse">
	Server response :
	<p></p>
</div>
</body>
</html>