<?php
include("file:///D|/xampp/htdocs/Work/connect_db.php");
	$rname = $_POST["to"];
	$message = $_POST["mass4"];
	$sender = $_POST["from"];
	//echo"$rname $message $sender";
	/*$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
	$objDB = mysql_select_db("work1");
	*/
	$strSQL = "INSERT INTO message ";
	$strSQL .="(recipients,message,sender)";
	$strSQL .=" VALUES ";
	$strSQL .="('$rname','$message','$sender') ";
	$objQuery = mysql_query($strSQL);
	if($objQuery)
	{	
		$strSQL = "SELECT IP_address FROM user WHERE user_name = '$rname' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
  		$objResult = mysql_fetch_array($objQuery);
		$ip=$objResult["IP_address"];
		header("Location:http://".$ip."/Work/ReceiveMassage.php?rname=".$rname."&message=".$message."&sender=".$sender."");

	}
	else
	{
		echo "Error  [".$strSQL."]";
	}
	mysql_close();
?>