<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);


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
$n = 0;
$n++;
if(isset($message['text'])
&& $message['text'] == 'leccata'
|| $message ['text'] == 'Leccata'
|| $message ['text'] == 'LECCATA'
|| $message ['text'] == 'leccata'
|| $message ['text'] == 'Leccata'
|| $message ['text'] == 'leccatina'
|| $message ['text'] == 'Leccatina'
|| $message ['text'] == 'lecchino'
|| $message ['text'] == 'Lecchino'
|| $message ['text'] == 'lecchina'
|| $message ['text'] == 'Lecchina'
|| $message ['text'] == 'LECCHINO'
|| $message ['text'] == 'LECCHINA'
|| $message ['text'] == 'LECCATINA'
|| $message ['text'] == 'LEKKINO'
|| $message ['text'] == 'Lekkino'
|| $message ['text'] == 'lekkino')
{
	$response = "Hai leccato";
}
else
{
$response = "rabocc muori diocane";
}

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
