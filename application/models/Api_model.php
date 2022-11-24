<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data);
        } else {
            return $this->db->get_where($table, $where);
        }
    }

    public function getPengguna($id = null)
    {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->join('kelas', 'kelas.id_kelas = pengguna.id_kelas', 'left');
        $this->db->join('peminatan', 'peminatan.id_peminatan = pengguna.peminatan', 'left');
        $this->db->join('tipe_user', 'tipe_user.id_tipeuser = pengguna.role', 'left');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        return $this->db->get();
    }

    public function getLaporan($id = null)
    {
        $c = $this->input->POST('nama');

        $this->db->select('*');
        $this->db->from('proses');
        $this->db->join('kelas', 'kelas.id_kelas = proses.id_kelas', 'left');
        $this->db->join('pengguna', 'pengguna.id = proses.id', 'left');
        $this->db->join('ujian', 'ujian.id_ujian = proses.id_ujian', 'left');
        if ($id != null) {
            $this->db->where('id_proses', $id);
        }
        $this->db->order_by("proses.p_nilai", "desc");
        $query = $this->db->get();
        return $query;
    }

    public function getKelas($id = null)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        if ($id != NULL)
            $this->db->where('id_kelas', $id);
        return $this->db->get();
    }

    public function getLaporanlist()
    {
        $this->db->select ( 'kelas.id_kelas, pengguna.id as id_peserta, proses.id_proses ,proses.nama as pnama,proses.no_peserta as pnopes, proses.sekolah as psekolah, proses.nama_kelas, proses.p_benar as jawaban_benar, proses.p_salah as jawaban_salah, proses.p_kosong as jawaban_kosong' ); 
        $this->db->from ( 'proses' );
        $this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
        $this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
        // $this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
        // $this->db->like('proses.nama', $c);		
        $this->db->order_by("proses.p_nilai", "desc"); 
        $query = $this->db->get ();
        return $query;
    }

    public function getLaporanSoal($id = null)
    {
        $this->db->select ( 'no_soal' ); 
        $this->db->from ( 'proses' );
        $this->db->join ( 'kelas', 'kelas.id_kelas = proses.id_kelas' , 'left' );
        $this->db->join ( 'pengguna', 'pengguna.id = proses.id' , 'left' );
        // $this->db->join ( 'ujian', 'ujian.id_ujian = proses.id_ujian' , 'left' );
        $this->db->join( 'soal', 'soal.id_soal = proses.no_soal' , 'left' );;
        // $this->db->like('proses.nama', $c);		
        if ($id != null) {
            $this->db->where('id_proses', $id);
        }
        $this->db->order_by("proses.p_nilai", "desc"); 
        $query = $this->db->get ();
        return $query;
    }

    public function getSoal($id = null)
    {
        $this->db->select('*');
        $this->db->from('soal');
        if ($id != null) {
            $this->db->where('id_soal', $id);
        }
        return $this->db->get();
    }
}
