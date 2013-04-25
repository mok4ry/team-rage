<?php

  $members = mysql_query("SELECT * FROM members ORDER BY name") or die(mysql_error());

?>

<div class="container">
<div class="row" style="float:left;display:inline;width:49%;">
<div class="span6">
  <form class="form-horizontal" action='ragefunctions' method="post">
    <fieldset>
      <legend>Add a member</legend>
      <div class="control-group">
	<label class="control-label" for="name">User Name</label>
	<div class="controls">
	  <input type="text" class="input" id="name" name="name">
	</div>
      </div>
      <div class="control-group">
	<label class="control-label" for="pass">Password</label>
	<div class="controls">
	  <input type="password" class="input" id="inputPassword" name="inputPassword">
	</div>
      </div>
      <button type="submit" class="btn btn-primary">Add Member</button>
    </div>
  </form>
</div>
<div class="span6">
  <form class="form-horizontal" action='ragefunctions' method="post">
    <fieldset>
    <legend>Remove a member</legend>
    <div class="control-group">
      <label class="control-label" for="name">User</label>
      <div class="controls">
        <select id="name" name="name">
	<option>(User)</option>
	<?php
	  while($row = mysql_fetch_array($members))
	  {

	?>
	  <option value="<?php echo($row['id']); ?>"><?php echo($row['name']); ?></option>
	<?php
	  }
	?>

	</select>
      </div>
    </div>
    <button type="submit" class="btn btn-primary" style="text-align:center">Remove</button>
  </form>
