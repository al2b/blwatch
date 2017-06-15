<?php
require("lib/deals.php");
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
 if (array_key_exists("identity", $_REQUEST)) {
   $errors = check_identity_error_from_request($_REQUEST);
   if (count($errors) == 0) {
       $firstname = $_REQUEST["identity"]["firstname"];
       $lastname = $_REQUEST["identity"]["lastname"];
       $email = $_REQUEST["identity"]["email"];
	   $seller = new Seller($firstname, $lastname, $email);
       $deal = new Deal($seller, $user, $comment) ;

 		  echo "Votre contact a été enregistré. <a href='new_deal.php'>Souhaitez-vous créer un nouveau contact ?</a> <br>";
 		  include('tpl/deals/form-new-backlink.html') ;
 	 } else {
      foreach ($errors as $key => $error) {
        echo $error ;
      }
   }
 };

$h1 = "Créez votre nouveau contact ici" ;
$texte = "Ce formulaire vous permet d'enregistrer un de vos contacts. Vous pourrez associer les infos sur les liens de votre choix juste après, ou bien plus tard.";
$form = FORM_IDENTITY;
include('tpl/general/body.html') ;
?>
