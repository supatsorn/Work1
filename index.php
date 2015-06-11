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
$query="select * from message where sender!='mint'";
$resule=mysql_query($query);
?>
<center><h1>หน้าหลัก</h1></center>
<form action="" method="post">
<input type="submit" value="Logout" />
</form>
<form action="file:///D|/xampp/htdocs/Work/ProcessSend.php" method="post">
<table border="1" align="center" width="100%" height="90%">
	<tr colspan="" align="center">
    	<td height="65"><h2>ข้อความจากเพื่อน</h2></td>
        <td><h2>ส่งขอ้ความถึงเพื่อน</h2></td>
	</tr>
    <tr>
    	<td>
<?php
	
	while($rows=@mysql_fetch_array($resule)){
		$id=$rows['ID'];
		$recip=$rows['recipients'];
		$sent=$rows['sender'];
		$mess=$rows['message'];
?>	
	
	 <center><font color="#CC0066" >ข้อความจาก  : </font><?php echo $sent ?><br>

       <input name="text" type="text" value="<?php echo $mess?>"/><br></center>
<?php
	}
	
	?>
      </td>
    
         
		
		<td rowspan="10" align="center">ส่งข้อควมถึง :
        				 <center><input name="to" type="text" /> </center><br />  
                         <center><textarea name="mass4" cols="" rows="" ></textarea></center><br>
                         จาก : <input name="from" type="text"  value="mint"/><br /> 
							<input type="submit" value="ส่งข้อความ" /></td><br />
	</tr>
	
</table>
</form>
</body>
</html>