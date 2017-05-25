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
                        <form action="new_backlink.php" method="post">
                        <div class="form-group">
                          <label for="contact">Liste contacts :</label>
                          <select class="form-control" name="id">
                            <?php
                            foreach($identities as $identity) {?>

                              <option value='<?= $identity["id"] ?>'><?php echo htmlspecialchars($identity["lastname"] ." " .  $identity["firstname"]) ; ?> </option>
                              <?php
                            }?>
                          </select>
                          <p><input type="submit" value="Valider"></p>
</form>
                    </div>
                </div>
            </div>
        </div>
<!-- /#page-content-wrapper -->
    </div>
</body>
</html>
