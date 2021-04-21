<?php 
/* Sign Up Function */
$json = array("query"=>"signup","getpost"=>$_POST);
if(empty($_POST["post"]["name"]) || empty($_POST["post"]["password"]) || empty($_POST["post"]["mail"])){exit(0);}
$userfile = "./members/".md5($_POST["post"]["mail"]).".json";
$_POST["post"]["password"] = hash('sha256', $_POST["post"]["password"]);
$_POST["post"]["EncryptionKey"] = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPRSTUVYZ1234+=");
/* User Check */
if(file_exists($userfile)){
$json["notification"]=$_POST["post"]["mail"]."Bu eposta kullanılmaktadır.";
$json["redirect"]="#signup";
}else{ 
file_put_contents($userfile, json_encode($_POST["post"]));
$json["notification"]="Giriş Yapabilirsiniz";
$json["redirect"]="#signin";
}
echo json_encode($json);
?>