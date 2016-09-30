<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao_funcionario_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}


	public function cadastrar()
	{

		$this->load->model('estoque_folha_model', 'folhas');
		


		$valor = $this->input->post('nome_aluno2');
		$salvar = explode(':', $valor, 2);
		$data['func_id'] = $this->input->post('nome');

		if ($this->input->post('copias') > $total) {
			$data['copias'] = $this->input->post('copias');
		}else{
			$this->session->set_flashdata('danger', 'O valor de cópias excedeu o estoque');
			redirect('dashboard/impressao_aluno');
		}
		
		//$this->db->set('data_impressao_aluno', 'NOW()', FALSE);
		$data['copias'] = $this->input->post('copias');
		$data['impressora_id'] = $this->input->post('impressora');


		return $this->db->insert('impressao_funcionario', $data) ;

	}


	function get_funcionarios(){
		$this->db->select("*");

		return  $this->db->get("aluno")->result();
	}



	function verificarEstoque(){
		$query = $this->db->query('SELECT quantidade FROM estoque_folha WHERE ativo = 1 ');

		if ($query == 0 ) {
			$dados = array('ativo'=> "1", 'espera'=> "0", 'data_inicio' =>'NOW()');
			$this->db->where('espera', '1');
			$this->db->update('estoque_folha', $dados); 
		}
		
	}


	function get_impressoras(){
		$this->db->select("*");

		return  $this->db->get("impressoras")->result();
	}

	function listagem(){
		$this->db->select("*");
		$this->db->from('impressao_funcionario as i');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('funcionario as f', 'i.func_id = f.idFunc', 'left');

		$query = $this->db->get();
		return $query->result();

	}

	function get_Total(){
		$query1 = $this->db->query('SELECT quantidade FROM estoque_folha WHERE ativo = 1 ');

		if ($query1 == 0 ) {
			$dados = array('ativo'=> "1", 'espera'=> "0", 'data_inicio' =>'NOW()');
			$this->db->where('espera', '1');
			$this->db->update('estoque_folha', $dados); 
		}

		$query = $this->db->query('SELECT quantidade FROM estoque_folha WHERE ativo = 1 ');
		return  $query->row();  
	}


	function get_impressoes(){
		$this->db->select('*');
		return  $this->db->get('impressao_funcionario')->result();
	}
	function get_impressoesLivres(){
		$query = $this->db->query('SELECT * FROM impressao_funcionario');
		return  $query->num_rows();  
	}



	function get_listagem(){
		$this->db->select("*");
		$this->db->from('funcionario');
		$query = $this->db->get();
		return $query->result();

	}


	function pesquisar_aluno(){
		$termo = $this->input->post('pesquisar');
		$this->db->select('*');
		$this->db->from('funcionario');
		$this->db->like('nome', $termo);
		$query = $this->db->get();
		return  $query->result();
	}



	public function GetRow($keyword) {        
		$this->db->order_by('idFunc', 'DESC');
		$this->db->like("nome", $keyword);
		return $this->db->get('aluno')->result_array();
	}




}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
