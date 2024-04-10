<?php

namespace App\Controllers;

use App\Models\MessageModel;

class Messages extends Controller
{
  protected object $messages;

  public function __construct($params)
  {
    $this->messages = new MessageModel();

    parent::__construct($params);
  }

  protected function getMessages()
  {
    return $this->messages->getAll();
  }
}
