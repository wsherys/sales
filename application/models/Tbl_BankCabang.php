<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_BankCabang extends CI_Model {

	var $table = 'bisnis';
	var $column_order = array(null, 'kode_cabang','nama_cabang','status'); //set column field database for datatable orderable
	var $column_search = array('kode_cabang','nama_cabang','status'); //set column field database for datatable searchable 
	var $order = array('id' => 'DESC'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		//add custom filter here

		
		
		if($this->input->post('status')=== '0')
		{
			// $st=$this->input->post('status');
			$st='0';
			$this->db->where('status', $st);
		}

		if($this->input->post('status')=== '1')
		{
			// $st=$this->input->post('status');
			$st='1';
			$this->db->where('status', $st);
		}

		if($this->input->post('kode_cabang'))
		{
			$this->db->like('kode_cabang', $this->input->post('kode_cabang'));
		}

		if($this->input->post('nama_cabang'))
		{
			$this->db->like('nama_cabang', $this->input->post('nama_cabang'));
		}

		if($this->input->post('status'))
		{
			$this->db->like('status', $this->input->post('status'));
		}

		$this->db->from($this->table);
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			// if($_POST['search']['value']) // if datatable send POST for search
			if($this->input->post('search','value')) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
					// $this->db->like($item, $this->input->post('search','value'));
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
					// $this->db->or_like($item, $this->input->post('search','value'));
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			// $this->db->order_by($this->column_order[$this->input->post('order','0','column')], $this->input->post('order','0','dir'));
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		// if($_POST['length'] != -1)
		if($this->input->post('length') != -1)
		// $this->db->limit($_POST['length'], $_POST['start']);
		$this->db->limit($this->input->post('length'), $this->input->post('start'));
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_status()
	{
		$this->db->select('status');
		$this->db->from($this->table);
		$this->db->order_by('status','asc');
		$query = $this->db->get();
		$result = $query->result();

		$status = array();
		foreach ($result as $row) 
		{
			$status[] = $row->status;
		}
		return $status;
	}

}
