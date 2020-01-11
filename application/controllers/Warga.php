<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('warga_m');
	}

	public function index()
	{
		$data['row'] = $this->warga_m->get();
		$this->template->load('template', 'warga/warga_data',$data);
	}

	public function add()
	{
		$warga = new stdClass();
		$warga->nik = null;
		$warga->nama = null;
		$warga->ttl = null;
		$warga->alamat = null;
		$warga->jenis_kelamin = null;
		$warga->agama = null;
		$warga->status = null;
		$warga->pekerjaan = null;
		$warga->status_tinggal = null;
		$data = array(
			'page' =>'add',
			'row' => $warga

		);
		$this->template->load('template', 'warga/warga_form',$data);
	}

	public function edit($id)
	{
		$query = $this->warga_m->get($id);
		if ($query->num_rows() > 0) 
		{
			$warga = $query->row();
			$data = array(
			'page' =>'edit',
			'row' => $warga
			);
		$this->template->load('template', 'warga/warga_form',$data);
		} else {
			$this->session->set_flashdata('success', 'Data berhasil diedit');
			 redirect('warga');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->warga_m->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->warga_m->edit($post);
			
		}
		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
            redirect('warga');
        
	}

	public function del($id)
	{
		$this->warga_m->del($id);
		$id = $this->input->post('user_id');

		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('warga');
        }	
	



	public function print()
	{
		$data['penduduk'] = $this->db->get('warga')->result_array();
		$this->load->view('warga/warga_print', $data);

	} 
}
