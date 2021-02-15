<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDBank extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_Bank','bank');
		$this->load->model('Tbl_menu');
	}
    
    public function GoBack()
    {
        redirect('bank');
    }
	
	public function add_form()
	{
		$this->load->helper(array('form', 'url'));

        // $kdnomor['kdbank']=$this->bank->get_kodebank()->result();
        // foreach($kdnomor['kdbank'] as $d){}
        // if(empty($d->kode_nomor)){$kode_nomor='01';}else{$kode_nomor=$d->kode_nomor;
        //     if($d->kode_nomor<10){ 
        //         $kode_nomor='0'.$d->kode_nomor+1;
        //     }else{
        //         $kode_nomor=$d->kode_nomor+1;
        //     }
        // }

		$menu = $this->Tbl_menu->get_menu();
		$data=array(
			'menu'=>$menu,
			'err'=>'',
			'add'=>'CRUDBank/add_form',
			'GoBack'=>'GoBack',
			'AddAjax'=>'CRUDBank/add_ajax',
			'kode_bank'=>'',
			'nama_bank'=>'',
		);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_bank_add");
		$this->load->view('bank_add');
		$this->load->view("_partials/footer");
	}

    public function add_ajax()
	{
		$this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        $kode_bank=$this->input->post('kode_bank');
		$nama_bank=$this->input->post('nama_bank');
		$status=$this->input->post('status');


        $this->form_validation->set_rules('kode_bank', 'kode_bank', 'required|is_unique[bank.kode_bank]',
        array(
            'is_unique' => '<b>Kode bank</b> sudah terdaftar.',
            'required' => 'masukkan <b>Kode bank</b>.',
        ));

        
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'required',
        array(
            'required' => 'masukkan <b>Nama bank</b>.',
        ));


        if($this->form_validation->run() != false){

            $data=array(
            'kode_bank'=>$kode_bank,
            'nama_bank'=>$nama_bank,
            'status'=>$status,
            );

            $this->db->insert('bank', $data);
            redirect('bank/index_sukses');
            // redirect('bank/index');
        }else{
            $this->add_form();
        }
		
	}

	function edit_form($id){
        $this->load->library('form_validation');

		$where = array('id' => $id);
		$this->load->helper(array('form', 'url'));
        $menu = $this->Tbl_menu->get_menu();
        $data=array(
            'menu'=>$menu,
            'err'=>'',
            'add'=>'CRUDbank/add_form',
            'GoBack'=>'/sales/index.php/CRUDbank/GoBack',
            // 'AddAjax'=>'CRUDbank/add_ajax',
            'EditAjax'=>'CRUDBank/update',
            'kode_bank'=>'',
            'kode_nomor'=>'',
            'nama_bank'=>'',
            'bank'=>$this->bank->edit_data($where,'bank')->result(),
        );

        $this->load->view('_partials/head');
        $this->load->view("_partials/navbar");
        $this->load->view("_partials/sidebar",$data);
        $this->load->view("_partials/breadcrumb_bank_add");
        $this->load->view('bank_edit');
        $this->load->view("_partials/footer");
	}
	
	function update(){

        $this->load->library('form_validation');

		$id = $this->input->post('id');
        $kode_bank=$this->input->post('kode_bank');
        $nama_bank=$this->input->post('nama_bank');
        $status=$this->input->post('status');

        $this->form_validation->set_rules('kode_bank', 'kode_bank', 'required',
        array(
            'required' => 'masukkan <b>Kode bank</b>.',
        ));

        
        $this->form_validation->set_rules('nama_bank', 'nama_bank', 'required',
        array(
            'required' => 'masukkan <b>Nama bank</b>.',
        ));


        if($this->form_validation->run() != false){

            $data = array(
            'kode_bank'=>$kode_bank,
            'nama_bank'=>$nama_bank,
            'status'=>$status,
            );
            
            $where = array(
                'id' => $id
            );
            $this->bank->update_data($where,$data,'bank');
            redirect('bank');

        }else{
            $this->load->helper(array('form', 'url'));
            $where = array('id' => $id);
            $menu = $this->Tbl_menu->get_menu();
            $data=array(
                'menu'=>$menu,
                'id'=>$id,
                'err'=>'',
                'add'=>'CRUDBank/add_form',
                'GoBack'=>'GoBack',
                'AddAjax'=>'CRUDBank/add_ajax',
                'EditAjax'=>'CRUDBank/update',
                'kode_bank'=>'',
                'kode_nomor'=>'',
                'nama_bank'=>'',
                'bank'=>$this->bank->edit_data($where,'bank')->result(),
            );

            $this->load->view('_partials/head');
            $this->load->view("_partials/navbar");
            $this->load->view("_partials/sidebar",$data);
            $this->load->view("_partials/breadcrumb_bank_add");
            $this->load->view('bank_edit');
            $this->load->view("_partials/footer");
            
        }
		
	}

    function hapus($id){
		$where = array('id' => $id);
		$this->bank->hapus_data($where,'bank');
		redirect('bank');
	}

	

}