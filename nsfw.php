<?php
$age = null;

if (!empty($_POST['birthday'])) {
  setcookie('birthday', $_POST['birthday']);
  $_COOKIE['birthday'] = $_POST['birthday'];
}

if (!empty($_COOKIE['birthday'])) {
  $birthday = (int)$_COOKIE['birthday'];
  $age = (int)date('Y') - $birthday;
}

$title = "NSFW";
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
    <?php if ($age >= 18): ?>
      <div class="text-success">
        <h1>Du contenu réservé aux adultes</h1>
      </div>
      <div class="col-md-6">
        <h2>Bienvenue sur votre page de profil !</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ducimus nemo at facere mollitia, quibusdam magnam ratione omnis dicta magni eum est tempora atque impedit nam quia cumque! Beatae, minima?</p>
      </div>
      <?php elseif ($age !== null): ?>
        <div class="alert alert-danger">Vous n'avez pas l'âge requis pour voir le contenu</div>
      <?php else: ?>
        <div class="col-md-4 center">
          <form action="" method="post" class= form-group>
            <label for="birthday">Section reservée pour les adultes, entrez votre année de naissance :</label>
            <select name="birthday" id="birthday" class="form-control">
              <?php for ($i = 2010; $i > 1919; $i--): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
              <?php endfor ?>
            </select>
            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>


<?php require './elements/footer.php' ?>
