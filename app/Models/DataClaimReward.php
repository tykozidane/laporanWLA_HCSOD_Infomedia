<?php

namespace App\Models;

use CodeIgniter\Model;

class DataClaimReward extends Model
{
    protected $table = 'claim_reward';
    protected $allowedFields = ['id', 'nik', 'reward_id', 'price', 'status' ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    public function getAllData()
    {
        return $this->findAll();
    }
    public function getAllDataRequest()
    {
        $periode = getPeriode();
        return $this->select('claim_reward.*, m_emp.nama_emp, m_emp.phone_number, m_emp.email ')->where('claim_reward.status', "requested")->join('m_emp', 'm_emp.nik_inf = claim_reward.nik', 'right')->where('m_emp.periode', $periode)->findAll();
    }
    public function getAllDataSuccess()
    {
        $periode = getPeriode();
        return $this->select('claim_reward.*, m_emp.nama_emp, m_emp.phone_number, m_emp.email ')->where('claim_reward.status', "success")->join('m_emp', 'm_emp.nik_inf = claim_reward.nik', 'right')->where('m_emp.periode', $periode)->findAll();
    }
    public function getAllDataStatus()
    {
        $periode = getPeriode();
        return $this->select('claim_reward.*, m_emp.nama_emp, m_emp.phone_number, m_emp.email ')->join('m_emp', 'm_emp.nik_inf = claim_reward.nik', 'left')->where('m_emp.periode', $periode)->findAll();
    }
    public function countAllDataNotDone()
    {
        $status = "success";
        return $this->where('status !=', $status)->countAllResults();
    }
    public function countAllDataRequest()
    {
        return $this->where('status', "requested")->countAllResults();
    }
    public function countAllDataByQuarter($tahun, $quarter)
    {
        return $this->select('claim_reward.*, reward.tahun, reward.quarter')->join('reward', 'reward.id = claim_reward.reward_id', 'left')->where('reward.tahun', $tahun)->where('reward.quarter', $quarter)->countAllResults();
    }
    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }
    public function getByNik($nik)
    {
        return $this->select('claim_reward.*, reward.nama, reward.deskripsi, reward.tahun, reward.quarter')->join('reward', 'reward.id = claim_reward.reward_id', 'left')->where('nik', $nik)->findAll();
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