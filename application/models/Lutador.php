<?php

class Lutador extends CI_Model{

    public function return_lutadores(){
        $query = $this->db->get('lutador');
        return $query->result();
    }

    public function addLutador($dados){
        $this->db->insert('lutador',$dados);
    }

    public function  altLutador($dados,$id){
        $this->db->update('lutador',$dados,array('id' => $id));
    }

    public function  delLutador($id){
        $this->db->delete('lutador',array('id' => $id));
    }

}