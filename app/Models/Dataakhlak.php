<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataakhlak extends Model
{
    protected $table = 'akhlak';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama'];
    public function getAllData()
    {
        return $this->findAll();
    }
    
}