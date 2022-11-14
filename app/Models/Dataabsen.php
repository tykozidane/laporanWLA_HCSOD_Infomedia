<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataabsen extends Model
{
    protected $table = 'absen';

    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByNik($id)
    {
        return $this->where('id_absen', $id)->find();
    }
}