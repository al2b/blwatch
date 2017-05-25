<?php
require("lib/deals.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
      <?php  include('tpl/general/header.php') ;?>
</head>
<body>
  <div id="wrapper">
    <?php include('tpl/general/menu.html') ; ?>

    <!-- Page Content -->
      <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

<?php if (array_key_exists("identity", $_REQUEST)) {

  $deal = create_deal_from_request($_REQUEST);
  write_deal($deal);
  echo "Votre contact a été enregistré. <a href='new_deal.php'>Souhaitez-vous créer un nouveau contact ?</a> <br>";

  include('tpl/deals/form-new-backlink.html') ;
} else {
  header("location: /backlinkstool/new_deal.php") ;
}?>
                </div>
            </div>
      </div>
  </div>
<!-- /#page-content-wrapper -->
 </div>
</body>
</html>
