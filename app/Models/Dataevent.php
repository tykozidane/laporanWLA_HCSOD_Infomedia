<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Dataevent extends Model
{
    protected $table = 'event';
    protected $allowedFields = ['id','divisi', 'nama','cat_akhlak', 'program_akhlak', 'cat_event','cat_speaker', 'speaker', 'tgl', 'jam' ];
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
    public function getByDivisi($divisi)
    {
        return$this->where('divisi', $divisi)->findAll();
    }
    // public function getByMonth()
    // {
    //     return $this->
    // }
    public function countByQuarter($year, $quarter)
    {
        if($quarter == 1){
            $startdate = Time::createFromDate($year, 1, 1);
            $enddate = Time::createFromDate($year, 3, 31);
            // $startdate = date("Y:m:d", mktime(1, 1, $year));
            // $enddate = date("Y:m:d", mktime(3, 31, $year));
        } else if($quarter == 2) {
            $startdate = Time::createFromDate($year, 4, 1);
            $enddate = Time::createFromDate($year, 6, 30);
            // $startdate = date("Y:m:d", mktime(4, 1, $year));
            // $enddate = date("Y:m:d", mktime(6, 30, $year));
        } else if($quarter == 3) {
            $startdate = Time::createFromDate($year, 7, 1);
            $enddate = Time::createFromDate($year, 9, 31);
            // $startdate = date("Y:m:d", mktime(7, 1, $year));
            // $enddate = date("Y:m:d", mktime(9, 31, $year));
        } else if($quarter == 4) {
            $startdate = Time::createFromDate($year, 10, 1);
            $enddate = Time::createFromDate($year, 12, 31);
            // $startdate = date("Y:m:d", mktime(10, 1, $year));
            // $enddate = date("Y:m:d", mktime(12, 31, $year));
        }
        return $this->where('tgl >=', $startdate)->where('tgl <=', $enddate)->countAllResults();
        // return $startdate;
    }
    public function insertData($datasimpanspeaker)
    {
       return $this->insert($datasimpanspeaker);
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