<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<?php
	include("file:///D|/xampp/htdocs/Work/connect_db.php");

	$uname=$_POST['uname'];
	$upass=$_POST['pass'];
	
	$query= "Select * from user where user_name= '$uname' and pass='$upass'";
	$result=mysql_query($query);
	$num_result=@mysql_num_rows($result);	
	
		
		if($num_result!=1){
?>
	     <script language="JavaScript">
        alert("รหัสไม่ถูกต้อง หรือ ยังไม่มีอยู่ในระบบ \nกรุณาลองใหม่อีกครั้ง หรือติดต่อเจ้าหน้าที่ \nเพื่อดำเนินการต่อไป ......  ^_^\n ");
        
       </script>
<?php
		
	}else{
		while($row=mysql_fetch_array($result))
			{
				$id=$row['user_id'];
				$user=$row['user_name'];
				$first=$row['first'];
				$last=$row['last'];
				$email=$row['email'];
				$pass=$row['pass'];
			}
		//echo"$id $user $first $last $email $pass";
?>
		
       <script language="JavaScript">
        alert("สัวสดีค่ะ คุณ<?=$first?> ยินดีต้อนรับเข้าสู่ระบบค่ะ");
		window.location.href = "index.php";
        //window.location.href = "member.php"; //ส่ง user ไำปยังหน้าที่เราต้องการ
        </script>
		
      
<?php
	}
	
			      
?>

</body>
</html>