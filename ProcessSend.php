<?php
include("connect_db.php");
	$rname = $_POST["to"];
	$message = $_POST["mass4"];
	$sender = $_POST["from"];
	$ture= "T";
	$false="F";

	/*
	$user= "select user_id from user where user_name='$rname' ";
	$userQuery = mysql_query($user);
	$row=mysql_fetch_array($userQuery);
	$idUser=$row['user_id'];*/
	//echo"$id";
	
	$strSQL = "INSERT INTO message (recipients,message,sender,status) VALUES ('$rname','$message','$sender','$false') ";
	$objQuery = mysql_query($strSQL);
	
	
	if($objQuery)
	{	
		$strSQL = "SELECT IP_address FROM user WHERE user_name = '$rname' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
  		$objResult = mysql_fetch_array($objQuery);
		$ip=$objResult["IP_address"];
	


    		//$stringGet="GET / HTTP/1.1\r\nHost: ".$ip." \r\nConnection: Close\r\n\r\n";
			$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

			$bool=socket_connect ( $socket , $ip , 80);

			//$byteSend= socket_send ( $socket , $stringGet , strlen($stringGet) , 0 );
			//$byteReceive = socket_recv($socket, $buffer, 1024, MSG_WAITALL);
				if(!$bool)
				{
					echo"can not connect server";
					header("location:ProcessSend2.php?to=".$rname." & mass4=".$message." & from=".$sender."");
				}
				else
				{
					echo"connect complete";
					
					$Id="SELECT MAX(ID) FROM message ";
	 				//$Id="SELECT MAX(ID) FROM message INNER JOIN user ON message.user_id=user.user_id";
					$idQuery = mysql_query($Id);
					$Row=mysql_fetch_array($idQuery);
					$idMax=$Row['MAX(ID)'];
  	 				$query= "update message set recipients='$rname',message='$message',sender='$sender',status='T' 
					where ID=$idMax ";
  	 				$results = mysql_query($query);
	 				$curlResource=curl_init();
  	 				curl_setopt($curlResource, CURLOPT_POST,1);
  	 				curl_setopt($curlResource, CURLOPT_URL,"http://".$ip."/Work/ReceiveMassage.php");
 					curl_setopt($curlResource, CURLOPT_POSTFIELDS, "rname=$rname && message=$message && sender= $sender"); 
 	 				curl_exec($curlResource);
  					curl_close($curlResource);

				}
				socket_close($socket);
				
			   
	 	}
	
		
		
	
	
	 	
 
  /*$curlResource=curl_init();
  curl_setopt($curlResource, CURLOPT_POST,1);
  curl_setopt($curlResource, CURLOPT_URL,"http://".$ip."/Work/ReceiveMassage.php");
  curl_setopt($curlResource, CURLOPT_POSTFIELDS, "rname=$rname && message=$message && sender= $sender"); 
  curl_exec($curlResource);
  curl_close($curlResource);*/
  
 
			
	
	mysql_close();
?>