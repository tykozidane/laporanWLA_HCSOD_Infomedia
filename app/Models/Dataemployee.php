<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataemployee extends Model
{
    protected $table = 'employee';

    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByNik($nik)
    {
        return $this->where('nik', $nik)->find();
    }
}