<?php

namespace App\Controllers;

$session = \Config\Services::session();
use App\Models\Datalaporan;
use App\Models\Dataemployee;

class Import extends BaseController
{
    public function index($nik = '')
    {
        return redirect()->route('wla/dataemployee');
    }
    public function employee()
    {
        $laporan = new Dataemployee();
        $dataemployee = $laporan->getAllData();
        return view('dataemployee', compact('dataemployee'));
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
                $this->session->setFlashdata('pesan', 'Data Pegawai belum di Import');
                return redirect()->to('wla/dataemployee');
            }
            $count = 0;
            $counting = [];
            $counting['bkpdaily'] = 0; //0
            $counting['bksdaily'] = 0; //1
            $counting['bkodaily'] = 0;//2
            $counting['bkpdailyp'] = 0; //12
            $counting['bksdailyp'] = 0; //13
            $counting['bkodailyp'] = 0; //14
            $counting['bkpweekly'] = 0; //3
            $counting['bksweekly'] = 0; //4
            $counting['bkoweekly'] = 0; //5
            $counting['bkpweeklyp'] = 0; //15
            $counting['bksweeklyp'] = 0; //16
            $counting['bkoweeklyp'] = 0; //17
            $counting['bkpmonthly'] = 0; //6
            $counting['bksmonthly'] = 0; //7
            $counting['bkomonthly'] = 0; //8
            $counting['bkpmonthlyp'] = 0; //18
            $counting['bksmonthlyp'] = 0; //19
            $counting['bkomonthlyp'] = 0; //20
            $counting['bkpyearly'] = 0; //9
            $counting['bksyearly'] = 0; //10
            $counting['bkoyearly'] = 0; //11
            $counting['bkpyearlyp'] = 0; //21
            $counting['bksyearlyp'] = 0; //22
            $counting['bkoyearlyp'] = 0; //23
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
        $datapegawai = $pegawai->getByNikfirst($nik); 
        $rataprimary = 0;
        $cp =0;
        if($counting['bkpdaily']!=0){
            $rataprimary += $counting['bkpdaily'];
            $cp++;
        }
        if($counting['bkpweekly']!=0){
            $rataprimary += $counting['bkpweekly'];
            $cp++;
        }
        if($counting['bkpmonthly']!=0){
            $rataprimary += $counting['bkpmonthly'];
            $cp++;
        }
        if($counting['bkpyearly']!=0){
            $rataprimary += $counting['bkpyearly'];
            $cp++;
        }
        $ratasupportive = 0;
        $cs =0;
        if($counting['bksdaily']!=0){
            $ratasupportive += $counting['bksdaily'];
            $cs++;
        }
        if($counting['bksweekly']!=0){
            $ratasupportive += $counting['bksweekly'];
            $cs++;
        }
        if($counting['bksmonthly']!=0){
            $ratasupportive += $counting['bksmonthly'];
            $cs++;
        }
        if($counting['bksyearly']!=0){
            $ratasupportive += $counting['bksyearly'];
            $cs++;
        }
        $rataoutside = 0;
        $co =0;
        if($counting['bkodaily']!=0){
            $rataoutside += $counting['bkodaily'];
            $co++;
        }
        if($counting['bkoweekly']!=0){
            $rataoutside += $counting['bkoweekly'];
            $co++;
        }
        if($counting['bkomonthly']!=0){
            $rataoutside += $counting['bkomonthly'];
            $co++;
        }
        if($counting['bkoyearly']!=0){
            $rataoutside += $counting['bkoyearly'];
            $co++;
        }
        
