<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlPartner extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_Partner','partner');
		$this->load->model('Tbl_menu');
	}

	public function index()
	{
		// $this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->partner->get_status();
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
		$this->load->view("_partials/breadcrumb_partner");
		$this->load->view('dashboard_partner');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_partner');
	}

	public function ajax_list()
	{
		$list = $this->partner->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		$no = $this->input->post('start');
		foreach ($list as $partner) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $partner->kode_partner;
			$row[] = $partner->nama_partner;
			$row[] = $partner->status_npwp;
			$row[] = $partner->alamat;
			if($partner->status==='1'){$status='Aktif'; $row[] = $status;}
			elseif($partner->status==='0'){$status='Tidak aktif'; $row[] = $status;}
			

			$data[] = $row;
		}

		$output = array(
						// "draw" => $_POST['draw'],
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->partner->count_all(),
						"recordsFiltered" => $this->partner->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}