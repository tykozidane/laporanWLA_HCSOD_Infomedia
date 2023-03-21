<?php

namespace App\Models;

use CodeIgniter\Model;

class DataUpdaterClaimReward extends Model
{
    protected $table = 'updater_claimreward';
    protected $allowedFields = ['id','user_id', 'claim_id', 'username', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
    public function getByClaimId($claim_id)
    {
        return $this->where('clain_id', $claim_id)->first();
    }
    public function insertData($data)
    {
       return $this->insert($data);
        // return true;
    }
    public function dataUpdate($id, $data)
    {
        $this->update($id, $data);
        return true;
    }
    public function dataDelete($id)
    {
        $this->where('id', $id)->delete();
        return true;
    }
}