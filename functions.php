<?php

function repondre_oui_non(string $question): bool {
  while (true) {
    $result = readline("$question (o/n): ");
    if ($result === "o") {
      return true;
    } elseif ($result === "n") {
      return false;
    }
    echo "veuillez sélectionner 'o' ou 'n'\n";
  }
}

function demander_creneau(?string $phrase = 'Veuillez entrer un creneau'): array {
  echo $phrase . "\n";
  while (true) {
    $ouverture = (int)readline('heure d\'ouverture :');
    if ($ouverture >= 0 && $ouverture <= 23) {
      break;
    }
  }
  while (true) {
    $fermeture = (int)readline('heure de fermeture :');
    if ($fermeture >= 0 && $fermeture <= 23 && $fermeture > $ouverture) {
      break;
    }
  }

  return [$ouverture, $fermeture];
}

$horaire = [];

function demander_creneaux(?string $phrase = 'Veuillez entrer vos creneaux'): array {
  $horaire[] = demander_creneau($phrase);
  while (true) {
    if (repondre_oui_non("voulez-vous rentrer un nouveau créneau?")) {
      $horaire[] = demander_creneau($phrase);
    } else {
      return $horaire;
    }
  }
  return $horaire;
}

function checkbox(string $name, string $value, array $data)
{
  $attributes = '';
  if (isset($data[$name]) && in_array($value, $data[$name])) {
    $attributes .= 'checked';
  }
  return <<<HTML
  <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}

function radio(string $name, string $value, array $data)
{
  $attributes = '';
  if (isset($data[$name]) && $value === $data[$name]) {
    $attributes .= 'checked';
  }
  return <<<HTML
  <input type="radio" name="{$name}" value="$value" $attributes>
HTML;
}

function select(string $name, $value, array $options): string {
  $html_options = [];
  foreach ($options as $k => $option) {
    $attributes = $k == $value ? 'selected' : '';
    $html_options[] = "<option value='$k' $attributes>$option</option>";
  }
  return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';
}

function dump ($variable) {
  echo '<pre>';
  var_dump($variable);
  echo '</pre>';
}


function creneaux_html (array $creneaux) {
  if (empty($creneaux)) {
    return "Fermé";
  }
  $phrases = [];
  foreach ($creneaux as $creneau) {
    $phrases[]= "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
  }
  return 'Ouvert ' . implode(' et ', $phrases);
}

function in_creneaux(int $heure, array $creneaux): bool {
  foreach ($creneaux as $creneau) {
    $debut = $creneau[0];
    $fin = $creneau[1];
    if ($heure >= $debut && $heure < $fin) {
      return true;
    }
  }
  return false;
}
