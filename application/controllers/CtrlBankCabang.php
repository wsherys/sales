<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlBankCabang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_BankCabang','cabang');
		$this->load->model('Tbl_menu');
	}

	public function index()
	{
		// $this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->cabang->get_status();
		$opt = array('' => 'pilih status');

		foreach ($status as $sts) {
			if($sts==='0'){$n='0'; $sts='Tidak aktif';}
			if($sts==='1'){$n='1';$sts='Aktif';}
			$opt[$n] = $sts;
			
		}

		$menu = $this->Tbl_menu->get_menu();
		$data=array(
			'menu'=>$menu,
			'err'=>'',
			'form_status'=>form_dropdown('',$opt,'','id="status" class="form-control"')
		);

		// $data['form_status'] = form_dropdown('',$opt,'','id="status" class="form-control"');
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_cabang");
		$this->load->view('dashboard_cabang');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_cabang');
	}

	public function ajax_list()
	{
		$list = $this->cabang->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		$no = $this->input->post('start');
		foreach ($list as $cabang) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $cabang->kode_cabang;
			$row[] = $cabang->nama_cabang;
			if($cabang->status==='1'){$status='Aktif'; $row[] = $status;}
			elseif($cabang->status==='0'){$status='Tidak aktif'; $row[] = $status;}
			

			$data[] = $row;
		}

		$output = array(
						// "draw" => $_POST['draw'],
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->cabang->count_all(),
						"recordsFiltered" => $this->cabang->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}