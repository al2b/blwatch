<?php

require("lib/deal.php");
require("lib/seller.php");
require("lib/backlink.php");
require("lib/user.php");


$firstname = "Nicolas";
$lastname = "Bidule";
$email = "bidule@gmail.com";
$login = "blabl";
$password = "blabla";
$user = new User($firstname, $lastname, $email, $login, $password);

$comment = "blabl";

if (array_key_exists("identity", $_REQUEST))
{
      $firstname = $_REQUEST["identity"]["firstname"];
      $lastname = $_REQUEST["identity"]["lastname"];
      $email = $_REQUEST["identity"]["email"];
      $seller = new Seller($firstname, $lastname, $email);
      $deal = new Deal($seller, $user, $comment) ;
      $deal->save() ;
      $id = $deal->getId() ;
      print_r($id);
      $texte_principal = "Voulez-vous ajouter des liens ?";


 } else
 {
 }
 $h1 = "Créez votre nouveau contact ici" ;
 $texte = "Ce formulaire vous permet d'enregistrer un de vos contacts. Vous pourrez associer les infos sur les liens de votre choix juste après, ou bien plus tard.";
 $form = "tpl/deals/form.html";
 $texte_principal = "Voulez-vous ajouter des liens ?";
 $form2 = "tpl/deals/form-new-backlink.html";
 include('tpl/general/body.html') ;
