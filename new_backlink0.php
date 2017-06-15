<?php
require("lib/deals.php");


if (array_key_exists("backlink", $_REQUEST)) {
  $backlink = create_backlink_from_request($_REQUEST) ;
  $errors = check_backlink_error_from_request($backlink) ;
    if (count($errors) == 0) {
       // récupèrer un Deal
       $deal = deal_by_id($_REQUEST['id']);
       // ajouter aux backlinks existants
       deal_add_backlink($deal, $backlink) ;
       // sauvegarder les modifs
       write_deal($deal) ;
  } else {
     foreach ($errors as $key => $error) {
       echo $error ;
     }
  }
};


$identity["id"] = $_REQUEST["id"] ;
$deal = deal_by_id($identity["id"]) ;

$h1 = "Well done. Maintenant, ajoutez vos backlinks" ;
$texte = "Ce formulaire vous permet d'enregistrer un de vos contacts. Vous pourrez associer les infos sur les liens de votre choix juste après, ou bien plus tard.";
$display_backlinks = DISPLAY_BACKLINKS;
$form = FORM_NEW_BACKLINK;
include('tpl/general/body.html') ;
?>
