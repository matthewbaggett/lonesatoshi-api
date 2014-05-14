<?php

namespace LoneSatoshi\Api;

class Base{
  static protected $_client;

  public function __construct(){
    self::$_client = new \Guzzle\Http\Client('http://api.lonesatoshi.com');
  }

  public function FetchAuthenticated($endpoint){
    $session_id = self::GetSessionID();
    $endpoint = str_replace("%%SESSION%%", $session_id, $endpoint);
    return self::Fetch($endpoint);
  }

  static public function Fetch($endpoint){
    $request = self::$_client->get($endpoint);
    $response = $request->send();
    $data = $response->json();

    var_dump($data);exit;
  }


}