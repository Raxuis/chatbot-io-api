<?php

namespace App\Models;

use \PDO;
use stdClass;

class BotModel extends SqlConnect
{
  public function add(array $data): void
  {
    $query = "INSERT INTO bots (name, description, avatar, actions) VALUES (:name,:description, :avatar, :actions)";

    $req = $this->db->prepare($query);
    $req->execute($data);
  }

  public function delete(int $id): void
  {
    $req = $this->db->prepare("DELETE FROM bots WHERE id = :id");
    $req->execute(["id" => $id]);
  }

  public function get(int $id)
  {
    $req = $this->db->prepare("SELECT * FROM bots WHERE id = :id");
    $req->execute(["id" => $id]);

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }
  public function getAll()
  {
    $req = $this->db->prepare("SELECT * FROM bots");
    $req->execute();

    return $req->rowCount() > 0 ? $req->fetchAll(PDO::FETCH_ASSOC) : new stdClass();
  }

  public function getLast()
  {
    $req = $this->db->prepare("SELECT * FROM bots ORDER BY id DESC LIMIT 1");
    $req->execute();

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }
}
