<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    private $table = 'user';
    private $pk ='id';

    public function GetAll(){
        return $this->db->query('SELECT A.*, B.role FROM user AS A, role AS B WHERE A.id = B.id');
    }

    public function insert($data){

        return $this->db->insert($this->table,$data);
    }

    public function delete($id)
    {
        $this->unlink($id);

        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table);
    }
    public function GetByid($id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->query("SELECT A.*, B.role FROM user AS A, role AS B WHERE A.id = B.id")->row_array(); 
    }
    public function update($id, $data){
        $this->db->where($this->pk, $id);
        return $this->db->update($this->table,$data);
    }

    //delete & upload image
    public function unlink($id){

        $data = $this->GetByid($id);
        
        $path = "./uplouds/user/" .$data['image'];

        unlink($path);
    }
}

/* End of file M_user.php */
