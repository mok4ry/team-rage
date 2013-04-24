<?php
  
  $members = mysql_query("SELECT * FROM members ORDER by name") or die(mysql_error());
  $rages = mysql_query("SELECT * FROM rages ORDER BY name") or die(mysql_error());

?>

<div class="container">

<div class="row" style="float:left;display:inline;width:49%;">
<div class="span8">
  <form class="form-horizontal" action="ragefunctions" method="post" >
    <fieldset>
      <legend>Update your Status</legend>
      <div class="control-group">
        <label class="control-label" for="name">My name is</label>
        <div class="controls">
          <select id="name" name="name">

          <option>(Pick One)</option>

          <?php
            while($row = mysql_fetch_array( $members ))
            {
              ?>
              <option value"<?php echo($row['id']); ?>"><?php echo($row['name']); ?></option>
          
              <?php
            }
              ?>

            </select>
          </div>
        </div>

    <div class="control-group">
      <label class="control-label" for="rage">And I'm feeling</label>
      <div class="controls">
        <select id="rage" name="rage">
        <option>(Pick One)</option>
        <?php
          while($row = mysql_fetch_array( $rages ))
          {
        ?>
            <option value="<?php echo($row['id']); ?>"><?php echo($row['name']); ?></option>
        <?php
          }
             
        ?>
        </select>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" for="description">Any reason?</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="description" name="description">
        </div>
      </div>

      <hr />
      <div class="control-group">
        <label class="control-label" for="manualImage">Want to roll your own?</label>
        <div class="controls">
          <input type="text" class="input-xlarge" id="manualImage" name="manualImage">
          <p class="help-block">Optionally, you can specify a link to an external image here.<br />If blank, it will use what you selected above.</p>
        </div>
      </div>
    <div class="form-actions">
      <button name="sent" type="submit" class="btn btn-primary"><i class="icon-fire icon-white"></i> RAGE</button>
      <button type="reset" class="btn">Just Kidding</button>
    </div>
  </fieldset>
</form>
</div>
