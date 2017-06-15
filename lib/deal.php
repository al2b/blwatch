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



public function __construct($seller, $backlink=null, $user, $comment=null, $id=null)
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

public function addBacklink($backlink)
{
 $this->backlink = $backlink ;
}
}
