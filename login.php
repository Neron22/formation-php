<?php
$erreur = null;
$pseudo = null;
$password = '$2y$12$fc.hw/v1w3AZpgxrm.HZFuEgtyn3WR5QTZKR2lKxuJzRWe/11Q12a';
if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
  if (($_POST['pseudo'] === 'John') && password_verify($_POST['motdepasse'], $password)) {
    $pseudo = 'John Doe';
    session_start();
    $_SESSION['connecte'] = 1;
    header('Location: /dashboard.php');
    exit();
  }else {
    $erreur = "Identifiants incorrects !";
  }
}

require_once 'functions/auth.php';
if (est_connecte()) {
  header('Location: /dashboard.php');
  exit();
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
      <?php if ($pseudo): ?>
        <h1>Hello <?= htmlentities($pseudo) ?></h1>
        <a href="login.php?action=deconnecter">Se déconnecter</a>
      <?php else: ?>
        <h2>Je me connecte !</h2>
        <form action="/login.php" method="post">
          <div class="form-group">
            <input class="form-control" type="text" name="pseudo" placeholder="Entrez votre pseudo" required>
            <input class="form-control mt-1" type="password" name="motdepasse" placeholder="Entrez votre mot de passe" required>
            <?php if ($erreur): ?>
              <div class="text-danger"><?= $erreur ?></div>
            <?php endif ?>
          </div>
          <button class="btn btn-primary" type="submit">Se connecter !</button>
        </form>
      <?php endif ?>
    </div>
  </div>
</div>


<?php require './elements/footer.php' ?>
