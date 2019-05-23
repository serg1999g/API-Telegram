<?php

include('vendor/autoload.php');
include('TelegramBot.php');

$telegramApi = new TelegramBot();

// Получаем сообщение
$updates = $telegramApi->getUpdates();

$telegramApi->sendMessage($updates[count($updates)-1]->message->chat->id, 'Привет!');
