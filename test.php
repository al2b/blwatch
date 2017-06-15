<?php

require("lib/deal.php");
require("lib/seller.php");
require("lib/backlink.php");
require("lib/user.php");

//require_once("blabla.php") ;

$firstname = "Nicolas";
$lastname = "Bidule";
$email = "bidule@gmail.com";


$seller = new Seller($firstname, $lastname, $email);

$comment = 'blabla' ;

$firstname = "Nicolas";
$lastname = "Bidule";
$email = "bidule@gmail.com";
$login = "blabl";
$password = "blabla";

$user = new User($firstname, $lastname, $email, $login, $password);

$deal = new Deal($seller, $user, $comment) ;


$deal->save() ;
// $id = $deal->getId() ;
// $deal = null;
// $deal = Deal::byId($id);
// print_r($deal) ;

$target = 'test' ;
$url = 'test' ;
$date = 'test' ;
$price = 'test' ;
$comment = 'test' ;
$type = 'test' ;
$anchor = 'test' ;



$backlink = new Backlink($target, $url, $anchor, $date, $type, $price, $comment) ;

$deal->addBacklink($backlink) ;
$deal->save() ;

echo "$backlink->url";
