<?php

$creneaux = [];

while (true) {
  $debut = (int)readline('Entrez l\'heure d\'ouverture: ');
  $fin = (int)readline('Entrez l\'heure de fermeture: ');
  if ($debut >= $fin) {
    echo "Le créneau ne peut être enregistré car l'heure d'ouvertur ($debut) est supérieure à l'heure de fermeture ($fin)";
  } else {
    $creneaux[] = [$debut, $fin];
    $action = readline('Entrez un nouveau creneau? (n)');
    if ($action === 'n') {
      break;
    }
  }
}
echo 'Le magasin sera ouvert de';
foreach ($creneaux as $k => $creneau) {
   if ($k >0) {
    echo ' et de';
   }
   echo ' ' . $creneau[0] . 'h à ' . $creneau[1] . 'h';
}

// print_r($creneaux);

// $heure = (int)readline('Entrez une horaire');

// $creneauTrouve = false;

// foreach($creneaux as $creneau) {
//   if ($heure >= $creneau[0] && $heure <= $creneau[1]) {
//     $creneauTrouve = true;
//     break;
//   }
// }

// if ($creneauTrouve) {
//   echo 'le magaisin sera ouvert.';
// } else {
//   echo 'Deso, c\'est fermé';
// }


// $notes = [];
// $action = null;

// while ($action !== 'fin') {
//   $action = readline('Entrez votre note : (ou fin pour sortir)');
//   if ($action !== 'fin') {
//     $notes[] = (int)$action;
//   }
// }

// foreach ($notes as $note) {
//   echo "- $note\n";
// }


// if (in_array("fin", $notes)) {
//   foreach ($notes as $note) {
//     echo "- $note\n";
//   }
// }

// $eleves = [
//   'cm2' => ['jean', 'Marc', 'Jane', 'Marion'],
//   'cm1' => ['Emilie', 'Marcelin']
// ];

// foreach ($eleves as $classe => $listEleves) {
//   echo "La classe $classe:\n";
//   foreach ($listEleves as $eleve) {
//     echo "- $eleve\n";
//   }
//   echo "\n";
// }
