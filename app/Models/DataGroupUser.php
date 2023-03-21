<?php

namespace App\Models;

use CodeIgniter\Model;

class DataGroupUser extends Model
{
    
    protected $table            = 'auth_groups_users';
    protected $allowedFields    = [];

    public function getByUserId($id)
    {
        return $this->where('user_id', $id)->findAll();
    }
    public function getByGroupsId($id)
    {
        return $this->where('group_id', $id)->findAll();
    }
   
}
