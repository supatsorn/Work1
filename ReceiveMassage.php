<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
mint sever
</title>
</head>
<body>
<?php
include("file:///D|/xampp/htdocs/Work/connect_db.php");
mysql_query("SET NAMES UTF8");
$rname = $_POST['rname'];
$message = $_POST['message'];
$sender = $_POST['sender'];
$ture= "T";
$false="F";

	/*$user= "select user_id from user where user_name='$rname' ";
	$userQuery = mysql_query($user);
	$row=mysql_fetch_array($userQuery);
	$idUser=$row['user_id'];*/
	//echo"$id";
	
	$strSQL = "INSERT INTO message (recipients,message,sender,status) VALUES ('$rname','$message','$sender','$ture') ";
	$objQuery = mysql_query($strSQL);
	if($objQuery)
	{	
		
	}
	else
	{
		echo "Error  [".$strSQL."]";
	}
	mysql_close();
?>
</body>
</html>