<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
mint
<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$database="work1";

	$uname=$_POST['uname'];
	$upass=$_POST['pass'];
	@mysql_connect($hostname,$username,$password)or die("Connect Fail");
	@mysql_select_db($database)or die("Select fail");
	$query= "select* from user";
	$result=mysql_query($query);


	
		while($row=mysql_fetch_array($result))
			{
				$id=$row['user_id'];
				$username=$row['username'];
				$first=$row['first'];
				$last=$row['last'];
				$email=$row['email'];
				$pass=$row['pass'];
			}
		echo"$id $uname $pass";
		if($uname=="$username" && $upass=="$pass"){
?>
		 <script language="JavaScript">
        alert("สวัสดีครับ คุณ <?=$first =$pass?> ยินดีต้อนรับเข้าสู่ระบบครับ");
        //window.location.href = "member.php"; //ส่ง user ไำปยังหน้าที่เราต้องการ
       </script>
		

<?php
		
	}else{
?>
		<script language="JavaScript">
        alert("รหัสไม่ถูกต้อง หรือ ยังไม่มีอยู่ในระบบ \r\n\r\nกรุณาลองใหม่อีกครั้ง หรือติดต่อเจ้าหน้าที่ \r\n\r\nเพื่อดำเนินการต่อไป ......  ^_^\r\n\r\n ");
        window.location.href = "index.php";
       </script>
      
<?php
	}
			      
?>
</body>
</html>