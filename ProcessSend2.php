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
	/*$rname = $_GET["to"];
	$message = $_GET["mass4"];
	$sender = $_GET["from"];*/
	$ture= "T";
	$false="F";
	    $status="select * from message where status='F'";
		$statusQuery = mysql_query($status);
		$num=mysql_num_rows($statusQuery);
		//echo"$num";
		$count=1;
		while($count!=0){
			while ($row=mysql_fetch_array($statusQuery)){
				$idF=$row['ID'];
				$recip=$row['recipients'];
				$mess=$row['message'];
				$send=$row['sender'];
				$stat=$row['status'];
				echo"$idF $recip $mess $send $stat <br>";

				$strSQL = "SELECT IP_address FROM user WHERE user_name = '$recip' ";
				$objQuery = mysql_query($strSQL)  or die(mysql_error());
  				$objResult = mysql_fetch_array($objQuery);
				$ip=$objResult["IP_address"];
	     		echo"$ip";  

					$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
					$bool=socket_connect ( $socket , $ip , 80);
						if(!$bool)
						{
							echo"can not connect server";
							
						}
						else
						{
							echo"connect complete";
							$count= 0;
							//$Id="SELECT MAX(ID) FROM message ";
	 						//$Id="SELECT MAX(ID) FROM message INNER JOIN user ON message.user_id=user.user_id";
							//$idQuery = mysql_query($Id);
							//$Row=mysql_fetch_array($idQuery);
							//$idMax=$Row['MAX(ID)'];
  	 						$query= "update message set recipients='$recip',message='$mess',sender='$send',status='T' 
							where ID=$idF ";
  	 						$results = mysql_query($query);					
						}
					socket_close($socket);
				
			   		sleep(1);
					
	 		} 
				$count++;
		}
	
	mysql_close();
?>

-f D:\xampp\htdocs\Work\ProcessSend2
</body>
</html>