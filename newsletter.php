<?php
$error = null;
$success = null;
$email = "";
if (!empty($_POST['email'])) {
  $email = $_POST['email'];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date("Y-m-d") . '.txt';
    file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
    $success = "Votre inscription est validée.";
    $email = null;
  } else {
    $error = "Cet email n'est pas valide.";
  };
}
$title = "Newsletter";
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
      <h2>Rejoignez notre newsletter !</h2>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo ducimus nemo at facere mollitia, quibusdam magnam ratione omnis dicta magni eum est tempora atque impedit nam quia cumque! Beatae, minima?</p>
      <img src="./assets/images/Bertagne.png" alt="">
    </div>
    <div class="col-md-4 center">
      <h2>S'inscrire à la newsletter</h2>
      <form action="/newsletter.php" method="post">
        <div class="form-group">
          <input class="form-control" type="email" name="email" placeholder="Entrez votre email" required>
          <?php if ($error): ?>
            <div class="text-danger">
              <?= $error ?>
            </div>
          <?php endif ?>
          <?php if ($success): ?>
            <div class="text-success">
              <?= $success ?>
            </div>
          <?php endif ?>
        </div>
        <button class="btn btn-primary" type="submit">S'inscrire</button>
      </form>
    </div>
  </div>
</div>


<?php require './elements/footer.php' ?>
