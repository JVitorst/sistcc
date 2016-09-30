<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlunoImpressoes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('alunoImpressoes_model','impressao');
	}

	public function verificar_sessao(){
		if ($this->session->userdata('logado') == false) {
			redirect('verificacao/login');
		}
	}

	public function index()
	{
		
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('listar_alunoImpressoes');
		$this->load->view('includes/html_footer');

	}

	public function ajax_list()
	{
		$list = $this->impressao->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $impressao) {
			$no++;
			$row = array();
			$row[] = dataMysqlPtBr($impressao->data_impressao_aluno);
			$row[] = $impressao->nome;
			$row[] = $impressao->copias;
			$row[] = $impressao->valor;
			$row[] = $impressao->total;
			$row[] = $impressao->situacao==1?'Pago':'Nao pago';
			$row[] = $impressao->modelo;

			//add html for action
			$row[] = '
			<a class="btn btn-block btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$impressao->idImpressaoAluno."'".')"><i class="glyphicon glyphicon-trash"></i> Deletar</a>
			';
		/*	$row[] = '
			<a class="btn btn-block btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$impressao->idImpressaoAluno."'".')"><i class="glyphicon glyphicon-trash"></i> Deletar</a>
			';*/

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->impressao->count_all(),
			"recordsFiltered" => $this->impressao->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}



	public function ajax_delete($idImpressaoAluno)
	{
		$this->impressao->delete_by_id($idImpressaoAluno);
		echo json_encode(array("status" => TRUE));
	}




}