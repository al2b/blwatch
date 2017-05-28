<?php
require("lib/deals.php");
// ajouter un backlink à un deal

// créer un backlink
  // récupérer info du formulaire : date, url, target
$date =  htmlspecialchars($_REQUEST["backlink"]["date"]) ;
$url =  htmlspecialchars($_REQUEST["backlink"]["url"]) ;
$target =  htmlspecialchars($_REQUEST["backlink"]["target"]) ;
$price =  htmlspecialchars(floatval($_REQUEST["backlink"]["price"])) ;
  // créer mon objet backlink
$backlink = array("date" => $date, "url" => $url, "target" => $target, "price" => $price) ;

// ajouter le backlink à mon Deal
  // récupèrer un Deal
  $deal = deal_by_id($_REQUEST['id']);
  // ajouter aux backlinks existants
  deal_add_backlink($deal, $backlink) ;
  // sauvegarder les modifs
  write_deal($deal) ;?>

<!DOCTYPE html>
<html lang="fr">
      <?php  include('tpl/general/header.php') ;?>
<body>

    <div id="wrapper">
        <?php include('tpl/general/menu.html') ; ?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Votre nouveau backlink a été ajouté. Félicitations !</h1>
                        <h2> Voici votre enregistrement pour :
                        <?php echo $deal["identity"]["firstname"];?>
                        <?php echo $deal["identity"]["lastname"];?>
                        <?php echo $deal["identity"]["email"];?></h2>
                        <table class="table table-striped table-hover ">

                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>URL</th>
                                <th>Cible</th>
                                <th>Prix</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <?php foreach ($deal["backlinks"] as $key => $backlink) { ?>
                                    <td><?php echo $backlink["date"]; ?></td>
                                    <td><?php echo $backlink["url"]; ?></td>
                                    <td><?php echo $backlink["target"]; ?></td>
                                    <td><?php echo $backlink["price"]; ?></td>
                                  </tr>
                                </tbody>
                                <?php } ?>
                              </table>
                            <p> Total du coût des backlinks pour ce deal : <?php echo $somme = somme_deal($deal) ?> euros</p>
                          <?php  include('tpl/deals/form-new-backlink.html') ;?>
                        </div>
                    </div>
                </div>
            </div>
    <!-- /#page-content-wrapper -->
        </div>
    </body>
    </html>
