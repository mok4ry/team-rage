<?php

  require_once 'DB.php';

  class User{

  public $id;
  public $username;
  public $rage_id;
  public $hashedPass;
  public $lastUpdated;
  public $descript;
  public $manualImage;

  function __construct($data){
    $this->id = (isset($data['id'])) ? $data['id'] : "";
    $this->username = (isset($data['username'])) ? $data['username'] : "";
    $this->rage_id = (isset($data['username'])) ? $data['username'] : "";
    $this->hashedPass = (isset($data['password'])) ? $data['password'] : ""; 
    $this->lastUpdated = (isset($data['lastUpdated'])) ? $data['lastUpdated'] : "";
    $this->descript = (isset($data['description'])) ? $data['description'] : "";
    $this->manualImage = (isset($data['manualImage'])) ? $data['manualImage'] : "";
  }
/* Unused function, commenting out until used
  public function save($isNewUser = false)
  {
    $db = new DB();

    if(!$isNewUser){
      $data = array(
        "username" => "'this->username'",
        "password" => "'this->hashedPass'"
      );
      $db->update($data, 'members', 'id' = 'this->id');
    }else{
      $data = array(
        "username" => "'this->username'",
        "password" => "'this->hashedPass'"
      );

      $this->id = $db->insert($data, 'users');
    }

    return true;
*/
  }
?>
