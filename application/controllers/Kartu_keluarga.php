<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu_keluarga extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kartu_keluarga_m','warga_m']);
	}

	public function index()
	{
		$data['row'] = $this->kartu_keluarga_m->get();
		$this->template->load('template', 'kartu_keluarga/kartu_keluarga_data',$data);
	}

	public function add()
	{
		$kartu_keluarga = new stdClass();
		$kartu_keluarga->kk_id = null;
		$kartu_keluarga->no_kk = null;
		$kartu_keluarga->nama = null;
		$kartu_keluarga->nik = null;
		$kartu_keluarga->nama_kepala = null;
		$kartu_keluarga->status_hubungan = null;
		$kartu_keluarga->kwarganegaraan = null;
		$kartu_keluarga->nama_ayah = null;
		$kartu_keluarga->nama_ibu = null;
		// $nik = $this->warga_m->get();
		$data = array(
			'page' =>'add',
			'row' => $kartu_keluarga,
			// 'nik' => $nik,

		);
		$this->template->load('template', 'kartu_keluarga/kartu_keluarga_form',$data);
	}

	public function edit($id)
	{
		$query = $this->kartu_keluarga_m->get($id);
		if ($query->num_rows() > 0) 
		{
			$kartu_keluarga = $query->row();
			$nik = $this->warga_m->get();
			$data = array(
			'page' =>'edit',
			'row' => $kartu_keluarga,
			'nik' => $nik,

		);
		$this->template->load('template', 'kartu_keluarga/kartu_keluarga_form',$data);
		} else {
			echo "<script>alert('Data berhasil diedit')</script>";
			echo "<script>window.location='".site_url('kartu_keluarga')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->kartu_keluarga_m->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->kartu_keluarga_m->edit($post);
			
		}
		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('kartu_keluarga');
        
	}

	public function del($id)
	{
		$this->kartu_keluarga_m->del($id);
		$id = $this->input->post('user_id');

		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('kartu_keluarga');
        }

     public function print()
	{
		$data['penduduk'] = $this->kartu_keluarga_m->get();
		$this->load->view('kartu_keluarga/kartu_keluarga_print', $data);

	} 
	
}
