<?php 
class Comum{
	function get_estoque(){
		$this->db->select("*");
		return  $this->db->get('estoque_folha')->result();
	}



}

?>