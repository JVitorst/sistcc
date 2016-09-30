<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Aluno extends CI_Controller {

	public function verificar_sessao(){
		if ($this->session->userdata('logado') == false) {
			redirect('dashboard/login');
		}
	}

	public function index()
	{
		
		$this->verificar_sessao();
		$this->load->model('aluno_model', 'aluno');
		$data['salas'] = $this->aluno->get_salas();
		$data['alunos'] = $this->aluno->get_alunos();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/listar_aluno',$data);
		$this->load->view('includes/html_footer');

	}

	public function cadastro() 			
	{
		$this->verificar_sessao();
		$this->load->model('aluno_model', 'aluno');
		$dados['salas'] = $this->aluno->get_salas();
		$dados['listagem'] = $this->aluno->get_alunos();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/cadastro_aluno', $dados);
		$this->load->view('includes/html_footer');

	}

	public function cadastrar()
	{
		$this->load->library('javascript/jquery');
		$this->load->model('aluno_model', 'aluno');

		if ($this->aluno->cadastrar()) {
			$this->session->set_flashdata('success', 'Aluno Cadastrado com sucesso');
			//$this->output->enable_profiler(TRUE);
			redirect('aluno/pag'); 	
		}

	}



	public function excluir($id = null){

		$this->load->model('aluno_model');

		if ($this->aluno_model->excluir($id)) {
			$this->session->set_flashdata('success', 'Aluno deletado com sucesso');
			redirect('aluno/pag'); 	
		}else{
			$this->session->set_flashdata('success', 'Aluno nao deletado com sucesso');
			redirect('usuario'); 
		}


	}

	public function salvar_atualizacao()
	{
		$this->load->model('aluno_model', 'aluno');

		if ($this->aluno->salvar_atualizacao()) {
			$this->session->set_flashdata('success', 'Aluno atualizado com sucesso');
			redirect('aluno/pag'); 	
		}

	}

	public function atualizar ($id = null)
	{


		$this->load->model('aluno_model', 'aluno');
		$dados['salas'] = $this->aluno->get_salas();
		$this->db->where('idAluno',$id);
		$dados['aluno'] = $this->aluno->get_alunos();



		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/editar_aluno', $dados);
		$this->load->view('includes/html_footer');

	}

	public function pesquisar()
	{

		$this->verificar_sessao();

		$this->load->model('aluno_model', 'aluno');;
		$data['salas'] = $this->aluno->get_salas();
		$data['listagem'] = $this->aluno->pesquisar_aluno();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/listar_aluno_pesquisa',$data);
		$this->load->view('includes/html_footer');

	}
	public function GetAlunoNome(){
		$this->load->model('aluno_model');
		$keyword=$this->input->post('keyword');
		$data=$this->aluno_model->GetRow($keyword);        
		echo json_encode($data);
	}


	public function pag($value = null){

		if ($value == NULL) {
			$value = 1;
		}

		$reg_pag = 10;

		if ($value <= $reg_pag) {
			$data['btnA'] = 'pointer-events:none';
		}else{ 
			$data['btnA'] = '';
		}


		$this->load->model('aluno_model', 'alunos');
		$u = $this->alunos->get_qtdAlunos();

		#Se botao proximo estara desativado ou nao

		if (($u[0]->total-$value)  <= $reg_pag) {
			$data['btnP'] = 'pointer-events:none';
		}else{
			$data['btnP'] = '';
		}


		$this->load->model('aluno_model', 'aluno');
		$data['alunos'] = $this->aluno->get_alunosPagina($value, $reg_pag);

		$data['value'] = $value;
		$data['reg_pag'] =  $reg_pag;
		$data['qtd_reg'] = $u[0]->total;

		$v_inteiro = (int) $u[0]->total / $reg_pag;
		$v_resto = $u[0]->total % $reg_pag;

		if ($v_resto > 0) {
			$v_inteiro += 1;
		}

		$data['qtd_botoes'] = $v_inteiro;



		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/listar_aluno',$data);
		$this->load->view('includes/html_footer');








	}

}
