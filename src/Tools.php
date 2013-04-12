<?php
  require_once 'User.php';
  require_once 'DB.php';

class Tools{

  //Takes a username and inputted password, hashes the pass
  //and compares it against a database row. If it matches
  // it sets session variables and stores the user object
  public function login($username, $password)
  {
    //hashedPass = magic hashing things
    $result = mysql_query("SELECT * from members where name = '$username' and password = '$password'");

    if (mysql_num_rows($result) == 1)
    {
      $_SESSION["user"] = serialize(new User(mysql_fetch_assoc($result)));
      $_SESSION["login_time"] = time();
      $_SESSION["logged_in"] = 1;
      return true;

    }else{
      return false;
    }
  }

  public function logout()
  {
    unset($_SESSION['user']);
    unset($_SESSION['login_time']);
    unset($_SESSION['logged_in']);
    session_destroy();
    echo "Destroyed";
  }

  public function get($id)
  {
    $db = new DB();
    $result = $db->select('members',"id = $id");

    return new User($result);
  }

}
?>


