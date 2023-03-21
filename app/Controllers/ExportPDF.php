<?php

namespace App\Controllers;
require_once('..\vendor\tecnickcom\tcpdf\tcpdf.php'); 
$session = \Config\Services::session();
use App\Models\Datalaporan;
use App\Models\Dataemployee;
use TCPDF;
use RtfHtmlPhp\Document;
use RtfHtmlPhp\Html\HtmlFormatter;
class ExportPDF extends BaseController 
{
    function fetch_data($nik)  
    {  
         $output = '';  
         $pegawai = new Dataemployee();
         $datapegawai = $pegawai->getByNik($nik);
         while($row = mysqli_fetch_array($datapegawai))  
         {       
         $output .= '<tr>      
                    <td>' .$row['activity']. '</td>
                    <td>' .$row['detail']. '</td>
                    <td>' .$row['average_time']. '</td>
                    <td>' .$row['quantity']. '</td>
                    <td>' .$row['durasi']. '</td>
                    <td>' .$row['cat_wla']. '</td>
                    <td>' .$row['type_wla']. '</td>
                    <td>' .$row['periode']. '</td>
                    <td>' .$row['primary']. '</td>
                    <td>' .$row['supportive']. '</td>
                    <td>' .$row['outside']. '</td>
       </tr> 
                             ';  
         }  
         return $output;  
    }  
    public function printpdf($nik = '')
    {
        $laporan = new Datalaporan();
        $datalaporan = $laporan->getByNik($nik);
        if (empty($datalaporan)){
            return view('homepage');
            }
            $count = 0;
            $counting = [];
            $counting[0] = 0;
            $counting[1] = 0;
            $counting[2] = 0;
            $counting[12] = 0;
            $counting[13] = 0;
            $counting[14] = 0;
            $counting[3] = 0;
            $counting[4] = 0;
            $counting[5] = 0;
            $counting[15] = 0;
            $counting[16] = 0;
            $counting[17] = 0;
            $counting[6] = 0;
            $counting[7] = 0;
            $counting[8] = 0;
            $counting[18] = 0;
            $counting[19] = 0;
            $counting[20] = 0;
            $counting[9] = 0;
            $counting[10] = 0;
            $counting[11] = 0;
            $counting[21] = 0;
            $counting[22] = 0;
            $counting[23] = 0;
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
                        $counting[0] = $counting[0] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[1] = $counting[1] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[2] = $counting[2] + $newoutside;
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
                        $counting[12] = $counting[12] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[13] = $counting[13] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[14] = $counting[14] + $newoutside;
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
                        $counting[3] = $counting[3] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/5;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[4] = $counting[4] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/5;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[5] = $counting[5] + $newoutside;
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
                        $counting[15] = $counting[15] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi*5))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[16] = $counting[16] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi*5))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[17] = $counting[17] + $newoutside;
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
                        $counting[6] = $counting[6] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/20;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[7] = $counting[7] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/20;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[8] = $counting[8] + $newoutside;
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
                        $counting[18] = $counting[18] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[19] = $counting[19] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[20] = $counting[20] + $newoutside;
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
                        $counting[9] = $counting[9] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newsupportive = ($average_time*$quantity*235)/235;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[10] = $counting[10] + $newsupportive;
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $newoutside = ($average_time*$quantity*235)/235;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[11] = $counting[11] + $newoutside;
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
                        $counting[21] = $counting[21] + $newprimary;
                    } 
                    else if($x['cat_wla'] == 'Supportive'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newsupportive = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = $newsupportive;
                        $datalaporan[$count]['outside'] = '';
                        $counting[22] = $counting[22] + $newsupportive;
                        
                    }
                    else if($x['cat_wla'] == 'Outside The Job'){
                        $average_time = $x['average_time'];
                        $quantity = $x['quantity'];
                        $durasi = $x['durasi'];
                        $newoutside = ($average_time*$quantity*($durasi*20))/1;
                        $datalaporan[$count]['primary'] = '';
                        $datalaporan[$count]['supportive'] = '';
                        $datalaporan[$count]['outside'] = $newoutside;
                        $counting[23] = $counting[23] + $newoutside;
                } else {continue;}
            }
        }
            $count++;
        };
        $pegawai = new Dataemployee();
        $datapegawai = $pegawai->getByNik($nik); 
        $rataprimary = 0;
        $cp =0;
        if($counting[0]!=0){
            $rataprimary += $counting[0];
            $cp++;
        }
        if($counting[3]!=0){
            $rataprimary += $counting[3];
            $cp++;
        }
        if($counting[6]!=0){
            $rataprimary += $counting[6];
            $cp++;
        }
        if($counting[9]!=0){
            $rataprimary += $counting[9];
            $cp++;
        }
        $ratasupportive = 0;
        $cs =0;
        if($counting[1]!=0){
            $ratasupportive += $counting[1];
            $cs++;
        }
        if($counting[4]!=0){
            $ratasupportive += $counting[4];
            $cs++;
        }
        if($counting[7]!=0){
            $ratasupportive += $counting[7];
            $cs++;
        }
        if($counting[10]!=0){
            $ratasupportive += $counting[10];
            $cs++;
        }
        $rataoutside = 0;
        $co =0;
        if($counting[2]!=0){
            $rataoutside += $counting[2];
            $co++;
        }
        if($counting[5]!=0){
            $rataoutside += $counting[5];
            $co++;
        }
        if($counting[8]!=0){
            $rataoutside += $counting[8];
            $co++;
        }
        if($counting[11]!=0){
            $rataoutside += $counting[11];
            $co++;
        }
        
        $rataprimaryp = 0;
        $cpp =0;
        if($counting[12]!=0){
            $rataprimaryp += $counting[12];
            $cpp++;
        }
        if($counting[15]!=0){
            $rataprimaryp += $counting[15];
            $cpp++;
        }
        if($counting[18]!=0){
            $rataprimaryp += $counting[18];
            $cpp++;
        }
        if($counting[21]!=0){
            $rataprimaryp += $counting[21];
            $cpp++;
        }
        $ratasupportivep = 0;
        $csp= 0;
        if($counting[13]!=0){
            $ratasupportivep += $counting[13];
            $csp++;
        }
        if($counting[16]!=0){
            $ratasupportivep += $counting[16];
            $csp++;
        }
        if($counting[19]!=0){
            $ratasupportivep += $counting[19];
            $csp++;
        }
        if($counting[22]!=0){
            $ratasupportivep += $counting[22];
            $csp++;
        }
        $rataoutsidep = 0;
        $cop =0;
        if($counting[14]!=0){
            $rataoutsidep += $counting[14];
            $cop++;
        }
        if($counting[17]!=0){
            $rataoutsidep += $counting[17];
            $cop++;
        }
        if($counting[20]!=0){
            $rataoutsidep += $counting[20];
            $cop++;
        }
        if($counting[23]!=0){
            $rataoutsidep += $counting[23];
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
        $totalaverage = $nonprojectaverage+$projectaverage;
        // $html =  view('homepage', compact('datapegawai','datalaporan', 'counting', 'nonprojectaverage', 'projectaverage', 'fte')); 
        
        require_once('..\vendor\tecnickcom\tcpdf\tcpdf.php'); 
        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetFont('dejavusans', '', 8, '', true);
        $pdf->AddPage();
        $content = '';  
        $nama = '';
        foreach ($datapegawai as $b){
            $nama = $b['nama'];
            $content .= '  
            <h4 align="center">Data Laporan WLA '.$b['nama'].' </h4><br />';
        }
      $content .= '  
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
           <td rowspan="2" colspan="2">Activity</td>
           <td rowspan="2" colspan="2">Detail</td>
           <td rowspan="2">Average Time</td>
           <td rowspan="2">Quantity</td>
           <td rowspan="2">Durasi</td>
           <td rowspan="2">Type_WLA</td>
           <td rowspan="2">Periode</td>
           <td colspan="3">Workload Calculation (Posisi / Jabatan)</td>
           </tr>  
           <tr>
      <td >Primary</td>
      <td >Supportive</td>
      <td >Outside the Job</td>
    </tr>
      ';  
         foreach ($datalaporan as $row)  
         {       
         $content .= '<tr>      
                    <td colspan="2">' .$row['activity']. '</td>
                    <td colspan="2">' .$row['detail']. '</td>
                    <td>' .$row['average_time']. '</td>
                    <td>' .$row['quantity']. '</td>
                    <td>' .$row['durasi']. '</td>
                    <td>' .$row['type_wla']. '</td>
                    <td>' .$row['periode']. '</td>
                    <td>'.$row['primary'].'</td>
                    <td>'.$row['supportive'].'</td>
                    <td>'.$row['outside'].'</td>
       </tr> 
                             ';  
         }  
         $content .= '<tr>
         <td></td>
         </tr>
         <tr>
      <td class="table-bordered" colspan="2">Non Project</td>
      <td class="table-bordered">Primary</td>
      <td class="table-bordered">Supportive</td>
      <td class="table-bordered">Outside the job</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Daily</td>
      <td class="table-bordered">'.$counting[0].'</td>
      <td class="table-bordered">'.$counting[1].'</td>
      <td class="table-bordered">'.$counting[2].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Weekly</td>
      <td class="table-bordered">'.$counting[3].'</td>
      <td class="table-bordered">'.$counting[4].'</td>
      <td class="table-bordered">'.$counting[5].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Monthly</td>
      <td class="table-bordered">'.$counting[6].'</td>
      <td class="table-bordered">'.$counting[7].'</td>
      <td class="table-bordered">'.$counting[8].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Yearly</td>
      <td class="table-bordered">'.$counting[9].'</td>
      <td class="table-bordered">'.$counting[10].'</td>
      <td class="table-bordered">'.$counting[11].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Average Workload</td>
      <td class="table-bordered">'.$rataprimary.'</td>
      <td class="table-bordered">'.$ratasupportive.'</td>
      <td class="table-bordered">'.$rataoutside.'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Non Project Average Workload</td>
      <td class="table-bordered" colspan="3">'.$nonprojectaverage.'</td>
    </tr>
    <tr>
         <td></td>
         </tr>
         <tr>
      <td class="table-bordered" colspan="2">Project</td>
      <td class="table-bordered">Primary</td>
      <td class="table-bordered">Supportive</td>
      <td class="table-bordered">Outside the job</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Daily</td>
      <td class="table-bordered">'.$counting[12].'</td>
      <td class="table-bordered">'.$counting[13].'</td>
      <td class="table-bordered">'.$counting[14].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Weekly</td>
      <td class="table-bordered">'.$counting[15].'</td>
      <td class="table-bordered">'.$counting[16].'</td>
      <td class="table-bordered">'.$counting[17].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Monthly</td>
      <td class="table-bordered">'.$counting[18].'</td>
      <td class="table-bordered">'.$counting[19].'</td>
      <td class="table-bordered">'.$counting[20].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Yearly</td>
      <td class="table-bordered">'.$counting[21].'</td>
      <td class="table-bordered">'.$counting[22].'</td>
      <td class="table-bordered">'.$counting[23].'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Average Workload</td>
      <td class="table-bordered">'.$rataprimaryp.'</td>
      <td class="table-bordered">'.$ratasupportivep.'</td>
      <td class="table-bordered">'.$rataoutsidep.'</td>
    </tr>
    <tr>
      <td class="table-bordered" colspan="2">Non Project Average Workload</td>
      <td class="table-bordered" colspan="3">'.$projectaverage.'</td>
    </tr>
    <tr>
         <td></td>
         </tr>
    <tr>
      <th class="table-bordered" colspan="4">Total Summary</th>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Total Average Workload</th>
      <td class="table-bordered" colspan="2">'.$totalaverage.'</td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Effective Working Hour in 1 Year</th>
      <td class="table-bordered" colspan="2">1504</td>
    </tr>
    <tr>
      <th class="table-bordered" colspan="2">Full Time Equivalent (FTE)</th>
      <td class="table-bordered" colspan="2">'.$fte.'</td>
    </tr>';
    if($fte < 0.99 & $fte > 0){
        $content .= '<tr>
        <th class="table-bordered" colspan="2">Indeks FTE</th>
        <td class="table-bordered" colspan="2">Underload</td>
      </tr>'; 
    } else if ($fte < 1.28 & $fte > 1){
        $content .= '<tr>
        <th class="table-bordered" colspan="2">Indeks FTE</th>
        <td class="table-bordered" colspan="2">Normal</td>
      </tr>';
    } else if ($fte > 1.28){
        $content .= '<tr>
        <th class="table-bordered" colspan="2">Indeks FTE</th>
        <td class="table-bordered" colspan="2">Overload</td>
      </tr>';
    }
      $content .= '</table>';  
        $pdf->writeHTML($content);
        $this->response->setContentType('application/pdf');
        $pdf->output('datawla_'.$nama.'.pdf', 'I');
    }
    public function formsurat()
    {
        $pathdoc = '../public/templatedoc/pkwtjib.rtf';
        $rtf = file_get_contents($pathdoc);
        
        $nama = 'Tyko Zidane';
        // $rtf = str_replace("#NAMA", $nama, $rtf);
        $document = new Document($rtf);
        $formatter = new HtmlFormatter();
        // echo $formatter->Format($document);
        $content = $formatter->Format($document);
        // echo $content;
        $name = 'surat.pdf';
        $judul = 'PERJANJIAN KERJA WAKTU TERTENTU';
        $judul2= 'UNTUK PEKERJAAN JR OFF PROJECT MANAGEMENT SSO';
        $judul3 = 'Nomor : Perner/yyyymmdd /INF/DEPARTEMEN/ PKWT/MM/YYYY';
        $ttd ='<p class="MsoNormal" style="margin-left:0cm;text-indent:-.1pt;">
        <span style="font-family:&quot;Verdana&quot;,sans-serif;font-size:8.0pt;"><b style="mso-bidi-font-weight:normal;"><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;" lang="EN-US" dir="ltr"><strong>PIHAK PERTAMA,</strong></span><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;mso-tab-count:5;" lang="EN-US" dir="ltr"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;" lang="EN-US" dir="ltr"><strong>PIHAK KEDUA,</strong></span></b></span><o:p></o:p>
    </p>
    <p class="MsoNormal" style="margin-left:0cm;text-indent:-.1pt;">
        &nbsp;
    </p>
    <p class="MsoNormal" style="margin-left:0cm;mso-char-indent-count:0;mso-para-margin-left:0gd;text-indent:0cm;">
        &nbsp;
    </p>
    <p class="MsoNormal" style="margin-left:0cm;text-indent:-.1pt;">
        &nbsp;
    </p>
    <p class="MsoNormal" style="margin-left:0cm;text-indent:-.1pt;">
        &nbsp;
    </p>
    <p class="MsoNormal" style="margin-left:0cm;tab-stops:36.0pt 72.0pt 108.0pt 144.0pt 180.0pt 216.0pt 252.0pt;text-indent:-.1pt;">
        <span style="font-family:&quot;Verdana&quot;,sans-serif;font-size:8.0pt;"><b style="mso-bidi-font-weight:normal;"><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;" lang="EN-US" dir="ltr"><strong>DIMAS RYANTO</strong></span><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;mso-tab-count:5;" lang="EN-US" dir="ltr"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></span></b></span><span style="font-family:&quot;Tahoma&quot;,sans-serif;font-size:9.0pt;"><b style="mso-bidi-font-weight:normal;"><span style="mso-fareast-font-family:Tahoma;" lang="EN-US" dir="ltr"><strong>&nbsp;</strong></span><span style="mso-fareast-font-family:Tahoma;mso-tab-count:1;" lang="EN-US" dir="ltr"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></b></span><span style="font-family:&quot;Tahoma&quot;,sans-serif;font-size:8.0pt;"><b style="mso-bidi-font-weight:normal;"><span style="mso-fareast-font-family:Tahoma;mso-no-proof:yes;" lang="EN-US" dir="ltr"><strong>NAMA PEKERJA</strong></span></b></span><o:p></o:p>
    </p>
    <p class="MsoNormal" style="margin-left:0cm;tab-stops:36.0pt 72.0pt 108.0pt 144.0pt 180.0pt 216.0pt;text-indent:-.1pt;">
        <span style="font-family:&quot;Verdana&quot;,sans-serif;font-size:8.0pt;"><b style="mso-bidi-font-weight:normal;"><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;" lang="EN-US" dir="ltr"><strong>VP HUMAN CAPITAL MANAGEMENT</strong></span><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;mso-tab-count:3;" lang="EN-US" dir="ltr"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span><span style="mso-bidi-font-family:Verdana;mso-fareast-font-family:Verdana;" lang="EN-US" dir="ltr"><strong>JABATAN</strong></span></b></span><o:p></o:p>
    </p>';
        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetMargins(20, 20, 20, true);
        $pdf->AddPage('P','A4');
        $pdf->SetFont('times', '', 14);
        $pdf->SetFillColor(200, 220, 255);
        $pdf->Cell(180, 6, $judul, 0, 1, 'C');
        $pdf->Cell(180, 6, $judul2, 0, 2, 'C');
        $pdf->Cell(180, 6, $judul3, 0, 3, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->setJPEGQuality(75);
        $pdf->resetColumns();
        $pdf->setEqualColumns(2, 84);  // KEY PART -  number of cols and width
        $pdf->selectColumn();  
        // $pdf->Image('../public/assets/img/tandatangan/kopsurat.png', 0, 5, 200, 45, 'PNG', '', 'N', false, 150, '', false, false, 1, false, false, false);
        // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 30, 85, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        $pdf->writeHTML($content);
        $pdf->resetColumns();
        $pdf->writeHTML($ttd);
        $this->response->setContentType('application/pdf');
        // ob_end_clean();
        $pdf->output($name, 'I');
        // $this->load->helper('download');
        // force_download($document, 'surat.soc');
        // return $this->response->download($name, $rtf);
    }
    public function changeimg()
    {
        
    }
}