<?php

namespace App\Models;

use \PDO;
use stdClass;

class UserModel extends SqlConnect
{
  public function add(array $data): void
  {
    $query = "INSERT INTO users (name, avatar) VALUES (:name, :avatar)";

    $req = $this->db->prepare($query);
    $req->execute($data);
  }

  public function addBot(array $data): void
  {
    $query = "INSERT INTO bots (name, description, avatar, actions) VALUES (:name,:description, :avatar, :actions)";

    $req = $this->db->prepare($query);
    $req->execute($data);
  }

  public function delete(int $id): void
  {
    $req = $this->db->prepare("DELETE FROM users WHERE id = :id");
    $req->execute(["id" => $id]);
  }

  public function get(int $id)
  {
    $req = $this->db->prepare("SELECT * FROM users WHERE id = :id");
    $req->execute(["id" => $id]);

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }
  public function getAllUsers()
  {
    $req = $this->db->prepare("SELECT * FROM users");
    $req->execute();

    return $req->rowCount() > 0 ? $req->fetchAll(PDO::FETCH_ASSOC) : new stdClass();
  }

  public function getBot(int $id)
  {
    $req = $this->db->prepare("SELECT * FROM bots WHERE id = :id");
    $req->execute(["id" => $id]);

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }

  public function getAllBots()
  {
    $req = $this->db->prepare("SELECT * FROM bots");
    $req->execute();

    return $req->rowCount() > 0 ? $req->fetchAll(PDO::FETCH_ASSOC) : new stdClass();
  }

  public function getLast()
  {
    $req = $this->db->prepare("SELECT * FROM users ORDER BY id DESC LIMIT 1");
    $req->execute();

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }
}
