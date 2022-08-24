<?php
// require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Creneau.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Form.php';
echo Form::checkbox('demo', Form::$class, []);




// $creneau = new Creneau(10, 12);
// $creneau2 = new Creneau(15, 16);
// var_dump($creneau->intersect($creneau2));

// echo $creneau->toHTML();








// $date = new DateTime('2022-01-01');
// $interval = new DateInterval('P2M16DT1H46M');
// $date->add($interval);
// var_dump($date);
// $date = '2014-01-01';
// $date2 = '2019-04-01';

// $d = new DateTime($date);
// $d2 = new DateTime($date2);
// $diff = $d->diff($d2, true);
// echo "Il y a {$diff->y} années, {$diff->m} mois er {$diff->d} jours de différence,";

// echo "\n";

// $time = strtotime($date);
// $time2 = strtotime($date2);
// $days = floor(abs(($time - $time2) / (24 * 60 * 60)));
// echo "Il y a $days jours d'écart.";
