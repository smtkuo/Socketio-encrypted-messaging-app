<?php 
header('Content-Type: text/html; charset=utf-8');

/* Node Functions */
function getuserdata($usermail=0){ 
$userfile = "./members/".md5($usermail).".json";
if(file_exists($userfile)){
return implode(file(($userfile)));
}
return 0;
} 
function cryptomessage($usermail=0,$message=0){ 
$userfile = "./members/".md5($usermail).".json";
if(file_exists($userfile)){
$data = json_decode(implode(file(($userfile))),true);
$message = utf8_encode($message);
if(!empty($data["EncryptionKey"])){
return strtr(base64_encode($message),"abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPRSTUVYZ1234+=",$data["EncryptionKey"]);
}else{
return base64_encode($message);
}
}
}
function decodemessage($usermail=0,$message=0){ 
$message = utf8_encode($message);
$userfile = "./members/".md5($usermail).".json";
if(file_exists($userfile)){
$data = json_decode(implode(file(($userfile))),true);
if(!empty($data["EncryptionKey"])){
return base64_decode(strtr($message,$data["EncryptionKey"],"abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPRSTUVYZ1234+="));
}else{
return base64_decode($message);
}
}
}
if(!empty($_POST)){ header('Content-Type: text/html; charset=utf-8');

if(!empty($_POST["how"]) && $_POST["how"] == "decodemessage" && !empty($_POST["me"]) && !empty($_POST["query"])){
$data = decodemessage($_POST["me"],$_POST["query"]);
echo $data;
exit;
}
}
?>