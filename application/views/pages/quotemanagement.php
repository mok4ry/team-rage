<div container>
<div class="span6">
  
  <?php

$sql = "SELECT * from quotes ORDER BY id DESC";
$result = mysql_query($sql) or die(mysql_error());

$i = 0;

while($row = mysql_fetch_array( $result))
{
  $id = $row['id'];
  $memberId = $row['member_id'];
  $context = $row['context'];
  $quote = $row['quote'];
  $date = $row['date'];

  $nameResult = mysql_query("SELECT * FROM members WHERE id = '$memberId'");
    while($nameRow = mysql_fetch_array( $nameResult ))
    {
      $name = $nameRow['name']

    ?>

    <blockquote>
      <a style="float:right" class="btn btn-danger" name="deletequote" href="deletequote?id=<?php echo($id) ?>"><i class="icon-trash icon-white"></i> Delete</a>
      <p><strong>"<?php echo($quote) ?>"</strong></p>
      <small>
      <?php echo($name) ?> (<?php echo($context) ?> - <?php echo($date) ?>)
      </small>
      </blockquote>
    <?php
    }

}

?>

  </span>

