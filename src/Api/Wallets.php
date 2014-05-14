<?php

namespace LoneSatoshi\Api;

class Wallets extends Base{

  static public function WalletSummary(){
    $endpoint = "/wallets/%%SESSION%%";

    self::Fetch($endpoint);
  }


}