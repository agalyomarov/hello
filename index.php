<?php

ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.log');
ini_set("max_execution_time", "900");
require "vendor/autoload.php";
$client = new GuzzleHttp\Client();
try {
   $request = file_get_contents('php://input');
   file_put_contents('request.json', $request);
   $content = json_decode($request, true);
   if (isset($content['message']['new_chat_member'])) {
      $response = $client->get('https://api.telegram.org/bot5431332526:AAF8-3Nn7zsprkVJc7G508uivT7OMovn6aA/sendMessage', [
         "form_params" => [
            "chat_id" => "-1001774487256",
            "text" => 'Hi ' . $content['message']['new_chat_member']['first_name'] . ' ' . $content['message']['new_chat_member']['last_name']
         ]
      ]);
      echo $response->getBody()->getContents();
   }
} catch (\Exception $e) {
   echo $e->getMessage();
}
