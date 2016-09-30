<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impressora_model extends CI_Model {

	var $table = 'impressoras';
	var $column = array('marca','modelo','tinta','data_compra'); //set column field database for order and search
	var $order = array('id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function get_impressoras(){
		$this->db->select("*");

		return  $this->db->get("impressoras")->result();
	}

	function get_impressoesImpressoras(){
		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');
		$impressora= $this->input->post('impressora');

		$this->db->select("*");
		$this->db->from('impressao_aluno as i');
		$this->db->where('impressora_id',$impressora);
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$this->db->join('impressoras as m', 'impressora_id = m.id', 'inner');
		$this->db->join('aluno as a', 'i.aluno_id = a.idAluno', 'left');
		$this->db->join('sala as s', 'a.sala_id = s.idSala', 'left'); 
		$this->db->order_by('data_impressao_aluno', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}



	function get_ImpressoraTotalCopias(){

		$data_comeco = $this->input->post('data_inicio');
		$data_fim = $this->input->post('data_fim');
		$impressora= $this->input->post('impressora');

		$this->db->select_sum('copias');
		$this->db->from('impressao_aluno');
		$this->db->where('impressora_id',$impressora);
		$this->db->where('data_impressao_aluno BETWEEN "'. date('Y-m-d 00:00:00', strtotime($data_comeco)). '" AND "'. date('Y-m-d 23:59:59', strtotime($data_fim)).'"');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ImpressorasGrafico(){

		$this->db->select_sum('copias');
		$this->db->from('impressao_aluno');
		$query = $this->db->get();
		return $query->result();
	}


	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND. 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
				}
			$column[$i] = $item; // set column array variable to order processing
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}
