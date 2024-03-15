<?php

namespace App;

class Card
{
  private $question;
  private $answer;
  private $date;

  function __construct($question, $answer)
  {
    $this->question = $question;
    $this->answer = $answer;
    $this->date = new \DateTime();
  }

  public function dumpQuestion()
  {
    echo $this->question;
  }
}
