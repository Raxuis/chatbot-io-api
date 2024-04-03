<?php

namespace App\Models;

use \PDO;

class SqlConnect
{
  public object $db;
  private string $host;
  private string $port;
  private string $dbname;
  private string $password;
  private string $user;

  public function __construct()
  {
    $this->host = '127.0.0.1';
    $this->port = '8889';
    $this->dbname = 'chatbot_io';
    $this->user = 'root';
    $this->password = 'root';

    $this->db = new PDO(
      'mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . ';charset=utf8mb4',
      $this->user,
      $this->password
    );

    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_PERSISTENT, false);
  }

  public function transformDataInDot($data)
  {
    $dataFormatted = [];

    foreach ($data as $key => $value) {
      $dataFormatted[':' . $key] = $value;
    }

    return $dataFormatted;
  }
}
