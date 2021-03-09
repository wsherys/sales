<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDMerek extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tbl_Merek','merek');
		$this->load->model('Tbl_menu');
	}
    
    public function GoBack()
    {
        redirect('merek');
    }
	
	public function add_form()
	{
		$this->load->helper(array('form', 'url'));

        $kdnomor['kdmerek']=$this->merek->get_kodemerek()->result();
        foreach($kdnomor['kdmerek'] as $d){}
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
			'add'=>'CRUDMerek/add_form',
			'GoBack'=>'GoBack',
			'AddAjax'=>'CRUDMerek/add_ajax',
			'kode_merek'=>'',
			'kode_nomor'=>$kode_nomor,
			'nama_merek'=>'',
		);

		$this->load->view('_partials/head');
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb_merek_add");
		$this->load->view('merek_add');
		$this->load->view("_partials/footer");
	}

    public function add_ajax()
	{
		$this->load->library('form_validation');

        $kode_merek=$this->input->post('kode_merek');
		$kode_nomor=$this->input->post('kode_nomor');
		$nama_merek=$this->input->post('nama_merek');
		$status=$this->input->post('status');

        $kdnomor['kdmerek']=$this->merek->get_kodemerek()->result();
        foreach($kdnomor['kdmerek'] as $d){}
        if(empty($d->kode_nomor)){$kode_nomor='01';}else{$kode_nomor=$d->kode_nomor;
            if($d->kode_nomor<10){ 
                $kode_nomor='0'.$d->kode_nomor+1;
            }else{
                $kode_nomor=$d->kode_nomor+1;
            }
        }

        $regex="/^[a-zA-Z]+[a-zA-Z0-9]{2,10}$/";
        if(!preg_match_all($regex, $kode_merek)){

            $this->load->helper(array('form', 'url'));
            $menu = $this->Tbl_menu->get_menu();
            $data=array(
                'menu'=>$menu,
                'err'=>'1',
                'add'=>'CRUDMerek/add_form',
                'GoBack'=>'CRUDMerek/GoBack',
                'AddAjax'=>'CRUDMerek/add_ajax',
                'kode_merek'=>'',
                'kode_nomor'=>$kode_nomor,
                'nama_merek'=>'',
            );

            $this->load->view('_partials/head');
            $this->load->view("_partials/navbar");
            $this->load->view("_partials/sidebar",$data);
            $this->load->view("_partials/breadcrumb_merek_add");
            $this->load->view('merek_add');
            $this->load->view("_partials/footer");

        }else{
            // echo'betul';
            $this->form_validation->set_rules('kode_merek', 'kode_merek', 'required|is_unique[merek.kode_merek]',
            array(
                'is_unique' => '<b>Kode merek</b> sudah terdaftar.',
                'required' => 'masukkan <b>Kode merek</b>.',
            ));

            $this->form_validation->set_rules('kode_nomor', 'kode_nomor', 'required|numeric',
            array(
                'required' => 'masukkan <b>Kode Nomor</b>.',
                'numeric' => '<b>Kode Nomor</b> wajib berupa angka.',
            ));

            $this->form_validation->set_rules('nama_merek', 'nama_merek', 'required',
            array(
                'required' => 'masukkan <b>Nama merek</b>.',
            ));


            if($this->form_validation->run() != false){

                $data['kdmerek']=$this->merek->get_kodemerek()->result();
                foreach($data['kdmerek'] as $d){}

                $data=array(
                'kode_merek'=>$kode_merek,
                'kode_nomor'=>$kode_nomor,
                'nama_merek'=>$nama_merek,
                'status'=>$status,
                );

                $this->db->insert('merek', $data);
                redirect('merek/index_sukses');
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
            'add'=>'CRUDMerek/add_form',
            'GoBack'=>'/sales/index.php/CRUDMerek/GoBack',
            // 'AddAjax'=>'CRUDMerek/add_ajax',
            'EditAjax'=>'CRUDMerek/update',
            'kode_merek'=>'',
            'kode_nomor'=>'',
            'nama_merek'=>'',
            'merek'=>$this->merek->edit_data($where,'merek')->result(),
        );

        $this->load->view('_partials/head');
        $this->load->view("_partials/navbar");
        $this->load->view("_partials/sidebar",$data);
        $this->load->view("_partials/breadcrumb_merek_add");
        $this->load->view('merek_edit');
        $this->load->view("_partials/footer");
	}
	
	function update(){

        $this->load->library('form_validation');

		$id = $this->input->post('id');
        $kode_merek=$this->input->post('kode_merek');
        $kode_nomor=$this->input->post('kode_nomor');
        $nama_merek=$this->input->post('nama_merek');
        $status=$this->input->post('status');
        

        $regex="/^[a-zA-Z]+[a-zA-Z0-9]{2,10}$/";
        if(!preg_match_all($regex, $kode_merek)){

            $where = array('id' => $id);
            $this->load->helper(array('form', 'url'));
            $menu = $this->Tbl_menu->get_menu();
            $data=array(
                'menu'=>$menu,
                'id'=>$id,
                'err'=>'1',
                'add'=>'CRUDMerek/add_form',
                'GoBack'=>'GoBack',
                'AddAjax'=>'CRUDMerek/add_ajax',
                'EditAjax'=>'CRUDMerek/update',
                'kode_merek'=>'',
                'kode_nomor'=>'',
                'nama_merek'=>'',
                'merek'=>$this->merek->edit_data($where,'merek')->result(),
            );

            $this->load->view('_partials/head');
            $this->load->view("_partials/navbar");
            $this->load->view("_partials/sidebar",$data);
            $this->load->view("_partials/breadcrumb_merek_add");
            $this->load->view('merek_edit');
            $this->load->view("_partials/footer");

        }else{
            // echo'betul';

            $this->form_validation->set_rules('kode_merek', 'kode_merek', 'required',
            array(
                'required' => 'masukkan <b>Kode merek</b>.',
            ));

            $this->form_validation->set_rules('kode_nomor', 'kode_nomor', 'required|numeric',
            array(
                'required' => 'masukkan <b>Kode Nomor</b>.',
                'numeric' => '<b>Kode Nomor</b> wajib berupa angka.',
            ));

            $this->form_validation->set_rules('nama_merek', 'nama_merek', 'required',
            array(
                'required' => 'masukkan <b>Nama merek</b>.',
            ));


            if($this->form_validation->run() != false){

                $data = array(
                'kode_merek'=>$kode_merek,
                'kode_nomor'=>$kode_nomor,
                'nama_merek'=>$nama_merek,
                'status'=>$status,
                );
                
                $where = array(
                	'id' => $id
                );
                $this->merek->update_data($where,$data,'merek');
                redirect('merek');

            }else{
                $this->load->helper(array('form', 'url'));
                $where = array('id' => $id);
                $menu = $this->Tbl_menu->get_menu();
                $data=array(
                    'menu'=>$menu,
                    'id'=>$id,
                    'err'=>'',
                    'add'=>'CRUDMerek/add_form',
                    'GoBack'=>'GoBack',
                    'AddAjax'=>'CRUDMerek/add_ajax',
                    'EditAjax'=>'CRUDMerek/update',
                    'kode_merek'=>'',
                    'kode_nomor'=>'',
                    'nama_merek'=>'',
                    'merek'=>$this->merek->edit_data($where,'merek')->result(),
                );

                $this->load->view('_partials/head');
                $this->load->view("_partials/navbar");
                $this->load->view("_partials/sidebar",$data);
                $this->load->view("_partials/breadcrumb_merek_add");
                $this->load->view('merek_edit');
                $this->load->view("_partials/footer");
                
            }
        }
		
	}

    function hapus($id){
		$where = array('id' => $id);
		$this->merek->hapus_data($where,'merek');
		redirect('merek');
	}

	

}