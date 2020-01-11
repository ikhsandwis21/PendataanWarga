
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		Check_admin();
		$this->load->model('user_m');
		$this->load->Library('form_validation');
		
	}

	public function index()
	{
		
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
			array('matches' => '%s not matches ')
	);
		
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required', '%s still empty, please fill in');
		$this->form_validation->set_message('is_unique', '%s already used, please change');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$data['title'] = "Add User" ;
             $this->template->load('template', 'user/user_form_add');   
        }else{
            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil disimpan');
            }
           redirect('user');
        }

		
	}


	public function edit($id)
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]'); 
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'matches[password]',
			array('matches' => '%s not matches ')
	);
		}
		if ($this->input->post('passconf')) {
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]',
			array('matches' => '%s not matches ')
	);
		}
		
		
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required', '%s still empty, please fill in');
		$this->form_validation->set_message('is_unique', '%s already used, please change');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
		if ($this->form_validation->run() == FALSE){
			$query = $this->user_m->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$data['title'] = "Edit User" ;
				$this->template->load('template', 'user/user_form_edit', $data);  
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('user')."';</script>";
			}
             
        }else{
            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil diedit');
            }
            redirect('user');
        }

		
	}
	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("Select * from user where username = '$post[username]' and user_id != '$post[user_id]' ");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} is already used');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if ($this->db->affected_rows() > 0 ) {
            	$this->session->set_flashdata('success', 'Data berhasil dihapus');
            }
            redirect('user');
        }
	}

