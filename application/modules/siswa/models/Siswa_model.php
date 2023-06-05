<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('siswa');
        if($id)
        {
            $this->db->where('id_siswa', $id);
        }
        $data = $this->db->get();
        return $data;
    }

    public function add($data)
    {
        $params = array(
            'nik' => htmlspecialchars($data['nik']),
            'nama' => htmlspecialchars($data['nama']),
            'alamat' => htmlspecialchars($data['alamat']),
            'jenis_kelamin' => htmlspecialchars($data['jenis_kelamin']),
            'tgl_lahir' => htmlspecialchars($data['tgl_lahir']),
        );
        $this->db->insert('siswa', $params);
    }

    public function ubah($data)
    {
        $params = array(
            'nik' => htmlspecialchars($data['nik']),
            'nama' => htmlspecialchars($data['nama']),
            'alamat' => htmlspecialchars($data['alamat']),
            'jenis_kelamin' => htmlspecialchars($data['jenis_kelamin']),
            'tgl_lahir' => htmlspecialchars($data['tgl_lahir']),
        );
        $this->db->where('id_siswa', $data['id']);
        $this->db->update('siswa', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_siswa', $id['id']);
        $this->db->delete('siswa');
    }
}

?>