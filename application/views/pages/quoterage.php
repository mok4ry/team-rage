<?php

  $members = mysql_query("SELECT * FROM members ORDER by name") or die(mysql_error());
  $rages = mysql_query("SELECT * FROM rages ORDER by name") or die(mysql_error());

?>

<div class="container">
<div class="row" style="float:left;display:inline;width:49%">
<div class="span8">
  <form class="form-horizontal" action="ragefunctions" method="post">
    <fieldset>
      <legend>Did someone say something dumb?</legend>
      <div class="control-group">
        <label class="control-label" for="name">Who said it?</label>
        <div class="controls">
          <select id="name" name="name">
	  <option>(Pick one)</option>
	  <?php
	    $members = mysql_query("SELECT * FROM members ORDER BY name") or die(mysql_error());
	    while($row = mysql_fetch_array($members))
	      {
	  ?>
	    <option value="<?php echo($row['id']);?>"><?php echo($row['name']);?></option>
	    <?php
	      }
	    ?>
	  </select>
	</div>
      </div>
      <div class="control-group">
        <label class="control-label" for="context">What's the context?</label>
        <div class="controls">
          <input type="text" class="input-xlarge" id="context" name="context">
	    <p class="help-block">'No context' will be added automatically if you don't set anything.</p>
        </div>
      </div>
      <div class="control-group">
	<label class="control-label" for="quote">What'd they say?</label>
	<div class="controls">
	  <textarea class="input-xlarge" id="quote" name="quote" rows="3"></textarea>
	</div>
      </div>
      <div class="form-actions">
	<button name="quoterage" type="submit" class="btn btn-primary"><i class="icon-fire icon-white"></i> RAGE</button>
	<button type="reset" class="btn">Just Kidding...</button>
      </div>
    </fieldset>
  </div>
