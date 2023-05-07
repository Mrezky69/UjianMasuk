<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'm_admin');
	}

	//index
	public function index()
	{
		if ($this->session->status) {
			redirect('');
		}
		$this->load->view('template/login');
	}
	public function actlogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hak = $this->input->post('akses');
		$whereadmin = array('username' => $username);
		if ($hak == 'admin') {
			$cek = $this->m_admin->login_admin($whereadmin);
			if ($cek->num_rows() > 0) {
				$d = $cek->row_array();
				if (password_verify($password, $d['password'])) {
					# data session
					$data = [
						'id' => $d['id_admin'],
						'nama' => $d['nama'],
						'username' => $d['username'],
						'status' => 'admin'
					];
					$this->session->set_userdata($data);
					redirect('');
				} else {
					$this->session->set_flashdata('gagal', 'Username / Password salah');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('gagal', 'Username / Password salah');
				redirect('login');
			}
		}
	}
}
