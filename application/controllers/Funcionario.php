<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

	public function verificar_sessao(){
		if ($this->session->userdata('logado') == false) {
			redirect('dashboard/login');
		}
	}

	public function index()
	{
		
		$this->verificar_sessao();
		$this->load->model('funcionario_model', 'funcionario');
		$data['funcionarios'] = $this->funcionario->get_funcionarios();
		//$data['salas'] = $this->aluno->get_salas();
		//$data['listagem'] = $this->aluno->listar_salas();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('funcionario/listar_funcionario',$data);
		$this->load->view('includes/html_footer');

	}

	public function cadastro() 			
	{
		$this->verificar_sessao();
		$this->load->model('funcionario_model', 'funcionario');
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('funcionario/cadastro_funcionario');
		$this->load->view('includes/html_footer');

	}

	public function cadastrar()
	{
		$this->load->model('funcionario_model', 'funcionario');

		if ($this->funcionario->cadastrar()) {
			$this->session->set_flashdata('success', 'Funcionário cadastrado com sucesso');
			redirect('funcionario'); 	
		}

	}



	public function excluir($id = null){

		$this->load->model('funcionario_model');

		if ($this->funcionario_model->excluir($id)) {
			$this->session->set_flashdata('success', 'funcionario deletado com sucesso');
			redirect('funcionario'); 	
		}else{
			$this->session->set_flashdata('success', 'funcionario nao deletado com sucesso');
			redirect('funcionario'); 
		}


	}

	public function salvar_atualizacao()
	{
		$this->load->model('funcionario_model', 'funcionario');

		if ($this->funcionario->salvar_atualizacao()) {
			redirect('funcionario'); 	
		}

	}

	public function atualizar ($id = null)
	{

		$this->load->model('funcionario_model', 'funcionario');

		$this->db->where('idFunc',$id);
		$dados['funcionario'] = $this->funcionario->get_funcionarios();




		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('funcionario/editar_funcionario', $dados);
		$this->load->view('includes/html_footer');

	}

	public function pesquisar()
	{
		
		$this->verificar_sessao();
		$this->load->model('funcionario_model', 'funcionario');
		$data['funcionarios'] = $this->funcionario->pesquisar_funcionario();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('funcionario/listar_funcionario',$data);
		$this->load->view('includes/html_footer');

	}

	public function getFuncNome(){
		$this->load->model('funcionario_model');
		$keyword=$this->input->post('keyword');
		$data=$this->funcionario_model->GetRow($keyword);        
		echo json_encode($data);
	}


}
