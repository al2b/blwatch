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
  $backlinks = array(
    // array("date" => $request["backlinks"]["date"], "url" => $request["backlinks"]["url"], "target" => $request["backlinks"]["target"]),
    // array("date" => $request["backlinks"]["date"], "url" => $request["backlinks"]["url"], "target" => $request["backlinks"]["target"]),
  ) ;
  return array("id" => $id, "identity" => $identity, "backlinks" => $backlinks);
}

function deal_by_id(string $id) {
  $filename = deal_filename($id);
  return deal_by_file($filename) ;
}

// function deal_by_file(string $filename) {
//   $deal = array() ;
//
//   $master_key = null ;
//   $is_array = null ;
//   $keys = null ;
//   $next_is_headers = false ;
//
//   $fp = fopen($filename, "r") ;
//   while (! feof($fp) ) {
//     $data = fgetcsv($fp) ;
//
//     if (substr($data[0], 0, 3) == "***") {
//       // Nouveau block
//       $master_key = strtolower(substr($data[0], 4)) ;
//       $next_is_headers = true ;
//       // est-ce un tableau ?
//       $last_character = substr($master_key, -2, 1) ;
//       $is_array = ( $last_character == "s" ) ;
//       $deal[ $master_key ] = array() ;
//     } elseif ($next_is_headers) {
//       // ligne d'entête
//       $keys = $data;
//     } elseif( ! empty($line) ) {
//       // ligne de contenu
//       $values = array() ;
//       foreach ($data as $i => $value) {
//         $key = $keys[$i];
//         $values[ $key ] = $value ;
//       }
//       if ($is_array) {
//         $deal[ $master_key ][] = $values ;
//       } else {
//         $deal[ $master_key ] = $values ;
//       }
//     }
//
//   }
//   fclose($fp) ;
//   return $deal ;
// }

/**
 * Write a $deal object to disk
 * returns `true` in case of success, `false` if failure
 */
// function write_deal(array $deal) {
//     $id = deal_id($deal);
//     $filename = deal_filename($id);
//     $fp = fopen($filename, "w");
//     if ($fp) {
//         write_deal_contact($deal, $fp);
//         write_deal_backlinks($deal, $fp);
//         fclose($fp);
//         return true;
//     } else {
//         return false;
//     }
// }

/**
 * Returns the filename of the deal with id $id
 */
 // function deal_filename(string $id): string {
//     return DEALS_FILE_ROOT."deal.{$id}.txt";
// }

/**
 * Returns the id of a $deal
 */
function deal_id(array $deal): string {
    return $deal["id"];
}


/**
 * Write the $deal contact data
 * in the file whose pointer has been given in argument
 */
// function write_deal_contact($deal, $fp) {
//     $identity = $deal["identity"];
//     fwrite($fp, "*** IDENTITY:\n") ;
//     fwrite($fp, "firstname,lastname,email\n") ;
//     fwrite($fp, $identity["firstname"]) ;
//     fwrite($fp, ",") ;
//     fwrite($fp, $identity["lastname"]) ;
//     fwrite($fp, ",") ;
//     fwrite($fp, $identity["email"]) ;
//     fwrite($fp, "\n") ;
// }

/**
 * Write the $deal backlinks data
 * in the file whose pointer has been given in argument
 */
// function write_deal_backlinks($deal, $fp) {
//     fwrite($fp, "*** BACKLINKS:\n") ;
//     fwrite($fp, "date,url,target\n") ;
//     foreach ($deal["backlinks"] as $backlink) {
//         fwrite($fp, $backlink["date"]) ;
//         fwrite($fp, ",") ;
//         fwrite($fp, $backlink["url"]) ;
//         fwrite($fp, ",") ;
//         fwrite($fp, $backlink["target"]) ;
//         fwrite($fp, "\n") ;
//     }
// }
//
// function display_deal_by_id($id) {
//   deal_by_id($id) ;
//   display_deal($deal) ;
// return true ;
// }

// function display_deal($deal) {
//   echo "firstname : " . $deal["identity"]["firstname"] ;
//   echo "\n" ;
//   echo "lastname : " . $deal["identity"]["lastname"] ;
//   echo "\n" ;
//   echo "email : " . $deal["identity"]["email"] ;
//   echo "\n" ;
//   foreach ($deal["backlinks"] as $line) {
//     echo "date : " . $line["date"] ;
//     echo "\n" ;
//     echo "url : " . $line["url"] ;
//     echo "\n" ;
//     echo "line : " . $line["target"] ;
//     echo "\n" ;
//   } ;
// return true ;
// }

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
} ;

/**
 * Returns the filename of the deal with id $id
 */
function deal_filename(string $id): string {
    return DEALS_FILE_ROOT."deal.{$id}.php_serialized";
} ;
// function create_backlink_from_request($request) {
//   $backlinks = array(
//     array("date" => $request["backlinks"]["date"], "url" => $request["backlinks"]["url"], "target" => $request["backlinks"]["target"]),
//     array("date" => $request["backlinks"]["date"], "url" => $request["backlinks"]["url"], "target" => $request["backlinks"]["target"]),
//   ) ;
//   return array("backlinks" => $backlinks);
// }
//
// function write_new_backlinks($deal, $fp)


function deal_with_new_backlink($deal, $backlink) {
  deal_add_backlink($deal, $backlink) ;
  return $deal ;
}

function deal_add_backlink(&$deal, $backlink) {
  $deal["backlinks"][] = $backlink ;
}
