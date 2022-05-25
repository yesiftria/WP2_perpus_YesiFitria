<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

    public function __construct(){
        parent::__construct();

        //model
        $this->load-> model ('M_role');
    }
        

    public function index(){

        $q = $this->M_role->GetAll();

        $data = array(
            "menu"   => 'Role',
            "submenu"    => 'read',
            "data"  => $q
        );

        $this->load->view('template2/header',$data);
        $this->load->view('template2/menu',$data);

        $this->load->view ('role/read',$data);
        $this->load->view('template2/footer',$data);
        
    }

    public function create(){

        $q = $this->M_role->GetAll();

        $data = array(
            "menu"   => 'Role',
            "submenu"    => 'create',
            "data"  => $q
        );

        $this->load->view('template2/header',$data);
        $this->load->view('template2/menu',$data);

        $this->load->view ('role/create',$data);
        $this->load->view('template2/footer',$data);
        
    }

    public function save(){

        $data = array(
            'id' =>NULL,
            'role' =>$this->input->post('role')
        );
        
        $this->M_role->insert($data);
        
        redirect('role','refresh');
    }

    public function delete(){
        
        $id = $this->uri->segment(3);
        
        $this->M_role->delete($id);
        
        redirect('Role','refresh');
        
    }
    public function edit(){
        
        $id = $this->uri->segment(3);
        
        $data = array(
            "menu"   => 'Role',
            "submenu"    => 'edit',
            "data"  => $this->M_role->GetByid($id)
        );

        $this->load->view('template2/header',$data);
        $this->load->view('template2/menu',$data);

        $this->load->view ('role/edit',$data);
        $this->load->view('template2/footer',$data);
        
    } 

    public function update(){

        $id = $this->uri->segment(3);
        
        $data = array(
            'Role' =>$this->input->post('role')
        );
        
        $this->M_role->update($id, $data);
        
        redirect('role','refresh');
    }
}

/* End of file Controllername.php */
