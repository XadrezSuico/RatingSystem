<?php

namespace App\Http\Util;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Util
{
  public static function IsIPInternal(){
    if(
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.1.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.1.255")) &&
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.2.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.2.255")) &&
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.3.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.3.255")) &&
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.4.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.4.255")) &&
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.5.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.5.255")) &&
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.6.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.6.255")) &&
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.7.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.7.255")) &&
      !(ip2long(getenv("HTTP_X_FORWARDED_FOR")) > ip2long("192.168.8.0") && ip2long(getenv("HTTP_X_FORWARDED_FOR")) < ip2long("192.168.8.255"))
    ){
      return false;
    }else{
      return true;
    }
  }
  public static function theIP(){
    return getenv("HTTP_X_FORWARDED_FOR");
  }

  public static function appAddress(){
    if(Util::IsIPInternal()){
      return env("APP_URL_LOCAL");
    }
      return env("APP_URL");
  }

  public static function CPFNumbers($cpf = ''){
    if(strlen($cpf) == 11){
      return $cpf;
    }else{
      $part1 = explode("-", $cpf);
      if(count($part1) == 2){
        $part2 = explode(".", $part1[0]);
        if(count($part2) == 3){
          $cpfNumbers = implode("",$part2) . $part1[1];
          return $cpfNumbers;
        }else{
          return false;
        }
      }else{
        return false;
      }
    }
  }

  public static function CEPNumbers($cep = ''){
    if(strlen($cep) == 8){
      return $cep;
    }else{
      if(strlen($cep) == 9){
        $cepParts = implode("",explode("-", $cep));
        return $cepParts;
      }else{
        return false;
      }
    }
  }

  public static function PhoneNumbers($phone, $thePhone = false){
    $Phone = explode(" ", $phone);
    if($thePhone){
      $return = implode("", explode("-", $Phone[1]));
    }else{
      $ddd = explode("(", $Phone[0]);
      $return = explode(")", $ddd[1])[0];
    }
    return $return;
  }
}
