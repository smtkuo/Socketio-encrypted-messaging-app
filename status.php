<?php 
if(!empty($_GET["nodestatus"]) && !empty($_GET["q"])){
if($_GET["q"]=="start"){
exec("node ./node.js");
}
if($_GET["q"]=="stop"){
exec("killall -9 node");
}
}
?>