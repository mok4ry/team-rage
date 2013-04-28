<?php

  $id = mysql_real_escape_string($_GET['id']);
  $query = "DELETE FROM quotes WHERE id ='$id'";
  $result = mysql_query($query) or die(mysql_error());

  header("Location:".$this->config->base_url()."index.php/quotemanagement");
?>
