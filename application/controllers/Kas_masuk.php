<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_masuk extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('kas_masuk_m');
	}

	public function index()
	{
		$data['row'] = $this->kas_masuk_m->get();
		$sql1 = "SELECT sum(jumlah) as total_jumlah FROM kas_masuk";
		
		 $data['jumlah'] = $this->db->query($sql1)->row_array();
		$sql2 = "SELECT sum(saldo) as total_saldo FROM kas_masuk";
		
		 $data['saldo'] = $this->db->query($sql2)->row_array();
		$this->template->load('template', 'kas_masuk/kas_masuk_data',$data);
	}

	public function add()
	{
		$kas_masuk = new stdClass();
		$kas_masuk->kd_kas_masuk = null;
		$kas_masuk->jumlah = null;
		$kas_masuk->asal_dana = null;
		$kas_masuk->tanggal = null;
		$kas_masuk->saldo = null;
		$data = array(
			'page' =>'add',
			'row' => $kas_masuk

		);
		$this->template->load('template', 'kas_masuk/kas_masuk_form',$data);
	}

	public function edit($id)
	{
		$query = $this->kas_masuk_m->get($id);
		if ($query->num_rows() > 0) 
		{
			$kas_masuk = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $kas_masuk
			);
		$this->template->load('template', 'kas_masuk/kas_masuk_form',$data);
		} else {
			echo "<script>alert('Data berhasil diedit')</script>";
			echo "<script>window.location='".site_url('kas_masuk')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->kas_masuk_m->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->kas_masuk_m->edit($post);
			
		}
		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('kas_masuk');
        
	}

	public function del($id)
	{
		$this->kas_masuk_m->del($id);
		$id = $this->input->post('user_id');

		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('kas_masuk');
        }

    public function print()
	{
		$data['kas'] = $this->db->get('Kas_masuk');
		$sql1 = "SELECT sum(jumlah) as total_jumlah FROM kas_masuk";
		
		 $data['jumlah'] = $this->db->query($sql1)->result_array();
		 $sql2 = "SELECT sum(saldo) as total_saldo FROM kas_masuk";
		
		 $data['saldo'] = $this->db->query($sql2)->result_array();

		$this->load->view('Kas_masuk/Kas_masuk_print', $data);

	} 

	
}
