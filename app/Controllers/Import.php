<?php

namespace App\Controllers;

$session = \Config\Services::session();
use App\Models\Datalaporan;
use App\Models\Dataemployee;

class Import extends BaseController
{
    public function index($nik = '')
    {
        if(!empty($nik)){
            $laporan = new Datalaporan();
            $datalaporan = $laporan->getByNik($nik);
            return view('homepage', compact('datalaporan'));  
        } else {
            $laporan = new Dataemployee();
        $dataemployee = $laporan->getAllData();
        return view('homepage', compact('dataemployee'));
        }
    }

    // public function datapegawai($nik = '')
    // {
    //     if(!empty($nik)){
    //         $laporan = new Datalaporan();
    //         $datalaporan = $laporan->getByNikMonthly($nik);
    //         if (empty($datalaporan)){
    //         return view('homepage');
    //         }
    //         $count = 0;
    //         $bkp = 0;
    //         $bks = 0;
    //         $bko = 0;
    //     foreach($datalaporan as $x){
    //         if($x['cat_wla'] == 'Primary'){
    //             $average_time = $x['average_time'];
    //             $quantity = $x['quantity'];
    //             $newprimary = ($average_time*$quantity*235)/20;
    //             // $datalaporan[$count]['quantity'] = $newprimary;
    //             $datalaporan[$count]['primary'] = $newprimary;
    //             $datalaporan[$count]['supportive'] = '';
    //             $datalaporan[$count]['outside'] = '';
    //             $bkp = $bkp + $newprimary;
    //         } 
    //         else if($x['cat_wla'] == 'Supportive'){
    //             $average_time = $x['average_time'];
    //             $quantity = $x['quantity'];
    //             $newsupportive = ($average_time*$quantity*235)/20;
    //             $datalaporan[$count]['primary'] = '';
    //             $datalaporan[$count]['supportive'] = $newsupportive;
    //             $datalaporan[$count]['outside'] = '';
    //             $bks = $bks + $newsupportive;
    //         }
    //         else if($x['cat_wla'] == 'Outside The Job'){
    //             $average_time = $x['average_time'];
    //             $quantity = $x['quantity'];
    //             $newoutside = ($average_time*$quantity*235)/20;
    //             $datalaporan[$count]['primary'] = '';
    //             $datalaporan[$count]['supportive'] = '';
    //             $datalaporan[$count]['outside'] = $newoutside;
    //             $bko = $bko + $newoutside;
    //         }
    //         $count++;
    //     };
    //         $total = $bkp + $bks + $bko;
    //         $laporanproject = new Datalaporan();
    //         $datalaporanproject = $laporan->getByNikMonthlyProject($nik);
    //         if (empty($datalaporanproject)){
    //         return view('homepage');
    //         }
    //         $countp = 0;
    //         $bkpp = 0;
    //         $bksp = 0;
    //         $bkop = 0;
    //     foreach($datalaporanproject as $x){
    //         if($x['cat_wla'] == 'Primary'){
    //             $average_time = $x['average_time'];
    //             $quantity = $x['quantity'];
    //             $durasi = $x['durasi'];
    //             $newprimary = ($average_time*$quantity*($durasi*20))/1;
    //             // $datalaporan[$count]['quantity'] = $newprimary;
    //             $datalaporanproject[$countp]['primary'] = $newprimary;
    //             $datalaporanproject[$countp]['supportive'] = '';
    //             $datalaporanproject[$countp]['outside'] = '';
    //             $bkpp = $bkpp + $newprimary;
    //         } 
    //         else if($x['cat_wla'] == 'Supportive'){
    //             $average_time = $x['average_time'];
    //             $quantity = $x['quantity'];
    //             $durasi = $x['durasi'];
    //             $newsupportive = ($average_time*$quantity*($durasi*20))/1;
    //             $datalaporanproject[$countp]['primary'] = '';
    //             $datalaporanproject[$countp]['supportive'] = $newsupportive;
    //             $datalaporanproject[$countp]['outside'] = '';
    //             $bksp = $bksp + $newsupportive;
                
