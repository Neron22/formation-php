<?php


/**
 * Gère l'API d'Open Weather
 *
 * @author valentin valtest.com
 */
class OpenWeather {

  private $apiKey;

  public function __construct (string $apiKey)
  {
    $this->apiKey = $apiKey;
  }

  /**
 * Récupère les informations météorologique du jour
 *
 * @param string $city Ville (ex:'Trébeurden')
 *
 * @param string $city country (ex:'fr')
 *
 * @return array
 */

  public function getForecast ($city, $country)
  {
    try {
      $curl = curl_init('https://api.openweathermap.org/data/2.5/weather?q=' . $city . ',' . $country . '&appid=' . $this->apiKey . '&units=metric&lang=fr');
      curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER  => true,
        CURLOPT_TIMEOUT         => 1,
      ]);
      $data = curl_exec($curl);
      if ($data === false) {
        $error = curl_error($curl);
        throw new Exception($error);
      }
    } catch (Exception $e) {
        die($e->getMessage());
        return [];
    }
    if (curl_getinfo($curl, CURLINFO_HTTP_CODE !== 200)) {
      throw new Exception($data);
    }
    if (curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200) {
      $results = [];
      $datas = json_decode($data, true);
      $results = [
        'temp' => $datas['main']['temp'] . '°C',
        'description' => $datas['weather'][0]['description'],
        'date' => new DateTime('@' . $datas['dt'])
      ];
      curl_close($curl);
      return $results;
    }

  }
}
