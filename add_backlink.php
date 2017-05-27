<?php
require("lib/deals.php");
$identities = list_deals_identities();
//print_r($identities);

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
                        <h1>Choisissez votre contact et ajoutez un backlink:</h1>
                        <?php include('tpl/deals/form-add-backlinks.html');?>
                    </div>
                </div>
            </div>
        </div>
<!-- /#page-content-wrapper -->
    </div>
</body>
</html>
