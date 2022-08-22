<?php
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter'){
  unset($_COOKIE['utilisateur']);
  setcookie('utilisateur', "", time() -10);
}
if (!empty($_COOKIE['utilisateur'])) {
  $nom = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])) {
  setcookie('utilisateur', $_POST['nom']);
  $nom = $_POST ['nom'];
}
$title = "Profil";
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
      <h2>Bienvenue sur votre page de profil !</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ducimus nemo at facere mollitia, quibusdam magnam ratione omnis dicta magni eum est tempora atque impedit nam quia cumque! Beatae, minima?</p>
    </div>
    <div class="col-md-4 center">
      <?php if ($nom): ?>
        <h1>Hello <?= htmlentities($nom) ?></h1>
        <a href="profil.php?action=deconnecter">Se déconnecter</a>
      <?php else: ?>
        <h2>Je me connecte !</h2>
        <form action="/profil.php" method="post">
          <div class="form-group">
            <input class="form-control" type="string" name="nom" placeholder="Entrez votre nom" required>
            <!-- <?php if ($error): ?>
              <div class="text-danger">
                <?= $error ?>
              </div>
            <?php endif ?>
            <?php if ($success): ?>
              <div class="text-success">
                <?= $success ?>
              </div>
            <?php endif ?> -->
          </div>
          <button class="btn btn-primary" type="submit">Let's go !</button>
        </form>
      <?php endif ?>
    </div>
  </div>
</div>


<?php require './elements/footer.php' ?>
