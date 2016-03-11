<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    /*
     * Popula os selects com os heróis cadastrados
     */
    public function index(){
        $data['options_h'] = '';
        $data['options_o'] = '';

        $query = $this->db->query("SELECT * FROM lutador");
        foreach ($query->result() as $row)
        {
            if($row->nm_raca === 'HUMANO'){
                $data['options_h'] .= '<option value="'.$row->nm_lutador.'">'.$row->nm_lutador.'</option>';
            }else{
                $data['options_o'] .= '<option value="'.$row->nm_lutador.'">'.$row->nm_lutador.'</option>';
            }
        }

        $this->load->view('Rpg/Login',$data);
    }

    /*
     * Testa se o usuário e senha informados são válidos e redireciona para a área de administração
     */
    public function admin(){
        if(!$this->input->post('login') || !$this->input->post('senha')){
            $data['heading'] = 'Erro';
            $data['message'] = 'Usu&aacute;rio ou senha n&atilde;o passados';
            $this->load->view('errors/html/error_general',$data);
        }else{
            if($this->input->post('login') == 'admin' || $this->input->post('senha') == 'admin'){
                redirect('admin/crud_lutador', 'refresh');redirect('login/crud_lutador', 'refresh');
            }else{
                $data['heading'] = 'Erro';
                $data['message'] = 'Usu&aacute;rio ou senha n&atilde;o incorretos';
                $this->load->view('errors/html/error_general',$data);
            }
        }

    }
}