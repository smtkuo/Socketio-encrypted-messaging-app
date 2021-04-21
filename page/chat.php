<div class="container">
<div class="contactlist">
<div class="container">
<div class="row">
<div class="col-12">
<div class="card mt-4">
<div class="list-group list-group-flush">
<div class="list-group-item">
<h5>Chat Info</h5>
Online: <span class="onlinecount">0</span> Connect: <span class="connectstatus">0</span> 
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-8 col-s12">
<div class="card mt-4">
<div class="list-group list-group-flush">
<div class="list-group-item">
<div class="mesajlasmabolumu">
<!------ Include the above in your HEAD tag ---------->
<div class="container">
 <div class="row">
 <div class="col-md-12">
 <div class="panel panel-primary">
 <div class="panel-heading" id="accordion">
 <span class="whoname">?</span> ile konuşuyorsun
 </div>
 <div class="panel-body">
 <ul class="chatareatest" style="display:none;">
 <li class="left clearfix"> <div class="chat-body clearfix"> <div class="header"> <strong class="primary-font">You</strong> <small class="pull-right text-muted">12 mins ago</small> </div> <p> Merhaba sağ menude aktif olan kişileri görebilir ve sohbet etmeye başlayabilirsiniz. </p> </div> </li>
 <li class="right clearfix"> <div class="chat-body clearfix"> <div class="header"> <small class=" text-muted">13 mins ago</small> <strong class="pull-right primary-font">test@gmail.com</strong> </div> <p> Güzel Sohbetler :) </p> </div> </li>
 </ul>
 <ul class="privatechatarea">
 </ul>
 </div>
 <div class="panel-footer">
 <div class="input-group">
 <input id="btn-input" type="text" class="form-control input-sm messagetext" placeholder="Mesajını Gönder..." />
 <span class="input-group-btn">
 <button class="btn btn-warning btn-sm" id="btn-chat" onclick='ChatLive.SendMessage()'>Send</button>
 </span>
 </div>
 </div>
 </div>
 </div>
 </div>
<div style="display:none">
<input type="hidden" class="usernamewrite">
</div>
</div>
</div>
</div>
</div>
</div>
<div class="card mt-4">
<div class="list-group list-group-flush">
<div class="list-group-item">
<h5>En Son Mesajlar</h5>
<div><button type="button" class="btn btn-secondary" onclick='ChatLive.SendQuery({key:"CheckMessage",val:{C:1,H:2,E:3,C:4,K:5}})'>Mesajları Kontrol Et</button></div>
<div class="ChatArea"></div>
</div>
</div>
</div>
<div class="card mt-4">
<div class="list-group list-group-flush">
<div class="list-group-item">
<h5>Alınan Şifreli Mesajlar</h5>
<div>
<textarea class="CryptoMessages" style="width:100%;min-height:300px;"></textarea>
</div>
</div>
</div>
</div>
</div>
 
<div class="col-md-4 col-s12">
<div class="card mt-4">
<div class="list-group list-group-flush">
<div class="list-group-item">
<h5>Mesaj Gönder</h5>
<div class="input-group mb-4">
<input class="connectchat" type="text" class="form-control" placeholder="Mail" aria-label="Mail" aria-describedby="basic-addon2">
</div>
<button type="button" class="btn btn-secondary" onclick="ChatLive.SearchMessage()">Search Mail</button>
</div>
</div>
</div>
<div class="card mt-4">
<div class="list-group list-group-flush">
<div class="list-group-item">
<h5>Aktif Kullanıcılar</h5>
<div class="SearchFriend">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<style>
.mpadding{padding:4px;}
.chat { list-style: none; margin: 0; padding: 5px; } .chat li { margin-bottom: 10px; padding-bottom: 5px; border-bottom: 1px dotted #B3A9A9; } .chat li.left .chat-body { margin-left: 60px; } .chat li.right .chat-body { margin-right: 60px; } .chat li .chat-body p { margin: 0; color: #777777; } .panel .slidedown .glyphicon, .chat .glyphicon { margin-right: 5px; } .panel-body { overflow-y: scroll; height: 250px; } ::-webkit-scrollbar-track { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); background-color: #F5F5F5; } ::-webkit-scrollbar { width: 12px; background-color: #F5F5F5; } ::-webkit-scrollbar-thumb { -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3); background-color: #555; }
</style>