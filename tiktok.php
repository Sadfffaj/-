<?php
ob_start(); 
$token = "7521960631:AAEVv0HR4Y0yYM56OJnk0QmqVm7KsOg_0jw"; # توكن

define("API_KEY", $token);
echo "setWebhook ~> <a href=\"https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."\">https://api.telegram.org/bot".API_KEY."/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."</a>";

function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}}

$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}

$url = $text;

$TikTok = json_decode(file_get_contents("https://tikwm.com/api/?url=$url"));
$tiktok = $TikTok->data;

$code = $TikTok->code; 
$status = $TikTok->msg; 
$processed_time = $TikTok->processed_time; 
$id = $tiktok->id; 
$region = $tiktok->region; 
$title = $tiktok->title; 
$cover = $tiktok->cover;
$origin_cover = $tiktok->origin_cover; 
$duration = $tiktok->duration; 
$play = $tiktok->play; 
$wmplay = $tiktok->wmplay; 
$size = $tiktok->size; 
$wm_size = $tiktok->wm_size; 
$music = $tiktok->music; 
$music_info_id = $tiktok->music_info->id; 
$music_info_title = $tiktok->music_info->title; 
$music_info_play = $tiktok->music_info->play; 
$music_info_cover = $tiktok->music_info->cover; 
$music_info_author = $tiktok->music_info->author; 
$music_info_original = $tiktok->music_info->original; 
$music_info_duration = $tiktok->music_info->duration; 
$music_info_album = $tiktok->music_info->album; 
$play_count = $tiktok->play_count; 
$digg_count = $tiktok->digg_count; 
$comment_count = $tiktok->comment_count; 
$share_count = $tiktok->share_count; 
$download_count = $tiktok->download_count; 
$create_time = $tiktok->create_time; 
$author_id = $tiktok->author->id; 
$author_unique_id = $tiktok->author->unique_id; 
$author_nickname = $tiktok->author->nickname; 
$author_avatar = $tiktok->author->avatar; 




		
		if(strstr($text,"vm.tiktok.com")) {
			if($status == "success") {
			bot('sendChatAction', [
'chat_id'=>$chat_id,
'action'=>'upload_video',]);

	bot('sendvideo',[ 
'chat_id'=>$chat_id,
'video'=>new CURLFile($play),
'caption' =>"*~ Done Download*

* - info acount *

~ Name : $author_nickname
~ User : $author_unique_id 
~ ID : `$author_id`

* - info Music *
~ Name : *$music_info_author*

*- Description Video*
$title 
",
'parse_mode' => "MARKDOWN",
'reply_markup'=>json_encode([
'inline_keyboard'=>[

[['text'=>"عدد المشاهدات : $play_count",'callback_data'=>"1"]], 
[['text'=>"عدد المشاركات : $share_count",'callback_data'=>"1"]], 
[['text'=>"عدد اللايكات  : $digg_count",'callback_data'=>"1"]], 
[['text'=>"عدد التعليقات : $comment_count",'callback_data'=>"1"]], 
[['text'=>"قناة البوت. ",'url'=>"@lilllllllllilllll"]], 
] 
])
     ]);
    
     bot('sendaudio',[ 
'chat_id'=>$chat_id,
'audio'=>new CURLFile($music) ,
'caption' =>"*~ Music* 

$title", 
'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
     ]); 
    } else {
    	bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
حدث خطأ اثناء التحميل. 
",
        'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
        
        
    ]);
   } 
    } 
    
    
    
    
   
   if($text == "/start"){
   bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
- اهلا بك؛ $name
يمكنك التحميل من تيك توك . ⬇️
- يمكنك تحميل الفيديوهات بدون علامه .
- يتم تحميل الفيديوهات بسرعه عاليه .
- كل ماعليك هوا ارسال رابط التحميل . 
.
",
        'parse_mode' => "MARKDOWN",
        'disable_web_page_preview' => "true",
        'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قناة البوت ~",'url'=>"@lilllllllllilllll"]], 
] 
])
        
    ]);
   } 