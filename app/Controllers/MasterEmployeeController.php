<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Dataevent;
use App\Models\Datamasteremployee;
use App\Models\Dataemployee;
use App\Models\Dataabsen;

class MasterEmployeeController extends BaseController
{
    public function index()
    {
        $employee = new Datamasteremployee();
        $dataemployee = $employee->findAll();
        return view('masteremployeepage/employeelist', compact('dataemployee'));
    }
}
