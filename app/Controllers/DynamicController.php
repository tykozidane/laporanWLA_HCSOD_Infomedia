<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Dataemployee;
use App\Models\DataProgramAkhlak;

class DynamicController extends BaseController
{
    public function index()
    {
        $program = new DataProgramAkhlak();
        $id_akhlak = 1;
		$dataprogram = $program->getByAkhlak($id_akhlak);
		echo json_encode($dataprogram);
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
        $employee = new Dataemployee();
        $dataemployee = $employee->getAllData();
        echo json_encode($dataemployee);
    }
}
