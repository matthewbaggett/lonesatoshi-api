<?php

namespace LoneSatoshi\Api;

class Wallets extends Base{

  static public function WalletSummary(){
    $endpoint = "/accounts/%%SESSION%%";
    $data = self::FetchAuthenticated($endpoint);
    return $data['Accounts'];
  }

}