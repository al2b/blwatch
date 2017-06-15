<?php

class Backlink
{

  public $target;
  public $url;
  public $date;
  public $price;
  public $comment;
  public $type;
  public $anchor;

  public function __construct($target, $url, $anchor=null, $date, $type=null, $price=null, $comment=null)
  {
    $this->target = $target ;
    $this->url = $url ;
    $this->anchor = $anchor ;
    $this->date = $date ;
    $this->price = $price ;
    $this->comment = $comment ;
    $this->type = $type ;
  }

  public function displayTotalCostBacklinks($deal)
  {
    $total = 0 ;
    foreach($this->price  as $price) {
      $somme += $price ;
    }
    return $total ;
  }

public function url()
{
  return $this->url;
}
}
