<?php

class Backlink
{

  private $target;
  private $url;
  private $date;
  private $price;
  private $comment;
  private $type;
  private $anchor;

  public function __construct($target, $url, $anchor=null), $date, $price=null, $comment=null)){
    $this->target = $target ;
    $this->url = $url ;
    $this->anchor = $anchor ;
    $this->date = $date ;
    $this->price = $price ;
    $this->comment = $comment ;
  }

  public function displayTotalCostBacklinks($deal)
  {
    $total = 0 ;
    foreach($this->price  as $price) {
      $somme += $price ;
    }
    return $total ;
  }
}
