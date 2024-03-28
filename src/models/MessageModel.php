<?php

namespace App\Models;

use \PDO;
use stdClass;

class MessageModel extends SqlConnect
{
  public function add(array $data): void
  {
    $query = "INSERT INTO messages (user_id, message, image) VALUES (:user_id, :message, :image)";

    $req = $this->db->prepare($query);
    $req->execute($data);
  }

  public function delete(int $id): void
  {
    $req = $this->db->prepare("DELETE FROM messages WHERE id = :id");
    $req->execute(["id" => $id]);
  }

  public function get(int $id)
  {
    $req = $this->db->prepare(
      "SELECT * FROM messages as m
      INNER JOIN users as u
      ON m.user_id = u.id
      WHERE u.id = :id"
    );
    $req->execute(["id" => $id]);

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }
  public function getAll()
  {
    $req = $this->db->prepare(
      "SELECT * FROM messages
      INNER JOIN users
      "
    );
    $req->execute();

    return $req->rowCount() > 0 ? $req->fetchAll(PDO::FETCH_ASSOC) : new stdClass();
  }

  public function getLast()
  {
    $req = $this->db->prepare("SELECT * FROM messages ORDER BY id DESC LIMIT 1");
    $req->execute();

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }
}