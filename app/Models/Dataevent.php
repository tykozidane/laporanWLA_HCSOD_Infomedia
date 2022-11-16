<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataevent extends Model
{
    protected $table = 'event';

    public function getAllData()
    {
        return $this->findAll();
    }
    public function getById($id)
    {
        return$this->where('id_event', $id)->find();
    }
    public function getByIdfirst($id)
    {
        return$this->where('id_event', $id)->first();
    }
}