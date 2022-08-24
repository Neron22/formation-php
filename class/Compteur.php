<?php
class Compteur {

  const INCREMENT = 1;
  protected $fichier;
  // protected $fichier_journalier;
  protected $compteur;


  public function __construct(string $fichier)
  {
    $this->fichier = $fichier;
    // $this->fichier_journalier = $fichier . '-' . date ('Y-m-d');
  }

  public function incrementer() {
    $this->compteur = 1;
    if (file_exists($this->fichier)) {
      $this->compteur = file_get_contents($this->fichier);
      $this->compteur += static::INCREMENT;
    }
    file_put_contents($this->fichier, $this->compteur);
  }

  public function recuperer(): int {
    if (!file_exists($this->fichier)) {
      return 0;
    }
    return file_get_contents($this->fichier);
  }
}
