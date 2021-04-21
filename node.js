const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const options = {
 cors:true
};
const io = require('socket.io')(server, options);
app.get('/', (req, res) => {
 res.send('<h1>Hello world</h1>');
}); 
const encode = require('nodejs-base64-encode');
const BJSON = require('buffer-json');
const execPhp = require('exec-php');
Cache = {
AppInfo:{
APPNAME:"Mesaj.link",
Founder:"Samet Utku OLGUN"
},
MessagesCache:{},
ProfileData:{},
ID:{}
};
/* 
MesajLink Server Functions 
*/
Encryption = { 
base64: function(query=0){ 
return Buffer.from(query).toString('base64');
},
strstr: function(query=0,a=0,b=0){ 
}
}; 
MesajLINK = { 
SELECT: function(query=0,socket=0){ 
/* Router Function */
if(query["key"]==null || query["val"]==null){ return 0; }
if(query["key"]=="Login"){
return MesajLINK.Login(query["val"],socket);
}
if(query["key"]=="Check"){
return MesajLINK.Check(query["val"],socket);
}
if(query["key"]=="LogoutSocket"){
return MesajLINK.LogoutSocket(query["val"],socket);
}
if(query["key"]=="CheckMessage"){
return MesajLINK.CheckMessage(query["val"],socket);
}
if(query["key"]=="SendMessage"){
return MesajLINK.SendMessage(query["val"],socket);
}
if(query["key"]=="ConnectChat"){
return MesajLINK.ConnectChat(query["val"],socket);
}
return 0;
},
Login: function(query=0,socket=0){ 
returnback={};
if(query["mail"] != null && query["name"] != null && query["password"] != null){
returnback["notice"]="Hoş Geldiniz";
/* Save User Profile */
Cache["ProfileData"][query["mail"]]={
"mail":query["mail"],
"name":query["name"],
"time":Date.now(),
"SID":socket.id
};
/* Save Socket ID */
Cache["ID"][socket.id]={
"mail":query["mail"]
}; 
}else{
returnback["notice"]="Hata Giriş Yapılamadı"; 
}
returnback={}; returnback["q"]="Login"; returnback["how"]="ioemit";
return {key:"CheckSID",val:returnback,how:returnback["how"],SID:socket.id};
},
LogoutSocket: function(query=0,socket=0){ 
if(Cache["ID"][socket.id]!=null){ check = Cache["ID"][socket.id];
if(check["mail"]!=null){ check =check["mail"];
if(Cache["ProfileData"][check]!=null){
delete Cache["ProfileData"][check];
}
delete Cache["ID"][socket.id];
}
}
},
CheckMessage: function(query=0,socket=0){ 
/* Mesaj Okuma Ve Gönderme */
if(Cache["ID"][socket.id]==null){ return 0; }
if(Cache["ID"][socket.id]["mail"]==null){ return 0; } 
if(Cache["ProfileData"][Cache["ID"][socket.id]["mail"]]==null){ return 0; }
returnback={};
returnback["q"]="CheckMessage";
returnback["notice"]="Welcome";
returnback["how"]="ioemit";
var mail = Cache["ID"][socket.id]["mail"];
var profileData = Cache["ProfileData"][Cache["ID"][socket.id]["mail"]]; 
if(Cache["MessagesCache"][mail]==null){
returnback["checkmessages"]=0;
returnback["messages"]=0;
}else{
returnback["checkmessages"]=1;
returnback["messages"]=Cache["MessagesCache"][mail];
delete Cache["MessagesCache"][mail];
}
return {key:"CheckMessage",val:returnback,how:returnback["how"]};
},
ConnectChat: function(query=0,socket=0){ 
/* Güvenlik Önemli */ 
if(Cache["ID"][socket.id]==null){ return 0; }
if(Cache["ID"][socket.id]["mail"]==null){ return 0; } 
if(Cache["ProfileData"][Cache["ID"][socket.id]["mail"]]==null){ return 0; }
/* Güvenlik Önemli */
if(query["connect"] == null){return 0;} 
returnback={};
if(Cache["ProfileData"][query["connect"]] != null){ 
var profileData = Cache["ProfileData"][query["connect"]]; 
}else{
var profileData = {
mail:query["connect"],
name:query["connect"],
time:Date.now()
};
} 
returnback["notification"]="Connection is established";
returnback["connectchat"]=0;
returnback["profiledata"]=profileData;
returnback["how"]="ioemit";
/* 
returnback["notification"]="Profile Not Found";
returnback["connectchat"]=0;
returnback["how"]="ioemit";
*/
return {key:"ConnectChat",val:returnback,how:returnback["how"]};
},
SendMessage: function(query=0,socket=0){ 
/* Mesaj Okuma Ve Gönderme */
/* Güvenlik Önemli */
if(Cache["ID"][socket.id]==null){ return 0; }
if(Cache["ID"][socket.id]["mail"]==null){ return 0; } 
if(Cache["ProfileData"][Cache["ID"][socket.id]["mail"]]==null){ return 0; }
if(query["username"]==null || query["text"]==null){return 0;}
/* Save Message */
if(Cache["MessagesCache"][query["username"]]== null){Cache["MessagesCache"][query["username"]]={};} 
var time=Date.now(); 
execPhp('npm.php', function(error, php, outprint){
 php.cryptomessage(query["username"],BJSON.stringify({client: query["username"], sender: Cache["ID"][socket.id]["mail"], message:query["text"], time:time}),function(err, result, output, printed){
Cache["MessagesCache"][query["username"]][time]=result; 
 });
});
privatesend={};
if(Cache["ProfileData"][query["username"]]!=null){
if(Cache["ProfileData"][query["username"]]["SID"]!=null){ 
privatesend["sid"]=Cache["ProfileData"][query["username"]]["SID"];
privatesend["data"]={key:"CheckMessage",val:{checkserver:1},how:returnback["how"]}; 
}
}
returnback={};
returnback["q"]="CheckMessage";
returnback["how"]="ioemit";
returnback["checkserver"]=0;
returnback["me"]=1;
returnback["checkmessages"]=1;
returnback["messages"]={};
returnback["messages"][time]={checkmessages:1,client: Cache["ID"][socket.id]["mail"], sender: query["username"], message:query["text"], time:time, me:1, username:Cache["ID"][socket.id]["mail"]};
return {key:"CheckMessage",val:returnback,how:returnback["how"],privatesend:privatesend};
},
Check: function(query=0,socket=0){
returnback={};
returnback["q"]="Check";
returnback["query"]=query;
returnback["how"]="ioemit";
return returnback;
},
Status: function(query=0,socket=0){
returnback={};
returnback["q"]="Check";
returnback["notice"]="Welcome";
returnback["query"]=query;
returnback["how"]="ioemit";
return returnback;
},
ChangeID: function(oldid=0,newid=0){
if(oldid != newid){
if(Cache["ID"][oldid]!=null){
if(Cache["ID"][oldid]["mail"]!=null){
var checkuser = Cache["ID"][oldid]["mail"];
if(Cache["ProfileData"][checkuser] != null){
Cache["ProfileData"][checkuser]["SID"]=newid; 
Cache["ID"][newid] = Cache["ID"][oldid];
delete Cache["ID"][oldid];
}
}
}
}
}
}; 
 
