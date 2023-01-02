<?php

namespace App\Models;

use CodeIgniter\Model;

class DataStorage extends Model
{
    protected $table            = 'storage';
    protected $allowedFields    = ['id','user_id','kategori','type','nomor_dokumen', 'nama_dokumen','deskripsi', 'nama_file', 'tipe_file', 'path', 'tanggal_berlaku', 'status'];
    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getByUserId($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }
    public function getByKategori($kategori)
    {
        return $this->where('kategori', $kategori)->findAll();
    }
    public function getByUserIdKategori ($userId, $kategori)
    {
        return $this->where('user_id', $userId)->where('kategori', $kategori)->findAll();
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