        $rataprimaryp = 0;
        $cpp =0;
        if($counting['bkpdailyp']!=0){
            $rataprimaryp += $counting['bkpdailyp'];
            $cpp++;
        }
        if($counting['bkpweeklyp']!=0){
            $rataprimaryp += $counting['bkpweeklyp'];
            $cpp++;
        }
        if($counting['bkpmonthlyp']!=0){
            $rataprimaryp += $counting['bkpmonthlyp'];
            $cpp++;
        }
        if($counting['bkpyearlyp']!=0){
            $rataprimaryp += $counting['bkpyearlyp'];
            $cpp++;
        }
        $ratasupportivep = 0;
        $csp= 0;
        if($counting['bksdailyp']!=0){
            $ratasupportivep += $counting['bksdailyp'];
            $csp++;
        }
        if($counting['bksweeklyp']!=0){
            $ratasupportivep += $counting['bksweeklyp'];
            $csp++;
        }
        if($counting['bksmonthlyp']!=0){
            $ratasupportivep += $counting['bksmonthlyp'];
            $csp++;
        }
        if($counting['bksyearlyp']!=0){
            $ratasupportivep += $counting['bksyearlyp'];
            $csp++;
        }
        $rataoutsidep = 0;
        $cop =0;
        if($counting['bkodailyp']!=0){
            $rataoutsidep += $counting['bkodailyp'];
            $cop++;
        }
        if($counting['bkoweeklyp']!=0){
            $rataoutsidep += $counting['bkoweeklyp'];
            $cop++;
        }
        if($counting['bkomonthlyp']!=0){
            $rataoutsidep += $counting['bkomonthlyp'];
            $cop++;
        }
        if($counting['bkoyearlyp']!=0){
            $rataoutsidep += $counting['bkoyearlyp'];
            $cop++;
        }
        $nonprojectaverage = 0; 
        $cnpa =0;
        if($rataprimary != 0){ $rataprimary = $rataprimary/$cp; $nonprojectaverage += $rataprimary; $cnpa++;}
        if($ratasupportive != 0){ $ratasupportive = $ratasupportive/$cs; $nonprojectaverage += $ratasupportive; $cnpa++;}
        if($rataoutside != 0){ $rataoutside = $rataoutside/$co; $nonprojectaverage += $rataoutside; $cnpa++;} 
        if($cnpa != 0) {
            $nonprojectaverage = $nonprojectaverage/$cnpa; 
        }
        $projectaverage =  0; 
        $cpa =0;
        if($rataprimaryp != 0){ $rataprimaryp = $rataprimaryp/$cpp; $projectaverage += $rataprimaryp; $cpa++;}
        if($ratasupportivep != 0){ $ratasupportivep = $ratasupportivep/$csp; $projectaverage += $ratasupportivep; $cpa++;}
        if($rataoutsidep != 0){  $rataoutsidep = $rataoutsidep/$cop; $projectaverage += $rataoutsidep; $cpa++;} 
        if($cpa != 0){
            $projectaverage = $projectaverage/$cpa; 
        }
        if($nonprojectaverage == 0 || $projectaverage == 0){
            $fte = ($nonprojectaverage+$projectaverage)/1504;
        } else {
            $fte = ($nonprojectaverage+$projectaverage)/2/1504;
        }
            if ($datapegawai['fte'] != $fte){
                 $db = \Config\Database::connect();
                $db->table('employee')->set('fte', $fte)->where('nik', $datapegawai['nik'])->update();
            } 
        
        return view('detailwla', compact('datapegawai','datalaporan', 'counting', 'nonprojectaverage', 'projectaverage', 'fte', 'rataprimary', 'ratasupportive', 'rataoutside', 'rataprimaryp', 'ratasupportivep', 'rataoutsidep'));  
        } else {
        $laporan = new Dataemployee();
        $dataemployee = $laporan->getAllData();
        return view('homepage', compact('dataemployee'));
        }
    }
    public function deletewla($nik){
        $wla = new Datalaporan();
        $deletedatawla = $wla->dataDelete($nik);
        $pegawai = new Dataemployee();
        $updatefte = $pegawai->updateFteZero($nik);
        return redirect()->to('wla/dataemployee');
    }
    public function importform()
    {
        $laporan = new Dataemployee();
        $dataemployee = $laporan->getAllData();
        return view('newimportpage', compact('dataemployee'));
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
            return redirect()->to('wla/import');
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
            $count =1;
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
                if($detail == NULL){
                    $db = \Config\Database::connect();
                    $db->table('wla')->where('nik', $niknya)->delete();
                    $this->session->setFlashdata('pesan', 'Terdapat Bagian Detail Yang Belum Diisi');
                    return redirect()->to('wla/import');
                }
                if($average_time == NULL){
                    $db = \Config\Database::connect();
                    $db->table('wla')->where('nik', $niknya)->delete();
                    $this->session->setFlashdata('pesan', 'Terdapat Bagian Average Time Yang Belum Diisi');
                    return redirect()->to('wla/import');
                }
                if($cat_wla == NULL){
                    $db = \Config\Database::connect();
                    $db->table('wla')->where('nik', $niknya)->delete();
                    $this->session->setFlashdata('pesan', 'Terdapat Bagian Job Relevance Yang Belum Diisi');
                    return redirect()->to('wla/import');
                }
                if($type_wla  == NULL){
                    $db = \Config\Database::connect();
                    $db->table('wla')->where('nik', $niknya)->delete();
                    $this->session->setFlashdata('pesan', 'Terdapat Bagian Type of Work Yang Belum Diisi');
                    return redirect()->to('wla/import');
                }
                if($periode == NULL){
                    $db = \Config\Database::connect();
                    $db->table('wla')->where('nik', $niknya)->delete();
                    $this->session->setFlashdata('pesan', 'Terdapat Bagian Periode Yang Belum Diisi');
                    return redirect()->to('wla/import');
                }
                if($quantity  == NULL){
                    $db = \Config\Database::connect();
                    $db->table('wla')->where('nik', $niknya)->delete();
                    $this->session->setFlashdata('pesan', 'Terdapat Bagian Quantity Yang Belum Diisi');
                    return redirect()->to('wla/import');
                }
                
                $idnya = uniqid($count, $niknya);
                $datasimpan = [
                    'id' => $idnya,
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
                $count++;
                // echo $idnya;
                // $db->table('wla')->insert($datasimpan);
                $wla = new Datalaporan();
                $insertdata = $wla->insertData($datasimpan);
            }
            $this->datapegawai($niknya);
            $this->session->setFlashdata('pesan', 'Import Berhasil dengan ',($count-1).'data');
            return redirect()->route('wla/dataemployee');
        }
    }
}
