<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $folder = "user/";
    private $template = "template2/";
    private $menu = "User";

    public function __construct(){
        parent::__construct();

        //model
        $this->load-> model ('M_user');
        $this->load-> model ('M_role');
    }
        

    public function index(){

        $q = $this->M_user->GetAll();

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

    public function create($error=NULL){

        $q = $this->M_user->GetAll();

        $data = array(
            "menu"      => $this->menu,
            "submenu"   => 'create',
            "role"      => $this->M_role->GetALL(),
            "error"     =>$error

        );

        $this->load->view($this->template.'/header',$data);
        $this->load->view($this->template.'/menu',$data);

        $this->load->view ($this->folder.'create',$data);
        $this->load->view($this->template.'/footer',$data);
        
    }

    public function save(){

        
        $config['upload_path'] = './uploads/user/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image')){
            $error = $this->upload->display_errors();

            $this->create($error);
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            
            $data = array(
                'id'    =>NULL,
                'nama'  =>$this->input->post('nama'),
                'email' =>$this->input->post('email'),
                'image' =>$data['upload_data']['file_name'],
                'password' =>$this->input->post('password'),
                'id' =>$this->input->post('id'),
                'is_active' =>$this->input->post('is_active'),
                'tgl_input' =>date('Y-m-d H:i:s')
            );
            
            $this->M_user->insert($data);
            
            redirect($this->menu,'refresh');
        }
        
        
    }

    public function delete(){
        
        $id = $this->uri->segment(3);
        
        $this->M_user->delete($id);
        
        redirect($this->menu,'refresh');
        
        
    }
    public function edit(){
        
        $id = $this->uri->segment(3);
        
        $data = array(
            "menu"   => $this->menu,
            "submenu"    => 'edit',
            "data"  => $this->M_user->GetByid($id),
            "role"      => $this->M_role->GetALL()
        );

        $this->load->view($this->template.'/header',$data);
        $this->load->view($this->template.'/menu',$data);

        $this->load->view ($this->folder.'edit',$data);
        $this->load->view($this->template.'/footer',$data);
        
    } 

    public function update(){

        $id = $this->uri->segment(3);
        
        $data = array(
            'id'   =>NULL,
            'nama' =>$this->input->post('nama'),
            'email' =>$this->input->post('email'),
            'image' =>$this->input->post('image'),
            'password' =>$this->input->post('password'),
            'id' =>$this->input->post('id'),
            'is_active' =>$this->input->post('is_active')
            //'tgl_input' =>date('Y-m-d H:i:s')
        );
        
        $this->M_user->update($id, $data);
        
        redirect($this->menu,'refresh');
    }

    public function editimage($error = NULL){
        
        $id = $this->uri->segment(3);
        
        $data = array(
            "menu"   => $this->menu,
            "submenu"    => 'edit',
            "data"  => $this->M_user->GetByid($id),
            "error"     =>$error
        );

        $this->load->view($this->template.'/header',$data);
        $this->load->view($this->template.'/menu',$data);

        $this->load->view ($this->folder.'editimage',$data);
        $this->load->view($this->template.'/footer',$data);
        
    } 
}

/* End of file user.php */
