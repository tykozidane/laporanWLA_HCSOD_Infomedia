<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataabsen extends Model
{
    protected $table = 'absen';
    protected $allowedFields = ['id', 'id_event', 'nik', 'vote', 'notes', 'jam_checkin', 'last_update' ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getByNik($id)
    {
        return $this->where('id', $id)->first();
    }
    public function getByIdNik($id, $nik)
    {
        return $this->where('id_event', $id)->where('nik', $nik)->first();
    }
    public function insertData($datasimpan)
    {
       return $this->insert($datasimpan);
        // return true;
    }
    public function dataUpdate($idabsen, $data)
    {
        $this->update($idabsen, $data);
        return true;
    }
    public function dataDelete($id)
    {
        $this->where('id_absen', $id)->delete();
        return true;
    }
}