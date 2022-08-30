<?php

use Neron22\Guestbook\GuestBook;
use Neron22\Guestbook\Message;

require 'elements/header.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Message.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'GuestBook.php';
$errors = null;
$success = false;
$guestbook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');
if (!empty($_POST['username']) && !empty($_POST['message'])) {
  $message = new Message($_POST['username'], $_POST['message']);
  if ($message->isValid()) {
    $guestbook->addMessage($message);
    $success = true;
    $_POST = [];
  } else {
    $errors = $message->getErrors();
  }
  $message->toJSON();
}
$messages = $guestbook->getMessages();
?>
<div class="container">
  <div class="hero-title-section">
    <div class="white-circle">
      <div class="smiley-rose"></div>
    </div>
  </div>
  <h2 class="col-lg-8"> Livre d'or</h2>
  <form action="/guestbook.php" method="post" class="col-lg-8">
    <div class="form-group">
      <input class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" type="text" name="username" value="<?= htmlentities($_POST['username'] ?? '') ?>"placeholder="Entrez votre nom" required>
      <?php if (isset($errors['username'])): ?>
        <div class="invalid-feedback"><?= $errors['username']?></div>
      <?php endif ?>
      <textarea class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?> mt-1" type="text" name="message" placeholder="Entrez votre message" required><?= htmlentities($_POST['message'] ?? '') ?></textarea>
      <?php if (isset($errors['message'])): ?>
        <div class="invalid-feedback"><?= $errors['message']?></div>
      <?php endif ?>
    </div>
    <button class="btn btn-primary" type="submit">Envoyer !</button>
    <?php if ($success): ?>
      <div class="text-success">Merci pour votre message</div>
    <?php endif ?>
  </form>
  <?php if (!empty($messages)): ?>
    <h2 class="col-lg-8"> Vos messages: </h2>
    <?php foreach ($messages as $message): ?>
      <?= $message->toHTML() ?>
    <?php endforeach?>
  <?php endif?>
  </div>
<?php
require 'elements/footer.php';
?>