/* Socket */ 
io.on('connection', (Client) => {
Client.emit("tessstt","hollaaa ID: "+ Client.id); 
Client.on('disconnect', function () {
MesajLINK.SELECT({key:"LogoutSocket",val:0},Client);
});
 
Client.on('MesajLINK', function(data){ 
if(data["SID"]!=null && data["SID"] != 0){ 
if(data["SID"] != Client.id){ 
MesajLINK.ChangeID(data["SID"],Client.id);
}
}
var SentQuery = MesajLINK.SELECT(data,Client); 
if(SentQuery!=0 && SentQuery["how"]!=null){
if(SentQuery["how"]=="ioemit"){ 
if(SentQuery["privatesend"]!=null){ 
if(SentQuery["privatesend"]["sid"] != null && SentQuery["privatesend"]["data"] != null){ 
io.to(SentQuery["privatesend"]["sid"]).emit('MesajLINKClient',SentQuery["privatesend"]["data"]);
}
delete SentQuery["privatesend"];
}
SentQuery["SID"] = Client.id;
Client.emit('MesajLINKClient',SentQuery);
} 
}
}); 
 
});
/* Check Clients */ 
setInterval(() => { 
/* Update Areas */
 updateData = {key:"Update",val:{}};
 if(Cache["ProfileData"] != null){
 updateData["val"]["usercount"]=Object.keys(Cache["ProfileData"]).length;
 }else{
 updateData["val"]["usercount"]=0;
 }
 updateData["val"]["connect"]=1;
 updateData["val"]["profiles"]=Cache["ProfileData"];
 
 io.emit('MesajLINKClient', updateData);
 }, 4000); 
 
server.listen(3000, () => {
 console.log('listening on *:3000');
});
/* 
socket.on('imlive', function(data) {
if()
socket.emit('imlivereturn', { notice: 'Welcome Friend', redirect: 0, allcache: mesajLINK });
});
serverv = http.createServer((req, res) => {
 res.writeHead(200, {'Content-type':'text/html'});
 res.end('<title>HELLO</title><h1>WELCOME</h1>');
});
*/
