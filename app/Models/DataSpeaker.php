<?php

namespace App\Models;

use CodeIgniter\Model;

class DataSpeaker extends Model
{
    protected $table = 'speaker';
    protected $allowedFields = ['id', 'id_event', 'nik', 'nama'];
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
    public function getByIdEvent($id_event)
    {
        return $this->where('id_event', $id_event)->findAll();
    }
    public function getCountByIdEvent($id_event)
    {
        return $this->where('id_event', $id_event)->countAllResults();
    }
    public function insertData($datasimpan)
    {
       return $this->insert($datasimpan);
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