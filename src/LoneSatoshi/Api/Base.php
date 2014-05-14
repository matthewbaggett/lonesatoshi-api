<?php

namespace LoneSatoshi\Api;

class Base{
  static protected $_client;
  static protected $_session;

  static public function Startup($api_key){
    if(!self::$_client){
      self::$_client = new \Guzzle\Http\Client('http://api.lonesatoshi.com');
      $auth_response = self::Fetch("auth/{$api_key}");
      if($auth_response['Status'] !== 'OKAY'){
        throw new \Exception("Cannot Auth. Bad API key?");
      }
      self::$_session = $auth_response['Session']['session_key'];
    }
  }

  static public function FetchAuthenticated($endpoint){
    $endpoint = str_replace("%%SESSION%%", self::$_session, $endpoint);
    return self::Fetch($endpoint);
  }

  static public function Fetch($endpoint){
    $request = self::$_client->get($endpoint);
    $response = $request->send();
    /* @var $response \Guzzle\Http\Message\Response */
    return $response->json();
  }


}