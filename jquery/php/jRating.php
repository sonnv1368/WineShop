<?php
session_start();
$aResponse['error'] = false;
$aResponse['message'] = '';

// ONLY FOR THE DEMO, YOU CAN REMOVE THIS VAR
	$aResponse['server'] = ''; 
// END ONLY FOR DEMO

include('../../include/dbconn.php');
	
if(isset($_POST['action']))
{
	if(htmlentities($_POST['action'], ENT_QUOTES, 'UTF-8') == 'rating')
	{
		/*
		* vars
		*/
		$id = intval($_POST['idBox']);
		$rate = floatval($_POST['rate']);
		
		// YOUR MYSQL REQUEST HERE or other thing :)
		/*
		*
		*/
		
		// if request successful
		$success = true;
		// else $success = false;
		
		if($_SESSION['rated']==$id){
            $aResponse['error'] = true;
    		$aResponse['message'] = 'Da binh chon';
    		
    		// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
    			$aResponse['server'] = 'da binh chon';
    		// END ONLY FOR DEMO
    			
    		
    		echo json_encode($aResponse);
		}else{
		// json datas send to the js file
    		if($success)
    		{
    			$aResponse['message'] = 'Your rate has been successfuly recorded. Thanks for your rate :)';
    			
    			// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
    				$aResponse['server'] = '<strong>Success answer :</strong> Success : Your rate has been recorded. Thanks for your rate :)<br />';
    				$aResponse['server'] .= '<strong>Rate received :</strong> '.$rate.'<br />';
    				$aResponse['server'] .= '<strong>ID to update :</strong> '.$id;
    			// END ONLY FOR DEMO
                
                //P ACTION
                    $query = "UPDATE danhgia SET diem = diem+$rate, dem=dem+1 WHERE id=".$id."";
                    $result = mysql_query($query);
                    $sql = "SELECT diem,dem FROM danhgia WHERE id=$id";
                    $rate = mysql_fetch_assoc(mysql_query($sql));
                    $aResponse['server'] .= "<br />Diem so".floor($rate['diem']/$rate['dem']);
                    $result_data = floor($rate['diem']/$rate['dem']);
                    $_SESSION['rated'] = $id;
                    $aResponse['server'] .= $_SESSION['rated'];
                //END PHONG ACTION
                
    			
    			echo json_encode($aResponse);
    		}else{
    			$aResponse['error'] = true;
    			$aResponse['message'] = 'An error occured during the request. Please retry';
    			
    			// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
    				$aResponse['server'] = '<strong>ERROR :</strong> Your error if the request crash !';
    			// END ONLY FOR DEMO
    			
    			
    			echo json_encode($aResponse);
    		}
      }
	}
	else
	{
		$aResponse['error'] = true;
		$aResponse['message'] = '"action" post data not equal to \'rating\'';
		
		// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
			$aResponse['server'] = '<strong>ERROR :</strong> "action" post data not equal to \'rating\'';
		// END ONLY FOR DEMO
			
		
		echo json_encode($aResponse);
	}
}
else
{
	$aResponse['error'] = true;
	$aResponse['message'] = '$_POST[\'action\'] not found';
	
	// ONLY FOR THE DEMO, YOU CAN REMOVE THE CODE UNDER
		$aResponse['server'] = '<strong>ERROR :</strong> $_POST[\'action\'] not found';
		echo "<script>alert('Bạn chưa đăng nhập');</script>";
	// END ONLY FOR DEMO
	
	
	echo json_encode($aResponse);
}