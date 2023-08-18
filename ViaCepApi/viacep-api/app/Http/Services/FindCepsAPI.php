<?php

namespace App\Http\Services;

class FindCepsAPI
{
  public static function findCEPs($ceps)
  {
    $cepInfos = array();

    if (collect($ceps)->count() == 1) {
      $url = "https://viacep.com.br/ws/$ceps[0]/json/";
      $cepInfos[] = self::getCepInfos($url);

      return $cepInfos;
    } else {
      foreach ($ceps as $cep) {
        $url = "https://viacep.com.br/ws/$cep/json/";
        $cepInfos[] = self::getCepInfos($url);
      }
      return $cepInfos;
    }
  }

  protected static function getCepInfos($url)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_TIMEOUT => 30000,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_SSL_VERIFYPEER => FALSE,
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'User-Agent: Test laravel'
      ),
    ));

    return (object) json_decode(curl_exec($curl));
  }
}
