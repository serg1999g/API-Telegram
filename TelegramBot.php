<?php

use GuzzleHttp\Client;

class TelegramBot
{
    protected $token = "857000324:AAED8gv1jOXdt5YR4PsdjBjUMeRFC7PtQU4";

    protected $updateId;

    protected function query($method, $params = [])
    {
        $url = "https://api.telegram.org/bot";

        $url .= $this->token;

        $url .= "/" . $method;

        if (!empty($params)) {
            $url .= "?" . http_build_query($params);
        }

        $client = new Client([
            'base_uri' => $url
        ]);

        $result = $client->request('GET');

        return json_decode($result->getBody());
    }

    public function getUpdates()
    {
        $response = $this->query('getUpdates', [
            'offset' => $this->updateId + 1
        ]);

        if (!empty($response->result)) {
            print_r($response->result[count($response->result) - 1]->update_id);
            $this->updateId = $response->result[count($response->result) - 1]->update_id;
        }

        return $response->result;
    }

    public function sendMessage($chat_id, $text)
    {
        $response = $this->query('sendMessage', [
            'text' => $text,
            'chat_id' => $chat_id
        ]);
        return $response;
    }
}
