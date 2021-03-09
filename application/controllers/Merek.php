<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merek extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_Merek','merek');
		$this->load->model('Tbl_menu');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->merek->get_status();
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
			'add'=>'/sales/index.php/CRUDMerek/add_form',
			'GoBack'=>'GoBack',
			'ListAjax'=>'Merek/List_ajax',
			'form_status'=>form_dropdown('',$opt,'','id="status" class="form-control"'),
		);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_merek");
		$this->load->view('dashboard_merek');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_merek');
	}

	public function index_sukses()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->merek->get_status();
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
			'add'=>'/sales/index.php/CRUDMerek/add_form',
			'GoBack'=>'GoBack',
			'ListAjax'=>'merek/List_ajax',
			'form_status'=>form_dropdown('',$opt,'','id="status" class="form-control"'),
		);

		// $data['form_status'] = form_dropdown('',$opt,'','id="status" class="form-control"');
		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_merek");
		$this->load->view('dashboard_merek');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_merek');
	}

	public function list_ajax()
	{
		$list = $this->merek->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		$no = $this->input->post('start');
		foreach ($list as $merek) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $merek->kode_merek;
			$row[] = $merek->nama_merek;
			if($merek->status==='1'){$status='Aktif'; $row[] = $status;}
			elseif($merek->status==='0'){$status='Tidak aktif'; $row[] = $status;}
			$row[] = '<center><a href=/sales/index.php/CRUDMerek/edit_form/'.$id=$merek->id.'> edit</a> &nbsp; 
					<a href=/sales/index.php/CRUDMerek/hapus/'.$id=$merek->id.'>hapus</a></center>';

			$data[] = $row;
		}

		$output = array(
			// "draw" => $_POST['draw'],
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->merek->count_all(),
			"recordsFiltered" => $this->merek->count_filtered(),
			"data" => $data,
			);
		//output to json format
		echo json_encode($output);
	}



}