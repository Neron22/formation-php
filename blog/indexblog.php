<?php

require_once '../class/Post.php';
$pdo = new PDO('sqlite:../data.db', null, null, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;

try {
  if (isset($_POST['name'], $_POST['content'])) {
    $query = $pdo->prepare('INSERT INTO posts (name, content, created_at) VALUES (:name, :content, :created)');
    $query->execute([
      'name' => $_POST['name'],
      'content' => $_POST['content'],
      'created' => time()
    ]);
    header('Location: /blog/editblog.php?id=' . $pdo->lastInsertId());
    exit();
  }
  $query = $pdo->query('SELECT * FROM posts');
  $posts = $query->fetchAll(PDO::FETCH_CLASS, '\App\Post');
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
  <?php if ($error): ?>
    <div class="alert alert-danger"><?=$error?></div>
  <?php else:?>
    <ul>
      <?php foreach($posts as $post): ?>
        <h4><a href="/blog/editblog.php?id=<?= $post->id ?>"><?= htmlentities($post->name) ?></a></h4>
        <p class="small text-muted">Ecrit le <?= $post->created_at->format('d/m/Y à H:i')?></p>
        <p>
          <?= nl2br(htmlentities($post->getExcerpt()))?>
        </p>
      <?php endforeach ?>
    </ul>

    <form action="" method="post" class="width70">
      <div class="form-group">
        <input type="text" class="form-control" name="name" value="">
      </div>
      <div class="form-group">
        <textarea class="form-control" name="content" value=""></textarea>
      </div>
      <button class="btn btn-primary">Enregistrer</button>
    </form>
  <?php endif ?>
</div>

<?php require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'elements' . DIRECTORY_SEPARATOR . 'footer.php';?>
