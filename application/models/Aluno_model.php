<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}



	public function cadastrar()
	{
		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['sala_id'] = $this->input->post('sala');

		
		return $this->db->insert('aluno', $data) ;
	}

	public function excluir($id = null)
	{


		$this->db->where("idAluno", $id);
		return 	$this->db->delete('aluno');

	}

	public function salvar_atualizacao()
	{
		$id = $this->input->post('idAluno');

		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['sala_id'] = $this->input->post('sala');

		$this->db->where('idAluno', $id); 

		return $this->db->update('aluno', $data);
	}

	function get_salas(){
		$this->db->select("*");

		return  $this->db->get("sala")->result();
	}

	function get_alunos(){
		$this->db->select("*");
		$this->db->from('aluno');
		$this->db->join('sala as s', 'sala_id = s.idSala', 'inner');
		$this->db->order_by("idAluno", "ASC"); 
		$query = $this->db->get();
		return $query->result();
		
	}



	function pesquisar_aluno(){
		$termo = $this->input->post('pesquisar');
		$this->db->select('*');
		$this->db->from('aluno');
		$this->db->join('sala as s', 'sala_id = s.idSala', 'inner');
		$this->db->like('nome', $termo);
		$query = $this->db->get();
		return  $query->result();
	}

	public function GetRow($keyword) {        
		$this->db->order_by('idAluno', 'DESC');
		$this->db->like("nome", $keyword);
		$this->db->order_by("nome", "ASC"); 
		return $this->db->get('aluno')->result_array();
	}

	function get_qtdAlunos(){
	 		#botao Proximo
		$this->db->select('count(*) as total');
		return $this->db->get('aluno')->result(); #contando quantos registros tem em Alunos
	}

	function get_alunosPagina($value, $reg_pag){
		$this->db->select("*");
		$this->db->limit($reg_pag, $value);
		$this->db->join('sala as s', 'sala_id = s.idSala', 'inner');
		$this->db->order_by("idAluno", "ASC"); 
		return $this->db->get('aluno')->result();
	}

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
