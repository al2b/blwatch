<?php
require("lib/deals.php");

$errors = check_backlink_error_from_request($_REQUEST) ;

if (array_key_exists("backlink", $_REQUEST)) {
  if (count($errors) == 0) {
      $backlink = create_backlink_from_request($_REQUEST) ;
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
?>

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
                              <h1>Well done. Maintenant, ajoutez vos backlinks</h1>
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
