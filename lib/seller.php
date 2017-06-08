<?php

class Seller {

private $firstname ;
private $lastname ;
private $email ;

  public function __construct($firstname, $lastname, $email)
  {
    $this->firstname = $firstname ;
    $this->lastname = $lastname ;
    $this->email = $email ;
  }
}
