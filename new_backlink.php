<?php
require("lib/deal.php");
require("lib/seller.php");
require("lib/backlink.php");
require("lib/user.php");

$id = $_REQUEST["id"];
$deal = Deal::byId($id);

if (array_key_exists("backlink", $_REQUEST)) {

    $target = ($_REQUEST["backlink"]["target"]) ;
    $url =  ($_REQUEST["backlink"]["url"]) ;
    $date =  ($_REQUEST["backlink"]["date"]) ;
    $price = ($_REQUEST["backlink"]["price"]) ;
    $backlink = new Backlink($target, $url, $date, $price) ;
    $deal->addBacklink($backlink) ;
    $deal->save() ;
    $success = 'success!';
  } else {
     }

     foreach($backlink as $key => $value) {
         print "$key => $value\n";
     }

$h1 = "Well done. Vous pouvez encore en ajouter plein" ;
$texte = "Ce formulaire vous permet d'enregistrer un de vos contacts. Vous pourrez associer les infos sur les liens de votre choix juste après, ou bien plus tard.";
$form = 'form-new-backlink.html';
$form2 = "tpl/deals/form-new-backlink.html";
$texte_principal = "Voulez-vous ajouter des liens ?";

include('tpl/general/body_backlink.html') ;
?>
