<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$database="work1";

	$uname=$_POST['uname'];
	$upass=$_POST['pass'];
	@mysql_connect($hostname,$username,$password)or die("Connect Fail");
	@mysql_select_db($database)or die("Select fail");
	$query= "Select * from user where user_name= '$uname' and pass='$upass'";
	$result=mysql_query($query);
	$num_result=@mysql_num_rows($result);	
	
		
		if($num_result!=1){
?>
	     <script language="JavaScript">
        alert("รหัสไม่ถูกต้อง หรือ ยังไม่มีอยู่ในระบบ \nกรุณาลองใหม่อีกครั้ง หรือติดต่อเจ้าหน้าที่ \nเพื่อดำเนินการต่อไป ......  ^_^\n ");
        window.location.href = "index.php";
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
        //window.location.href = "member.php"; //ส่ง user ไำปยังหน้าที่เราต้องการ
        </script>
		
      
<?php
	}
	
			      
?>

</body>
</html>
