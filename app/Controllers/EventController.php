<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Dataevent;
use App\Models\Dataemployee;
use App\Models\Dataabsen;
use App\Models\Dataakhlak;
use App\Models\Datamasteremployee;
use App\Models\DataProgramAkhlak;
use App\Models\DataGroups;
use App\Models\DataGroupUser;
use App\Models\DataSpeaker;
use App\Models\DataOtpReward;
use App\Models\DataReward;
use App\Models\DataClaimReward;
use App\Models\DataUsers;
use App\Models\DataUpdaterClaimReward;
use CodeIgniter\I18n\Time;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use Kint\Parser\TimestampPlugin;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Trunc;

class EventController extends BaseController
{
    public function index()
    {
        $auth = service('authentication');
        $userId = $auth->id();
        // echo $userId;
        $countClaimReward = -1;
        $datagroups = new DataGroups();
        $datagroupuser = new DataGroupUser();
        $detailgroup = [];
        $idgroup = $datagroupuser->getByUserId($userId);
        foreach($idgroup as $x){
            $newdata = $datagroups->getById($x['group_id']);
            if($newdata['name'] != 'user'){
                if($newdata['name'] == 'admin'){
                    $event = new Dataevent();
                    $dataevent = $event->getAllData();
                    $modelClaimReward = new DataClaimReward();
                    $countClaimReward = $modelClaimReward->countAllDataNotDone();
        return view('eventspage/eventlist', compact('dataevent', 'countClaimReward'));
                }
                array_push($detailgroup, $newdata);
            }
        };
        $event = new Dataevent();
        $dataevent = [];
        foreach($detailgroup as $y){
            
            $newevent = $event->getByDivisi($y['name']);
            foreach($newevent as $input){
                array_push($dataevent, $input);
            }
            
        };
        
        
        // $dataevent = $event->getAllData();
        return view('eventspage/eventlist', compact('dataevent', 'countClaimReward'));
    }
    public function dataevent($id)
    {
        $event = new Dataevent();
        $data = $event->getByIdfirst($id);
        $absen = new Dataabsen();
        $jumlahpeserta = $absen->countAbsen($id);
        // $dataabsen = $absen->getByIdevent($id);
        $dataabsen = $absen->getByIdJoinMEmployee($id);
        $periode = getPeriode();
        $masteremployee = new Datamasteremployee();
        $dataemployee = $masteremployee->getByPeriode($periode);
        $count = 0;
        $nilai = 0;
        foreach($dataabsen as $datanya){
            if ($datanya['vote'] != 0){
                $nilai += $datanya['vote'];
                $count++;
            } else {
                continue;
            }
        }
        if($count == 0){
            $averagenilai = 0;
        } else {
            $averagenilai = $nilai / $count;
        }
        if (strtotime($data['tgl']) <= strtotime('now')){
            $check = FALSE;
        } else {
            $check = TRUE;
        }
        // echo $averagenilai;
        $encrypter = \Config\Services::encrypter();
        $idencrypt = bin2hex($id);
        $modelspeaker = new DataSpeaker();
        $dataspeaker = $modelspeaker->getByIdEvent($id);
        // print_r($dataabsen);
        return view('eventspage/detailevent', compact('data','dataspeaker', 'jumlahpeserta', 'dataabsen', 'dataemployee','idencrypt', 'averagenilai', 'count', 'check'));
    }
    public function formadd()
    {
        $akhlak = new Dataakhlak();
        $dataakhlak = $akhlak->getAllData();
        $auth = service('authentication');
        $userId = $auth->id();
        // echo $userId;
        $datagroups = new DataGroups();
        $datagroupuser = new DataGroupUser();
        $detailgroup = [];
        $idgroup = $datagroupuser->getByUserId($userId);
        foreach($idgroup as $x){
            $newdata = $datagroups->getById($x['group_id']);
            if($newdata['name'] != 'user'){
                if($newdata['name'] == 'admin'){
                    $detailgroup = $datagroups->getAllData();
                    return view('eventspage/createevent', compact('dataakhlak', 'detailgroup'));
                } else {
                    array_push($detailgroup, $newdata);
                }   
            }
        };  
        return view('eventspage/createevent', compact('dataakhlak', 'detailgroup'));
    }
    public function upload()
    {
        $rules = [
            'divisi' => 'required',
            'nama' => 'required|min_length[3]',
            'cat_akhlak' => 'required',
            'programakhlak' => 'required',
            'cat_event'=>'required',
            'jmlhspeaker'=>'required|greater_than[0]',
            'tanggal'=>'required',
            'jam'=>'required'
        ];
        if($this->validate($rules)){
            $akhlak = new Dataakhlak();
        $dataakhlak = $akhlak->getAllData();
        $id = strtotime("now");
        $namaevent = $this->request->getPost('nama');
        foreach($dataakhlak as $x){
            if ($x['id'] == $this->request->getPost('cat_akhlak')){
                $cat_akhlak = $x['nama'];

            }
        }
        $program_akhlak = $this->request->getPost('programakhlak');
        $cat_event = $this->request->getPost('cat_event');
        $divisi = $this->request->getPost('divisi');
        $tanggal = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');

                $datasimpan = [
                    'id'=>$id,
                    'divisi' => $divisi,
                    'nama'=>$namaevent,
                    'cat_akhlak'=>$cat_akhlak,
                    'program_akhlak'=>$program_akhlak,
                    'cat_event'=>$cat_event,
                    'tgl'=>$tanggal,
                    'jam'=>$jam
                ];
                // echo $quantity;
        // $db->table('event')->insert($datasimpan);
        $event = new Dataevent();
        $insertdata = $event->insertData($datasimpan);
        $jumlahspeaker = $this->request->getPost('jmlhspeaker');
        $modelspeaker = new DataSpeaker();
        for($x = 1; $x <= $jumlahspeaker; $x++){
            $idspeaker = $id.$x;
            $nikspeaker = $this->request->getPost('nikspeaker'.$x);
            $speaker = $this->request->getPost('speaker'.$x);
            $datasimpanspeaker = [
                'id' => $idspeaker,
                'id_event' => $id,
                'nik' => $nikspeaker,
                'nama' => $speaker
            ];
            $modelspeaker->insertData($datasimpanspeaker);
        }
        return redirect()->route('events');
        } else {
            $data['validation'] = $this->validator;
            $akhlak = new Dataakhlak();
        $dataakhlak = $akhlak->getAllData();
        $auth = service('authentication');
        $userId = $auth->id();
        // echo $userId;
        $datagroups = new DataGroups();
        $datagroupuser = new DataGroupUser();
        $detailgroup = [];
        $idgroup = $datagroupuser->getByUserId($userId);
        foreach($idgroup as $x){
            $newdata = $datagroups->getById($x['group_id']);
            if($newdata['name'] != 'user'){
                if($newdata['name'] == 'admin'){
                    $detailgroup = $datagroups->getAllData();
                    return view('eventspage/createevent', compact('dataakhlak', 'detailgroup', 'data'));
                } else {
                    array_push($detailgroup, $newdata);
                }   
            }
        };  
        return view('eventspage/createevent', compact('dataakhlak', 'detailgroup', 'data'));
        }
        

    }
    public function editpage($id)
    {
        $event = new Dataevent();
        $data = $event->getByIdfirst($id);
        $modelspeaker = new DataSpeaker();
        $dataspeaker = $modelspeaker->getByIdEvent($id);
        return view('eventspage/editeventpage', compact('data', 'dataspeaker'));
    }
    public function updateevent($id)
    {
        $nama = $this->request->getPost('nama');
        $tgl = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');
        $data = [
            'nama'=>$nama,
            'tgl'=>$tgl,
            'jam'=>$jam
        ];
        $event = new Dataevent();
        $saveupdate = $event->dataUpdate($id, $data);
        $modelspeaker = new DataSpeaker();
        $countspeaker = $modelspeaker->getCountByIdEvent($id);
        for($i=1; $i<=$countspeaker; $i++){
            $idspeaker = $this->request->getPost('idspeaker'.$i);
            $nik = $this->request->getPost('nikspeaker'.$i);
            $namaspeaker = $this->request->getPost('speaker'.$i);
            $savedata = [
                'nik' => $nik,
                'nama' => $namaspeaker
            ];
            $saveupdatespeaker = $modelspeaker->dataUpdate($idspeaker, $savedata);
        }
        session()->setFlashdata('pesan', 'Data Event '.$nama.', telah Berhasil di ubah');
        return redirect()->to('events/dataevent/'.$id);
    }
    public function addspeaker($id)
    {
        $nama = $this->request->getPost('newspeaker');
        $nik = $this->request->getPost('niknewspeaker');
        $modelspeaker = new DataSpeaker();
        $dataspeaker = $modelspeaker->getByIdEvent($id);
        $newid=0;
        foreach($dataspeaker as $x){
            if($newid<$x['id']){
                $newid = $x['id'];
            }
        }
        if($newid == 0){
            $newid = $id.'1';
        } else {
          $newid++;  
        }
        $data = [
            'id' => $newid,
            'id_event' => $id,
            'nik' => $nik,
            'nama' => $nama
        ];
        $modelspeaker->insertData($data);
        session()->setFlashdata('pesan', 'Data Speaker '.$nama.', telah Berhasil di Input');
        return redirect()->to('events/editdata/'.$id);
    }
    public function deletespeaker($id)
    {
        $modelspeaker = new DataSpeaker();
        $delete = $modelspeaker->dataDelete($id);
        session()->setFlashdata('pesan', 'Data Speaker , telah Berhasil di Hapus');
        return redirect()->to(previous_url());
    }
    public function deleteEvent()
    {

    }
    public function cektime($idnya)
    {
        // echo $idnya."<br>";
        $encrypter = \Config\Services::encrypter();
        $decode = hex2bin($idnya);
        if($decode){
            $id = $decode;
        } else {
            $passdataevent = [];
            return view('eventspage/somecasepage', compact('passdataevent'));
        }
        $modelspeaker = new DataSpeaker();
        $dataspeaker = $modelspeaker->getByIdEvent($id);
        $data = new Dataevent();
        $dataevent = $data->getById($id);
        $passdataevent = $data->getByIdfirst($id);
        $idencrypt = bin2hex($id);
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H:i:s');
        $date = date('Y-m-d');
        // echo $passdataevent['tgl'].'-'.$date;
        if(empty($passdataevent)){
                    return view('eventspage/somecasepage', compact('passdataevent'));
        }
        if($passdataevent['tgl'] != $date) {
            if (strtotime($passdataevent['tgl']) > strtotime('now')) {
                session()->setFlashdata('pesan', 'EVENT MASIH BELUM BERLANGSUNG <br> HARAP MENGISI ABSEN PADA WAKTU YANG DIJADWALKAN');
                    return view('eventspage/somecasepage', compact('passdataevent','idencrypt', 'dataspeaker'));
                    // echo strtotime($datanya['tgl']).'-'.strtotime('now');
            }
            else if (strtotime($passdataevent['tgl']) < strtotime('now')) {
                session()->setFlashdata('pesan', 'EVENT SUDAH BERLANGSUNG <br> ANDA SUDAH TIDAK DIPERKENANKAN MENGISI ABSEN');
                    return view('eventspage/somecasepage', compact('passdataevent','idencrypt', 'dataspeaker'));
            }
        } else {
            if($passdataevent['jam'] > $time){
                session()->setFlashdata('pesan', 'EVENT MASIH BELUM BERLANGSUNG <br> HARAP MENGISI ABSEN PADA WAKTU YANG DIJADWALKAN');
                return view('eventspage/somecasepage', compact('passdataevent','idencrypt', 'dataspeaker'));
            }
            else {
                return view('eventspage/pilihanawal', compact( 'passdataevent','idencrypt', 'dataspeaker'));
            }
        }
    }
    public function checkabsen($idnya)
    {
        // echo 'masuk';
        $encrypter = \Config\Services::encrypter();
        $decode = hex2bin($idnya);
        if($decode){
            $id = $decode;
        } else {
            $passdataevent = [];
            return view('eventspage/somecasepage', compact('passdataevent'));
        }
        $modelspeaker = new DataSpeaker();
        $dataspeaker = $modelspeaker->getByIdEvent($id);
        $nik = $this->request->getPost('nik');
        $corporate = $this->request->getPost('corporate');
        if($corporate == 1){
            $periode = getPeriode();
            $masteremployee = new Datamasteremployee();
            $datamasteremployee = $masteremployee->getByNIKPeriode($nik, $periode);
            $dataemployee['nik'] = $nik;
            $dataemployee['nama'] = $datamasteremployee['nama_emp'];
        } else {
            $nama = $this->request->getPost('nama');
            $dataemployee['nik'] = $nik;
            $dataemployee['nama'] = $nama;
    }
        $cekabsen = new Dataabsen();
        $datanya = $cekabsen->getByIdNik($id, $nik);
        $data = new Dataevent();
        $passdataevent = $data->getByIdfirst($id);
        $idencrypt = bin2hex($id);
        if(empty($datanya)){
            return view('eventspage/chekinpage', compact('dataemployee', 'corporate', 'passdataevent','idencrypt', 'dataspeaker'));
        } 
        else if($datanya['vote'] == 0) {
            $awal  = strtotime($passdataevent['jam']);
            $akhir = time(); // Waktu sekarang
            $diff  = $akhir - $awal;
            if(($diff/60) > 40){
                return view('eventspage/votepage', compact('dataemployee', 'passdataevent','idencrypt', 'dataspeaker'));
            } else {
                session()->setFlashdata('pesan', 'Anda '.$datanya['nama'].' Sudah melakukan absen');
                return view('eventspage/somecasepage', compact('passdataevent', 'dataspeaker'));
            }
            
        } else {
            session()->setFlashdata('berhasil', 'Anda '.$datanya['nama'].' Sudah melakukan absen dan memberikan penilaian');
            return view('eventspage/somecasepage', compact('passdataevent', 'dataspeaker'));
        }
    }
    public function checkin($idnya)
    {
        // echo 'masuk';
        $encrypter = \Config\Services::encrypter();
        $decode = hex2bin($idnya);
        if($decode){
            $id = $decode;
        } else {
            $passdataevent = [];
            return view('eventspage/somecasepage', compact('passdataevent'));
        }
        $modelspeaker = new DataSpeaker();
        $dataspeaker = $modelspeaker->getByIdEvent($id);
        $niknya = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $corporate = $this->request->getPost('corporate');
        $data = new Dataevent();
        $passdataevent = $data->getByIdfirst($id);
        $programakhlak = new DataProgramAkhlak();
        $getdataprogramahklak = $programakhlak->getByProgram($passdataevent['program_akhlak']);
        $nilai = $getdataprogramahklak['value'];
        $idencrypt = bin2hex($id);
        date_default_timezone_set('Asia/Jakarta');
        $time = date('Y:m:d H:i:s');
        $now = date('H:i:s');
        
                $idnya = $niknya.$passdataevent['id'];
                $datasimpan = [
                    'id' => $idnya,
                    'id_event' => $passdataevent['id'],
                    'corporate' => $corporate,
                    'nik' => $niknya,
                    'nama' => $nama,
                    'nilai' => $nilai,
                    'vote' => '',
                    'notes' => '',
                    'jam_checkin' => $now,
                    'status' => 'Partisipan'
                ];
                $absen = new Dataabsen();
                $addabsen = $absen->insertData($datasimpan);
                // return redirect()->route('dataevent'.'/'.$id);
                session()->setFlashdata('berhasil', 'Terima kasih '.$nama.', Anda berhasil melakukan presensi. <br />Jangan lupa memberikan penilaian pada akhir acara untuk mendapatkan poin AKHLAK');
                // return redirect()->to('formpesertaevent'.'/'.$idencrypt);
                $data = new Dataevent();
                 $passdataevent = $data->getByIdfirst($id);
                return view('eventspage/somecasepage', compact('passdataevent', 'dataspeaker'));
    }
    public function voting($idnya)
    {
        // $pd_web = $this->request->getPost('pd_web');
        // echo $pd_web;
        $encrypter = \Config\Services::encrypter();
        $decode = hex2bin($idnya);
        if($decode){
            $id = $decode;
        } else {
            $passdataevent = [];
            return view('eventspage/somecasepage', compact('passdataevent'));
        }
        $modelspeaker = new DataSpeaker();
        $dataspeaker = $modelspeaker->getByIdEvent($id);
        $idencrypt = bin2hex($id);
        $niknya = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $pd_web = $this->request->getPost('pd_web');
        $pd_speaker = $this->request->getPost('pd_speaker');
        $vote = $this->request->getPost('rate');
        $notes = $this->request->getPost('notes');
        $absen = new Dataabsen();
        $dataabsen = $absen->getByIdNik($id, $niknya);
        $data = [
            'pd_web' => $pd_web,
            'pd_speaker' => $pd_speaker,
            'vote'=> $vote,
            'notes'=>$notes
        ];
        // echo $data['vote'];
        $idabsen = $dataabsen['id'];
        $updateabsen = $absen->dataUpdate($idabsen,  $data);
        if($updateabsen){
            session()->setFlashdata('berhasil', 'Terimakasih '.$nama.', telah memberikan penilaian. <br />Selamat anda mendapatkan '.$dataabsen['nilai'].' poin AKHLAK');
                // return redirect()->to('formpesertaevent'.'/'.$idencrypt);
                $data = new Dataevent();
                 $passdataevent = $data->getByIdfirst($id);
                return view('eventspage/somecasepage', compact('passdataevent', 'dataspeaker'));
        } else {
            echo "<pre>";
            echo print_r($updateabsen->errors());
            echo "</pre>";
        }
    }
    public function cekreward()
    {
        $passdataabsen = '';
        return view('eventspage/cek_reward_page', compact('passdataabsen'));
    }
    public function cekrewards()
    {
        $nik = $this->request->getPost('nik');
        $getabsen = new Dataabsen();
        $datadiri = $getabsen->getByNik($nik);
        $periode = getPeriode();
        $masteremployee = new Datamasteremployee();
        $dataemployee = $masteremployee->getByNIKPeriode($nik, $periode);
        $passdataabsen = $getabsen->getcekpoin($nik);
        $modelspeaker = new DataSpeaker();
        $dataspeaker = [];
        foreach($passdataabsen as $x){
            $getdataspeaker = $modelspeaker->getByIdEvent($x['id_event']);
            foreach($getdataspeaker as $y){
                array_push($dataspeaker, $y);
            }
        }
         return view('eventspage/cek_reward_page', compact('passdataabsen', 'datadiri', 'dataemployee', 'dataspeaker'));
    }
    public function updateAbsen($idabsen)
    {
        $auth = service('authentication');
        $userId = $auth->id();
        $authorize = service('authorization');
         // check if user 1 is in the 'teste' group
         $modelabsen = new Dataabsen();
         $dataabsen = $modelabsen->getById($idabsen);
        if($authorize->inGroup('hcsod', $userId) || $authorize->inGroup('admin', $userId)){
            $status = $this->request->getPost('status');
            $nilai = $this->request->getPost('nilai');
            if(empty($status)){
                $datasimpan = [
                    'nilai' => $nilai
                ];
            } else {
            $datasimpan = [
                'nilai' => $nilai,
                'status' => $status
            ];
        }
            $modelabsen->dataUpdate($idabsen, $datasimpan);
            session()->setFlashdata('berhasil', 'Update Succesfully');
            return redirect()->to('events/dataevent/'.$dataabsen['id_event']);
        } else {
            session()->setFlashdata('pesan', 'You are not allowed');
            return redirect()->to('events/dataevent/'.$dataabsen['id_event']);
        }
    }

