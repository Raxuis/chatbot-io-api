<?php

namespace App\Models;

use PDO;
use stdClass;

class MessageModel extends SqlConnect
{
  public function add(array $data): void
  {
    $query = "INSERT INTO messages (user_id, bot_id, message, image, date) VALUES (:user_id, :bot_id, :message, :image, UNIX_TIMESTAMP())";

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
    if ($id < 0) {
      return $this->getLastUserMessage(1);
    }
    $req = $this->db->prepare(
      "SELECT * FROM messages as m
      INNER JOIN users as u
      ON m.user_id = u.id
      WHERE u.id = :id"
    );
    $req->execute(["id" => $id]);

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }

  public function getAll(): bool|array|stdClass
  {
    $req = $this->db->prepare(
      "SELECT messages.*,
            CASE
                WHEN u.id IS NULL THEN b.name
                ELSE u.name
            END AS name,
            CASE
                WHEN u.id IS NULL THEN b.avatar
                ELSE u.avatar
            END AS avatar
        FROM messages
        LEFT JOIN users AS u ON messages.user_id = u.id
        LEFT JOIN bots AS b ON messages.bot_id = b.id
        ORDER BY id ASC"
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
  public function getLastUserMessage(int $id) {
    $req= $this->db->prepare("SELECT * FROM messages WHERE user_id = :user_id ORDER BY date DESC LIMIT 1");
    $req->execute(["user_id" => $id]);

    return $req->rowCount() > 0 ? $req->fetch(PDO::FETCH_ASSOC) : new stdClass();
  }
}
