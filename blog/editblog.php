<?php
$pdo = new PDO('sqlite:../data.db', null, null, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$success = null;
try {
  if (isset($_POST['name'], $_POST['content'])) {
    $query = $pdo->prepare('UPDATE posts SET name = :name, content = :content WHERE id = :id');
    $query->execute([
      'name' => $_POST['name'],
      'content' => $_POST['content'],
      'id' => $_GET['id']
    ]);
    $success = 'Votre article a bien été modifié !';
  }
  $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
  $query->execute([
    'id' => $_GET['id']
  ]);
  $post = $query->fetch();
} catch (PDOException $e) {
  $error = $e->getMessage();
}

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'header.php'
?>

<div class="container">
  <div class="hero-title-section">
    <div class="white-circle">
      <div class="smiley-rose"></div>
    </div>
  </div>
</div>
<p>
  <a href="/blog/indexblog.php">Revenir à mes articles</a>
</p>
<?php if ($success): ?>
  <div class="alert alert-success width70">
    <?= $success ?>
  </div>
<?php endif ?>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?=$error?></div>
  <?php else:?>
    <form action="" method="post" class="width70">
      <div class="form-group">
        <input type="text" class="form-control" name="name" value="<?= htmlentities($post->name) ?>">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="content" value=""><?= htmlentities($post->content) ?></textarea>
      </div>
      <button class="btn btn-primary">Enregistrer</button>
      </form>
  <?php endif ?>
</div>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php';?>