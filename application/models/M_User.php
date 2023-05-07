<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class M_User extends CI_Model
{
	function login($data)
	{
		$this->db->select('peserta.id_peserta, peserta.nama, peserta.no_register, peserta.jurusan, jurusan.*');
		$this->db->from('peserta');
		$this->db->join('jurusan', 'peserta.jurusan=jurusan.id_jurusan');
		$this->db->where($data);
		return $this->db->get();
	}

	function cekno_register($whr)
	{
		$this->db->select('no_register');
		return $this->db->get_where('peserta', $whr);
	}
	function cekjawab($whr)
	{
		$this->db->select('no_register, jawaban');
		return $this->db->get_where('peserta', $whr);
	}
	function resetpasswd($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function cekdefpass($id)
	{
		$this->db->select('password');
		return $this->db->get_where('peserta', $id);
	}
	function cekpass($whr)
	{
		$this->db->select('password');
		return $this->db->get_where('peserta', $whr);
	}

	function gantipass($data, $whr)
	{
		$this->db->where($whr);
		$this->db->update('peserta', $data);
	}

	//Jadwal Ujian
	// function jadwal_ujian($where){
	// 	$this->db->select('ujian.*, kelas.id_kelas, kelas.kode_kelas, kegiatan.*');
	//        $this->db->from('ujian');
	//        $this->db->join('kelas', 'ujian.id_kelas=kelas.id_kelas');
	//        $this->db->join('kegiatan', 'ujian.id_kegiatan=kegiatan.id_kegiatan');
	//        $this->db->where($where);
	//        return $this->db->get();
	// }
	function jadwal_ujian($id_peserta)
	{
		return $this->db->query("SELECT DISTINCT ujian.* , (SELECT  count(id_tes) FROM ikut_ujian WHERE ikut_ujian.id_peserta=" . $id_peserta . " AND ikut_ujian.id_ujian=ujian.id_ujian) AS sudah_ikut, (SELECT kegiatan FROM kegiatan WHERE kegiatan.id_kegiatan=ujian.id_kegiatan) AS kegiatan, (SELECT status FROM ikut_ujian WHERE ikut_ujian.id_peserta=" . $id_peserta . " AND ikut_ujian.id_ujian=ujian.id_ujian) AS status FROM ujian, peserta WHERE ujian.status_ujian = '1' ORDER BY sudah_ikut ASC");
	}

	//Ujian
	function ujian($whr)
	{
		$this->db->select('*');
		$this->db->from('ujian');
		$this->db->join('kegiatan', 'ujian.id_kegiatan=kegiatan.id_kegiatan');
		$this->db->where($whr);
		return $this->db->get();
	}
	function cek_selesai_ujian($whr)
	{
		return $this->db->get_where('ikut_ujian', $whr);
	}
	function cek_detil_tes($whr)
	{

		return $this->db->get_where('ujian', $whr);
	}
	function cek_sdh_ujian($whr)
	{
		return $this->db->get_where('ikut_ujian', $whr);
	}
	function q_soal()
	{
		//return $this->db->get_where($kegiatan, $id_peserta);
		// $this->db->select('soal.*, kegiatan.*');
		// $this->db->from('soal');
		// $this->db->where('kegiatan', 'soal.id_kegiatan=kegiatan.id_kegiatan');
		// $this->db->order_by('id', 'RANDOM');
		// $this->db->order_by('rand()');
		// $this->db->limit(1);
		// return $this->db->query('SELECT * FROM soal WHERE kegiatan=' . $kegiatan);
		return $this->db->query('SELECT * FROM soal WHERE kegiatan ORDER BY RAND() LIMIT 100'); //ganti se limit nyo sesuai jo jumlah soal 
	}
	function tambah_ujian($data)
	{
		$this->db->insert('ikut_ujian', $data);
	}
	function detil_soal($whr)
	{
		$this->db->select('ujian.*, kegiatan.kegiatan AS kegiatan');
		$this->db->from('ujian');
		$this->db->join('kegiatan', 'ujian.id_kegiatan=kegiatan.id_kegiatan');
		$this->db->where($whr);
		// $this->db->order_by('id', 'RANDOM');
		// $this->db->order_by('rand()');
		// $this->db->limit(10);
		return $this->db->get();
	}
	function detil_tes($whr)
	{
		return $this->db->get_where('ikut_ujian', $whr);
	}

	//nilai
	function jwb($id_peserta)
	{
		$this->db->from('ikut_ujian');
		$this->db->select('ikut_ujian.*, peserta.*');
		$this->db->join('peserta', 'peserta.id_peserta=ikut_ujian.id_peserta');
		$this->db->where('ikut_ujian.id_peserta', $id_peserta);
		// $this->db->order_by('ikut_ujian.id_peserta');
		$query = $this->db->get();
		return $query;
	}

	function get_nilai_by_no_register($whr)
	{
		$this->db->join('peserta', 'ikut_ujian.peserta=peserta.id_peserta');
		return $this->db->get_where('ikut_ujian', $whr);
	}
}
