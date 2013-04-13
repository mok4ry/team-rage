<?php

  require_once '../includes/global.inc.php';
  require_once '../src/password.php';

  $error = "";
  $username = "";
  $password = "";

  if(isset($_POST['submit-login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $tools = new Tools();
    if($tools->login($username,$password)){
      //Successful login
      header("Location: ../index.php");
    }else{
      $error = "Incorrect Username and/or Password. Please try again.";
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>	
    <title>Team Rage Login</title>
  </head>
  <Body>
  <?php
    if($error != "")
    {
      echo $error."<br/>";
    }
  ?>

    <form action="login.php" method="post">
      Username: <input type="text" name="username" value="<?php echo $username; ?>" /><br/>
      Password: <input type="password" name="password"
        value="" /><br/>
      <input type="submit" value="Login" name="submit-login" />
    </form>
  </body>
</html>
