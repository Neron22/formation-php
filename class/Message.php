<?php
class Message {

  const LIMIT_USERNAME = 3;
  const LIMIT_MESSAGE = 10;
  public $username;
  public $message;
  public $date;
  public $file;

  public static function fromJSON(string $json): Message
  {
    $data = json_decode($json, true);
    return new self($data['username'],$data['message'],new DateTime("@" . $data['date']));
  }


  public function __construct(string $username, string $message, $date = null)
  {
    $this->username = $username;
    $this->message = $message;
    $this->date = $date ?: new DateTime();
  }

  public function isValid (): bool
  {
    return empty($this->getErrors());
  }

  public function getErrors (): array
  {
    $errors = [];
    if (strlen($this->username) < self::LIMIT_USERNAME) {
      $errors['username'] = 'Le nom doit comporter au moins 3 caractères';
    }
    if (strlen($this->message) < self::LIMIT_MESSAGE) {
      $errors['message'] = "Le message doit comporter au moins 10 caractères";
    }
    return $errors;
  }

  public function toHTML (): string
  {
    $username = htmlentities($this->username);
    $this->date->setTimeZone(new DateTimeZone('Europe/Paris'));
    $date = $this->date->format('d/m/Y à H:i');
    $message = nl2br(htmlentities($this->message));
    return <<<HTML
  <p class="ml-3">
    <strong>{$username}</strong> <em>le {$date}</em><br>
    {$message}
  </p>
HTML;
  }

  public function toJSON ()
  {
    return json_encode([
      'username' => $this->username,
      'message' => $this->message,
      'date' => $this->date->getTimestamp()
    ]);
  }

}
