<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque_folha_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}



	public function cadastrar()
	{


		$data['data_entrada'] = $this->input->post('data_entrada');
		$data['quantidade_entrada'] = $this->input->post('quantidade_entrada');
		$data['quantidade'] = $this->input->post('quantidade_entrada');
		//$data['estoque_minimo'] = $this->input->post('estoque_minimo');
		
		

		return $this->db->insert('estoque_folha', $data) ;
	}

	public function adicionaFolha()
	{
		$query = $this->db->query('SELECT quantidade FROM estoque_folha WHERE ativo = 1  ');
		
		$atuais = $query->row();
		
		$adicionadas = $this->input->post('adicionadas');
		$atuais = $atuais->quantidade + $adicionadas;
		$data['quantidade'] = $atuais ;
		

		return $this->db->update('estoque_folha', $data) ;
	}


	public function retiraFolha()
	{
		$query = $this->db->query('SELECT quantidade FROM estoque_folha WHERE ativo = 1  ');
		
		$atuais = $query->row();
		
		$retiradas = $this->input->post('retiradas');
		$atuais = $atuais->quantidade - $retiradas;
		$data['quantidade'] = $atuais ;
		

		return $this->db->update('estoque_folha', $data) ;
	}

	public function editaEstoqueMinmo()
	{
		$estoque = $this->input->post('estoque');
		$data = array(
			'estoque_minimo' => $estoque,
			);

		

		return $this->db->update('estoque_folha', $data) ;
	}

	public function excluir($id = null)
	{


		$this->db->where("alun_id", $id);
		return 	$this->db->delete('aluno');

	}

	function ativarEstoque($id)
	{
		$data = array('ativo'=> "1", 'espera'=> "0", 'data_inicio' => date('Y-m-d') );
		$this->db->where('idEstoque', $id);
		$this->db->update('estoque_folha', $data); 
	}
	function desativarEstoque($id)
	{
		$data = array('ativo'=> "0");
		$this->db->where('idEstoque', $id);
		$this->db->update('estoque_folha', $data); 
	}




	function get_estoque(){
		$this->db->select("*");
		$this->db->order_by("data_baixa", "DESC");
		return  $this->db->get('estoque_folha')->result();
	}



	function get_estoqueII(){
		$query = $this->db->query('SELECT * FROM estoque_folha WHERE ativo = 1  ');
		return  $query->row();
	}

	function checarAtivo(){
		$query = $this->db->query('SELECT * FROM estoque_folha WHERE ativo = 1 ');
		return  $query->row();  
	}

	function get_Total(){
		$query = $this->db->query('SELECT  SUM(estoque_folha.quantidade) as quantidade FROM estoque_folha WHERE ativo = 1 ');
		return  $query->row();  
	}

	function mudaEstoque($id)
	{
		$data = array('ativo'=> "1", 'espera'=> "0" );
		$this->db->where('idEstoque ', $id);
		$this->db->update('estoque_folha', $data); 
	}

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
