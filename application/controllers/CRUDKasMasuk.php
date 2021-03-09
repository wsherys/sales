<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDKasMasuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_bisnis','bisnis');
		$this->load->model('Tbl_menu');
	}
    
    public function GoBack()
    {
        redirect('Bisnis');
    }
	
	public function add_form()
	{
		$this->load->helper(array('form', 'url'));

        $kdnomor['kdbisnis']=$this->bisnis->get_kodebisnis()->result();
        foreach($kdnomor['kdbisnis'] as $d){}
        if(empty($d->kode_nomor)){$kode_nomor='01';}else{$kode_nomor=$d->kode_nomor;
            if($d->kode_nomor<10){ 
                $kode_nomor='0'.$d->kode_nomor+1;
            }else{
                $kode_nomor=$d->kode_nomor+1;
            }
        }

		$menu = $this->Tbl_menu->get_menu();
		$data=array(
			'menu'=>$menu,
			'err'=>'',
			'add'=>'CRUDBisnis/add_form',
			'GoBack'=>'GoBack',
			'AddAjax'=>'CRUDBisnis/add_ajax',
			'kode_bisnis'=>'',
			'kode_nomor'=>$kode_nomor,
			'nama_bisnis'=>'',
		);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_bisnis_add");
		$this->load->view('bisnis_add');
		$this->load->view("_partials/footer");
	}

    public function add_ajax()
	{
		$this->load->library('form_validation');

        $kode_bisnis=$this->input->post('kode_bisnis');
		$kode_nomor=$this->input->post('kode_nomor');
		$nama_bisnis=$this->input->post('nama_bisnis');
		$status=$this->input->post('status');

        $kdnomor['kdbisnis']=$this->bisnis->get_kodebisnis()->result();
        foreach($kdnomor['kdbisnis'] as $d){}
        if(empty($d->kode_nomor)){$kode_nomor='01';}else{$kode_nomor=$d->kode_nomor;
            if($d->kode_nomor<10){ 
                $kode_nomor='0'.$d->kode_nomor+1;
            }else{
                $kode_nomor=$d->kode_nomor+1;
            }
        }

        $regex="/^[a-zA-Z]+[a-zA-Z0-9]{2,10}$/";
        if(!preg_match_all($regex, $kode_bisnis)){

            $this->load->helper(array('form', 'url'));
            $menu = $this->Tbl_menu->get_menu();
            $data=array(
                'menu'=>$menu,
                'err'=>'1',
                'add'=>'CRUDBisnis/add_form',
                'GoBack'=>'CRUDBisnis/GoBack',
                'AddAjax'=>'CRUDBisnis/add_ajax',
                'kode_bisnis'=>'',
                'kode_nomor'=>$kode_nomor,
                'nama_bisnis'=>'',
            );

            $this->load->view('_partials/head');
            $this->load->view("_partials/navbar");
            $this->load->view("_partials/sidebar",$data);
            $this->load->view("_partials/breadcrumb_bisnis_add");
            $this->load->view('bisnis_add');
            $this->load->view("_partials/footer");

        }else{
            // echo'betul';
            $this->form_validation->set_rules('kode_bisnis', 'kode_bisnis', 'required|is_unique[bisnis.kode_bisnis]',
            array(
                'is_unique' => '<b>Kode bisnis</b> sudah terdaftar.',
                'required' => 'masukkan <b>Kode bisnis</b>.',
            ));

            $this->form_validation->set_rules('kode_nomor', 'kode_nomor', 'required|numeric',
            array(
                'required' => 'masukkan <b>Kode Nomor</b>.',
                'numeric' => '<b>Kode Nomor</b> wajib berupa angka.',
            ));

            $this->form_validation->set_rules('nama_bisnis', 'nama_bisnis', 'required',
            array(
                'required' => 'masukkan <b>Nama bisnis</b>.',
            ));


            if($this->form_validation->run() != false){

                $data['kdbisnis']=$this->bisnis->get_kodebisnis()->result();
                foreach($data['kdbisnis'] as $d){}

                $data=array(
                'kode_bisnis'=>$kode_bisnis,
                'kode_nomor'=>$kode_nomor,
                'nama_bisnis'=>$nama_bisnis,
                'status'=>$status,
                );

                $this->db->insert('bisnis', $data);
                redirect('Bisnis/index_sukses');
            }else{
                $this->add_form();
            }

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
            'add'=>'CRUDBisnis/add_form',
            'GoBack'=>'/sales/index.php/CRUDBisnis/GoBack',
            // 'AddAjax'=>'CRUDBisnis/add_ajax',
            'EditAjax'=>'CRUDBisnis/update',
            'kode_bisnis'=>'',
            'kode_nomor'=>'',
            'nama_bisnis'=>'',
            'bisnis'=>$this->bisnis->edit_data($where,'bisnis')->result(),
        );

        $this->load->view('_partials/head');
        $this->load->view("_partials/navbar");
        $this->load->view("_partials/sidebar",$data);
        $this->load->view("_partials/breadcrumb_bisnis_add");
        $this->load->view('bisnis_edit');
        $this->load->view("_partials/footer");
	}
	
	function update(){

        $this->load->library('form_validation');

		$id = $this->input->post('id');
        $kode_bisnis=$this->input->post('kode_bisnis');
        $kode_nomor=$this->input->post('kode_nomor');
        $nama_bisnis=$this->input->post('nama_bisnis');
        $status=$this->input->post('status');
        

        $regex="/^[a-zA-Z]+[a-zA-Z0-9]{2,10}$/";
        if(!preg_match_all($regex, $kode_bisnis)){

            $where = array('id' => $id);
            $this->load->helper(array('form', 'url'));
            $menu = $this->Tbl_menu->get_menu();
            $data=array(
                'menu'=>$menu,
                'id'=>$id,
                'err'=>'1',
                'add'=>'CRUDBisnis/add_form',
                'GoBack'=>'GoBack',
                'AddAjax'=>'CRUDBisnis/add_ajax',
                'EditAjax'=>'CRUDBisnis/update',
                'kode_bisnis'=>'',
                'kode_nomor'=>'',
                'nama_bisnis'=>'',
                'bisnis'=>$this->bisnis->edit_data($where,'bisnis')->result(),
            );

            $this->load->view('_partials/head');
            $this->load->view("_partials/navbar");
            $this->load->view("_partials/sidebar",$data);
            $this->load->view("_partials/breadcrumb_bisnis_add");
            $this->load->view('bisnis_edit');
            $this->load->view("_partials/footer");

        }else{
            // echo'betul';

            $this->form_validation->set_rules('kode_bisnis', 'kode_bisnis', 'required',
            array(
                'required' => 'masukkan <b>Kode bisnis</b>.',
            ));

            $this->form_validation->set_rules('kode_nomor', 'kode_nomor', 'required|numeric',
            array(
                'required' => 'masukkan <b>Kode Nomor</b>.',
                'numeric' => '<b>Kode Nomor</b> wajib berupa angka.',
            ));

            $this->form_validation->set_rules('nama_bisnis', 'nama_bisnis', 'required',
            array(
                'required' => 'masukkan <b>Nama bisnis</b>.',
            ));


            if($this->form_validation->run() != false){

                $data = array(
                'kode_bisnis'=>$kode_bisnis,
                'kode_nomor'=>$kode_nomor,
                'nama_bisnis'=>$nama_bisnis,
                'status'=>$status,
                );
                
                $where = array(
                	'id' => $id
                );
                $this->bisnis->update_data($where,$data,'bisnis');
                redirect('Bisnis');

            }else{
                $this->load->helper(array('form', 'url'));
                $where = array('id' => $id);
                $menu = $this->Tbl_menu->get_menu();
                $data=array(
                    'menu'=>$menu,
                    'id'=>$id,
                    'err'=>'',
                    'add'=>'CRUDBisnis/add_form',
                    'GoBack'=>'GoBack',
                    'AddAjax'=>'CRUDBisnis/add_ajax',
                    'EditAjax'=>'CRUDBisnis/update',
                    'kode_bisnis'=>'',
                    'kode_nomor'=>'',
                    'nama_bisnis'=>'',
                    'bisnis'=>$this->bisnis->edit_data($where,'bisnis')->result(),
                );

                $this->load->view('_partials/head');
                $this->load->view("_partials/navbar");
                $this->load->view("_partials/sidebar",$data);
                $this->load->view("_partials/breadcrumb_bisnis_add");
                $this->load->view('bisnis_edit');
                $this->load->view("_partials/footer");
                
            }
        }
		
	}

    function hapus($id){
		$where = array('id' => $id);
		$this->bisnis->hapus_data($where,'bisnis');
		redirect('Bisnis');
	}

	

}