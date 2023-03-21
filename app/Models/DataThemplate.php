<?php

namespace App\Models;

use CodeIgniter\Model;

class DataThemplate extends Model
{
    protected $table = 'themplate';
    protected $allowedFields = ['id', 'nama', 'kategori', 'deskripsi', 'judul', 'isi', 'tandatangan'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
    public function insertData($datasimpan)
    {
       return $this->insert($datasimpan);
        // return true;
    }
    public function dataUpdate($id, $data)
    {
        $this->update($id, $data);
        return true;
    }
}