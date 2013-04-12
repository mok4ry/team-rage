<?php

  require_once '../src/User.php';  
  require_once '../src/Tools.php';  
  require_once '../src/DB.php'; 

  $db = new DB();
  $db->connect();

  $tools = new Tools();

  session_start();

  if(isset($_SESSION['logged_in'])){
    $user = unserialize($_SESSION['user']);
    $_SESSION['user'] = serialize($Tools->get($user->id));
  }

?>  
