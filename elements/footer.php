  </main>
      <div class="row m-5 pt-5">
        <div class="col-lg-4">
          <h5 class="mt-5 ml-5">Navigation</h5>
          <a class="mt-5 ml-5" href="http://localhost:8000/">Accueil</a>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          <?php
          require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR . 'compteur.php';
          ajouter_vue();
          $vues = nombre_vue();
          ?>
          Il y a eu <?= $vues ?> visite<?php if ($vues > 1): ?>s<?php endif ?> sur le site.
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
