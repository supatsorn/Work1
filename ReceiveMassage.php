<?php

$rname = $_POST["$recip"];
$message = $_POST["&message"];
$sender = $_POST["&sender"];
echo "$rname ";
	$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("work1");
	$strSQL = "INSERT INTO message ";
	$strSQL .="(recipients,message,sender)";
	$strSQL .=" VALUES ";
	$strSQL .="('$rname','$message','$sender') ";
	$objQuery = mysql_query($strSQL);
	if($objQuery)
	{	
		echo $message;
	}
	else
	{
		echo "Error  [".$strSQL."]";
	}
	mysql_close();
?>