<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagantes_devedores_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}




	function get_impressoesPagas(){

		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');

		$this->db->select("*");
		$this->db->from('impressao_aluno as i');
		$this->db->where('(situacao = 1 ) ');
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('aluno as a', 'i.aluno_id = a.idAluno', 'left');
		$this->db->join('sala as s', 'a.sala_id = s.idSala', 'left'); 
		$this->db->order_by('data_impressao_aluno', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}



	function get_impressoesNaoPagas(){
		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');

		$this->db->select("*");
		$this->db->from('impressao_aluno as i');
		$this->db->where('(situacao = 2 ) ');
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('aluno as a', 'i.aluno_id = a.idAluno', 'left');
		$this->db->join('sala as s', 'a.sala_id = s.idSala', 'left'); 
		$this->db->order_by('data_impressao_aluno', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	function get_TotalPagas(){

		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');

		$this->db->select_sum('total');
		$this->db->from('impressao_aluno');
		$this->db->where('(situacao = 1 ) ');
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$query = $this->db->get();
		return $query->result();
	}

	function get_TotalCopias(){

		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');

		$this->db->select_sum('copias');
		$this->db->from('impressao_aluno');
		$this->db->where('(situacao = 1 ) ');
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$query = $this->db->get();
		return $query->result();
	}
	function get_TotalCopiasReceber(){

		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');

		$this->db->select_sum('copias');
		$this->db->from('impressao_aluno');
		$this->db->where('(situacao = 2 ) ');
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$query = $this->db->get();
		return $query->result();
	}

	function get_TotalReceber(){
		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');

		$this->db->select_sum('total');
		$this->db->from('impressao_aluno');
		$this->db->where('(situacao = 2 ) ');
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$query = $this->db->get();
		return $query->result();
	}

}

