<?php

namespace App\Models;

use CodeIgniter\Model;

class DataStorage extends Model
{
    protected $table            = 'storage';
    protected $allowedFields    = ['id','user_id','nama_dokumen', 'nama_file', 'tipe_file', 'path'];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)->findAll();
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
}
