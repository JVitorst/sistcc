<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function verificar_sessao(){
		if ($this->session->userdata('logado') == false) {
			redirect('verificacao/login');
		}
	}
	public function verificar_acesso(){
		if ($this->session->userdata('nivel') == 2) {
			redirect('dashboard');
		}
	}
	public function index($data = array())
	{
		
		$this->verificar_sessao();
		

// Carregar dados e funções da tabela estoque_folha
		$this->load->model('estoque_folha_model', 'folhas');
		$data['total']  = $this->folhas->get_Total();
		$data['cheio']  = $this->folhas->get_estoqueII();
		$data['vazio'] = $this->folhas->checarAtivo();

		// Carregar dados e funções da tabela impressao_aluno
		$this->load->model('impressao_aluno_model', 'impressao');
		$data_comeco = date('Y-m-d H:i:s');
		$data['listagem'] = $this->impressao->listagem();
		$data['devedores'] = $this->impressao->alunosDevedores();
		$data['pagas']  = $this->impressao->get_impressoesPagas();
		$data['Naopagas']  = $this->impressao->get_impressoesNaoPagas();
		

		// Carregar dados e funções da tabela impressao_funcionario
		$this->load->model('impressao_funcionario_model', 'impressaoFunc');
		$data['impressoes'] = $this->impressaoFunc->get_impressoes();
		$data['listagemFunc'] = $this->impressaoFunc->listagem();
		$data['livres']  = $this->impressaoFunc->get_impressoesLivres();

		
		


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('dashboard',$data);
		$this->load->view('includes/html_footer');

	}
	public function impressao_aluno() 			
	{
		$this->verificar_sessao();

		$this->load->model('estoque_folha_model', 'folhas');
		$dados['totalFolha']  = $this->folhas->get_Total();
		$dados['estoque']  = $this->folhas->get_Total();


		$this->load->model('impressao_aluno_model', 'impressao');
		$dados['salas'] = $this->impressao->get_salas();
		$dados['impressoras'] = $this->impressao->get_impressoras();
		$dados['alunos'] = $this->impressao->get_alunos();
		$dados['devedores'] = $this->impressao->alunosDevedores();
		$dados['listagem'] = $this->impressao->pesquisar_alunoDevedor();
		
		$this->load->model('pagantes_devedores_model', 'pd');
		$dados['naopagas']  = $this->pd->get_impressoesNaoPagas();


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('impressao_aluno/cadastro_impressao_aluno', $dados);
		$this->load->view('includes/html_footer');

	}
	public function verificarAluno($check = NULL)
	{	

		$_SESSION['post-data'] = $_POST;
		$id = $this->input->post('nome_aluno');
		$data['dados'] = $_SESSION['post-data'] ;


		$this->load->model('impressao_aluno_model', 'impressao');

		$check = $this->impressao->checkDevedores($id);
		$data['check'] = $this->impressao->checkDevedores($id);
		if (empty($check)) {
			if ($this->impressao->cadastrar()) {
				$this->session->set_flashdata('success', 'Impressao efetuada com sucesso');
				redirect('dashboard', $t); 	
			}
		}else{
			$this->load->view('includes/html_header');
			$this->load->view('includes/menu');
			$this->load->view('impressao_aluno/checagem_devedor', $data);
			$this->load->view('includes/html_footer');
		}

	}

	public function registrar_aluno()
	{
		$this->load->model('impressao_aluno_model', 'impressao');

		if ($this->impressao->cadastrar($_SESSION)) {
			$this->session->set_flashdata('success', 'Impressao efetuada com sucesso');
			redirect('dashboard', $t); 	
		}

	}

// Parte de registro de impressao de Funcionarios
	public function impressao_funcionario() 			
	{
		$this->verificar_sessao();

		$this->load->model('estoque_folha_model', 'folhas');
		$dados['total']  = $this->folhas->get_Total();
		$dados['estoque']  = $this->folhas->get_Total();

		$this->load->model('impressao_funcionario_model', 'impressao');
		$dados['impressoras'] = $this->impressao->get_impressoras();
		$dados['funcionarios'] = $this->impressao->get_funcionarios();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('impressao_funcionario/cadastro_impressao_funcionario', $dados);
		$this->load->view('includes/html_footer');

	}

	public function registrar_funcionario()
	{
		$this->load->model('impressao_funcionario_model', 'impressao_func');

		if ($this->impressao_func->cadastrar()) {
			$this->session->set_flashdata('success', 'Impressao efetuada com sucesso');
			redirect('dashboard'); 	
		}

	}

// Fim do bloco de Impressao de Funcionarios
	public function alunosDevedores()
	{
		$this->load->model('impressao_aluno_model', 'impressao');

		if ($this->impressao->devedores()) {
			$this->session->set_flashdata('success', 'Impressao efetuada com sucesso');
			redirect('dashboard'); 	
		}

	}

	function paga()
	{
		$id = $this->uri->segment(3);
		$this->load->model('impressao_aluno_model','',TRUE);
		$this->impressao_aluno_model->pagaImpressao($id);
		redirect('dashboard', 'refresh');
	}
	function pagaImpressao()
	{
		$id = $this->uri->segment(3);
		$this->load->model('impressao_aluno_model','',TRUE);
		$this->impressao_aluno_model->pagaImpressao($id);
		redirect('dashboard/impressao_aluno', 'refresh');
	}
	public function pesquisarDevedor()
	{

		$this->verificar_sessao();

		$this->load->model('impressao_aluno_model', 'impressao');;
		$data['impressoes'] = $this->impressao->get_impressoes();
		$data['listagem'] = $this->impressao->pesquisar_alunoDevedor();
		$data['devedores'] = $this->impressao->alunosDevedores();
		$data['pagas']  = $this->impressao->get_impressoesPagas();
		$data['Naopagas']  = $this->impressao->get_impressoesNaoPagas();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('aluno/listar_aluno_pesquisa',$data);
		$this->load->view('includes/html_footer');

	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('dashboard','refresh');
	}



}
