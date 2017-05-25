<?php

const DEALS_FILE_ROOT = "data/deals/" ;
const DEAL_ID_FILENAME = DEALS_FILE_ROOT."current_deal_id.txt";

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

function create_deal_from_request($request) {
  $id = deal_get_next_id();
  $identity = array(
    "firstname" => $request["identity"]["firstname"],
    "lastname" => $request["identity"]["lastname"],
    "email" => $request["identity"]["email"],
  );
  $backlinks = array() ;
  return array("id" => $id, "identity" => $identity, "backlinks" => $backlinks);
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
