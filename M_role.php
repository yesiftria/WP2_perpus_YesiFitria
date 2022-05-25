<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_role extends CI_Model {

    private $table = 'role';
    private $pk ='id';

    public function GetAll(){
        return $this->db->get($this->table);
    }

    public function insert($data){

        return $this->db->insert($this->table,$data);
    }

    public function delete($id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->delete($this->table);
    }
    public function GetByid($id)
    {
        $this->db->where($this->pk, $id);
        return $this->db->get($this->table)->row_array();
    }
    public function update($id, $data){
        $this->db->where($this->pk, $id);
        return $this->db->update($this->table,$data);
    }
}

/* End of file ModelName.php */
