<?php

  require_once '../includes/global.inc.php';

  $tools = new Tools();
  $tools->logout();

  header("Location: ../index.php");

?>
