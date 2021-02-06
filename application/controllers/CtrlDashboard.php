<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlDashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Tbl_menu');
		$this->load->library('form_validation');
		// $this->load->library('parser');
        // $this->load->helper(array('url','download'));   
	}

	public function index()
	{
		$menu = $this->Tbl_menu->get_menu();
		$data=array(
			'menu'=>$menu,
			'err'=>'',
		);

		$this->load->view("_partials/head");
		$this->load->view("_partials/navbar");
		$this->load->view("_partials/sidebar",$data);
		$this->load->view("_partials/breadcrumb");
		$this->load->view('dashboard');//konten
		// $this->load->view("_partials/tema");//tema
		$this->load->view("_partials/footer");
		$this->load->view("_partials/js");
	}
}
