<?php
include("file:///D|/xampp/htdocs/Work/connect_db.php");
	$rname = $_POST["to"];
	$message = $_POST["mass4"];
	$sender = $_POST["from"];
	$ture= "T";
	$false="F";
	$strSQL = "INSERT INTO message (recipients,message,sender,status) VALUES ('$rname','$message','$sender','$false') ";
	$objQuery = mysql_query($strSQL);
	
	
	if($objQuery)
	{	
		$strSQL = "SELECT IP_address FROM user WHERE user_name = '$rname' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
  		$objResult = mysql_fetch_array($objQuery);
		$ip=$objResult["IP_address"];
	
	

		$count=0;
		while($count>=0){
			

    		$stringGet="GET / HTTP/1.1\r\nHost: www.example.com\r\nConnection: Close\r\n\r\n";
			$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

			$bool=socket_connect ( $socket , '192.168.1.7' , 80);

			$byteSend= socket_send ( $socket , $stringGet , strlen($stringGet) , 0 );
			$byteReceive = socket_recv($socket, $buffer, 1024, MSG_WAITALL);
				if(!$byteReceive)
				{
					echo"can not connect server";
				}
				else
				{
					echo"connect complest";
					$count=-1;
	 				$Id="select ID from message recipients='$rname' and message='$message' and sender='$sender'";
  	 				$query= "update message set recipients='$rname',message='$message',sender='$sender',status='T' where ID=$Id ";
  	 				$results = mysql_query($query);
	 				$curlResource=curl_init();
  	 				curl_setopt($curlResource, CURLOPT_POST,1);
  	 				curl_setopt($curlResource, CURLOPT_URL,"http://".$ip."/Work/ReceiveMassage.php");
 					curl_setopt($curlResource, CURLOPT_POSTFIELDS, "rname=$rname && message=$message && sender= $sender"); 
 	 				curl_exec($curlResource);
  					curl_close($curlResource);

				}
				socket_close($socket);
				$count++;
			    sleep(1);
	 	}
	}
		
		
	
	
	 	
 
  /*$curlResource=curl_init();
  curl_setopt($curlResource, CURLOPT_POST,1);
  curl_setopt($curlResource, CURLOPT_URL,"http://".$ip."/Work/ReceiveMassage.php");
  curl_setopt($curlResource, CURLOPT_POSTFIELDS, "rname=$rname && message=$message && sender= $sender"); 
  curl_exec($curlResource);
  curl_close($curlResource);*/
  
 
			
	
	mysql_close();
?>