<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		check_not_login();
		$data['title'] = "Profil" ;
		$this->template->load('template', 'profil',$data);
	}
}
