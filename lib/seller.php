<?php

class Seller {

private $firstname ;
private $lastname ;
private $email ;
private $commentaire ;

  public function __construct($firstname, $lastname, $email, $commentaire=null)
  {
    $this->firstname = $firstname ;
    $this->lastname = $lastname ;
    $this->email = $email ;
    $this->comment = $commentaire;
  }
}
