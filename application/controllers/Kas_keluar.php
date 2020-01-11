<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kas_keluar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kas_masuk_m','kas_keluar_m']);	}

	public function index()
	{
		$data['row'] = $this->kas_keluar_m->get();
		$sql1 = "SELECT sum(jumlah) as total_jumlah FROM kas_keluar";
		
		 $data['jumlah'] = $this->db->query($sql1)->row_array();
	
		$this->template->load('template', 'kas_keluar/kas_keluar_data',$data);
	}

	public function add()
	{
		$kas_keluar = new stdClass();
		$kas_keluar->kd_kas_keluar = null;
		$kas_keluar->pengguna = null;
		$kas_keluar->keperluan = null;
		$kas_keluar->jumlah = null;
		$kas_keluar->tanggal = null;
		$asal_dana = $this->kas_masuk_m->get();
		$data = array(
			'page' =>'add',
			'row' => $kas_keluar,
			'asal_dana' => $asal_dana,

		);
		$this->template->load('template', 'kas_keluar/kas_keluar_form',$data);
	}

	public function edit($id)
	{
		$query = $this->kas_keluar_m->get($id);
		if ($query->num_rows() > 0) 
		{
			$kas_keluar = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $kas_keluar
			);
		$this->template->load('template', 'kas_keluar/kas_keluar_form',$data);
		} else {
			echo "<script>alert('Data berhasil diedit')</script>";
			echo "<script>window.location='".site_url('kas_keluar')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->kas_keluar_m->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->kas_keluar_m->edit($post);
			
		}
		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('kas_keluar');
        
	}

	public function del($id)
	{
		$this->kas_keluar_m->del($id);
		$id = $this->input->post('user_id');

		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('kas_keluar');
        }

    public function print()
	{
		$data['kas'] = $this->db->get('kas_keluar');
		$sql1 = "SELECT sum(jumlah) as total_jumlah FROM kas_keluar";
		
		 $data['jumlah'] = $this->db->query($sql1)->result_array();

		$this->load->view('kas_keluar/kas_keluar_print', $data);

	} 

	
}
