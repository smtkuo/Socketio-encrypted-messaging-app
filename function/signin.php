<?php 
/* Sign In Function */
$json = array("query"=>"signin","getpost"=>$_POST,"logincheck"=>0);
if(empty($_POST["post"]["password"]) || empty($_POST["post"]["mail"])){exit(0);}
$userfile = "./members/".md5($_POST["post"]["mail"]).".json";
/* User Check */
if(!file_exists($userfile)){
$json["notification"]="Bu kullanıcı Adı bulunamadı";
$json["redirect"]="#signin";
}else{
$userdata = json_decode(implode(file(($userfile))),true);
$hashpass = hash('sha256', $_POST["post"]["password"]);
if($userdata["password"] == $hashpass){
$json["logincheck"]=1;
$json["profile"]=$userdata;
$json["notification"]="Welcome";
$json["redirect"]="#chat";
}else{
$json["notification"]="Şifreniz Yanlış";
$json["redirect"]="#signin";
}

}







echo json_encode($json);
?>