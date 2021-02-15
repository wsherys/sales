<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlUnit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_unit','unit');
		$this->load->model('Tbl_menu');
	}

	public function index()
	{
		// $this->load->helper('url');
		$this->load->helper('form');
		
		$status = $this->unit->get_status();
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
		$this->load->view("_partials/breadcrumb_unit");
		$this->load->view('dashboard_unit');
		$this->load->view("_partials/footer");
		$this->load->view('_partials/js_unit');
	}

	public function ajax_list()
	{
		$list = $this->unit->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		$no = $this->input->post('start');
		foreach ($list as $unit) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $unit->nomor_transaksi;
			$row[] = $unit->nama_order;
			$row[] = $unit->kode_bisnis;
			$row[] = $unit->jangka_waktu;
			$row[] = $unit->nama_produk;
			$row[] = $unit->jumlah_produk;
			$row[] = $unit->diskon_persen;
			$row[] = $unit->diskon_nilai;
			$row[] = $unit->harga_total;
			if($unit->status==='1'){$status='Aktif'; $row[] = $status;}
			elseif($unit->status==='0'){$status='Tidak aktif'; $row[] = $status;}
			

			$data[] = $row;
		}

		$output = array(
						// "draw" => $_POST['draw'],
						"draw" => $this->input->post('draw'),
						"recordsTotal" => $this->unit->count_all(),
						"recordsFiltered" => $this->unit->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}