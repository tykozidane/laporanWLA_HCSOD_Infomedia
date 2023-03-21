<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Datamasteremployee;
use App\Models\DataProgramAkhlak;
use App\Models\Dataevent;
use App\Models\Dataabsen;

class DynamicController extends BaseController
{
    public function index()
    {
        // $program = new DataProgramAkhlak();
        // $id_akhlak = 1;
		// $dataprogram = $program->getByAkhlak($id_akhlak);
		// echo json_encode($dataprogram);
        $data = new Dataevent();
        $id = 1669783880;
        $dataevent = $data->getById($id);
        $jam = strtotime($dataevent['jam']);
        echo $jam;
        date_default_timezone_set('Asia/Jakarta');
        // $time = date('H:i:s');
        //     date_add($time, date_interval_create_from_date_string('45 minutes'));
    }
    public function action()
    {
        if($this->request->getVar('id_akhlak'))
		{
				$program = new Dataprogramakhlak();
                $id_akhlak = $this->request->getVar('id_akhlak');
				$dataprogram = $program->getByAkhlak($id_akhlak);

				echo json_encode($dataprogram);
			
		}
        
    }
    public function getprogram($id_akhlak)
    {
        $program = new DataProgramAkhlak();
		$dataprogram = $program->getByAkhlak($id_akhlak);
		echo json_encode($dataprogram);
    }
    public function getemployee()
    {
        $periode = getPeriode();
        $masteremployee = new Datamasteremployee();
        $dataemployee = $masteremployee->getByPeriode($periode);
        echo json_encode($dataemployee);
    }
    public function getabsen($nik)
    {
        $getabsen = new Dataabsen();
        $dataabsen = $getabsen->getByNik($nik);
        echo json_encode($dataabsen);
    }
}
