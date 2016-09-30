<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impressora extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('impressora_model','impressora');
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
		$this->load->view('impressora/listar_impressoras');
		$this->load->view('includes/html_footer');

	}

	public function relatorio_impressoras()
	{
		
		$this->verificar_sessao();

		$this->load->model('impressora_model', 'impressora');

		$dados['impressoras'] = $this->impressora->get_impressoras();
		$dados['listagem'] = $this->impressora->get_impressoesImpressoras();
		$dados['total'] = $this->impressora->get_ImpressoraTotalCopias();


		


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('impressora/relatorio_impressoras',$dados);
		$this->load->view('includes/html_footer');

	}
	public function ajax_list()
	{
		$list = $this->impressora->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $impressora) {
			$no++;
			$row = array();
			$row[] = $impressora->marca;
			$row[] = $impressora->modelo;
			$row[] = $impressora->tinta;
			$row[] = dataMysqlPtBr2($impressora->data_compra);

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_person('."'".$impressora->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
			<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$impressora->id."'".')"><i class="glyphicon glyphicon-trash"></i> Deletar</a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->impressora->count_all(),
			"recordsFiltered" => $this->impressora->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->impressora->get_by_id($id);
		$data->data_compra = ($data->data_compra == '0000-00-00') ? '' : $data->data_compra; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
			'marca' => $this->input->post('marca'),
			'modelo' => $this->input->post('modelo'),
			'tinta' => $this->input->post('tinta'),
			'data_compra' => $this->input->post('data_compra'),
			);
		$insert = $this->impressora->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
			'marca' => $this->input->post('marca'),
			'modelo' => $this->input->post('modelo'),
			'tinta' => $this->input->post('tinta'),
			'data_compra' => $this->input->post('data_compra'),
			);
		$this->impressora->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->impressora->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('marca') == '')
		{
			$data['inputerror'][] = 'marca';
			$data['error_string'][] = 'Insira a marca da impressora';
			$data['status'] = FALSE;
		}

		if($this->input->post('modelo') == '')
		{
			$data['inputerror'][] = 'modelo';
			$data['error_string'][] = 'Insira o modelo da impressora';
			$data['status'] = FALSE;
		}



		if($this->input->post('tinta') == '')
		{
			$data['inputerror'][] = 'tinta';
			$data['error_string'][] = 'Por favor selecione a tinta';
			$data['status'] = FALSE;
		}
		if($this->input->post('data_compra') == '')
		{
			$data['inputerror'][] = 'data_compra';
			$data['error_string'][] = 'Data de compra não inserida';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}