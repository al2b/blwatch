<?php
require("lib/deals.php");
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
              <?php  include('tpl/deals/form-new-backlink.html') ;?>
</div>
</div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
</body>
</html>
