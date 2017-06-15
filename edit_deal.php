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
                              <h1>Ici, vous pouvez tout modifier</h1>

                              <table class="table table-striped table-hover ">
                                  <form method="post" action="edit_deal.php">
                                   <thead>
                                     <tr>
                                       <th>Prénom</th>
                                       <th>Nom</th>
                                       <th>e-mail</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                       <tr>
                                           <input type="hidden" name="id" value="<?php echo $deal["id"];?>"
                                           <td>
                                             <label for="firstname"><p contenteditable="true">This is an editable paragraph.<?php echo $deal["identity"]["lastname"]; ?></label>
                                             <input type="text" name="identity[firstname]" id="firstname" required>
                                           </td>
                                             <?php echo $deal["identity"]["firstname"]; ?></td>
                                           <td></p></td>
                                           <td><?php echo $deal["identity"]["email"]; ?></td>
                                           <td><a href="#" class="btn btn-default">Modifier</a></td>
                                         </tr>
                                       </tbody>
                                     </table>

                                     <table class="table table-striped table-hover ">

                                         <thead>
                                           <tr>
                                             <th>Date</th>
                                             <th>URL</th>
                                             <th>Target</th>
                                             </tr>
                                           </thead>
                                           <tbody>
                                             <tr>
                                               <?php foreach ($deal["backlinks"] as $key => $backlink) { ?>
                                                 <td><?php echo $backlink["date"]; ?></td>
                                                 <td><?php echo $backlink["url"]; ?></td>
                                                 <td><?php echo $backlink["target"]; ?></td>
                                                 <td><a href="#" class="btn btn-default">Modifier</a></td>
                                               </tr>
                                             </tbody>
                                             <?php } ?>
                                           </table>
                                           <form action="create_deal.php" method="POST">

          
                                             <label for="firstname"><p contenteditable="true">This is an editable paragraph.<?php echo $deal["identity"]["lastname"]; ?></label>
                                             <input type="" name="identity[firstname]" id="firstname" required>
                                             <br>

                                             <label for="lastname">Lastname</label>
                                             <input type="text" name="identity[lastname]" id="lastname" required>
                                             <br>

                                             <label for="email">Email</label>
                                             <input type="email" name="identity[email]" id="email" required>
                                             <br>

                                             <input type="submit">
                                           </form>

                              </div>
                          </div>
                      </div>
                  </div>
          <!-- /#page-content-wrapper -->
              </div>
          </body>
          </html>
