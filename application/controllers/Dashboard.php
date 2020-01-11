<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		check_not_login();
		$data['jumlah'] = $this->db->get('warga');
		$data['jumlah1'] = $this->db->get('kartu_keluarga');

		$sql2 = "SELECT sum(saldo) as total_saldo FROM kas_masuk";
		$data['jumlah2'] = $this->db->query($sql2)->row_array();

		$sql1 = "SELECT sum(jumlah) as total_jumlah FROM kas_keluar";
		
		 $data['jumlah3'] = $this->db->query($sql1)->row_array();

		$this->template->load('template', 'dashboard',$data);
	}
}
