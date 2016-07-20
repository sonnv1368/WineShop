<?php
	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="banruou";
	$conn=mysql_connect($db_host,$db_user,$db_pass) or die ("Khong ket noi duoc database");
	mysql_select_db($db_name,$conn);
//
//// This is just an example of reading server side data and sending it to the client.
//// It reads a json formatted text file and outputs it.
//$date_min=$_SESSION['date_min'];
//$time_min=strtotime($date_min);
//$date_max=$_SESSION['date_max'];
//$time_max=strtotime($date_max);
//$loai_thk=$_SESSION['loai_thk'];
//if($loai=2)
//{
//}
//echo 'sdf';
//$sql="select ifnull(sum(soluong*dongia),0) from chitietddh where maddh in (select maddh from dondathang where month(ngaydat)=month('2014-3-1'))";
//echo $_SESSION['date_min'];
$a=$_SESSION['date_min'];
echo '{
  "cols": [
        {"id":"","label":"Topping","pattern":"","type":"string"},
        {"id":"","label":"Slices","pattern":"","type":"number"},
		{"id":"","label":"Slỏd","pattern":"","type":"number"}
      ],
  "rows": [
        {"c":[{"v": "'.$a.'"}, {"v": 11},{"v": 11}]},
        {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Olives","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
        {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
      ]
}';
// Instead you can query your database and parse into JSON etc etc
// select maddh from dondathang where month(ngaydat)=month('2014-3-1')
?>
