<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque_folha extends CI_Controller {

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
		

		


		$this->load->model('estoque_folha_model', 'folhas');
		$data['folhas'] = $this->folhas->get_estoque();
		//$data['ativo'] = $this->folhas->get_ativo();
		//$data['salas'] = $this->aluno->get_salas();
		//$data['listagem'] = $this->aluno->listar_salas();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('estoque_folha/listar_estoque_folha',$data);
		$this->load->view('includes/html_footer');

	}



	public function inserir()
	{
		$this->load->model('estoque_folha_model', 'folha');

		if ($this->folha->cadastrar()) {
			$this->session->set_flashdata('success', 'Estoque cadastrado com sucesso');
			redirect('estoque_folha'); 	
		}

	}
	public function adicionaFolha()
	{
		$this->load->model('estoque_folha_model', 'folha');

		if ($this->folha->adicionaFolha()) {
			$this->session->set_flashdata('success', ' Inserção efetuada com sucesso');
			redirect('estoque_folha'); 	
		}

	}
	public function retiraFolha()
	{
		$this->load->model('estoque_folha_model', 'folha');

		if ($this->folha->retiraFolha()) {
			$this->session->set_flashdata('success', 'Retirada efetuada com sucesso');
			redirect('estoque_folha'); 	
		}

	}

	public function editaEstoque()
	{
		$this->load->model('estoque_folha_model', 'folha');

		if ($this->folha->editaEstoqueMinmo()) {
			$this->session->set_flashdata('success', 'Estoque editado com sucesso');
			redirect('estoque_folha'); 	
		}

	}

	function desativarEstoque()
	{
		$id = $this->uri->segment(3);
		$this->load->model('estoque_folha_model','',TRUE);
		$this->estoque_folha_model->desativarEstoque($id);
		redirect('estoque_folha', 'refresh');
	}

	function ativarEstoque()
	{
		$this->load->model('estoque_folha_model','',TRUE);
		
		
		if (!$this->estoque_folha_model->checarAtivo()) {
			$id = $this->uri->segment(3);
			$this->load->model('estoque_folha_model','',TRUE);
			$this->estoque_folha_model->ativarEstoque($id);
			redirect('estoque_folha', 'refresh');
		}else{
			$this->session->set_flashdata('danger', 'Já existe estoque ativo. ');
			redirect('estoque_folha'); 
		}

		
	}

}
