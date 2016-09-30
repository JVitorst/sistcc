<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagantes_devedores extends CI_Controller {

	public function verificar_sessao(){
		if ($this->session->userdata('logado') == false) {
			redirect('verificacao/login');
		}
	}
	
	public function verificar_acesso(){
		if ($this->session->userdata('nivel') == 2) {
			$this->session->set_flashdata('danger', 'Acesso não permitido');
			redirect('dashboard');
		}
	}

	public function index($data = array())
	{
		
		$this->verificar_sessao();

		$this->verificar_acesso();

		$this->load->model('pagantes_devedores_model', 'pd');
		
		$data['pagas']  = $this->pd->get_impressoesPagas();
		$data['naopagas']  = $this->pd->get_impressoesNaoPagas();

		$data['totalpg']  = $this->pd->get_TotalPagas();
		$data['totalcop']  = $this->pd->get_TotalCopias();
		$data['totalcoprec']  = $this->pd->get_TotalCopiasReceber();
		$data['totalrc']  = $this->pd->get_TotalReceber();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('financeiro/pagantes_devedores',$data);
		$this->load->view('includes/html_footer');

	}
	

}
