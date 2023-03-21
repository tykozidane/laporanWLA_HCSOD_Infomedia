<?php

namespace App\Models;

use CodeIgniter\Model;

class Datamasteremployee extends Model
{
    protected $table = 'm_emp';
    protected $allowedFields = ['
        id', 'periode', 'sub_kategori', 'nik_nif',
        'nik_tg', 'no_ktp', 'nama_emp', 'join_date', 'retire_date',
        'birth_date', 'tahun_retire', 'kota_lahir',
        'jenis_kelamin', 'agama', 'status', 'id_turnover', 'status_turnover',
        'status_karyawan', 'pendidikan', 'id_education_level', 'nama_educ',
        'unit_aktif', 'posisi', 'level_positions', 'band_TG', 'level_position', 'band_INF',
        'penempatan', 'job_familiy', 'job_function', 'job_role', 'phone_number', 'email',
        'dept', 'divisi', 'sub_direk','code_dir', 'direktorat', 'cc_model', 'cost_center', 'id_vendor'
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
        return $this->where('id', $id)->find();
    }
    public function getByNoKtp($no_ktp)
    {
        return $this->where('no_ktp', $no_ktp)->first(); 
    }
    public function getByIdfirst($id)
    {
        return$this->where('id', $id)->first();
    }
    public function getByNIKPeriode($nik, $periode)
    {
        return$this->where('nik_inf', $nik)->where('periode', $periode)->first();
    }
    public function getByPeriode($periode)
    {
        return $this->where('periode', $periode)->orderBy('nama_emp', 'ASC')->findAll();
    }
    public function getFirstByPeriode($periode)
    {
        return $this->where('periode', $periode)->first();
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