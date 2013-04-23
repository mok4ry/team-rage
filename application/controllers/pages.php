<?php

  class Pages extends CI_Controller {

    public function view($page = 'rage')
    {
      if( ! file_exists('application/views/pages/'.$page.'.php'))
      {
	//There's no page!
	show_404();
      }

      $data['title'] = ucfirst($page); //First letter is capitalized
      
      $this->load->library('session');
      $this->load->database();
      $this->load->view('templates/header', $data);
      $this->load->view('pages/' .$page, $data);
      $this->load->view('templates/footer', $data);

    }

    public function ragesub()
    {

      $this->load->database();

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
        $result = mysql_query("UPDATE members SET rage_id='$rageId', lastUpdated='$date', description='$description', manualImage='' WHERE id='$memberId'") or die(mysql_error());
      }
      else
      {
        $result = mysql_query("UPDATE members SET rage_id='$rageId', lastUpdated='$date', description='$description', manualImage='$manualImage', where id='$memberId'") or die(mysql_error());
      }

    }
 
  }
