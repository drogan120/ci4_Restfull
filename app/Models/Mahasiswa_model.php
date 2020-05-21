<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa_model extends Model
{
    protected $table = 'mahasiswa';

    function get_mahasiswa($id = false)
    {
        if ($id === false) {
            return  $this->findAll();
        } else {
            return $this->getWhere(['mahasiswa_id' => $id])->getRow();
        }
    }

    public function insert_mahasiswa($data)
    {
        $query =  $this->db->table($this->table)->insert($data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function update_mahasiswa($data, $id)
    {

        $query = $this->db->table($this->table)
            ->update($data, ['mahasiswa_id' => $id]);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_data($id)
    {

        $query =  $this->db->table($this->table)
            ->where('mahasiswa_id', $id)->delete();

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