    //Fungsi View Form NIK for get OTP
    public function getotpview()
    {
        return view('eventspage/tryclaimrewardpage');
    }
    //Fungsi Request Link Claim Reward
    public function getOtp()
    {
        $nik = $this->request->getPost('nik');
        $periode = getPeriode();
            $masteremployee = new Datamasteremployee();
            $dataemployee = $masteremployee->getByNIKPeriode($nik, $periode);
            if(empty($dataemployee)){
                session()->setFlashdata('fail', 'Data Employee tidak ditemukan');
                return view('eventspage/aftersendingemailpage');
            } else if(empty($dataemployee['email'])){
                session()->setFlashdata('failemail', 'Email tidak ditemukan');
                return view('eventspage/aftersendingemailpage');
            }
        $encrypter = \Config\Services::encrypter();
        $cekotp = cekOtpNik($nik);
        // echo $cekotp;
        $modelotp = new DataOtpReward();
        if($cekotp === true){
            $dataotp = $modelotp->getByNik($nik);
            $idencrypt = bin2hex($dataotp['kode_otp']);
        } else {            
            $kodeotp = $nik.strtotime("now");
            $data = [
                'kode_otp'=>$kodeotp,
                'nik' => $nik,
                'email' => $dataemployee['email'],
                'status' => "active"
            ];
            
            $modelotp->insertData($data);
            $idencrypt = bin2hex($kodeotp);
        }
        
        
        $isi = '<table width="100%" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="border-radius: 2px;" bgcolor="#ED2939">
                            <a href="'.base_url('dataclaimreward/'.$idencrypt).'" target="_blank" style="padding: 8px 12px; border: 1px solid #ED2939;border-radius: 2px;font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;text-decoration: none;font-weight:bold;display: inline-block;">
                                Click             
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
      </table>';

        $path = '../public/templatedoc/index.html';
        $homepage = file_get_contents($path);
        $link = base_url('dataclaimreward/'.$idencrypt);
        $homepage = str_replace("linkdataclaimreward", $link, $homepage );

    //   $stream = fopen("../Views/eventspage/examplemail.html","r");
    //     $html = stream_get_contents($stream);
    //     fclose($stream);
    //   $html = file_get_contents('../Views/eventspage/examplemail.html');
        //Email Class
        $email = \Config\Services::email();

            $email->setFrom('tyokdazi2015@gmail.com', 'HCM Infomedia');
            $email->setTo('tykozidane2015@gmail.com'); //email tujuan 
            // $email->setTo($dataemployee['email']); //email tujuan 

            // $email->setCC('another@another-example.com');
            // $email->setBCC('them@their-example.com');

            $email->setSubject('LINK CLAIM REWARD POIN AKHLAK');
            $email->setMessage($homepage);

            $email->send();

        session()->setFlashdata('sending', 'Sending to Your Email');
        return view('eventspage/aftersendingemailpage');
    }
    public function listreward($kode_otp)
    {
        $encrypter = \Config\Services::encrypter();
        $decode = hex2bin($kode_otp);
        if($decode){
            $kodeotp = $decode;
        } else {
            $passdataevent = [];
            return view('eventspage/somecasepage', compact('passdataevent'));
        }
        $nik = permissionReward($kodeotp);
        if($nik === false){
            return view('eventspage/tryclaimrewardpage');
        } else 
        // echo $nik;
        $periode = getPeriode();
        $masteremployee = new Datamasteremployee();
        $dataemployee = $masteremployee->getByNIKPeriode($nik, $periode);
        $datetime = Time::today();
        $Year = $datetime->format('Y');
        $quarter = getQuarterReward();
        $modelreward = new DataReward();
        $datareward = $modelreward->getByQuarterTahun($Year, $quarter);
        $cekdatarewardbyclaim = $modelreward->getAllData();
        $poin = countPoin($nik);
        $modelClaimReward = new DataClaimReward();
        $dataclaimreward = $modelClaimReward->getByNik($nik);
        return view('eventspage/listrewardpage', compact('dataemployee', 'datareward', 'poin', 'dataclaimreward', 'cekdatarewardbyclaim'));
    }
    // public function cobahtmlemail()
    // {
    //     $path = '../public/templatedoc/index.html';
    //     $homepage = file_get_contents($path);
    //     $link = base_url('dataclaimreward/');
    //     $homepage = str_replace("linkdataclaimreward", $link, $homepage );
    //     echo $homepage;
    // }
    public function hcmlistreward()
    {
        $modelreward = new DataReward();
        $datareward = $modelreward->getAllData();
        date_default_timezone_set('Asia/Jakarta');
        $datetime = Time::today();
        $Year = $datetime->format('Y');
        $quarter = getQuarterReward();
        for($i=0; $i< count($datareward);$i++){
            $datareward[$i]['candelete'] = 0;
            if($datareward[$i]['tahun'] == $Year){
                if($datareward[$i]['quarter'] == $quarter){
                    $datareward[$i]['candelete'] = 1;
                } 
            } else {
                
            }
            // $datareward[$i]['candelete'] = 1;
            // echo $datareward[$i]['candelete'];
        }

        // foreach($datareward as $x){
        //     if($x['tahun'] == $Year){
        //         if($x['quarter'] == $quarter){
        //             $datareward['candelete'] = 1;
        //         } else {
        //             $datareward['candelete'] = 0;
        //         }
        //     } else {
        //         $datareward['candelete'] = 0;
        //     }
        // }
        $modelClaimReward = new DataClaimReward();
        $dataClaimReward = $modelClaimReward->getAllDataStatus();
        // $dataSuccessReward = $modelClaimReward->getAllDataSuccess();
        return view('eventspage/hcmlistrewardpage', compact('datareward', 'dataClaimReward'));
    }
    public function addreward()
    {
        $nama = $this->request->getPost('nama');
        $price = $this->request->getPost('price');
        $deskripsi = $this->request->getPost('deskripsi');
        $status = $this->request->getPost('status');
        date_default_timezone_set('Asia/Jakarta');
        list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
            $id = $month.$day.$year.$hour.$min.$sec;$date = date('Y-m-d H:i:s');
        $datetime = Time::today();
        $Year = $datetime->format('Y');
        $quarter = getQuarterReward();
        $data = [
            'id' => $id,
            'tahun' => $Year,
            'quarter' => $quarter,
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'price' => $price,
            'status' => $status
        ];
        $modelreward = new DataReward();
        $modelreward->insertData($data);
        session()->setFlashdata('pesan', 'Data Reward Berhasil di tambahkan');
        return redirect()->to('events/datareward');
    }
    public function updatedatareward($id)
    {
        $nama = $this->request->getPost('nama');
        $price = $this->request->getPost('price');
        $deskripsi = $this->request->getPost('deskripsi');
        $status = $this->request->getPost('status');
        $data = [
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'price' => $price,
            'status' => $status
        ];
        $modelreward = new DataReward();
        $modelreward->dataUpdate($id, $data);
        // echo "update";
        session()->setFlashdata('pesan', 'Update Data Berhasil di simpan');
        return redirect()->to('events/datareward');
    }
    public function deletereward($id)
    {
        $modelreward = new DataReward();
        $delete = $modelreward->dataDelete($id);
        session()->setFlashdata('pesan', 'Data Reward , telah Berhasil di Hapus');
        return redirect()->to(previous_url());
    }
    public function sendingreward($id)
    {
        $modelClaimReward = new DataClaimReward();
        $cekdataclaim = $modelClaimReward->getById($id);
        if($cekdataclaim != "verification"){
        $data = [
            'status' => "verification"
        ];
        $modelClaimReward->dataUpdate($id, $data);
        $auth = service('authentication');
        $userId = $auth->id();
        $modelUser = new DataUsers();
        $datauser = $modelUser->getById($userId);
        date_default_timezone_set('Asia/Jakarta');
        list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
            $newid = $month.$day.$year.$hour.$min.$sec;
        $dataupdater = [
            'id'=> $newid,
            'user_id' => $userId,
            'claim_id' => $id,
            'username' => $datauser['username'],
            'status' => "verification"
        ];
        $modelupdater = new DataUpdaterClaimReward();
        $savedata = $modelupdater->insertData($dataupdater);
        session()->setFlashdata('pesan', 'Reward in Verification');
        return redirect()->to('events/datareward');
        } else {
            session()->setFlashdata('pesan', 'Sudah di Verifikasi');
            return redirect()->to('events/datareward'); 
        }
    }
    public function successsendingreward($id)
    {
        $modelClaimReward = new DataClaimReward();
        $cekdataclaim = $modelClaimReward->getById($id);
        if($cekdataclaim != "success"){
        $data = [
            'status' => "success"
        ];
        $modelClaimReward->dataUpdate($id, $data);
        $auth = service('authentication');
        $userId = $auth->id();
        $modelUser = new DataUsers();
        $datauser = $modelUser->getById($userId);
        date_default_timezone_set('Asia/Jakarta');
        list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
            $newid = $month.$day.$year.$hour.$min.$sec;
        $dataupdater = [
            'id'=> $newid,
            'user_id' => $userId,
            'claim_id' => $id,
            'username' => $datauser['username'],
            'status' => "success"
        ];
        $modelupdater = new DataUpdaterClaimReward();
        $savedata = $modelupdater->insertData($dataupdater);
        session()->setFlashdata('pesan', 'Reward in Verification');
        return redirect()->to('events/datareward');
        } else {
        session()->setFlashdata('pesan', 'Sudah di Success');
        return redirect()->to('events/datareward'); 
        }
    }
    public function claimthis($reward_id, $nik)
    {
        $modelReward = new DataReward();
        $dataReward = $modelReward->getById($reward_id);
        $modelClaimReward = new DataClaimReward();
        $data = [
            'id' => $reward_id.$nik,
            'nik' => $nik,
            'reward_id' => $reward_id,
            'price' => $dataReward['price'],
            'status' => "requested"
        ];
        $savedata = $modelClaimReward->insertData($data);
        session()->setFlashdata('pesan', 'Reward anda sedang di request');
        return redirect()->to(previous_url());
    }
    public function cobaenkripsi()
    {
        
        $encrypter = \Config\Services::encrypter();
        $ciphertext = bin2hex("testing");
        $hex2bin = hex2bin("7465737469");
        // $ecode = bin2hex($encrypter->encrypt("testing"));
        // $decode = $encrypter->decrypt(hex2bin($ecode));
        echo $ciphertext."=".$hex2bin;
    }
}
