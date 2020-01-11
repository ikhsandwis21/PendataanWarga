<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_kegiatan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('daftar_kegiatan_m');
	}

	public function index()
	{
		$data['row'] = $this->daftar_kegiatan_m->get();
		$this->template->load('template', 'daftar_kegiatan/daftar_kegiatan_data',$data);
	}

	public function add()
	{
		$daftar_kegiatan = new stdClass();
		$daftar_kegiatan->id_kegiatan = null;
		$daftar_kegiatan->nama_kegiatan = null;
		$daftar_kegiatan->tanggal = null;
		$data = array(
			'page' =>'add',
			'row' => $daftar_kegiatan

		);
		$this->template->load('template', 'daftar_kegiatan/daftar_kegiatan_form',$data);
	}

	public function edit($id)
	{
		$query = $this->daftar_kegiatan_m->get($id);
		if ($query->num_rows() > 0) 
		{
			$daftar_kegiatan = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $daftar_kegiatan
			);
		$this->template->load('template', 'daftar_kegiatan/daftar_kegiatan_form',$data);
		} else {
			echo "<script>alert('Data berhasil diedit')</script>";
			echo "<script>window.location='".site_url('daftar_kegiatan')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->daftar_kegiatan_m->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->daftar_kegiatan_m->edit($post);
			
		}
		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('daftar_kegiatan');
        
	}

	public function del($id)
	{
		$this->daftar_kegiatan_m->del($id);
		$id = $this->input->post('user_id');

		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('daftar_kegiatan');
        }
	
}
