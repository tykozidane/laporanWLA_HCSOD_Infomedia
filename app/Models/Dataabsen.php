<?php

namespace App\Models;

use CodeIgniter\Model;

class Dataabsen extends Model
{
    protected $table = 'absen';
    protected $allowedFields = ['id', 'id_event', 'corporate', 'nik', 'nama', 'nilai', 'pd_web', 'pd_speaker', 'vote', 'notes', 'jam_checkin','status', 'last_update' ];
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
    public function getByIdNik($id, $nik)
    {
        return $this->where('id_event', $id)->where('nik', $nik)->first();
    }
    public function getByNik($nik)
    {
        return $this->where('nik', $nik)->first();
    }
    public function getByIdJoinMEmployee($id)
    {
        $periode = getperiode();
        return $this->select('absen.*, m_emp.nama_emp, m_emp.dept, m_emp.divisi')->join('m_emp', 'm_emp.nik_inf = absen.nik', 'left')->where('id_event', $id)->findAll();
    }
    public function getcekpoin($nik)
    {
        return $this->where('nik', $nik)->join('event', 'event.id = absen.id_event')->findAll();
    }
    public function getByIdevent($id)
    {
        return $this->where('id_event', $id)->findAll();
    }
    public function getNonCorporate($id)
    {
        return $this->where('id', $id)->where('corporate', 0)->findAll();
    }
    public function insertData($datasimpan)
    {
       return $this->insert($datasimpan);
        // return true;
    }
    public function countAbsen($id)
    {
        return $this->where('id_event', $id)->countAllResults();
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