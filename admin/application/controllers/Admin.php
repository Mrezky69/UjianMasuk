<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set("Asia/Jakarta");

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PHPExcel\Classes\PHPExcel\IOFactory;

class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->db->query('SET time_zone="+7:00"');
		if (!$this->session->status) {
			redirect('login');
		}
		$this->load->model('M_Admin', 'm_admin');
	}

	//Header
	private function header($data)
	{
		//admin
		if ($this->session->status == 'admin') {
			# code...
			$data['perkegiatan'] = $this->m_admin->perkegiatan()->result();
		}
		$this->load->view('template/header', $data);
	}

	//Logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	//Index
	public function index()
	{

		$data['jmlkegiatan'] = $this->m_admin->list_kegiatan()->num_rows();
		$data['jmlpeserta'] = $this->m_admin->list_peserta()->num_rows();
		$data['jmljurusan'] = $this->m_admin->list_jurusan()->num_rows();

		$data['title'] = 'Dashboard';

		$this->header($data);
		$this->load->view('utama');
		$this->load->view('template/footer');
	}


	//Kegiatan
	public function kegiatan()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$data['title'] = 'Kegiatan';

		$data['kegiatan'] = $this->m_admin->list_kegiatan()->result();

		$this->header($data);
		$this->load->view('kegiatan');
		$this->load->view('template/footer');
	}

	public function bebasaja()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$data['title'] = 'BEBAS';

		$data['aajalah'] = $this->m_admin->tampil_apaaja()->result();

		$this->header($data);
		$this->load->view('apaaja');
		$this->load->view('template/footer');
	}

	public function tambah_bebasaja()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$nama_apa = $this->input->post('nama_apa');
		$sql = $this->db->query("SELECT nama_apa FROM apaaja where nama_apa='$nama_apa'");
		$cek_apa = $sql->num_rows();
		if ($cek_apa > 0) {
			$this->session->set_flashdata('message', 'Nomor KTP Sudah digunakan sebelumnya');
			redirect('apaaja');
		} else {
			//insert db
			$data = array('nama_apa' => $nama_apa);
			$this->m_admin->insert_apaaja('apaaja', $data);
			redirect('apaaja');
		}
	}
	public function edit_bebasaja($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$nama_apa = $this->input->post('nama_apa');
		$data = array('nama_apa' => $nama_apa);
		$where = array('id_apa' => $id);
		$this->m_admin->update_apaaja($where, 'apaaja', $data);
		redirect('apaaja');
	}
	public function hapus_bebasaja($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$where = array('id_apa' => $id);
		$this->m_admin->delete_apaaja($where, 'apaaja');
		redirect('apaaja');
	}

	public function tambah_kegiatan()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$kegiatan = $this->input->post('kegiatan');
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$sql = $this->db->query("SELECT kegiatan FROM kegiatan where kegiatan='$kegiatan'");
		$cek_kegiatan = $sql->num_rows();
		if ($cek_kegiatan > 0) {
			$this->session->set_flashdata('message', 'Nomor KTP Sudah digunakan sebelumnya');
			redirect('kegiatan');
		} else {
			//insert db
			$data = array('kegiatan' => $kegiatan, 'nama_kegiatan' => $nama_kegiatan);
			$this->m_admin->insert_kegiatan('kegiatan', $data);
			redirect('kegiatan');
		}
	}
	public function edit_kegiatan($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$kegiatan = $this->input->post('kegiatan');
		$nama_kegiatan = $this->input->post('nama_kegiatan');
		$data = array('kegiatan' => $kegiatan, 'nama_kegiatan' => $nama_kegiatan);
		$where = array('id_kegiatan' => $id);
		$this->m_admin->update_kegiatan($where, 'kegiatan', $data);
		redirect('kegiatan');
	}
	public function hapus_kegiatan($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$where = array('id_kegiatan' => $id);
		$this->m_admin->delete_kegiatan($where, 'kegiatan');
		redirect('kegiatan');
	}

	//Peserta
	public function peserta()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$data['title'] = 'Peserta';
		$data['peserta'] = $this->m_admin->list_peserta()->result();
		$data['listjurusan'] = $this->m_admin->list_jurusan()->result();

		$this->header($data);
		$this->load->view('peserta');
		$this->load->view('template/footer');
	}

	public function import_peserta()
	{

		$config['upload_path'] = realpath('excel');
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = true;

		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach ($object->getWorksheetIterator() as $worksheet) {
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for ($row = 2; $row <= $highestRow; $row++) {
					$nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$no_register = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$jurusan = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$askol = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$temp_data[] = array(
						'nama'	=> $nama,
						'no_register'	=> $no_register,
						'jurusan'	=> $jurusan,
						'password'	=> $no_register,
						'askol'	=> $askol
					);
				}
			}
			$this->load->model('m_admin');
			$insert = $this->m_admin->import_peserta($temp_data);
			if ($insert) {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		} else {
			echo "Tidak ada file yang masuk";
		}
	}

	public function tambah_peserta()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$nama = $this->input->post('nama');
		$no_register = $this->input->post('no_register');
		$jurusan = $this->input->post('jurusan');
		$password = $this->input->post('no_register');
		$askol = $this->input->post('askol');
		$sql = $this->db->query("SELECT no_register FROM peserta where no_register='$no_register'");
		$cek_register = $sql->num_rows();
		if ($cek_register > 0) {
			$this->session->set_flashdata('peserta', 'Nomor Register Sudah digunakan sebelumnya');
			// echo "Nomor Register Sudah digunakan sebelumnya" . $this->upload->display_errors();
			redirect('peserta');
		} else {
			$data = array(
				'nama' => $nama,
				'no_register' => $no_register,
				'jurusan' => $jurusan,
				'password' => $password,
				'askol' => $askol
			);
			$this->m_admin->insert_peserta('peserta', $data);
			$this->session->set_flashdata('sukses', 'Tambah Peserta Berhasil');
			redirect('peserta');
		}
	}
	public function edit_peserta($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$nama = $this->input->post('nama');
		$no_register = $this->input->post('no_register');
		$jurusan = $this->input->post('jurusan');
		$askol = $this->input->post('askol');
		$password = $this->input->post('password');
		// $sql = $this->db->query("SELECT no_register FROM peserta where no_register='$no_register'");
		// $cek_register = $sql->num_rows();
		// if ($cek_register > 0) {
		// 	$this->session->set_flashdata('peserta', 'Nomor Register Sudah digunakan sebelumnya');
		// 	// echo "Nomor Register Sudah digunakan sebelumnya" . $this->upload->display_errors();
		// 	redirect('peserta');
		// } else {
		$data = array(
			'nama' => $nama,
			'no_register' => $no_register,
			'jurusan' => $jurusan,
			'password' => $password,
			'askol' => $askol
		);
		$where = array('id_peserta' => $id);
		$this->m_admin->update_peserta('peserta', $data, $where);
		redirect('peserta');
	}
	// }
	public function hapus_peserta($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$where = array('id_peserta' => $id);
		$this->m_admin->delete_peserta($where, 'peserta');
		redirect('peserta');
	}

	//jurusan
	public function jurusan()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$data['title'] = 'Jurusan';

		$data['jurusan'] = $this->m_admin->list_jurusan()->result();

		$this->header($data);
		$this->load->view('jurusan');
		$this->load->view('template/footer');
	}
	public function tambah_jurusan()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}

		// $this->form_validation->set_rules('jurusan', 'jurusan', 'required|min_length[3]|max_length[3]');
		// if($this->form_validation->run()==true){}
		$jurusan = $this->input->post('jurusan');
		$namajurusan = $this->input->post('namajurusan');
		$sql = $this->db->query("SELECT jurusan FROM jurusan where jurusan='$jurusan'");
		$cek_jurusan = $sql->num_rows();
		if ($cek_jurusan > 0) {
			$this->session->set_flashdata('jurusan', 'Kode Jurusan Sudah digunakan sebelumnya');
			redirect('jurusan');
		} else {
			$data = array(
				'jurusan' => $jurusan,
				'nama_jurusan' => $namajurusan
			);
			$this->m_admin->insert_jurusan('jurusan', $data);
			redirect('jurusan');
		}
	}
	public function edit_jurusan($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$jurusan = $this->input->post('jurusan');
		$namajurusan = $this->input->post('namajurusan');
		// $sql = $this->db->query("SELECT jurusan FROM jurusan where jurusan='$jurusan'");
		// $cek_jurusan = $sql->num_rows();
		// if ($cek_jurusan > 0) {
		// 	$this->session->set_flashdata('jurusan', 'Kode Jurusan Sudah digunakan sebelumnya');
		// 	redirect('jurusan');
		// } else {
		$data = array(
			'jurusan' => $jurusan,
			'nama_jurusan' => $namajurusan
		);
		$where = array('id_jurusan' => $id);
		$this->m_admin->update_jurusan($where, 'jurusan', $data);
		redirect('jurusan');
		// }
	}
	public function hapus_jurusan($id)
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$where = array('id_jurusan' => $id);
		$this->m_admin->delete_jurusan($where, 'jurusan');
		redirect('jurusan');
	}

	//Soal
	public function soal()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}
		$data['title'] = 'Soal';

		$data['soal'] = $this->m_admin->soal_admin()->result();

		$this->header($data);
		$this->load->view('soal');
		$this->load->view('template/footer');
	}

	//Tambah Soal
	//Sebelum menambah soal, ubah settingan maximum file upload pada php.ini
	public function tambahsoal()
	{
		$data['title'] = 'Tambah Soal';
		$data['listkegiatan'] = $this->m_admin->list_kegiatan()->result();

		$this->header($data);
		$this->load->view('tambahsoal');
		$this->load->view('template/footer');
	}
	//Aksi tambah soal
	function act_tsoal()
	{
		$kegiatan = $this->input->post('kegiatan');
		$soal = $this->input->post('soal');
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$c = $this->input->post('c');
		$d = $this->input->post('d');
		$e = $this->input->post('e');
		$jawaban = $this->input->post('jawaban');
		$cekmedia = $_FILES['media'];

		//jika ada file
		if (empty($cekmedia['name'])) {
			# code...
			$data = array(
				'kegiatan' => $kegiatan,
				'soal' => $soal,
				'opsi_a' => $a,
				'opsi_b' => $b,
				'opsi_c' => $c,
				'opsi_d' => $d,
				'opsi_e' => $e,
				'jawaban' => $jawaban
			);
			$this->m_admin->in_soal_nomedia('soal', $data);
			$this->session->set_flashdata('soal', 'Soal berhasil ditambahkan');
			redirect('tsoal');
		} else {
			$config['upload_path'] = './media/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif|wav|mp3';
			$config['max_size'] = 2048;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;
			//load library upload
			$this->load->library('upload', $config);

			//proses upload file
			if (!$this->upload->do_upload('media')) {
				$data['error'] = $this->upload->display_errors();
				redirect('tsoal', $data);
			} else {
				$media = $this->upload->data('file_name');
				$data = array(
					'kegiatan' => $kegiatan,
					'soal' => $soal,
					'media' => $media,
					'opsi_a' => $a,
					'opsi_b' => $b,
					'opsi_c' => $c,
					'opsi_d' => $d,
					'opsi_e' => $e,
					'jawaban' => $jawaban
				);

				$this->m_admin->in_soal_media('soal', $data);
				$this->session->set_flashdata('soal', 'Soal berhasil ditambahkan');
				redirect('tsoal');
			}
		}
	}
	//Edit Soal
	public function esoal($id)
	{
		$data['title'] = 'Edit Soal';
		$data['listkegiatan'] = $this->m_admin->list_kegiatan()->result();
		$data['soal'] = $this->m_admin->get_soal_by_id(['id_soal' => $id])->row();

		$this->header($data);
		$this->load->view('editsoal');
		$this->load->view('template/footer');
	}
	//Aksi edit soal
	function act_esoal($id)
	{
		$kegiatan = $this->input->post('kegiatan');
		$soal = $this->input->post('soal');
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$c = $this->input->post('c');
		$d = $this->input->post('d');
		$e = $this->input->post('e');
		$jawaban = $this->input->post('jawaban');
		$cekmedia = $_FILES['media'];

		$where = ['id_soal' => $id];
		//jika ada file
		if (empty($cekmedia['name'])) {
			# code...
			$data = array(
				'kegiatan' => $kegiatan,
				'soal' => $soal,
				'opsi_a' => $a,
				'opsi_b' => $b,
				'opsi_c' => $c,
				'opsi_d' => $d,
				'opsi_e' => $e,
				'jawaban' => $jawaban
			);
			$this->m_admin->up_soal_nomedia($where, 'soal', $data);
			$this->session->set_flashdata('soal', 'Soal berhasil diubah');
			redirect($this->agent->referrer());
		} else {
			$s = $this->db->query('select media from soal where id_soal=' . $id)->row();
			unlink('./media/' . $s->media);
			$config['upload_path'] = './media/';
			$config['allowed_types'] = 'jpg|png|gif|wav|mp3';
			$config['max_size'] = 2000;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;
			//load library upload
			$this->load->library('upload', $config);

			//proses upload file
			if (!$this->upload->do_upload('media')) {
				$data['error'] = $this->upload->display_errors();
				redirect('tsoal', $data);
			} else {
				$media = $this->upload->data('file_name');
				$data = array(
					'kegiatan' => $kegiatan,
					'soal' => $soal,
					'media' => $media,
					'opsi_a' => $a,
					'opsi_b' => $b,
					'opsi_c' => $c,
					'opsi_d' => $d,
					'opsi_e' => $e,
					'jawaban' => $jawaban
				);

				$this->m_admin->up_soal_media($where, 'soal', $data);
				$this->session->set_flashdata('soal', 'Soal berhasil diubah');
				redirect($this->agent->referrer());
			}
		}
	}
	//Hapus Soal
	function hapus_soal($id)
	{
		$this->db->query("DELETE FROM soal WHERE id_soal=" . $id);
		redirect($this->agent->referrer());
	}

	// Nilai
	public function nilai()
	{
		if ($this->session->status != 'admin') {
			redirect('');
		}

		$kegiatan = $this->uri->segment(3);

		$data['title'] = 'Nilai';
		$vkegiatan = array('id_kegiatan');
		$data['kegiatan'] = $this->m_admin->vkegiatan($vkegiatan)->row_array();
		$data['jrs'] = $data['kegiatan']['nama_kegiatan'];
		$data['nilai'] = $this->m_admin->nilai()->result();
		if ($kegiatan) {
			$m = $this->db->query('SELECT kegiatan FROM kegiatan WHERE id_kegiatan=' . $kegiatan)->row_array();
			$data['judul'] = 'Nilai ' . $m['kegiatan'];
			$data['nilai'] = $this->nilai_by_kegiatan($kegiatan)->result();
		}


		$this->header($data);
		$this->load->view('nilai');
		$this->load->view('template/footer');
	}

	function nilai_by_kegiatan($kegiatan)
	{
		return $this->db->query('SELECT peserta.id_peserta, peserta.no_register, peserta.nama, kegiatan.kegiatan, ikut_ujian.id_tes, ikut_ujian.id_ujian, ikut_ujian.nilai, ujian.id_kegiatan FROM peserta, ikut_ujian, ujian, kegiatan WHERE ikut_ujian.id_peserta=peserta.id_peserta AND ujian.id_ujian=ikut_ujian.id_ujian AND ujian.id_kegiatan=kegiatan.id_kegiatan AND ujian.id_kegiatan=' . $kegiatan);
	}
	function hapus_nilai($id)
	{
		$this->db->query('DELETE FROM ikut_ujian WHERE id_tes=' . $id);
		redirect($this->agent->referrer());
	}

	//Ujian
	public function ujian()
	{
		$data['title'] = 'Ujian';
		$data['listkegiatan'] = $this->m_admin->list_kegiatan()->result();
		$data['listujian'] = $this->m_admin->list_ujian()->result();

		$this->header($data);
		$this->load->view('ujian');
		$this->load->view('template/footer');
	}
	function tambah_ujian()
	{
		$ujian = $this->input->post('nmujian');
		$kegiatan = $this->input->post('kegiatan');
		$waktu = $this->input->post('waktu');
		$tanggal = $this->input->post('tanggal');
		$status_ujian = $this->input->post('status_ujian');
		$data = [
			'nama_ujian' => $ujian,
			'id_kegiatan' => $kegiatan,
			'waktu' => $waktu,
			'tanggal' => $tanggal,
			'status_ujian' => $status_ujian
		];

		$this->m_admin->t_ujian("ujian", $data);
		$this->session->set_flashdata('t_ujian', '');
		redirect('ujian');
	}
	function edit_ujian($id_ujian)
	{
		$ujian = $this->input->post('nmujian');
		$kegiatan = $this->input->post('kegiatan');
		$waktu = $this->input->post('waktu');
		$tanggal = $this->input->post('tanggal');
		$status_ujian = $this->input->post('status_ujian');
		$where = ['id_ujian' => $id_ujian];
		$data = [
			'nama_ujian' => $ujian,
			'id_kegiatan' => $kegiatan,
			'waktu' => $waktu,
			'tanggal' => $tanggal,
			'status_ujian' => $status_ujian
		];

		$this->m_admin->e_ujian($where, 'ujian', $data);
		$this->session->set_flashdata('t_ujian', '');
		redirect('ujian');
	}
	function hapus_ujian($id)
	{
		$this->db->query("DELETE FROM ujian WHERE id_ujian=" . $id);
		redirect($this->agent->referrer());
	}

	//Setting
	public function setting()
	{
		if ($this->session->status == 'admin') {
			$data['admin'] = $this->db->query('SELECT id_admin, nama, username FROM admin')->result();
		}
		$data['title'] = 'Pengaturan';

		$this->header($data);
		$this->load->view('setting');
		$this->load->view('template/footer');
	}
	function ganti_passwd_admin()
	{
		$password = $this->input->post('password');
		$passwordbaru = $this->input->post('passwordbaru');

		$id = ['id_admin' => $this->session->id];
		$cek = $this->m_admin->cek_passwd_admin($id)->row();
		if (password_verify($password, $cek->password)) {
			# code...
			$pb = password_hash($passwordbaru, PASSWORD_DEFAULT);
			$data = ['password' => $pb];
			$this->m_admin->update_passwd('admin', $data, $id);
			$this->session->set_flashdata('passwd', 'Password berhasil diubah');
			redirect('setting');
		} else {
			$this->session->set_flashdata('error', 'Password lama salah !');
			redirect('setting');
		}
	}
	function ganti_user()
	{
		$id = $this->session->id;
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$data = ['nama' => $nama, 'username' => $username];
		if ($this->session->status == 'admin') {
			$where = ['id_admin' => $id];
			$this->m_admin->update_passwd('admin', $data, $where);

			$this->session->unset_userdata(['nama', 'username']);
			$this->session->set_userdata($data);

			$this->session->set_flashdata('passwd', 'Nama/Username berhasil diubah');
			redirect('setting');
		}
	}
	function tambah_admin()
	{
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$data = ['nama' => $nama, 'username' => $username, 'password' => $password];
		$this->db->insert('admin', $data);
		$this->session->set_flashdata('tambahadmin', $nama . ' berhasil ditambahkan sebagai admin');
		redirect('setting');
	}
	function hapus_admin($id)
	{
		$this->db->query('DELETE FROM admin WHERE id_admin=' . $id);
		redirect('setting');
	}

	//Reset aplikasi
	function teser()
	{
		$this->db->query('SET FOREIGN_KEY_CHECKS = 0');
		$this->db->truncate('ikut_ujian');
		$this->db->truncate('jurusan');
		$this->db->truncate('kegiatan');
		$this->db->truncate('peserta');
		$this->db->truncate('soal');
		$this->db->truncate('ujian');
		$this->db->query('SET FOREIGN_KEY_CHECKS = 1');
		delete_files('./media/');
		redirect('');
	}

	//Error 404
	public function error()
	{
		$data['title'] = '404 Not Found';

		$this->header($data);
		$this->load->view('template/404');
		$this->load->view('template/footer');
	}

	function j($data)
	{
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
