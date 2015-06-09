<?php
//$url='http://localhost/Work/test1.php';
function httpGet($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}
  $U=$_GET['u'];
  $P=$_GET['p'];
 
 
echo httpGet("http://10.70.19.36/Work/test.php?u=$U&p=$P");
?>