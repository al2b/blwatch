<?php
require("lib/deals.php");
$identity["id"] = $_REQUEST["id"] ;
$deal = deal_by_id($identity["id"]) ;

include('tpl/deals/form-new-backlink.html') ;
echo "quoi? ";
