<?php

namespace App\Models;

use CodeIgniter\Model;

class DataUsers extends Model
{
    
    protected $table            = 'users';
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getById($id)
    {
        return $this->find($id);
    }
   
}
