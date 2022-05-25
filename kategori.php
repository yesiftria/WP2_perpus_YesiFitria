<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    private $folder = "kategori/";
    private $template = "template2/";
    private $menu = "kategori";

    public function __construct(){
        parent::__construct();

        //model
        $this->load-> model ('M_kategori');
    }
        

    public function index(){

        $q = $this->M_kategori->GetAll();

        $data = array(
            "menu"   => $this->menu,
            "submenu"    => 'read',
            "data"  => $q
        );

        $this->load->view($this->template.'/header',$data);
        $this->load->view($this->template.'/menu',$data);

        $this->load->view ($this->folder.'read',$data);
        $this->load->view($this->template.'/footer',$data);
        
    }

    public function create(){

        $q = $this->M_kategori->GetAll();

        $data = array(
            "menu"   => $this->menu,
            "submenu"    => 'create',
            "data"  => $q
        );

        $this->load->view($this->template.'/header',$data);
        $this->load->view($this->template.'/menu',$data);

        $this->load->view ($this->folder.'create',$data);
        $this->load->view($this->template.'/footer',$data);
        
    }

    public function save(){

        $data = array(
            'id_kategori'   =>NULL,
            'nama_kategori' =>$this->input->post('nama_kategori')
        );
        
        $this->M_kategori->insert($data);
        
        redirect($this->menu,'refresh');
    }

    public function delete(){
        
        $id = $this->uri->segment(3);
        
        $this->M_kategori->delete($id);
        
        redirect($this->menu,'refresh');
        
    }
    public function edit(){
        
        $id = $this->uri->segment(3);
        
        $data = array(
            "menu"   => $this->menu,
            "submenu"    => 'edit',
            "data"  => $this->M_kategori->GetByid($id)
        );

        $this->load->view($this->template.'/header',$data);
        $this->load->view($this->template.'/menu',$data);

        $this->load->view ($this->folder.'/edit',$data);
        $this->load->view($this->template.'/footer',$data);
        
    } 

    public function update(){

        $id = $this->uri->segment(3);
        
        $data = array(
            'nama_kategori' =>$this->input->post('nama_kategori')
        );
        
        $this->M_kategori->update($id, $data);
        
        redirect($this->menu,'refresh');
    }
}

/* End of file Controllername.php */
