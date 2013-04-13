<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv=refresh CONTENT='60; URL=index.php'> 
    <title>Team Rage</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Team Rage</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Team Status</a></li>
	      <li style="font-size:1em;">
	  <?php session_start();
            if(isset($_SESSION['logged_in'])) : ?>
              <a href="app/changestatus.php">Change Status</a>
          <?php endif; ?>
	      </li>
            </ul>
          </div><!--/.nav-collapse -->
            <?php session_start();
		if(isset($_SESSION['logged_in'])) : ?>
		<a href="src/logout.php" class="brand" style="font-size:1em; margin-top:5px; float:right">Logout</a>  
            <?php else : ?>
		<!-- <a href="app/login.php" class="brand" style="font-size:1em; margin-top:5px; float:right">Login</a> -->
	    <?php endif; ?>
		<a href="index.php" class="brand" style="font-size:1em; margin-top:5px; float:right">Last Updated: <?php echo(date("n/j/Y - g:i A")); ?></a>
        </div>
      </div>
    </div>


        <div class="row" style="float:left;display:inline;width:33%;">
		<span class="span6">
		
		<?php
     	include('src/config.php');
       // require_once 'includes/global.inc.php';
		
		mysql_connect($db_hostname, $db_user, $db_pass) or die(mysql_error());
		mysql_select_db($db_name) or die(mysql_error());
		
		$sql = "SELECT * from quotes ORDER BY id DESC";
		$result = mysql_query($sql) or die(mysql_error()); 
		
		//$db = new DB();

		$i = 0;
	
		while($row = mysql_fetch_array( $result ))
		{
			$id = $row['id'];
			$memberId = $row['member_id'];
			$context = $row['context'];
			$quote = $row['quote'];
			$date = $row['date'];
			
			//$nameResult = $db->select('members', "id = $memberID");
			$nameResult = mysql_query("SELECT * FROM members WHERE id = '$memberId'");
			while($nameRow = mysql_fetch_array( $nameResult ))
			{
				$name = $nameRow['name'];
				
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
      <!-- Example row of columns -->
      <div class="row">
      <?php
     	include('src/config.php');
	//require_once 'includes/global.inc.php';
		
		mysql_connect($db_hostname, $db_user, $db_pass) or die(mysql_error());
		mysql_select_db($db_name) or die(mysql_error());
	
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
       
      </div>

	<hr>
      <!-- <footer>
        <p>Version 1.1</p>
      </footer> -->

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
