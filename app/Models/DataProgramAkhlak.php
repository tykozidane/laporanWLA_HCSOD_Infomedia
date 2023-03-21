<?php

namespace App\Models;

use CodeIgniter\Model;

class DataProgramAkhlak extends Model
{
    protected $table = 'programakhlak';
    protected $allowedFields = ['program', 'value'];
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByAkhlak($id_akhlak)
    {
        return $this->where('id_akhlak', $id_akhlak)->findAll();
    }
    public function getByProgram($program)
    {
        return $this->where('program', $program)->first();
    }
}