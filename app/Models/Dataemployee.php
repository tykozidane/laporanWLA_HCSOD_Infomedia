<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataemployee extends Model
{
    protected $table = 'employee';
    protected $allowedFields = ['fte'];
    public function getAllData()
    {
        return $this->orderBy('nama', 'ASC')->findAll();
    }
    public function getByNik($nik)
    {
        return $this->where('nik', $nik)->find();
    }
    public function getByNikfirst($nik)
    {
        return $this->where('nik', $nik)->first();
    }
    public function updateFteZero($nik)
    {
        return $this->where('nik', $nik)->set('fte', 0)->update();
    }
    public function dataUpdate($nik, $data)
    {
       return $this->where('nik', $nik)->update($data);
        
    }
    public function dataDelete($nik)
    {
        $this->where('nik', $nik)->delete();
        return true;
    }
}