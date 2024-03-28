<?php

namespace App\Models;

use App\Models\sql;

class UserModel extends sql {

  protected object $db;

  public function __construct(array $config) {
    parent::__construct($config);
  }

  public function createUser(array $data): void
  {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

    $query = 'INSERT INTO users (email, password) VALUES (:email, :password)';
    $request = $this->db->prepare($query);
    $request->execute([
      'email' => $data['email'],
      'password' => $data['password']
    ]);
  }

}
