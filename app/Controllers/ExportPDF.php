<?php

namespace App\Controllers;

$session = \Config\Services::session();
use App\Models\Datalaporan;
use App\Models\Dataemployee;
use TCPDF;

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
        $nonprojectaverage = (($counting[0]+$counting[1]+$counting[2])/3+($counting[3]+$counting[4]+$counting[5])/3+($counting[6]+$counting[7]+$counting[8])/3+($counting[9]+$counting[10]+$counting[11])/3)/4;    
        $projectaverage = (($counting[12]+$counting[13]+$counting[14])/3+($counting[15]+$counting[16]+$counting[17])/3+($counting[18]+$counting[19]+$counting[20])/3+($counting[21]+$counting[22]+$counting[23])/3)/4;    
        $totalaverage = $nonprojectaverage+$projectaverage;
        $fte = ($nonprojectaverage+$projectaverage)/1504;
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
      <td class="table-bordered">'.$counting[3].'</td>
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
    
      $content .= '</table>';  
        $pdf->writeHTML($content);
        $this->response->setContentType('application/pdf');
        $pdf->output('datawla_'.$nama.'.pdf', 'I');
    }
}