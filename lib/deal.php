<?php


class Deal
{


    const DEALS_FILE_ROOT = "data/deals/" ;
    const DEAL_ID_FILENAME = self::DEALS_FILE_ROOT."current_deal_id.txt" ;

    private $backlink ;
    private $seller ;
    private $user ;
    private $comment ;
    private $id ;
    private $filename ;



public function __construct($seller, $backlink, $user, $comment, $id=null)
{
    $this->seller = $seller ;
    $this->backlink = $backlink ;
    $this->user = $user ;
    $this->comment = $comment ;
    if ($id)
    {
        $this->id = $id ;
    }else{
        $this->id = self::getNextId() ;
    }
}

static function getNextId()
{
  $fp = fopen(self::DEAL_ID_FILENAME, "c+") ;
  flock($fp, LOCK_EX);
  $data = trim(fgets($fp));
  if (empty($data)) {
    $id = 1;
  } else {
    $id = intval($data) + 1;
  }
  ftruncate($fp, 0);
  fwrite($fp, strval($id));
  flock($fp, LOCK_UN);
  fclose($fp);
  return $id;
}

public function save()
{
  $filename = $this->filename() ;
  file_put_contents($filename, serialize($this)) ;
}

static function byId($id)
{
    $filename = self::filenameById($id) ;
    $deal = self::byFile($filename) ;
    return $deal ;
}

static function filenameById($id)
{
    return self::DEALS_FILE_ROOT."deal.{$id}.php_serialized" ;
}

private function filename()
{
    $id = $this->id;
    return self::filenameById($id) ;
}

public function getId()
{
  return $this->id ;
}

static function byFile(string $filename)
{
  return unserialize(file_get_contents($filename)) ;
}

public function listAllDeals()
{
  return glob(DEALS_FILE_ROOT."*.php_serialized") ;
}

}


class Seller {

private $firstname ;
private $lastname ;
private $email ;

  public function __construct($firstname, $lastname, $email)
  {
    $this->firstname = $firstname ;
    $this->lastname = $lastname ;
    $this->email = $email ;
  }
}


class Backlink {

  private $target;
  private $url;
  private $date;
  private $price;
  private $comment;
  private $type;
  private $anchor;

  public function __construct($target, $url, $anchor, $date, $price, $comment){
    $this->target = $target ;
    $this->url = $url ;
    $this->anchor = $anchor ;
    $this->date = $date ;
    $this->price = $price ;
    $this->comment = $comment ;
  }
  public function displayTotalCostBacklinks($deal)
  {
    $total = 0 ;
    foreach($this->price  as $price) {
      $somme += $price ;
    }
    return $total ;
  }
}



class User {

  private $lastname;
  private $firstname;
  private $email;
  private $login;
  private $password;

  public function __construct($name, $login, $email) {

  }
}


// $user
//
// $Deal
// $identity
// $contact
// $comment
//
// $Backlink
// $url
// $target
// $price
// $comment

// URL / Target = ce sont deux urls nommées différemment, mais même caractéristiques. C'est donc un seul objet ? Fonction commune = vérifier le format (et peut être plus tard vérifier si renvoi code 200, par exemple)
