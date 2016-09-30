<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verificacao extends CI_Controller {


	public function verificar_sessao(){
		if ($this->session->userdata('logado') == false) {
			redirect('verificacao/login');
		}
	}



	public function login(){

		$this->load->view('includes/html_header');
		$this->load->view('login');
		$this->load->view('includes/html_footer');
	}

	public function logar(){
		$email = $this->input->post("email");
		$senha = md5($this->input->post("senha"));


		$this->db->where('senha', $senha);
		$this->db->where('email', $email);
		$this->db->where('status', 1);
		$data['usuario'] = $this->db->get('usuario')->result();


		if (count($data['usuario']) == 1) {

			$dados['nome'] = $data['usuario'][0]->nome;
			$dados['id'] = $data['usuario'][0]->idUsuario;
			$dados['nivel'] = $data['usuario'][0]->nivel;
			$dados['logado'] = TRUE;

			$this->session->set_userdata($dados);


			// Carregar dados e funções da tabela estoque_folha
			$this->load->model('estoque_folha_model', 'folhas');
			$data['total']  = $this->folhas->get_Total();
			$data['cheio']  = $this->folhas->get_estoqueII();
			$data['vazio'] = $this->folhas->checarAtivo();

		// Carregar dados e funções da tabela impressao_aluno
			$this->load->model('impressao_aluno_model', 'impressao');
			$data['impressoes'] = $this->impressao->get_impressoes();
			$data['listagem'] = $this->impressao->listagem();
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
		}else {
			$this->session->set_flashdata('danger', 'Dados incorretos, ou usuário inativo');
			redirect('verificacao/login');
		}
	}




}

/* End of file verificacao.php */
/* Location: ./application/controllers/verificacao.php */