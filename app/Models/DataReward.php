<?php

namespace App\Models;

use CodeIgniter\Model;

class DataReward extends Model
{
    protected $table = 'reward';
    protected $allowedFields = ['id','tahun', 'quarter', 'nama', 'deskripsi', 'price', 'status' ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
    public function getByQuarterTahun($tahun, $quarter)
    {
        return $this->where('tahun', $tahun)->where('quarter', $quarter)->where('status', "claimable")->findAll();
    }
    public function insertData($data)
    {
       return $this->insert($data);
        // return true;
    }
    public function dataUpdate($id, $data)
    {
        $this->update($id, $data);
        return true;
    }
    public function dataDelete($id)
    {
        $this->where('id', $id)->delete();
        return true;
    }
}