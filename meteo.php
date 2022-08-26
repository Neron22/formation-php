<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($curl);
if ($data === false) {
  var_dump(curl_error($curl));
} else {
  $data = json_decode($data, true);
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
}
curl_close($curl);
