<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAgreement extends Model
{
    protected $table = 'agreement';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','no_ktp', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    
}