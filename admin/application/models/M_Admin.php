<?php

class M_Admin extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //Login
    function login_admin($where)
    {
        return $this->db->get_where('admin', $where);
    }

    //Cek password admin
    function cek_passwd_admin($where)
    {
        $this->db->select('password');
        return $this->db->get_where('admin', $where);
    }

    function update_passwd($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    //Halaman Utama

    //Kegiatan
    function list_kegiatan()
    {
        $this->db->order_by('nama_kegiatan');
        return $this->db->get('kegiatan');
    }
    function insert_kegiatan($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function update_kegiatan($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_kegiatan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //Peserta
    function list_peserta()
    {
        return $this->db->query('select peserta.*, jurusan.nama_jurusan from peserta join jurusan on peserta.jurusan=jurusan.id_jurusan order by no_register');
    }
    function insert_peserta($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function update_peserta($table, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_peserta($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //import peserta
    public function import_peserta($data)
    {
        $insert = $this->db->insert_batch('peserta', $data);
        if ($insert) {
            return true;
        }
    }

    //Jurusan
    function list_jurusan()
    {
        $this->db->select('jurusan.*');
        $this->db->from('jurusan');
        $this->db->order_by('nama_jurusan');
        $query = $this->db->get();
        return $query;
    }
    function insert_jurusan($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function update_jurusan($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_jurusan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function pilih_jurusan($where)
    {
        $this->db->where($where);
        return $this->db->get('jurusan');
    }


    // tampil hanya jurusan
    function perjurusan()
    {
        return $this->db->query('SELECT jurusan FROM jurusan GROUP BY jurusan');
    }
    // tampil perjurusan jurusan
    function perjurusans($where)
    {
        $this->db->select('id_jurusan, nama_jurusan');
        $this->db->from('jurusan');
        $this->db->where($where);
        $this->db->order_by('nama_jurusan', 'ASC');
        return $this->db->get();
    }

    // tampil hanya jurusan
    function perkegiatan()
    {
        return $this->db->query('SELECT kegiatan FROM kegiatan GROUP BY kegiatan');
    }
    // tampil perjurusan jurusan
    function perkegiatans($where)
    {
        $this->db->select('id_kegiatan, kegiatan');
        $this->db->from('kegiatan');
        $this->db->where($where);
        $this->db->order_by('kegiatan', 'ASC');
        return $this->db->get();
    }

    //Soal

    public function getSoal()
    {
        return $this->db->get('soal')->result_array();
    }

    //Tampil Soal Admin
    function soal_admin()
    {
        $this->db->select('soal.*, kegiatan.*');
        $this->db->from('soal');
        $this->db->join('kegiatan', 'kegiatan.id_kegiatan=soal.kegiatan');
        // $this->db->order_by('kode_jurusan');
        $query = $this->db->get();
        return $query;
        //return $this->db->get_where('soal', $where);

        // return $this->db->query('select soal.*, kegiatan.id_kegiatan, kegiatan.nama_kegiatan from soal, kegiatan where soal.kegiatan=' . $pjk . ' and soal.kegiatan=' . $kegiatan . ' and soal.kegiatan=kegiatan.id_kegiatan');
    }

    //Tambah soal tanpa media
    function in_soal_nomedia($table, $data)
    {
        $this->db->insert($table, $data);
    }

    //Tambah soal dengan media
    function in_soal_media($table, $data)
    {
        $this->db->insert($table, $data);
    }

    //Update soal tanpa media
    function up_soal_nomedia($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //Update soal dengan media
    function up_soal_media($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //get soal by id
    function get_soal_by_id($where)
    {
        $this->db->join('kegiatan', 'soal.kegiatan=kegiatan.id_kegiatan');
        return $this->db->get_where('soal', $where);
    }

    function vkegiatan($where)
    {
        return $this->db->get_where('kegiatan', $where);
    }

    //Tampil jurusan
    function vjurusan($where)
    {
        return $this->db->get_where('jurusan', $where);
    }

    //Ujian
    function list_ujian()
    {
        $this->db->select('ujian.*, kegiatan.*');
        $this->db->from('ujian');
        $this->db->join('kegiatan', 'ujian.id_kegiatan=kegiatan.id_kegiatan');
        return $this->db->get();
    }
    //Tambah ujian
    function t_ujian($table, $data)
    {
        $this->db->insert($table, $data);
    }
    //Edit ujian
    function e_ujian($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //nilai
    function nilai()
    {
        // return $this->db->get('ikut_ujian');
        $this->db->from('ikut_ujian');
        $this->db->select('ikut_ujian.*, ujian.* , peserta.*');
        $this->db->join('peserta', 'peserta.id_peserta=ikut_ujian.id_peserta');
        $this->db->join('ujian', 'ujian.id_ujian=ikut_ujian.id_ujian');
        // $this->db->join('jurusan', 'jurusan.id_jurusan=ikut_ujian.id_jurusan');
        // $this->db->join('ujian', 'ujian.id_ujian = ikut_ujian.ujian');
        // // $this->db->order_by('kode_jurusan');
        $query = $this->db->get();
        return $query;
        // // //return $this->db->get_where('soal', $where);

        // return $this->db->query('select soal.*, kegiatan.id_kegiatan, kegiatan.nama_kegiatan from soal, kegiatan where soal.kegiatan=' . $pjk . ' and soal.kegiatan=' . $kegiatan . ' and soal.kegiatan=kegiatan.id_kegiatan');
    }

    function get_nilai_by_no_register($where)
    {
        $this->db->join('peserta', 'ikut_ujian.peserta=peserta.id_peserta');
        return $this->db->get_where('ikut_ujian', $where);
    }

    function tampil_apaaja()
    {
        $this->db->from('apaaja');
        $query = $this->db->get();
        return $query;
    }
    function insert_apaaja($table, $data)
    {
        $this->db->insert($table, $data);
    }
    function update_apaaja($where, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function delete_apaaja($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
