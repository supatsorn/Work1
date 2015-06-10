<?php
$rname = $_POST['rname'];
$message = $_POST['message'];
$sender = $_POST['sender'];
$ture= "T";
$false="F";
echo "$rname $message $sender";
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("work1");
	$strSQL = "INSERT INTO message ";
	$strSQL .="(recipients,message,sender,status)";
	$strSQL .=" VALUES ";
	$strSQL .="('$rname','$message','$sender','T') ";
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