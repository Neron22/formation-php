<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR .'auth.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">

    <title><?php echo (isset($title)) ? $title : "Mon site";?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/starter-template/">



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/components/index.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>

      </head>
      <body>

    <nav class="navbar navbar-expand-md mb-5">
      <a class="navbar-brand" href="/index.php"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <div class="navbar-logo">
          <img src= "../assets/images/logoipsum-239.svg" alt="logo ipsum">
          <div class="navbar-logo2">
            Blog
          </div>
          <div class="navbar-logo-arrow">
            <img src="../assets/images/arrow.png" class="navbar-logo-arrow" alt="">
          </div>
        </div>
        <ul class="navbar-nav">
          <?php require __DIR__ . DIRECTORY_SEPARATOR . 'menu.php'; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <?php if(est_connecte()):?>
            <a href= "/logout.php" class="nav-item nav-link my-2 my-sm-0" >Se déconnecter</a>
          <?php else:?>
            <a href= "/login.php" class="btn btn-primary my-2 my-sm-0" >Se connecter</a>
          <?php endif?>
        </form>
      </div>
    </nav>

    <main role="main" class="container">
