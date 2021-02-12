<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlBisnis extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_bisnis','bisnis');
		$this->load->model('Tbl_menu');
	}

	public function index()
	{
		// $this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->bisnis->get_status();
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
			'form_status'=>form_dropdown('',$opt,'','id="status" class="form-control"'),
		);

		// $data['form_status'] = form_dropdown('',$opt,'','id="status" class="form-control"');
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_bisnis");
		$this->load->view('dashboard_bisnis');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_bisnis');
	}

	public function index_sukses()
	{
		// $this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->bisnis->get_status();
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
			'status'=>'Data ditambahkan.',
			'form_status'=>form_dropdown('',$opt,'','id="status" class="form-control"'),
		);

		// $data['form_status'] = form_dropdown('',$opt,'','id="status" class="form-control"');
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_bisnis");
		$this->load->view('dashboard_bisnis');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_bisnis');
	}


	
	public function add()
	{

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$menu = $this->Tbl_menu->get_menu();
		$data=array(
			'menu'=>$menu,
			'err'=>'',
			'kode_bisnis'=>'',
			'kode_nomor'=>'',
			'nama_bisnis'=>'',
		);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_bisnis_add");
		$this->load->view('bisnis_add');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_bisnis_add');
	}
	


	

	public function ajax_add()
	{
		// $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$kode_bisnis=$this->input->post('kode_bisnis');
		$kode_nomor=$this->input->post('kode_nomor');
		$nama_bisnis=$this->input->post('nama_bisnis');
		$status=$this->input->post('status');

		$this->form_validation->set_rules('kode_bisnis', 'kode_bisnis', 'required|is_unique[bisnis.kode_bisnis]|alpha_numeric',
		array(
			'is_unique' => '<b>Kode bisnis</b> sudah terdaftar.',
			'required' => 'masukkan <b>Kode bisnis</b>.',
			'alpha_numeric' => ' wajib alpha numerik<b>Kode bisnis</b>.'
		));
		


		$this->form_validation->set_rules('kode_nomor', 'kode_nomor', 'required|numeric',
		array(
			'required' => 'masukkan <b>Kode Nomor</b>.',
			// 'is_unique' => '<b>Kode Nomor</b> sudah terdaftar.',
			'numeric' => '<b>Kode Nomor</b> wajib berupa angka.',
		));

		$this->form_validation->set_rules('nama_bisnis', 'nama_bisnis', 'required',
		array(
			'required' => 'masukkan <b>Nama bisnis</b>.',
		));

		$this->form_validation->set_rules('kode_bisnis', 'kode_bisnis', 'required|is_unique[bisnis.kode_bisnis]|alpha_numeric');


		if($this->form_validation->run() != false){
			$data=array('kode_bisnis'=>$kode_bisnis,
			'kode_nomor'=>$kode_nomor,
			'nama_bisnis'=>$nama_bisnis,
			'status'=>$status,
			);
			$this->db->insert('bisnis', $data);
			$this->index_sukses();
		}else{
			$this->add();
		}
		
	}

	public function ajax_list()
	{
		$list = $this->bisnis->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		$no = $this->input->post('start');
		foreach ($list as $bisnis) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $bisnis->kode_bisnis;
			$row[] = $bisnis->kode_nomor;
			$row[] = $bisnis->nama_bisnis;
			if($bisnis->status==='1'){$status='Aktif'; $row[] = $status;}
			elseif($bisnis->status==='0'){$status='Tidak aktif'; $row[] = $status;}
			$row[] = '<center><a href=CtrlBisnis/ubah/'.$bisnis->id.'>ubah</a> &nbsp; <a href=CtrlBisnis/hapus/'.$bisnis->id.'>hapus</a></center>';

			$data[] = $row;
		}

		$output = array(
			// "draw" => $_POST['draw'],
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->bisnis->count_all(),
			"recordsFiltered" => $this->bisnis->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}



}