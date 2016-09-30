<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}



	public function cadastrar()
	{
		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['cargo'] = $this->input->post('cargo');
		$data['local'] = $this->input->post('local');


		return $this->db->insert('funcionario', $data) ;
	}

	public function excluir($id = null)
	{


		$this->db->where("idFunc", $id);
		return 	$this->db->delete('funcionario');

	}

	public function salvar_atualizacao()
	{
		$id = $this->input->post('idFunc');

		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['cargo'] = $this->input->post('cargo');
		$data['local'] = $this->input->post('local');

		$this->db->where('idFunc', $id); 

		return $this->db->update('funcionario', $data);
	}


	public function GetRow($keyword) {        
		$this->db->order_by('idFunc', 'DESC');
		$this->db->like("nome", $keyword);
		$this->db->order_by("nome", "ASC"); 
		return $this->db->get('funcionario')->result_array();
	}



	function get_funcionarios(){
		$this->db->select('*');
		return  $this->db->get('funcionario')->result();
	}


	function pesquisar_funcionario(){
		$termo = $this->input->post('pesquisar');
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->like('nome', $termo);
		$query = $this->db->get();
		return  $query->result();
	}
}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
