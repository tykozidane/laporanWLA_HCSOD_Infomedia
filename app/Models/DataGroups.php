<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGroups extends Model
{
    
    protected $table            = 'auth_groups';
    protected $allowedFields    = [];

    public function getAllData()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->find($id);
    }
}
