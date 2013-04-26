<?php

   function ragesub()
     { 

      $memberId = mysql_real_escape_string($_POST['name']);
      $rageId = mysql_real_escape_string($_POST['rage']);
      $description = mysql_real_escape_string($_POST['description']);
      $manualImage = mysql_real_escape_string($_POST['manualImage']);

      if ($rageId == NULL || $rageId == "")
      {
        //Default
        $rageId = "54";
      }

      $date = date("n/j/Y - g:i A");
      if ($manualImage == NULL || $manualImage == "")
      {
        $sql = ("UPDATE members SET rage_id='$rageId', lastUpdated='$date', description='$description', manualImage='' WHERE name='$memberId'");
        $result = mysql_query($sql) or die(mysql_error());

      }
      else
      {  
	$sql = ("UPDATE members SET rage_id='$rageId', lastUpdated='$date', description='$description', manualImage='$manualImage' WHERE name='$memberId'");
	$result = mysql_query($sql) or die(mysql_error());
      }
 
   }

   function quotesub()
   {
     $memberId = mysql_real_escape_string($_POST['name']);
     $context = mysql_real_escape_string($_POST['context']);
     $quote = mysql_real_escape_string($_POST['quote']);
     $date = date("n/j/Y");

     if($memberId == "(Pick one)")
     {
       die('Set a member you goof! <br /><a href="quoterage">Sorry, my bad.</a>');
     }
     if ($context == "")
     {
       $context = "No context";
     }
  
     $query = "INSERT INTO quotes(member_id,context,quote,date) VALUES('$memberId','$context','$quote','$date')";
     $result = mysql_query($query) or die(mysql_error());
   }

   function addmember()
   {
     $name = mysql_real_escape_string($_POST['name']);
     $pass = mysql_real_escape_string($_POST['inputPassword']);

     $result = mysql_query("INSERT INTO members (name,password,rage_id) VALUES('$name','$pass','25')");
   }

if(isset($_POST['sent']))
{
  ragesub();
  header('Location: http://arcticbase.student.rit.edu');
}elseif (isset($_POST['quoterage'])){
  quotesub();
  header('Location: http://arcticbase.student.rit.edu');
}elseif (isset($_POST['member'])){
  addmember();
  header('Location: http://arcticbase.student.rit.edu');
}else{
  header('Location: http://arcticbase.student.rit.edu');
}

?>
