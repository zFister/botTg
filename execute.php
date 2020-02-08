<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

$vars = file_get_contents('storage.json');
$vars = json_decode($vars, true);



if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";

$response = '';

if(isset($message['text'])
&& $message['text'] == 'leccata'
|| $message ['text'] == 'Leccata'
|| $message ['text'] == 'LECCATA'
|| $message ['text'] == 'lecchino'
|| $message ['text'] == 'Lecchino'
|| $message ['text'] == 'LECCHINO'
|| $message ['text'] == 'lecchina'
|| $message ['text'] == 'Lecchina'
|| $message ['text'] == 'LECCHINA'
|| $message ['text'] == 'lekkino'
|| $message ['text'] == 'LEKKINO'
|| $message ['text'] == 'Lekkino'
|| $message ['text'] == 'lekkina'
|| $message ['text'] == 'LEKKINA'
|| $message ['text'] == 'Lekkina'
|| $message ['text'] == 'leccando'
|| $message ['text'] == 'Leccando'
|| $message ['text'] == 'LECCANDO'
|| $message ['text'] == 'leccare'
|| $message ['text'] == 'Leccare'
|| $message ['text'] == 'LECCARE'
|| $message ['text'] == 'lecco'
|| $message ['text'] == 'Lecco'
|| $message ['text'] == 'LECCO'
|| $message ['text'] == 'Lecca'
|| $message ['text'] == 'lecca'
|| $message ['text'] == 'LECCA'
)
{

    $vars['n']++;
	$response = "Hai leccato " . $vars['n'] . " volte!";
	$json = json_encode($vars);
    file_put_contents('storage.json', $json);
}

elseif(isset($message['text']) && $message['text'] == 'memavide' || $message['text'] == 'Memavide' || $message['text'] == 'MEMAVIDE') {
	
$response = "memavide lecchino memavide tumore";
	
}

elseif(isset($message['text']) && $message['text'] == 'chapo' || $message['text'] == 'Chapo' || $message['text'] == 'CHAPO') {
	
$response = "Hai detto Stiven???";
	
}

else
{
}


header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);


