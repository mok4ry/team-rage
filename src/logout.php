<?php

  //require_once '../includes/global.inc.php';

  //$tools = new Tools();
  //$tools->logout();
  session_start();

  session_unset();
  session_destroy();

  header("Location: ../index.php");

?>
