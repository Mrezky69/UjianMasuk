<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_User', 'm_user');
	}

	//index
	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect('');
		}
		$this->load->view('_template_login/login');
	}

	function actlogin()
	{
		$no_register = $this->input->post('no_register');
		$no_register = preg_replace("/'/", "", $no_register);
		$password = $this->input->post('password');
		$data = ['no_register' => $no_register, 'password' => $password];
		$peserta = $this->m_user->login($data);
		if ($peserta->num_rows() > 0) {
			$s = $peserta->row_array();
			$data = [
				'id' => $s['id_peserta'],
				'nama' => $s['nama'],
				'no_register' => $s['no_register'],
				'jurusan' => $s['nama_jurusan'],
				'login' => true
			];
			$this->session->set_userdata($data);
			redirect('');
		} else {
			$this->session->set_flashdata('flash', 'no_register atau Password salah !');
			redirect('login');
		}
	}

	function logout()
	{
		$data = [
			'id' => '',
			'nama' => '',
			'no_register' => '',
			'jurusan' => '',
			'login' => false
		];
		$this->session->set_userdata($data);

		// $this->session->sess_destroy();
		redirect('login');
	}


	//Lupa Password
	//cek no_register
	// function cekno_register()
	// {
	// 	//preg_replace("/[^0-9]/", "", $var)
	// 	$n = $this->input->post('no_register');
	// 	$no_register = preg_replace("/[^0-9]/", "", $n);
	// 	$whr = [
	// 		'no_register' => $no_register
	// 	];
	// 	$cek = $this->m_user->cekno_register($whr)->row_array();
	// 	if (empty($cek['no_register'])) {
	// 		# code...
	// 		echo 0;
	// 	} elseif (empty($cek['pertanyaan'])) {
	// 		# code...
	// 		//echo "Anda belum mengatur pertanyaan, silahkan hubungi admino_registertrator";
	// 		$err = ['error' => 'Anda belum mengatur pertanyaan untuk mereset password, silahkan hubungi Admino_registertrator'];
	// 		echo json_encode($err);
	// 	} else {
	// 		echo json_encode($cek);
	// 	}
	// }
	// //cek jawaban
	// function cekjawab()
	// {
	// 	$jawaban = $this->input->post('jawaban');
	// 	$no_register = $this->input->post('no_register');
	// 	$whr = ['no_register' => $no_register];
	// 	$cek = $this->m_user->cekjawab($whr)->row_array();
	// 	if ($jawaban != $cek['jawaban']) {
	// 		# code...
	// 		echo 0;
	// 	} else {
	// 		echo json_encode($cek);
	// 	}
	// }
	//Reset password
	function resetpasswd()
	{
		$no_register = $this->input->post('no_register');
		$password = $this->input->post('password');
		$where = ['no_register' => $no_register];
		$data = ['password' => $password];
		if ($this->m_user->resetpasswd('peserta', $where, $data)) {
			echo 1;
		}
		$this->session->set_flashdata('flash', 'Password berhasil diubah, silahkan login !');
		redirect('login');
	}
}
