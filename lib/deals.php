<?php

const DEALS_FILE_ROOT = "data/deals/" ;
const DEAL_ID_FILENAME = DEALS_FILE_ROOT."current_deal_id.txt";
const ERROR_MAIL = "mail naze";
const ERROR_LASTNAME = "lastname naze";
const ERROR_FIRSTNAME = "firstname naze";
const ERROR_URL_TARGET = "URL target naze" ;
const ERROR_URL = "URL  naze" ;
const FORM_IDENTITY = "tpl/deals/form.html" ;
const FORM_NEW_BACKLINK = "tpl/deals/form-new-backlink.html" ;
const DISPLAY_BACKLINKS = "tpl/deals/display-backlinks.html" ;

function deal_get_next_id() {
  $fp = fopen(DEAL_ID_FILENAME, "c+");
  //flock($fp, LOCK_EX);
  $data = trim(fgets($fp));
  if (empty($data)) {
    $id = 1;
  } else {
    $id = intval($data) + 1;
  }
  ftruncate($fp, 0);
  fwrite($fp, strval($id));
  //flock($fp, LOCK_UN);
  fclose($fp);
  return $id;
}

function check_identity_error_from_request(array $request) {
  $errors = array() ;
  $_REQUEST["identity"]["firstname"] = trim($_REQUEST["identity"]["firstname"], " ");
  $_REQUEST["identity"]["lastname"] = trim($_REQUEST["identity"]["lastname"], " ");

  if (array_key_exists("identity", $_REQUEST)) {
    if (filter_var($_REQUEST["identity"]["email"], FILTER_VALIDATE_EMAIL) == false) {
         $errors["mail"] = ERROR_MAIL ;
      }
    if (ctype_alpha($_REQUEST["identity"]["firstname"]) !== true) {
        $errors["firstname"] = ERROR_LASTNAME ;
      }
    if (ctype_alpha($_REQUEST["identity"]["lastname"]) !== true) {
      $errors["lastname"] = ERROR_FIRSTNAME ;
    }
  } ;
  return $errors ;
}

function check_backlink_error_from_request(array $request) {
  $errors = array() ;
  if (array_key_exists("backlink", $_REQUEST)) {
    if (filter_var($_REQUEST["backlink"]["target"], FILTER_VALIDATE_URL) == false) {
         $errors["target"] = ERROR_URL_TARGET ;
      }
    if (filter_var($_REQUEST["backlink"]["url"], FILTER_VALIDATE_URL) == false) {
        $errors["url"] = ERROR_URL ;
      }
  } ;
  return $errors ;
}

function create_deal_from_request($request) {
  $id = deal_get_next_id();
  $identity = array(
    "firstname" => ($request["identity"]["firstname"]),
    "lastname" => ($request["identity"]["lastname"]),
    "email" => ($request["identity"]["email"]),
  );
  $backlinks = array() ;
  return array("id" => $id, "identity" => fix_deal_identity($identity), "backlinks" => $backlinks);
}

function create_backlink_from_request($request) {
  $date =  ($_REQUEST["backlink"]["date"]) ;
  $url =  ($_REQUEST["backlink"]["url"]) ;
  $target = ($_REQUEST["backlink"]["target"]) ;
  $price = ($_REQUEST["backlink"]["price"]) ;
  $backlink = array("date" => $date, "url" => $url, "target" => $target, "price" => $price) ;
  return $backlink ;
}

function deal_by_id(string $id) {
  $filename = deal_filename($id);
  return deal_by_file($filename) ;
}

/**
 * Returns the id of a $deal
 */
function deal_id(array $deal): string {
    return $deal["id"];
}

function deal_by_file(string $filename) {
  return unserialize( file_get_contents($filename) );
}

/**
 * Fix $identity of $deal object
 * Returns array
 */
function fix_deal_identity(array $identity) {
  $identity["firstname"] = ucfirst(strtolower($identity["firstname"])) ;
  $identity["lastname"] = ucfirst(strtolower($identity["lastname"])) ;
  return $identity ;
}

/**
 * Write a $deal object to disk
 * returns `true` in case of success, `false` if failure
 */
function write_deal(array $deal) {
    $id = deal_id($deal);
    $filename = deal_filename($id);
    file_put_contents($filename, serialize($deal));
    return true;
}

/**
 * Returns the filename of the deal with id $id
 */
function deal_filename(string $id): string {
    return DEALS_FILE_ROOT."deal.{$id}.php_serialized";
}

function deal_with_new_backlink($deal, $backlink) {
  deal_add_backlink($deal, $backlink) ;
  return $deal ;
}

function deal_add_backlink(&$deal, $backlink) {
  $deal["backlinks"][] = $backlink ;
}

function list_deal_files() {
  return glob(DEALS_FILE_ROOT."*.php_serialized");
}

function deal_identity($deal) {
    $identity = array();
    $identity["firstname"] = $deal["identity"]["firstname"] ;
    $identity["lastname"] = $deal["identity"]["lastname"] ;
    $identity["email"] = $deal["identity"]["email"] ;
    $identity["id"] = $deal["id"] ;
  return $identity ;
}

function list_deals_identities() {
  $identities = array() ;
  foreach (list_deal_files() as $filename) {
    $deal = deal_by_file($filename) ;
    $identity = deal_identity($deal) ;
    $identities[] = $identity;
  }
  return $identities;
}

function somme_deal($deal): float {
  $somme = 0 ;
  foreach($deal["backlinks"] as $backlink) {
    $somme += $backlink["price"] ;
  }
  return $somme ;
}
