<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Dataevent;
use App\Models\Datamasteremployee;
use App\Models\DataAgreement;
use App\Models\Dataemployee;
use App\Models\Dataabsen;
use CodeIgniter\I18n\Time;

class AgreementController extends BaseController
{
    public function index()
    {
        $agreement = new DataAgreement();
        $listagreement = $agreement->getAllData();
        $data = [];
        $employee =new Datamasteremployee();
        foreach($listagreement as $x){
            $dataemployee = $employee->getByNoKtp($x['no_ktp']);
            if(!empty($dataemployee)){
                array_push($data, $dataemployee);
            }
        }
        return view('agreementpage/listagreement', compact('listagreement', 'data'));
    }
    
    public function editpage($id)
    {
        $employee =new Datamasteremployee();
        $data = $employee->getByIdfirst($id);
        return view('masteremployeepage/editemployeepage', compact('data'));
    }
    
}
