<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Dataevent;
use App\Models\Datamasteremployee;
use App\Models\Dataemployee;
use App\Models\Dataabsen;
use CodeIgniter\I18n\Time;

class MasterEmployeeController extends BaseController
{
    public function index()
    {
        $periode = getPeriode();
        $masteremployee = new Datamasteremployee();
        $dataemployee = $masteremployee->getByPeriode($periode);
        return view('masteremployeepage/employeelist', compact('dataemployee'));
    }
    public function detailemployee($id)
    {
        $employee =new Datamasteremployee();
        $dataemployee = $employee->getByIdfirst($id);
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dataemployee['birth_date']), date_create($today));
        $dataemployee['usia'] = $diff->format('%y');
        $diffmk = date_diff(date_create($dataemployee['join_date']), date_create($today));
        $dataemployee['masa_kerja'] = $diffmk->format('%y');
        // echo $dataemployee['usia'];
        return view('masteremployeepage/detailemployee', compact('dataemployee'));
    }
    public function editpage($id)
    {
        $employee =new Datamasteremployee();
        $data = $employee->getByIdfirst($id);
        return view('masteremployeepage/editemployeepage', compact('data'));
    }
    // public function getPeriode()
    // {
    //     $datetime = Time::today();
    //     $Year = $datetime->format('Y');
    //     $Month = $datetime->format('m');
    //     $Day = '01';
    //     $datetime->setDate($Year, $Month, $Day);
    //     $periode = $datetime->format('Y-m-d');
    //     $employee =new Datamasteremployee();
    //     $dataemployee = $employee->getByPeriode($periode);
    //     $count = 0;
    //     while(empty($dataemployee)){
            
    //         $newMonth = $Month - 1;
    //         if($newMonth < 1) {
    //             $Year = $Year-1;
    //             $newMonth = 12;
    //         }
    //         $datetime->setDate($Year, $newMonth, $Day);
    //         $newperiode = $datetime->format('Y-m-d');
    //         $dataemployee = $employee->getByPeriode($newperiode);
    //         // echo 'next, ';
    //         // $dataemployee = 'tidak kosong';
    //     }
    //     // foreach($dataemployee as $x){
    //     //     echo 'data ke '.$x['periode'];
    //     //     $count++;
    //     // }
    //     // Getting a new set of date in the
    //     // // format of 'Y-m-d'
    //     // echo $datetime->format('Y-m-d');
    // }
    public function updatedata($id)
    {
        
    }
}