    //         }
    //         else if($x['cat_wla'] == 'Outside The Job'){
    //             $average_time = $x['average_time'];
    //             $quantity = $x['quantity'];
    //             $durasi = $x['durasi'];
    //             $newoutside = ($average_time*$quantity*($durasi*20))/1;
    //             $datalaporanproject[$countp]['primary'] = '';
    //             $datalaporanproject[$countp]['supportive'] = '';
    //             $datalaporanproject[$countp]['outside'] = $newoutside;
    //             $bkop = $bkop + $newoutside;
    //         }
    //         // echo $countp;
    //         $countp++;
    //     };
    //         $totalp = $bkpp + $bksp + $bkop;
    //         $pegawai = new Dataemployee();
    //     $datapegawai = $pegawai->getByNik($nik);          
    //     return view('homepage', compact('datapegawai','datalaporan', 'bkp', 'bks', 'bko', 'total', 'datalaporanproject', 'bkpp', 'bksp', 'bkop', 'totalp'));  
    //     } else {
    //         $laporan = new Dataemployee();
    //     $dataemployee = $laporan->getAllData();
    //     return view('homepage', compact('dataemployee'));
    //     }
    // }

    public function datapegawai($nik = '')
    {
        if(!empty($nik)){
            $laporan = new Datalaporan();
            $datalaporan = $laporan->getByNik($nik);
            if (empty($datalaporan)){
            return view('homepage');
            }
            $count = 0;
            $counting = [];
            $counting['bkpdaily'] = 0;
            $counting['bksdaily'] = 0;
            $counting['bkodaily'] = 0;
            $counting['bkpdailyp'] = 0;
            $counting['bksdailyp'] = 0;
            $counting['bkodailyp'] = 0;
            $counting['bkpweekly'] = 0;
            $counting['bksweekly'] = 0;
            $counting['bkoweekly'] = 0;
            $counting['bkpweeklyp'] = 0;
            $counting['bksweeklyp'] = 0;
            $counting['bkoweeklyp'] = 0;
            $counting['bkpmonthly'] = 0;
            $counting['bksmonthly'] = 0;
            $counting['bkomonthly'] = 0;
            $counting['bkpmonthlyp'] = 0;
            $counting['bksmonthlyp'] = 0;
            $counting['bkomonthlyp'] = 0;
            $counting['bkpyearly'] = 0;
            $counting['bksyearly'] = 0;
            $counting['bkoyearly'] = 0;
            $counting['bkpyearlyp'] = 0;
            $counting['bksyearlyp'] = 0;
            $counting['bkoyearlyp'] = 0;
        foreach($datalaporan as $x){
            if ($x['periode'] == 'Daily'){
                if($x['type_wla'] == 'Non Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newprimary = ($average_time*$quantity*235)/1;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpdaily'] = $counting['bkpdaily'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksdaily'] = $counting['bksdaily'] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkodaily'] = $counting['bkodaily'] + $newoutside;
                    }
                } 
                else if ($x['type_wla'] == 'Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newprimary = ($average_time*$quantity*($durasi))/1;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpdailyp'] = $counting['bkpdailyp'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksdailyp'] = $counting['bksdailyp'] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkodailyp'] = $counting['bkodailyp'] + $newoutside;
                } else {continue;}
            }
        }
            else if ($x['periode'] == 'Weekly'){
                if($x['type_wla'] == 'Non Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newprimary = ($average_time*$quantity*235)/5;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpweekly'] = $counting['bkpweekly'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/5;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksweekly'] = $counting['bksweekly'] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/5;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkoweekly'] = $counting['bkoweekly'] + $newoutside;
                    }
                } else if ($x['type_wla'] == 'Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newprimary = ($average_time*$quantity*($durasi*5))/1;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpweeklyp'] = $counting['bkpweeklyp'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi*5))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksweeklyp'] = $counting['bksweeklyp'] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi*5))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkoweeklyp'] = $counting['bkoweeklyp'] + $newoutside;
                } else {continue;}
            }
        }
            else if ($x['periode'] == 'Monthly'){
                if($x['type_wla'] == 'Non Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newprimary = ($average_time*$quantity*235)/20;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpmonthly'] = $counting['bkpmonthly'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/20;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksmonthly'] = $counting['bksmonthly'] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/20;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkomonthly'] = $counting['bkomonthly'] + $newoutside;
                    }
                } else if ($x['type_wla'] == 'Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newprimary = ($average_time*$quantity*($durasi*20))/1;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpmonthlyp'] = $counting['bkpmonthlyp'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksmonthlyp'] = $counting['bksmonthlyp'] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkomonthlyp'] = $counting['bkomonthlyp'] + $newoutside;
                } else {continue;}
            }
        }
            else if ($x['periode'] == 'Yearly'){
                if($x['type_wla'] == 'Non Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newprimary = ($average_time*$quantity*235)/235;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpyearly'] = $counting['bkpyearly'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/235;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksyearly'] = $counting['bksyearly'] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/235;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkoyearly'] = $counting['bkoyearly'] + $newoutside;
                    }
                } 
                else if ($x['type_wla'] == 'Project'){
                    if($x['cat_wla'] == 'Primary'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newprimary = ($average_time*$quantity*($durasi*20))/1;
                        // $datalaporan[$count]['quantity'] = $newprimary;
                        $datalaporan[$count]['primary'] = $newprimary;
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = '';
                        $counting['bkpyearlyp'] = $counting['bkpyearlyp'] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting['bksyearlyp'] = $counting['bksyearlyp'] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting['bkoyearlyp'] = $counting['bkoyearlyp'] + $newoutside;
                } else {continue;}
            }
        }
            $count++;
        };
        $pegawai = new Dataemployee();
        $datapegawai = $pegawai->getByNik($nik); 
        $nonprojectaverage = (($counting['bkpdaily']+$counting['bksdaily']+$counting['bkodaily'])/3+($counting['bkpweekly']+$counting['bksweekly']+$counting['bkoweekly'])/3+($counting['bkpmonthly']+$counting['bksmonthly']+$counting['bkomonthly'])/3+($counting['bkpyearly']+$counting['bksyearly']+$counting['bkoyearly'])/3)/3;    
        $projectaverage = (($counting['bkpdailyp']+$counting['bksdailyp']+$counting['bkodailyp'])/3+($counting['bkpweeklyp']+$counting['bksweeklyp']+$counting['bkoweeklyp'])/3+($counting['bkpmonthlyp']+$counting['bksmonthlyp']+$counting['bkomonthlyp'])/3+($counting['bkpyearlyp']+$counting['bksyearlyp']+$counting['bkoyearlyp'])/3)/3;    
        $fte = ($nonprojectaverage+$projectaverage)/1504;
        foreach($datapegawai as $b) {
            if ($b['fte'] == $fte){
                continue;
            } else {
                $db = \Config\Database::connect();
                $db->table('employee')->set('fte', $fte)->where('nik', $b['nik'])->update();
            }
        }
        return view('homepage', compact('datapegawai','datalaporan', 'counting', 'nonprojectaverage', 'projectaverage', 'fte'));  
        } else {
        $laporan = new Dataemployee();
        $dataemployee = $laporan->getAllData();
        return view('homepage', compact('dataemployee'));
        }
    }

    public function importform()
    {
        $laporan = new Dataemployee();
        $dataemployee = $laporan->getAllData();
        return view('importpage', compact('dataemployee'));
    }
    public function upload()
    {
        $validation = \Config\Services::validation();

        $valid = $this->validate(
            [
                'fileimport' => [
                    'label' => 'Inputan File',
                    'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                    'errors' => [
                        'uploaded' => '{field} wajib diisi',
                        'ext_in' => '{field} harus ekstensi xls atau xlsx'
                    ]
                ]
            ]
        );
        if(!$valid) {
            
            $this->session->setFlashdata('pesan', $validation->getError('fileimport'));
            return redirect()->to('/import');
        } else {
            $file_excel =$this->request->getFile('fileimport');

            $ext = $file_excel->getClientExtension();
            if($ext=='xls'){
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $render->load($file_excel);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $niknya = $this->request->getPost('nik');
            foreach ($data as $x => $row) {
                if ($x == 0) {
                    continue;
                }
                else if ($row[0] == ''){
                    continue;
                }
                else if ($row[1] == ''){
                    continue;
                }
                else if ($row[0] == 'NO'){
                    continue;
                }
                $activity = $row[1];
                $detail = $row[2];
                $average_time = $row[4];
                $cat_wla = $row[5];
                $type_wla = $row[6];
                if($row[7] == null){
                    $durasi = '';
                } else {
                    $durasi = $row[7];
                }
                $periode = $row[8];
                $quantity = $row[9];
                if($row[10] == null){
                    $keterangan='';
                } else {
                   $keterangan = $row[10]; 
                }
                $db = \Config\Database::connect();

                $datasimpan = [
                    'nik' => $niknya,
                    'activity' => $activity,
                    'detail' => $detail,
                    'average_time' => $average_time,
                    'cat_wla' => $cat_wla,
                    'type_wla' => $type_wla,
                    'durasi' => $durasi,
                    'periode' => $periode,
                    'quantity' => $quantity,
                    'keterangan' => $keterangan
                ];
                // echo $quantity;
                $db->table('wla')->insert($datasimpan);
            }
            return redirect()->to('/import');
        }
    }
}
