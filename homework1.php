<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mint</title>
<link type="text/css" rel="stylesheet" href="Mystyle.css">
</head>

<body>
<script language="javascript">
	
function isInt() {
	
 var input=document.getElementById("num").value;

  var x;
  if (isNaN(input)) {
  	document.getElementById("num").style.backgroundColor="red";
	 alert("ผิดพลาด!! กรุณาใส่ตัวเลขค่ะ");
    return false;
    
  }
  x = parseFloat(input);
 // var input=parseInt(document.getElementById("num").value);
	var n;
		n=input%3;
		alert(n);
		if(n==0){

			document.getElementById("number").value=n;
			document.getElementById("num").style.backgroundColor="white";
			document.getElementById("div1").style.backgroundColor="green";
			document.getElementById("div2").style.backgroundColor="yellow";
			document.getElementById("div3").style.backgroundColor="green";
			
			}
		else if(n==1){
			document.getElementById("number").value=n;
			document.getElementById("num").style.backgroundColor="white";
			document.getElementById("div1").style.backgroundColor="yellow";
			document.getElementById("div2").style.backgroundColor="green";
			document.getElementById("div3").style.backgroundColor="yellow";
			}
		else if(n==2){
			document.getElementById("number").value=n;
			document.getElementById("num").style.backgroundColor="white";
			document.getElementById("div1").style.backgroundColor="white";
			document.getElementById("div1").style.border="0";
			document.getElementById("div2").style.backgroundColor="white";
			document.getElementById("div2").style.border="0";
			document.getElementById("div3").style.backgroundColor="white";
			document.getElementById("div3").style.border="0";
			
			}
   
  return (x | 0) === x;
  

}


</script>
<div class="box0">
<form id="form1" name="form1" method="post" action="" >
  <center><h1>ใส่ค่าตัวเลข</h1>
    
      <p>
        <input type="text" name="num" id="num" />
        
      </p>
      <p>
       
        <h3>เศษ </h3><input type="text" name="number" id="number">
        <input type="button" name="OK" value="OK" onClick="isInt()" />
      </p>
      <p>&nbsp;</p>
  </center>
  
</form></div>
<div class="box1" id="div1"></div>
<div class="box2" id="div2"></div>
<div class="box3" id="div3"></div>

</body>
</html>
