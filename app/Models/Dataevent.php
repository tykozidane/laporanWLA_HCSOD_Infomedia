<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataevent extends Model
{
    protected $table = 'event';
    protected $allowedFields = ['id', 'nama', 'cat_event', 'speaker', 'tgl', 'jam' ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return$this->where('id', $id)->find();
    }
    public function getByIdfirst($id)
    {
        return$this->where('id', $id)->first();
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