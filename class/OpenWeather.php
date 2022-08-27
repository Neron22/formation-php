<?php

class OpenWeather {

  private $apiKey;

  public function __construct (string $apiKey)
  {
    $this->apiKey = $apiKey;
  }

  public function getForecast ($city, $country)
  {
    $curl = curl_init('https://api.openweathermap.org/data/2.5/weather?q=' . $city . ',' . $country . '&appid=' . $this->apiKey . '&units=metric&lang=fr');
    curl_setopt_array($curl, [
      CURLOPT_RETURNTRANSFER  => true,
      CURLOPT_TIMEOUT         => 1,
    ]);
    $data = curl_exec($curl);
    if ($data === false || curl_getinfo($curl, CURLINFO_HTTP_CODE !== 200)) {
      return null;
    }
    if (curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200) {
      $results = [];
      $datas = json_decode($data, true);
      $results = [
        'temp' => $datas['main']['temp'] . '°C',
        'description' => $datas['weather'][0]['description'],
        'date' => new DateTime('@' . $datas['dt'])
      ];
      return $results;
    }

    curl_close($curl);
  }
}
