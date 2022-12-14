<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR .'auth.php';
if (!function_exists('nav_item')) {
  function nav_item (string $lien, string $titre): string {
    $classe = 'nav-link';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
      $classe .= ' active';
    }
    return <<<HTML
    <li class = "nav-item">
      <a class="$classe" href="$lien">$titre</a>
    </li>
    HTML;
  }
}
?>

<?= nav_item('/index.php', 'Accueil'); ?>
<?= nav_item('/blog/indexblog.php', 'Blog'); ?>
<?= nav_item('/menu.php', 'Menu'); ?>
<?= nav_item('/contact.php', 'Contact'); ?>
<?= nav_item('/newsletter.php', 'Newsletter'); ?>
<?= nav_item('/nsfw.php', 'Nsfw'); ?>
<?= nav_item('/guestbook.php', 'Guestbook'); ?>
<?php if (est_connecte()): ?>
  <?= nav_item('/dashboard.php', 'Dashboard'); ?>
<?php endif?>
