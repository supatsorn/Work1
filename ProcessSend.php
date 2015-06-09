<?php
include("connect_db.php");
	$recip = $_POST["to"];
	$message = $_POST["mass4"];
	$sender = $_POST["from"];
	$strSQL = "INSERT INTO message (recipients,message,sender) VALUES ('$recip','$message','$sender') ";
	$objQuery = mysql_query($strSQL);
	if($objQuery)
	{	
		$strSQL = "SELECT IP_address FROM user WHERE user_name = '$recip' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
  		$objResult = mysql_fetch_array($objQuery);
		$ip=$objResult["IP_address"];
	
		
  $curlResource=curl_init();
  curl_setopt($curlResource, CURLOPT_POST,1);
  curl_setopt($curlResource, CURLOPT_URL,"http://".$ip."/Work/ReceiveMassage.php");
  curl_setopt($curlResource, CURLOPT_POSTFIELDS, "$recip=".$recip."&message=".$message."&sender=".$sender.""); 
  curl_exec($curlResource);
  curl_close($curlResource);
			/*function httpPost($url,$params)
    {
 		 $postData = '';
   		//create name value pairs seperated by &
   		foreach($params as $k => $v) 
  		 { 
      	$postData .= $k . '='.$v.'&'; 
  		 }
  		 rtrim($postData, '&');
 
    	 $ch = curl_init();  
 
    	curl_setopt($ch,CURLOPT_URL,$url);
    	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    	curl_setopt($ch,CURLOPT_HEADER, false); 
   		curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    	$output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
     }
	 
	 $params = array(
   	"recip" => "$rname",
   	"mess" => "$message",
	"send" =>"$sender"
     );*/
 
//echo httpPost(header("Location:http://".$ip."/Work/ReceiveMassage1.php?rname=".$rname."&message=".$message."&sender=".$sender."",$params));

 
 
     //echo httpGet("http://".$ip."/Work/ReceiveMassage.php?rname=".$rname."&message=".$message."&sender=".$sender."");
		
		//header("Location:http://".$ip."/Work/ReceiveMassage.php?rname=".$rname."&message=".$message."&sender=".$sender."");

	}
	else
	{
	echo "Error  [".$strSQL."]";
	}

	mysql_close();
?>