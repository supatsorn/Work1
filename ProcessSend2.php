<?php
include("connect_db.php");
	/*$rname = $_GET["to"];
	$message = $_GET["mass4"];
	$sender = $_GET["from"];*/
	$ture= "T";
	$false="F";
	    $status="select * from message where status='F'";
		$statusQuery = mysql_query($status);
		while ($row=mysql_fetch_array($statusQuery)){
		$idF=$row['ID'];
		$recip=$row['recipients'];
		$mess=$row['message'];
		$send=$row['sender'];
		$stat=$row['status'];
		echo"$idF $recip $mess $send $stat";
		
		$strSQL = "SELECT IP_address FROM user WHERE user_name = '$recip' ";
		$objQuery = mysql_query($strSQL)  or die(mysql_error());
  		$objResult = mysql_fetch_array($objQuery);
		$ip=$objResult["IP_address"];
	     echo"$ip";
	
		
		$count=1;
		while($count!=0){
			

    		//$stringGet="GET / HTTP/1.1\r\nHost: ".$ip." \r\nConnection: Close\r\n\r\n";
			$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

			$bool=socket_connect ( $socket , $ip , 80);

			//$byteSend= socket_send ( $socket , $stringGet , strlen($stringGet) , 0 );
			//$byteReceive = socket_recv($socket, $buffer, 1024, MSG_WAITALL);
				if(!$bool)
				{
					echo"can not connect server";
					$count++;
				}
				else
				{
					echo"connect complete";
					$count= 0;
					/*$Id="SELECT MAX(ID) FROM message ";
	 				//$Id="SELECT MAX(ID) FROM message INNER JOIN user ON message.user_id=user.user_id";
					$idQuery = mysql_query($Id);
					$Row=mysql_fetch_array($idQuery);
					$idMax=$Row['MAX(ID)'];*/
  	 				$query= "update message set recipients='$recip',message='$mess',sender='$send',status='T' 
					where ID=$idF ";
  	 				$results = mysql_query($query);
					/*
	 				$curlResource=curl_init();
  	 				curl_setopt($curlResource, CURLOPT_POST,1);
  	 				curl_setopt($curlResource, CURLOPT_URL,"http://".$ip."/Work/ReceiveMassage.php");
 					curl_setopt($curlResource, CURLOPT_POSTFIELDS, "rname=$rname && message=$message && sender= $send"); 
 	 				curl_exec($curlResource);
  					curl_close($curlResource); */

				}
				socket_close($socket);
				
			   sleep(1);
	 	} 
		}
	
	mysql_close();
?>
-f D:\xampp\htdocs\Work\ProcessSend2