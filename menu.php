<?php
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

<?= nav_item('/index.php', 'Sales'); ?>
<?= nav_item('/blog.php', 'Top management'); ?>
<?= nav_item('/contact.php', 'Sales Ops'); ?>
<?= nav_item('/contact.php', 'Contact'); ?>
