<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index(){

        $data = array(
            "menu"   => 'Home',
            "submenu"    => 'read'
        );

        $this->load->view('template2/header',$data);
        $this->load->view('template2/menu',$data);

        $this->load->view ('home/read',$data);
        $this->load->view('template2/footer',$data);

    }

}

/* End of file Controllername.php */
