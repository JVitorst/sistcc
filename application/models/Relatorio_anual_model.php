<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio_anual_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}


	function get_janeiro(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 1 AND situacao = 1 ');
		return  $query->row();  
	}
	// Mês de Abril relacionado aos funcionarios
	function get_janeiroFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 1  ');
		return  $query->row();  
	}


	function get_fevereiro(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 2 AND situacao = 1 ');
		return  $query->row();  
	}

		// Mês de Fevereiro relacionado aos funcionarios
	function get_fevereiroFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 2  ');
		return  $query->row();  
	}
	function get_marco(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,	COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 3  AND situacao = 1');
		return  $query->row();  
	}

		// Mês de Marco relacionado aos funcionarios
	function get_marcoFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 3  ');
		return  $query->row();  
	}

	function get_abril(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 4 AND situacao = 1 ');
		return  $query->row();  
	}
	// Mês de Abril relacionado aos funcionarios
	function get_abrilFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 4  ');
		return  $query->row();  
	}

	function get_maio(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias, COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 5 AND situacao = 1 ');
		return  $query->row();  
	}

		// Mês de Maio relacionado aos funcionarios
	function get_maioFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 5  ');
		return  $query->row();  
	}

	function get_junho(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 6 AND situacao = 1 ');
		return  $query->row();  
	}

			// Mês de Junho relacionado aos funcionarios
	function get_junhoFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 6  ');
		return  $query->row();  
	}

	function get_julho(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 7 AND situacao = 1 ');
		return  $query->row();  
	}

		// Mês de Julho relacionado aos funcionarios
	function get_julhoFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 7  ');
		return  $query->row();  
	}
	function get_agosto(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 8 AND situacao = 1 ');
		return  $query->row();  
	}

			// Mês de Agosto relacionado aos funcionarios
	function get_agostoFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 8  ');
		return  $query->row();  
	}

	function get_setembro(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 9 AND situacao = 1 ');
		return  $query->row();  
	}

				// Mês de Setembro relacionado aos funcionarios
	function get_setembroFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 9  ');
		return  $query->row();  
	}

	function get_outubro(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 10 AND situacao = 1 ');
		return  $query->row();  
	}

				// Mês de Outubro relacionado aos funcionarios
	function get_outubroFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 10  ');
		return  $query->row();  
	}

	function get_novembro(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total, SUM(impressao_aluno.copias) as copias,
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 11 AND situacao = 1 ');
		return  $query->row();  
	}

				// Mês de novembro relacionado aos funcionarios
	function get_novembroFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 11  ');
		return  $query->row();  
	}

	function get_dezembro(){
		$query = $this->db->query('SELECT SUM(impressao_aluno.total) as total,SUM(impressao_aluno.copias) as copias, 
			COUNT(impressao_aluno.idImpressaoAluno) as quantidade, MONTH(impressao_aluno.data_impressao_aluno) as MES FROM impressao_aluno WHERE MONTH(impressao_aluno.data_impressao_aluno) = 12 AND situacao = 1 ');
		return  $query->row();  
	}

			// Mês de Agosto relacionado aos funcionarios
	function get_dezembroFunc(){
		$query = $this->db->query('SELECT COUNT(impressao_funcionario.idImpressaoFunc) as quantidade, MONTH(impressao_funcionario.data_impressao_func) as MES FROM impressao_funcionario WHERE MONTH(impressao_funcionario.data_impressao_func) = 12  ');
		return  $query->row();  
	}


	











}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
