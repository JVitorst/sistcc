<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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

		$this->load->model('usuario_model', 'usuario');
		$dados['usuarios'] = $this->usuario->get_usuarios();
		//$dados['cidades'] = $this->usuario->get_cidades();
		
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('usuario/listar_usuario',$dados);
		$this->load->view('includes/html_footer');

	}

	public function cadastro() 			
	{
		$this->verificar_sessao();
		$this->load->model('usuario_model', 'usuario');
		//$dados['cidades'] = $this->usuario->get_cidades();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('usuario/cadastro_usuario');
		$this->load->view('includes/html_footer');

	}

	public function cadastrar()
	{
		$this->load->model('usuario_model', 'usuario');

		if ($this->usuario->cadastrar()) {
			$this->session->set_flashdata('success', 'Usuario Cadastrado com sucesso');
			redirect('usuario'); 	
		}

	}



	public function excluir($id = null){
		$this->verificar_acesso();

		$this->load->model('usuario_model', 'usuario');

		if ($this->usuario->excluir($id)) {

			redirect('usuario'); 	
		}else{
			$this->session->set_flashdata('success', 'Usuario deletado com sucesso');
			redirect('usuario'); 
		}


	}

	public function salvar_atualizacao()
	{
		$this->load->model('usuario_model', 'usuario');

		if ($this->usuario->salvar_atualizacao()) {
			redirect('usuario'); 	
		}

	}

	public function salvar_senha(){

		$this->load->model('usuario_model', 'usuario');

		if ($this->usuario->salvar_senha()) {
			redirect('usuario'); 	

			
		}



	}

	public function atualizar ($id = null)
	{
		$this->db->where('idUsuario',$id);
		$this->load->model('usuario_model', 'usuario');


		$dados['usuario'] = $this->db->get('usuario')->result();
		//$dados['cidades'] = $this->usuario->get_cidades();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('usuario/editar_usuario', $dados);
		$this->load->view('includes/html_footer');

	}

}
