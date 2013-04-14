<?php

  class Pages extends CI_Controller {

    public function view($page = 'home')
    {
      if( ! file_exists('application/views/pages/'.$page.'.php'))
      {
	//There's no page!
	show_404();
      }

      $data['title'] = ucfirst($page); //First letter is capitalized

      $this->load->view('templates/header', $data);
      $this->load->view('pages/' .$page, $data);
      $this->load->view('templates/footer', $data);

    }
 
  }
