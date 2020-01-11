<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepanitiaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['kepanitiaan_m','daftar_kegiatan_m','warga_m']);
	}

	public function index()
	{
		// $data['row'] = $this->kepanitiaan_m->get();

		$sql1 = "SELECT * FROM panitia1
		INNER JOIN kegiatan ON panitia1.id_kegiatan = kegiatan.id_kegiatan ";
		 $data['row'] = $this->db->query($sql1);
		$this->template->load('template', 'kepanitiaan/kepanitiaan_data',$data);
	}

	public function add()
	{
		$kepanitiaan = new stdClass();
		$kepanitiaan->kd_panitia = null;
		$nik = $this->warga_m->get();
		$id_kegiatan = $this->daftar_kegiatan_m->get();
		$data = array(
			'page' => 'add',
			'row' => $kepanitiaan,
			'nik' => $nik,
			'id_kegiatan' => $id_kegiatan,

		);
		$this->template->load('template', 'kepanitiaan/kepanitiaan_form',$data);
	}

	public function edit($id)
	{
		$query = $this->kepanitiaan_m->get($id);
		if ($query->num_rows() > 0) 
		{
			$kepanitiaan = $query->row();
			$nik = $this->warga_m->get();
			$id_kegiatan = $this->daftar_kegiatan_m->get();
			$data = array(
			'page' =>'edit',
			'row' => $kepanitiaan,
			'nik' => $nik,
			'id_kegiatan' => $id_kegiatan,
			);
		$this->template->load('template', 'kepanitiaan/kepanitiaan_form',$data);
		} else {
			echo "<script>alert('Data berhasil diedit')</script>";
			echo "<script>window.location='".site_url('kepanitiaan')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->kepanitiaan_m->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->kepanitiaan_m->edit($post);
			
		}
		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('kepanitiaan');
        
	}

	public function del($id)
	{
		$this->kepanitiaan_m->del($id);
		$id = $this->input->post('user_id');

		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('kepanitiaan');
        }

    public function print()
    {
    	$data['panitia'] = $this->kepanitiaan_m->get();
		$this->load->view('kepanitiaan/kepanitiaan_print', $data);
    }
	
}
