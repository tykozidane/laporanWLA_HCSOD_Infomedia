<?php

namespace App\Models;

use CodeIgniter\Model;

class Datalaporan extends Model
{
    protected $table = 'wla';
    protected $allowedFields = ['id','tahun', 'nik', 'activity', 'detail', 'average_time', 'cat_wla', 'type_wla', 'durasi', 'periode', 'quantity', 'keterangan' ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByNik($nik)
    {
        return $this->where('NIK', $nik)->findAll();
    }
    public function getByNikTahun($nik, $tahun)
    {
        return $this->where('NIK', $nik)->where('tahun', $tahun)->findAll();
    }
    public function getByNikMonthly($nik)
    {
        return $this->where('nik', $nik)->where('periode', 'Monthly')->where('type_wla', 'Non Project')->findAll();
    }
    public function getByNikMonthlyProject($nik)
    {
        return $this->where('nik', $nik)->where('periode', 'Monthly')->where('type_wla', 'Project')->findAll();
    }
    public function insertData($datasimpan)
    {
       return $this->insert($datasimpan);
        // return true;
    }
    public function dataUpdate($id, $data)
    {
        $this->where('id', $id)->update($data);
        return true;
    }
    public function dataDelete($nik, $tahun)
    {
        $this->where('nik', $nik)->where('tahun', $tahun)->delete();
        return true;
    }
}