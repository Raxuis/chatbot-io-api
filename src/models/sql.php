<?php

namespace App\Models;
use \PDO;

class sql {

  protected object $db;
  public string $host;

  public function __construct(array $config) {
    $this->host = 'mysql:host='.$config['host'].';port='.$config['port'].';dbname='.$config['dbname'].';charset=utf8';
    
    $this->db = new PDO($this->host, $config['user'], $config['password']);

    $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}
