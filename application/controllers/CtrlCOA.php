<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlCOA extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_COA','coa');
		$this->load->model('Tbl_menu');
	}

	public function index()
	{
		// $this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->coa->get_status();
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
		$this->load->view("_partials/breadcrumb_coa");
		$this->load->view('dashboard_coa');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_coa');
	}

	public function ajax_list()
	{
		$list = $this->coa->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		$no = $this->input->post('start');
		foreach ($list as $coa) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $coa->akun;
			$row[] = $coa->sub_akun;
			$row[] = $coa->kode_grup_coa;
			$row[] = $coa->kas_masuk;
			$row[] = $coa->keterangan;
			if($coa->status==='1'){$status='Aktif'; $row[] = $status;}
			elseif($coa->status==='0'){$status='Tidak aktif'; $row[] = $status;}
			

			$data[] = $row;
		}

		$output = array(
						// "draw" => $_POST['draw'],
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->coa->count_all(),
						"recordsFiltered" => $this->coa->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}