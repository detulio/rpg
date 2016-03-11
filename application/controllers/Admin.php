<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }

    /*
     * Popula o grid com os personagens cadastrados
     */
    public function Grid(){
        $table = "";
        $this->load->model('Lutador');
        $rs = $this->Lutador->return_lutadores();

        foreach($rs as $row){
            $table .= '<tr><td>'.$row->id.'</td><td>'.$row->nm_lutador.'</td><td>'.$row->nm_raca.'</td><td></td></tr>';
        }
        return $table;
    }

    /*
     * Redireciona a ação para a opção correta no crud segundo a resquisição do usuário (A - Alteração Inclusao, E - Exclusão)
     */
    public function crud_lutador(){
        $dados['erro'] = '';
        if($this->input->get('op') == 'A'){
            if($this->input->post('id') == '' || !$this->input->post('id')){
                $dados['erro'] = $this->NovoLutador();
            }else{
                $this->AlterarLutador();
                $dados['erro'] = $this->AlterarLutador();
            }
        }
        $dados['table'] = $this->Grid();
        $this->load->view('Rpg/Admin',$dados);
    }


    /*
     * Método para inclusão de novo Lutador
     */
    public function NovoLutador(){
        $this->load->model('Lutador');
        if($this->input->post('nome') == ''){
            return 'O Nome n&atilde;o pode estar em branco!';
        }
        $dados = array(
            'nm_lutador' => $this->input->post('nome'),
            'nm_raca' => $this->input->post('raca'),
            'dt_inclusao' => date('Y-m-d H:i:s'),
            'dt_alteracao' => date('Y-m-d H:i:s')
        );

        $this->Lutador->addLutador($dados);
        return false;
    }

    /*
     * M[etodo para alteração de Lutador
     */
    public function AlterarLutador(){
        $this->load->model('Lutador');
        if($this->input->post('nome') == ''){
            return 'O Nome n&atilde;o pode estar em branco!';
        }
        $dados = array(
            'nm_lutador' => $this->input->post('nome'),
            'nm_raca' => $this->input->post('raca'),
            'dt_alteracao' => date('Y-m-d H:i:s')
        );

        $this->Lutador->altLutador($dados,$this->input->post('id'));
        return false;
    }

    /*
     * Método para deletar um lutador
     */
    public function DeletarLutador($id){
        $this->load->model('Lutador');
        $this->Lutador->delLutador($id);
        $dados['table'] = $this->Grid();
        $dados['erro'] = '';
        redirect('admin/crud_lutador?op=E', 'refresh');
    }
}