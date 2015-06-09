<?php
function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}

$params = array(
   "u" => "1",
   "p" => "2"

);
 
echo httpPost("http://10.70.19.36/Work/test1.php",$params);


  /*$curlResource=curl_init();
  curl_setopt($curlResource, CURLOPT_POST,1);
  curl_setopt($curlResource, CURLOPT_URL,"http://localhost/Work/test1.php");
  curl_setopt($curlResource, CURLOPT_POSTFIELDS, "u=1&p=2"); 
  curl_exec($curlResource);
  curl_close($curlResource); */

?>