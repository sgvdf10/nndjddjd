<?php
define('API_KEY',"tokn"); //توكن البوت الاساسي ؟
$Dev = id3434; // ايدي المبرمج الاساسي
$userbot = "name"; //اسم البوت
$userchanel = "b7_78"; //<==== يوزر القناة بدون @
function banda($method,$datas=[]){
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
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$namegroup = $update->message->chat->title;
mkdir("data/gp");
mkdir("data/user");
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$textmassage = $message->text;
$tc = $update->message->chat->type;
$newchatmemberid = $update->message->new_chat_member->id;
$newchatmemberu = $update->message->new_chat_member->username;
$chatid = $update->callback_query->message->chat->id;
$fm = $update->callback_query->from->id;
$data = $update->callback_query->data;
$messageid = $update->callback_query->message->message_id;
$token = API_KEY;// اختصار التوكن
$forchaneel = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=@".$userchanel."&user_id=".$from_id);
$stat = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$statjson = json_decode($stat, true);
$status = $statjson['result']['status'];
$get = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$chat_edit_id&user_id=".$edit_for_id);
$info = json_decode($get, true);
$you = $info['result']['status'];
//ارفع البوت ادمن بلقناة
function SendMessage($chat_id, $text){
    banda('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$text,
        'parse_mode'=>'MarkDown']);
}

