<?php

namespace App\Controllers;

class Message {
    protected array $params;

    public function __construct($params) {
        $this->params = $params;
        $this->run();
    }

    protected function header(): void
    {
        header('Access-Control-Allow-Origin: *');
        header("Content-type: application/json; charset=utf-8");
    }

    protected function run(): void
    {
        $this->header();

        echo json_encode([
            'message' => 'OK',
            'code' =>  200
        ]);
    }
}
