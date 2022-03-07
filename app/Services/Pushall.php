<?php

namespace App\Services;

class Pushall
{
    private $key;
    private $id;

    protected $url = 'https://pushall.ru/api.php';

    public function __construct($key, $id)
    {
        $this->key = $key;
        $this->id = $id;
    }

    public function send($title, $text)
    {
        $data = [
            'type' => 'self',
            'id' => $this->id,
            'key' => $this->key,
            'text' => $text,
            'title' => $title,
        ];

        curl_setopt_array($ch = curl_init(), [
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true,
        ]);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
