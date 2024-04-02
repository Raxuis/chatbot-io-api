<?php

namespace App\Controllers;

use App\Models\UserModel;

class Bot
{
  protected array $params;
  protected string $reqMethod;
  protected object $bot;

  public function __construct($params)
  {
    $this->params = $params;
    $this->reqMethod = strtolower($_SERVER['REQUEST_METHOD']);
    $this->bot = new UserModel();

    $this->run();
  }
  public function postBot()
  {
    return $this->bot->addBot(intval($this->params['id']));
  }
  public function getBot()
  {
    return $this->bot->getBot(intval($this->params['id']));
  }

  protected function header()
  {
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json; charset=utf-8');
  }

  protected function ifMethodExist()
  {
    $method = $this->reqMethod . 'Bot';

    if (method_exists($this, $method)) {
      echo json_encode($this->$method());

      return;
    }

    header('HTTP/1.0 404 Not Found');
    echo json_encode([
      'code' => '404',
      'message' => 'Not Found'
    ]);

    return;
  }

  protected function run()
  {
    $this->header();
    $this->ifMethodExist();
  }
}
