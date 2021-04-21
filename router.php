<?php 
/* 
Mesaj.Link Router 
*/
if(empty($_POST["how"])){
exit;
}
class mesajLink{
public function encryptUrl($url){
return strip_tags(str_replace(array(".",",",">","|","/","!","?","=","'",'"',":","@","%","&","#","{","}","^"),array("i971","i972","i973","i974","i975","i976","i977","i978","i979","i980","i981","i982","i983","i984","i985","i986","i987","i988"),$url));
}
public function decodeUrl($url){
return strip_tags(str_replace(array("i971","i972","i973","i974","i975","i976","i977","i978","i979","i980","i981","i982","i983","i984","i985","i986","i987","i988"),array(".",",",">","|","/","!","?","=","'",'"',":","@","%","&","#","{","}","^"),$url));
}
public function Character($query,$how){
if($how=="filename"){
return preg_replace('/[^\w\s\0-9]+/u', '', mb_strtolower(trim(preg_replace("/\s+/", " ", str_replace(array("-")," ",$query))),"UTF-8"));
}
}
}
$mesajLink = new mesajLink();
if($_POST["how"]=="function" && !empty($_POST["query"])){
$checkpage = "./function/".$_POST["query"].".php";
if(file_exists($checkpage)){
require $checkpage;
}
exit;
}
if($_POST["how"]=="loadpage" && !empty($_POST["getpage"])){
$checkpage = "./page/".$_POST["getpage"].".php";
if(file_exists($checkpage)){
require $checkpage;
}
exit;
}
exit;
?>