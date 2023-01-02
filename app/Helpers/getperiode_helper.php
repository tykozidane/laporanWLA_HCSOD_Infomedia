<?php
use App\Models\Datamasteremployee;
use App\Models\Datalaporan;
use CodeIgniter\I18n\Time;
function getperiode()
    {
        $datetime = Time::today();
        $Year = $datetime->format('Y');
        $Month = $datetime->format('m');
        $Day = '01';
        $datetime->setDate($Year, $Month, $Day);
        $periode = $datetime->format('Y-m-d');
        $employee =new Datamasteremployee();
        $dataemployee = $employee->getFirstByPeriode($periode);
        while(empty($dataemployee)){
            
            $Month = $Month - 1;
            if($Month < 1) {
                $Year = $Year-1;
                $Month = 12;
            }
            $datetime->setDate($Year, $Month, $Day);
            $newperiode = $datetime->format('Y-m-d');
            $dataemployee = $employee->getFirstByPeriode($newperiode);
            // echo 'next, ';
            // $dataemployee = 'tidak kosong';
        }
        return $newperiode;
        // foreach($dataemployee as $x){
        //     echo 'data ke '.$x['periode'];
        //     $count++;
        // }
        // Getting a new set of date in the
        // // format of 'Y-m-d'
        // echo $datetime->format('Y-m-d');
    }
    // function getfte()
    // {
    //     $dataemployee = getPeriode();
    //     $periode = $dataemployee[0]['periode'];
    //     $trygetdata = new DataNilaiFte();
    //     $datafte = $trygetdata->getByPeriode($periode);
    //     return $datafte;
    // }
    function getPeriodeWla($nik)
    {
        $laporan = new Datalaporan();
        $datalaporan = $laporan->getByNik($nik);
        $datatahun = [];
        foreach($datalaporan as $x){
            $cek = 0;
            foreach ($datatahun as $y){
                if($x['tahun'] == $y){
                    $cek = 1;
                    continue;
                }
            }
            if($cek == 1){
                continue;
            } else if ($cek==0){
                array_push($datatahun, $x['tahun']);
            }
        }
        return $datatahun;
    }
    