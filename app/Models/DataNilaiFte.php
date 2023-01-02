<?php

namespace App\Models;

use CodeIgniter\Model;

class DataNilaiFte extends Model
{
    protected $table = 'nilai_fte';
    protected $allowedFields = ['id', 'nik', 'tahun', 'nilai' ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByPeriode($tahun)
    {
        return$this->where('tahun', $tahun)->find();
    }
    public function getFirstByPeriode($tahun, $nik)
    {
        return $this->where('tahun', $tahun)->where('nik', $nik)->first();
    }
    public function getByIdfirst($id)
    {
        return$this->where('id', $id)->first();
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
    public function dataDelete($nik, $tahun)
    {
        $this->where('nik', $nik)->where('tahun', $tahun)->delete();
        return true;
    }
}