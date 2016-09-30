<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impressao_aluno_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}


	public function cadastrar()
	{

		$query = $this->db->query('SELECT quantidade FROM estoque_folha WHERE ativo = 1 ');
		$folha = $query->row() ;

		//$valor = $this->input->post('nome_aluno2');
		//$salvar = explode(':', $valor, 2);
		$data['aluno_id'] = $_SESSION['post-data']['nome_aluno'];

		$copias = $this->input->post('copias');
		$data['copias'] = $_SESSION['post-data']['copias'];
		$data['valor'] = $_SESSION['post-data']['valor'];
		$data['total'] = $_SESSION['post-data']['result'];
		$data['situacao'] = $_SESSION['post-data']['situacao'];
		$data['impressora_id'] = $_SESSION['post-data']['impressora'];


		return $this->db->insert('impressao_aluno', $data) ;
		
	}


	function get_alunos(){
		$this->db->select("*");

		return  $this->db->get("aluno")->result();
	}

	function get_salas(){
		$this->db->select("*");

		return  $this->db->get("sala")->result();
	}


	function pagaImpressao($id)
	{
		$data = array('situacao'=> "1");
		$this->db->where('idImpressaoAluno', $id);
		$this->db->update('impressao_aluno', $data); 
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
		date_default_timezone_set("Brazil/East");
		$data_comeco = $this->input->post('data_inicio');
		if (empty($data_comeco)) {
			//echo "entrei no IF";
			$data_comeco = date('Y-m-d H:i:s');
			
		}
		
		$this->db->select("*");
		$this->db->from('impressao_aluno as i');
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_comeco)).'"');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('aluno as a', 'i.aluno_id = a.idAluno', 'left');
		$this->db->join('sala as s', 'a.sala_id = s.idSala', 'left');
		$this->db->order_by('data_impressao_aluno','DESC');
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
		return  $this->db->get('impressao_aluno')->result();
	}
	function get_listagem(){
		$this->db->select("*");
		$this->db->from('aluno');
		$this->db->join('sala as s', 'alun_sala_idSala = s.idSala', 'inner');
		$query = $this->db->get();
		return $query->result();

	}


	function pesquisar_aluno(){
		$termo = $this->input->post('pesquisar');
		$this->db->select('*');
		$this->db->from('aluno');
		$this->db->join('sala as s', 'alun_sala_idSala = s.idSala', 'inner');
		$this->db->like('alun_nome', $termo);
		$query = $this->db->get();
		return  $query->result();
	}



	public function GetRow($keyword) {        
		$this->db->order_by('alun_id', 'DESC');
		$this->db->like("alun_nome", $keyword);
		return $this->db->get('aluno')->result_array();
	}


	function get_impressoesPagas(){
		$query = $this->db->query('SELECT * FROM impressao_aluno WHERE situacao = 1 ');
		return  $query->num_rows();  
	}

	function get_impressoesNaoPagas(){
		$query = $this->db->query('SELECT * FROM impressao_aluno WHERE situacao = 2 ');
		return  $query->num_rows();  
	}
	function get_impressoesTotais(){
		$query = $this->db->query('SELECT * FROM impressao_aluno WHERE situacao = 2 ');
		return  $query->num_rows();  
	}



	function checkDevedores($id){
		//$aluno = $this->input->post('nome_aluno');

		$this->db->select("*");
		$this->db->from('impressao_aluno as i');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('aluno as a', 'i.aluno_id = a.idAluno', 'left');
		$this->db->join('sala as s', 'a.sala_id = s.idSala', 'left');
		$this->db->where('situacao', '2');
		$this->db->where('idAluno', $id);

		$query = $this->db->get();
		return $query->result();

	}

	function alunosDevedores(){
		//$aluno = $this->input->post('nome_aluno');

		$this->db->select("*");
		$this->db->from('impressao_aluno as i');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('aluno as a', 'i.aluno_id = a.idAluno', 'left');
		$this->db->join('sala as s', 'a.sala_id = s.idSala', 'left');
		$this->db->where('situacao', '2');
		$this->db->order_by('data_impressao_aluno','DESC');

		$query = $this->db->get();
		return $query->result();

	}

	function pesquisar_alunoDevedor(){
		$termo = $this->input->post('pesquisar');
		$this->db->select('*');
		$this->db->from('impressao_aluno as i');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('aluno as a', 'i.aluno_id = a.idAluno', 'left');
		$this->db->join('sala as s', 'a.sala_id = s.idSala', 'left');
		$this->db->where('situacao', '2');
		$this->db->like('nome', $termo);
		$query = $this->db->get();
		return  $query->result();
	}



}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
