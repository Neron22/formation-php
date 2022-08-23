<?php
require_once "functions/auth.php";
forcer_utilisateur_connecte();
require_once "functions/compteur.php";
$title = "Dashboard";
$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_selection && $mois_selection) {
  $total = nombre_vues_mois($annee_selection, $mois_selection);
  $detail = nombre_vues_detail_mois($annee_selection, $mois_selection);
} else {
  $total = nombre_vue();
}
$mois = [
  '01' => 'Janvier',
  '02' => 'Fevrier',
  '03' => 'Mars',
  '04' => 'Avril',
  '05' => 'Mai',
  '06' => 'Juin',
  '07' => 'Juillet',
  '08' => 'Aout',
  '09' => 'Septembre',
  '10' => 'Octobre',
  '11' => 'Novembre',
  '12' => 'Décembre'
];
require './elements/header.php';
require_once './data/config.php';
require_once 'functions.php';
?>
<div class="container">
  <div class="hero-title-section">
    <div class="white-circle">
      <div class="smiley-rose">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <h2>Bienvenue sur votre dashboard !</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ducimus nemo at facere mollitia, quibusdam magnam ratione omnis dicta magni eum est tempora atque impedit nam quia cumque! Beatae, minima?</p>
    </div>
    <div class="col-md-4 center">
        <h1>Hello John !</h1>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-4">
      <div class="list-group">
        <?php for ($i = 0; $i < 5; $i++): ?>
          <a href="dashboard.php?annee=<?=$annee - $i?>" class="list-group-item <?= $annee - $i === $annee_selection ? 'active' : ''; ?>"><?=$annee - $i?></a>
          <?php if ($annee - $i === $annee_selection): ?>
            <div class="div list-group">
              <?php foreach ($mois as $numero => $nom): ?>
                <a href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $numero ?>" class="list-group-item <?= $numero === $mois_selection ? 'active' : ''; ?>">
                  <?= $nom ?>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif ?>
        <?php endfor ?>
      </div>
    </div>
    <div class="col-lg-6 ml-5">
      <div class="card mb-5">
        <div class="card-body">
          <strong style="font-size:3em"><?= $total?></strong> </br>
          Visite<?= $total > 1 ? 's' : '' ?> total
        </div>
      </div>
      <?php if (isset($detail)): ?>
        <h2>Détails des visites pour le mois</h2>
        <table class= "table table-stripe">
          <thead>
            <tr>
              <th>jour</th>
              <th>Nombre de visites</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($detail as $ligne): ?>
            <tr>
              <td><?= $ligne['jour']?></td>
              <td><?= $ligne['visites']?> visite<?= $ligne['visites'] > 1 ? 's' : ''?></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <?php endif ?>
    </div>
  </div>
</div>
