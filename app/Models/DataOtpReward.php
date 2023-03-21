<?php

namespace App\Models;

use CodeIgniter\Model;

class DataOtpReward extends Model
{
    protected $table = 'otp_reward';
    protected $allowedFields = ['kode_otp', 'nik', 'email', 'status' ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByKode($kode)
    {
        return $this->where('kode_otp', $kode)->first();
    }
    public function getByNik($nik)
    {
        return $this->where('nik', $nik)->first();
    }
    public function insertData($data)
    {
       return $this->insert($data);
        // return true;
    }
    public function dataUpdate($kode, $data)
    {
        $this->set($data)->where('kode_otp', $kode)->update();
        return true;
    }
    public function dataDelete($id)
    {
        $this->where('id', $id)->delete();
        return true;
    }
}