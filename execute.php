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
$array_leccato['indice'] = 0;
if(isset($message['text']) && $message['text'] == 'leccata' || $message ['text'] == 'Leccata' || $message ['text'] == 'LECCATA')
{
    $array_leccato['indice']++;
	$response = "Hai leccato " . $array_leccato['indice'] . " volte!";
}
else
{
	$response = "Ho ricevuto un messaggio ?";
}
header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);
