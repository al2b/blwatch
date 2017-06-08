<?php

require("lib/deal.php");

require_once("blabla.php") ; > evite de charger 2 fois

$firstname = "Nicolas";
$lastname = "Bidule";
$email = "bidule@gmail.com";

$seller = new Seller($firstname, $lastname, $email);

$target = 'http://www.site.fr';
$url = 'http://www.url.fr' ;
$anchor = 'anchor' ;
$date = "" ;
$price = "3" ;
$comment = "blabla" ;
$backlink = new Backlink($target, $url, $anchor, $date, $price, $comment);

$name = 'Jean' ;
$login = 'jeanlogin' ;
$email = 'jean@gmail.com' ;
$user = new User($name, $login, $email);

$deal = new Deal($seller, $backlink, $user, $comment) ;


$deal->save() ;
$id = $deal->getId() ;
$deal = null;
$deal = Deal::byId($id);
print_r($deal) ;
