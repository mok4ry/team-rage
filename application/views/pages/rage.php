<div class='row' style='float:left;display:inline;width:33%;'>
  <span class="span4">


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
</div>


<div class="container" style="float:right;display:inline;width:66%;">
  <div class="row">
  <?php

  $result = mysql_query("SELECT * FROM members ORDER BY name") or die(mysql_error()); 

  $i = 0;

  while($row = mysql_fetch_array( $result ))
  {
    $rageId = $row['rage_id'];
    $lastUpdated = $row['lastUpdated'];
    $description = $row['description'];
    $manualImage = $row['manualImage'];

    if ($lastUpdated == NULL || $lastUpdated == "")
    {
      $lastUpdated = "Before time of rage was being tracked ;)";
    }

    if ($description == NULL || $description == "")
    {
      $description = "No reason specified.";
    }

    $rageImage = "";
    if ($manualImage == NULL || $manualImage == "")
    {
      $rageImage = "None specified.";
      $rage_result = mysql_query("SELECT * FROM  `rages` WHERE id =$rageId") or die(mysql_error());

      $rageName = "";

      while($rage_row = mysql_fetch_array( $rage_result ))
      {
        $rageName = $rage_row['name'];
	$rageImage = "assets/img/rage_guys/" . $rage_row['image'];
      }
    }
    else
    {
      $rageImage = $manualImage;
      $rageName = "(manually set)";
    }

    if ($i % 2 == 0 )
    {
      echo('</div>');
      echo('<div class="row">');
    }

    $i++;

    ?>
      
    <div class="span4">
      <h2><?php echo($row['name']); ?></h2>
      <p><img height="100px" width="350px" src="<?php echo($rageImage); ?>"></p>
      <p><center><strong><?php echo($rageName); ?></strong></center></p>
      <p><center>Because: <?php echo($description); ?></center></p>
      <p><center><em>Last Updated: <?php echo($lastUpdated) ?></em></center></p>
    </div>
       
    <?php
    }
    ?>
       </span>   
     </div>