function save($filename, $data)
{
    $file = fopen($filename, 'w');
    fwrite($file, $data);
    fclose($file);
}
function sendAction($chat_id, $action){
    banda('sendChataction',[
        'chat_id'=>$chat_id,
        'action'=>$action
        ]);
}
function Forward($berekoja,$azchejaei,$kodompayam)
{
banda('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
$userstart = file_get_contents("data/user/userstart.txt");
$numberstart = file_get_contents("data/user/numberstart.txt");
$gpadding = file_get_contents("data/gp/gpadding.txt");
$alladding = file_get_contents("data/gp/alladding.txt");
$alldelmesage = file_get_contents("data/gp/alldelmesage.txt");
$numbergp = file_get_contents("data/gp/numbergp.txt");
$startchech = file_get_contents("data/user/$from_id/startchech.txt");
$step = file_get_contents("data/user/$from_id/file.txt");
$setadd = file_get_contents("data/gp/$chat_id/setadd.txt");
$addings = file_get_contents("data/gp/$chat_id/adding.txt");
$youadding = file_get_contents("data/gp/$chat_id/$from_id/youadding.txt");
$youtext = file_get_contents("data/gp/$chat_id/$from_id/youtext.txt");
$stats = file_get_contents("data/gp/$chat_id/stats.txt");
$setadd2 = file_get_contents("data/gp/$chatid/setadd.txt");
$addings2 = file_get_contents("data/gp/$chatid/adding.txt");
$stats2 = file_get_contents("data/gp/$chatid/stats.txt");
$mods = file_get_contents("data/gp/$chatid/mod.txt");
$chatadding = file_get_contents("data/gp/$chat_id/chatadding.txt");
if(strpos($forchaneel , '"status":"left"')==true && $tc == "private"){
    sendAction($chat_id, 'typing');
    banda('sendmessage',[
        "chat_id"=>$chat_id,
        "text"=>"اشترك بلقناة وارسل ستارت من جديد
⭕️ @$userchanel
",
        'reply_to_message_id'=>$message_id,
    ]);
}
elseif($textmassage == "/start" && $tc == "private"){
    if($userstart ==""){
        $myfile2 = fopen("data/user/userstart.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    sendAction($chat_id, 'typing');
    banda('SendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"ضيف البوت المجموعتك وارسل
        /add",
        'reply_to_message_id'=>$message_id,
    ]);
    mkdir("data/user/$from_id");
    save("data/user/$from_id/startchech.txt","true");
    save("data/user/numberstart.txt","1");
    }
    elseif($startchech == "true"){
       sendAction($chat_id, 'typing');
    banda('SendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"اتشرك بلقناة وضيف البوت المجموعتك وارسل /add",
        'reply_to_message_id'=>$message_id,
    ]);
    }
    elseif($startchech != "true"){
    $myfile2 = fopen("data/user/userstart.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    sendAction($chat_id, 'typing');
    banda('SendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"ضيف البوت بلكروب وارسل /add",
        'reply_to_message_id'=>$message_id,
    ]);
    mkdir("data/user/$from_id");
    save("data/user/$from_id/startchech.txt","true");
    $po = $numberstart +1;
    save("data/user/numberstart.txt","$po");
    }
}
if (strpos($chatadding , "$chat_id")!== false) {
    if ($textmassage == "/add" && $status != "member") {
        $date1 = date('Y-m-d', time());
        sendAction($chat_id, 'typing');
        banda('sendmessage', [
            "chat_id" => $chat_id,
            "text" => "الاوامر",
            'reply_to_message_id' => $message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "اعدادات شفافة ", 'callback_data' => 'sittengss'], ['text' => "اخرى", 'callback_data' => 'helpmods']
                    ],
                ]
            ])
        ]);
        save("data/gp/$chat_id/mod.txt","$from_id");
    }
}
elseif($textmassage == "/add" && $status != "member"){
    if ($tc == 'group' | $tc == 'supergroup'){
    mkdir("data");
    mkdir("data/gp");
    mkdir("data/gp/$chat_id");
    sendAction($chat_id, 'typing' );
        banda('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"تم تثبيت المجموعة
            @b7_78
",
                    'reply_to_message_id' => $message_id,
            'reply_to_message_id' => $message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "اعدادات شفافة", 'callback_data' => 'sittengss'], ['text' => "اخرى", 'callback_data' => 'helpmods']
                    ],
                ]
            ])
        ]);
        save("data/gp/$chat_id/stats.txt","0");
        save("data/gp/$chat_id/setadd.txt","5");
        save("data/gp/$chat_id/adding.txt","on");
        save("data/gp/$chat_id/chatadding.txt", "$chat_id");
        save("data/gp/$chat_id/mod.txt","$from_id");
        $myfile2 = fopen("data/gp/gpadding.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$chat_id\n");
        fclose($myfile2);
        $po = $numbergp +1;
        save("data/gp/numbergp.txt","$po");
    }
}
if($textmassage == "/stats" && $status != "member"){
    sendAction($chat_id, 'typing' );
        banda('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>" :
 *$stats* ضيف",
 'parse_mode'=>'MarkDown',
 'reply_to_message_id' => $message_id,
        ]);
}
if (strpos($textmassage , "/setadd" ) !== false && $status != "member") {
        $text = str_replace("/setadd ","",$textmassage);
        if ($text <= 20 && $text >= 1){
        save("data/gp/$chat_id/setadd.txt","$text");
        sendAction($chat_id, 'typing' );
        banda('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>" $text العدد	",
            'parse_mode'=>'MarkDown',
            'reply_to_message_id' => $message_id,
        ]);
        }else{banda('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"العدد بين 1 الى 20	",
            'parse_mode'=>'MarkDown',
            'reply_to_message_id' => $message_id,
        ]);}
}
if($textmassage == "/bot off" && $status != "member"){
    save("data/gp/$chat_id/adding.txt","off");
    sendAction($chat_id, 'typing' );
        banda('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"البوت مسجل في المجموعة 	",
            'reply_to_message_id' => $message_id,
        ]);
}
if($textmassage == "/bot on" && $status != "member"){
    save("data/gp/$chat_id/adding.txt","on");
    sendAction($chat_id, 'typing' );
        banda('SendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"البوت شغال 	",
            'reply_to_message_id' => $message_id,
        ]);
}
//-----------------------------------------------------
if($textmassage == "/panel" && $status != "member"){
     banda('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>'الاعدادات',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => " $addings ", 'callback_data' => "bot"],['text' => "وضع البوت ", 'callback_data' => "bot"]
            ],
            [
                ['text' => "$stats ", 'callback_data' => "stats"],['text' => "امتياز البوت ", 'callback_data' => "stats"]
            ],
            [
                ['text' => "الاضافة ؟", 'callback_data' => "ooo"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "اخرى", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
    save("data/gp/$chat_id/mod.txt","$from_id");
}
elseif($data == "bot" && $addings2 == "on" && $fm == "$mods"){
    save("data/gp/$chatid/adding.txt","off");
     banda('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"البوت غير فعال الان ",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => " معطل ", 'callback_data' => "bot"],['text' => "وضع البوت ", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 ", 'callback_data' => "stats"],['text' => "امتيازز البوت ", 'callback_data' => "ii"]
            ],
            [
                ['text' => "الاضافة ؟", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd2", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "اخرى ", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
}
elseif($data == "bot" && $addings2 == "off" && $fm == "$mods"){
    save("data/gp/$chatid/adding.txt","on");
     banda('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"البوت مفعل الان ",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "مفعل", 'callback_data' => "bot"],['text' => "وضع البوت ", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "امتيازز البوت ", 'callback_data' => "ii"]
            ],
            [
                ['text' => "الاضافة ؟", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd2", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "اخرى ", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
}
elseif($data == "-setadd" && $fm == "$mods"){
    $manfi = $setadd2 -1;
    if ($manfi <= 20 && $manfi >= 1){
    save("data/gp/$chatid/setadd.txt","$manfi");
     banda('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"الان العضو
يلا يحجي *$manfi* يضيف",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => " $addings2 ", 'callback_data' => "bot"],['text' => "وضع البوت ", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "امتيازز البوت ", 'callback_data' => "ii"]
            ],
            [
                ['text' => "الاضافة ؟", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$manfi", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "اخرى ", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
    }
}//@b7_78
elseif($data == "+setadd" && $fm == "$mods"){
    $mosbat = $setadd2 +1;
    if ($mosbat <= 20 && $mosbat >= 1){
    save("data/gp/$chatid/setadd.txt","$mosbat");
     banda('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"الاعضاء الجدد سوف يضيفون  *$mosbat*عضو  ",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => " $addings2 ", 'callback_data' => "bot"],['text' => "وضع البوت ", 'callback_data' => "i"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "امتيازز البوت ", 'callback_data' => "ii"]
            ],
            [
                ['text' => "الاضافة ؟", 'callback_data' => "iii"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$mosbat", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "اخرى ", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
    }
}
elseif($data == "helpmods" && $fm == "$mods"){
     banda('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>"الاوامر  :)

▪️/panel ارسل العرض الاعدادات

▪️/stats اعدادات الاضافة

▪️ /setadd 18 امر الضبط الاضافة
بين 1 الى 20

▪️ /bot [on/off] تفعيل و اطفاء البوت ",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "رجوع 👍 ", 'callback_data' => "sittengss"]
            ],
            ]
        ])
    ]);
}
if($textmassage == "/help" && $status != "member"){
    banda('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"الاوامر  :)

▪️/panel ارسل العرض الاعدادات

▪️/stats اعدادات الاضافة

▪️ /setadd 18 امر الضبط الاضافة
بين 1 الى 20

▪️ /bot [on/off] تفعيل و اطفاء البوت
",
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
    ]);
}
elseif($data == "sittengss" && $fm == "$mods"){
     banda('editmessagetext',[
        'chat_id'=>$chatid,
        'message_id'=>$messageid,
        'text'=>'الاوامر الخاصة بك :)',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $messageid,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => " $addings2 ", 'callback_data' => "bot"],['text' => "وضع البوت ", 'callback_data' => "bot"]
            ],
            [
                ['text' => "$stats2 NEW", 'callback_data' => "stats"],['text' => "امتيازز البوت ", 'callback_data' => "stats"]
            ],
            [
                ['text' => "الاضافة ؟", 'callback_data' => "ooo"]
            ],
            [
                ['text' => "➕", 'callback_data' => "+setadd"],['text' => "$setadd2", 'callback_data' => "oooo"],['text' => "➖", 'callback_data' => "-setadd"]
            ],
            [
                ['text' => "اخرى ", 'callback_data' => "helpmods"]
            ],
            ]
        ])
    ]);
}
if($textmassage == "/panel" && $tc == "private" && $from_id == $Dev){
     banda('sendMessage',[
        'chat_id'=>$Dev,
        'text'=>'الاعدادات',
        'parse_mode'=>'MarkDown',
        'reply_to_message_id' => $message_id,
        'reply_markup' => json_encode([
        'resize_keyboard' => true,
        'inline_keyboard' => [
            [
                ['text' => "الشفافة", 'callback_data' => "amars"]
            ],
            [
                ['text' => "رسالة", 'callback_data' => "sendmessages"]
            ],
        ]
        ])
    ]);
}
if (preg_match('/^(.*)([Bb][Oo][Tt])/s',$newchatmemberu) && $newchatmemberu != "$userbot") {
 banda('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>'لا يمكنك ادارة البوت في المجموعة ',
  'parse_mode'=>'MarkDown',
 ]);
 banda('kickChatMember',[
 'chat_id'=>$chat_id,
  'user_id'=>$update->message->new_chat_member->id
  ]);
}
elseif($newchatmemberid != $useradding){
    mkdir("data/gp/$chat_id");
    mkdir("data/gp/$chat_id/$from_id");
    $jam = $youadding +1;
    $james = $stats +1;
    save("data/gp/$chat_id/$from_id/youadding.txt","$jam");
    save("data/gp/$chat_id/$newchatmemberid/youadding.txt","0");
    save("data/gp/$chat_id/stats.txt","$james");
    $jamas = $alladding +1;
    save("data/gp/alladding.txt","$jamas");
}
if($textmassage == "$textmassage" && $status == "member"){
    if($youadding == ""){
        if ($tc == 'group' | $tc == 'supergroup'){
        mkdir("data/gp/$chat_id/$from_id");
    save("data/gp/$chat_id/$from_id/youadding.txt","0");
    save("data/gp/$chat_id/$from_id/youtext.txt","0");
    sendAction($chat_id, 'typing' );
            banda('SendMessage',[
                'chat_id'=>$chat_id,
                'text'=>" $first_name",
                'parse_mode'=>'MarkDown',
            ]);
            banda('deletemessage',[
                'chat_id'=>$chat_id,
		        'message_id'=>$message_id
            ]);
            mkdir("data/gp/$chat_id/$from_id");
            $jams = $youadding +1 ;
            save("data/gp/$chat_id/$from_id/youtext.txt","$jams");
            $osa = $alldelmesage +1;
            save("data/gp/alldelmesage.txt","$osa");
    }
    }
    elseif($addings == "on"){
        if ($tc == 'group' | $tc == 'supergroup'){
            if($youadding != $setadd){
        if($youadding <= $setadd){
           if($youadding == $youtext){
            sendAction($chat_id, 'typing' );
            banda('SendMessage',[
                'chat_id'=>$chat_id,
                'text'=>" $first_name
 *$setadd *لم تضف اشخاص الى المجموعة
الي ضفتهم : *$youadding*

",
                'parse_mode'=>'MarkDown',
            ]);
            banda('deletemessage',[
                'chat_id'=>$chat_id,
		        'message_id'=>$message_id
            ]);
            mkdir("data/gp/$chat_id/$from_id");
            $jamsa = $youadding +1 ;
            save("data/gp/$chat_id/$from_id/youtext.txt","$jamsa");
            $osa1 = $alldelmesage +1;
            save("data/gp/alldelmesage.txt","$osa1");
            }
            if($youadding != $youtext){
                banda('deletemessage',[
                'chat_id'=>$chat_id,
		        'message_id'=>$message_id
            ]);
            $osa2 = $alldelmesage +1;
            save("data/gp/alldelmesage.txt","$osa2");
            }
        }
    }
        }
    }
    unlink("error_log");
}
