<?php

namespace App\Models;

use CodeIgniter\Model;

class Datalaporan extends Model
{
    protected $table = 'wla';

    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByNik($nik)
    {
        return $this->where('NIK', $nik)->findAll();
    }
    public function getByNikMonthly($nik)
    {
        return $this->where('nik', $nik)->where('periode', 'Monthly')->where('type_wla', 'Non Project')->findAll();
    }
    public function getByNikMonthlyProject($nik)
    {
        return $this->where('nik', $nik)->where('periode', 'Monthly')->where('type_wla', 'Project')->findAll();
    }
}