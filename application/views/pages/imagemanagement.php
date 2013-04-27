<?php

  $members = mysql_query("SELECT * FROM members ORDER BY name") or die(mysql_error());

?>

<div class="container">
<div class="row" style="float;left;display:inline;width:49%;">
<div class="span6">
  <form class="form-horizontal" action='ragefunctions' method="post">
    <fieldset>
      <legend>Add an Image</legend>
      <div class="control-group">
        <label class="control-label" for="newImage">Image URL</label>
        <div class="controls">
	  <input type="text" class="input" id="newImage" name="newImage">
          <p class="help-block">The entire URL for download</p>
	</div>
      </div>
      <div class="control-group">
	<label class="control-label" for="imageName">Image Name</label>
	<div class="controls">
	  <input type="text" class="input" id="imageName" name="imageName">
	</div>
      </div> 
      <button name="newImage" type="submit" class="btn btn-primary">Add</button>
    </fieldset>
  </form>
