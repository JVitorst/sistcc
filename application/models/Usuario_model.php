<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
	}


	public function cadastrar()
	{
		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['senha'] = md5($this->input->post('senha'));
		$data['status'] = $this->input->post('status');
		$data['nivel'] = $this->input->post('nivel');

		return $this->db->insert('usuario', $data) ;
	}

	public function excluir($id = null)
	{


		$this->db->where("idUsuario", $id);
		return 	$this->db->delete('usuario');

	}

	public function salvar_atualizacao()
	{
		$id = $this->input->post('idUsuario');

		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['status'] = $this->input->post('status');
		$data['nivel'] = $this->input->post('nivel');

		$this->db->where('idUsuario', $id); 

		return $this->db->update('usuario', $data);
	}

	public function salvar_senha()
	{
		$id = $this->input->post('idUsuario');

		$senha_antiga = md5($this->input->post('senha_antiga'));
		$senha_nova = md5($this->input->post('senha_nova'));

		$this->db->select('senha');
		$this->db->where('idUsuario',$id);
		$data['senha'] = $this->db->get('usuario')->result();
		$dados['senha'] = $senha_nova;


		if($data['senha'][0]->senha==$senha_antiga){
			$this->db->where('idUsuario',$id);
			return $this->db->update('usuario', $dados);
		}else{
			redirect('usuario/atualizar/'.$id);
		}


	}


	function get_usuarios(){
		$this->db->select('*');
		return  $this->db->get('usuario')->result();
	}


	/*function get_cidades(){
		$this->db->select("*");

		return  $this->db->get("cidade")->result();
	}*/

}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
