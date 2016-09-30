<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio_anual extends CI_Controller {

	public function verificar_sessao(){
		if ($this->session->userdata('logado') == false) {
			redirect('dashboard/login');
		}
	}
	public function verificar_acesso(){
		if ($this->session->userdata('nivel') == 2) {
			$this->session->set_flashdata('danger', 'Acesso não permitido');
			redirect('dashboard');
		}
	}

	public function index()
	{
		
		$this->verificar_sessao();
		$this->verificar_acesso();
		$this->load->model('relatorio_anual_model', 'rel');

		$data['janeiro'] = $this->rel->get_janeiro();
		$data['janeiroFunc'] = $this->rel->get_janeiroFunc();

		$data['fevereiro'] = $this->rel->get_fevereiro();
		$data['fevereiroFunc'] = $this->rel->get_fevereiroFunc();

		$data['marco'] = $this->rel->get_marco();
		$data['marcoFunc'] = $this->rel->get_marcoFunc();

		$data['abril'] = $this->rel->get_abril();
		$data['abrilFunc'] = $this->rel->get_abrilFunc();

		$data['maio'] = $this->rel->get_maio();
		$data['maioFunc'] = $this->rel->get_maioFunc();

		$data['junho'] = $this->rel->get_junho();
		$data['junhoFunc'] = $this->rel->get_junhoFunc();

		$data['julho'] = $this->rel->get_julho();
		$data['julhoFunc'] = $this->rel->get_julhoFunc();

		$data['agosto'] = $this->rel->get_agosto();
		$data['agostoFunc'] = $this->rel->get_agostoFunc();

		$data['setembro'] = $this->rel->get_setembro();
		$data['setembroFunc'] = $this->rel->get_setembroFunc();

		$data['outubro'] = $this->rel->get_outubro();
		$data['outubroFunc'] = $this->rel->get_outubroFunc();

		$data['novembro'] = $this->rel->get_novembro();
		$data['novembroFunc'] = $this->rel->get_novembroFunc();

		$data['dezembro'] =  $this->rel->get_dezembro();
		$data['dezembroFunc'] = $this->rel->get_dezembroFunc();
		

		$this->load->model('impressao_aluno_model', 'impressao');
		$data_comeco = date('Y-m-d H:i:s');
		$data['pagas']  = $this->impressao->get_impressoesPagas();
		$data['Naopagas']  = $this->impressao->get_impressoesNaoPagas();
		$data['totais']  = $this->impressao->get_impressoes();

		$this->load->model('impressao_funcionario_model', 'impressaoFunc');
		$data['livres']  = $this->impressaoFunc->get_impressoesLivres();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('financeiro/relatorio_anual',$data);
		$this->load->view('includes/html_footer');

	}







	

}
