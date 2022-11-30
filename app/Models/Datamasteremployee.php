<?php

namespace App\Models;

use CodeIgniter\Model;

class Datamasteremployee extends Model
{
    protected $table = 'm_employee';
    protected $allowedFields = ['
        id', 'periode', 'kategori', 'nik_ap',
        'nik_tg', 'nama', 'join_date', 'etd_pensiun',
        'masa_kerja', 'date_birth', 'usia', 'tobe_pensiun',
        'range_age', 'range_age_1', 'age_composite', 'kota_lahir',
        'jenis_kelamin', 'agama', 'status', 'id_turnover', 'turn_overname',
        'status_karyawan', 'pendidikan', 'education_level', 'id_pendidikan',
        'unit_now', 'posisi', 'bp_tg', 'level_position', 'lvl_position', 'bp_inf',
        'penempatan', 'job_familiy', 'job_function', 'job_role', 'no_hp', 'email',
        'dept', 'divisi', 'sub_dir','dir', 'nik_atasan1', 'nama_atasan1',
        'nik_atasan2', 'nama_atasan2', 'cc_model', 'cost_center', 'id_vendor'
    ];
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