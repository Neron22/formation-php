<?php
$notes = [];
$action = null;

while ($action !== 'fin') {
  $action = readline('Entrez votre note : (ou fin pour sortir)');
  if ($action !== 'fin') {
    $notes[] = (int)$action;
  }
}

foreach ($notes as $note) {
  echo "- $note\n";
}


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
