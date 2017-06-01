<?php
require("lib/deals.php");

 if (array_key_exists("identity", $_REQUEST)) {
   $errors = check_identity_error_from_request($_REQUEST);
   if (count($errors) == 0) {
		  $deal = create_deal_from_request($_REQUEST);
 		  write_deal($deal);
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
