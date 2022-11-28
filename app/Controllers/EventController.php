<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Dataevent;
use App\Models\Dataemployee;
use App\Models\Dataabsen;
use Kint\Parser\TimestampPlugin;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Trunc;

class EventController extends BaseController
{
    public function index()
    {
        $event = new Dataevent();
        $dataevent = $event->getAllData();
        return view('eventlist', compact('dataevent'));
    }
    public function dataevent($id)
    {
        $event = new Dataevent();
        $data = $event->getByIdfirst($id);
        $absen = new Dataabsen();
        $jumlahpeserta = $absen->countAbsen($id);
        $dataabsen = $absen->getByIdevent($id);
        $laporan = new Dataemployee();
        $dataemployee = $laporan->getAllData();
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
        return view('eventspage/detailevent', compact('data', 'jumlahpeserta', 'dataabsen', 'dataemployee', 'averagenilai', 'count', 'check'));
    }
    public function formadd()
    {
        return view('eventspage/createevent');
    }
    public function upload()
    {
        
        $id = strtotime("now");
        $namaevent = $this->request->getPost('nama');
        $cat_event = $this->request->getPost('cat_event');
        $speaker = $this->request->getPost('speaker');
        $tanggal = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');

                $datasimpan = [
                    'id'=>$id,
                    'nama'=>$namaevent,
                    'cat_event'=>$cat_event,
                    'speaker'=>$speaker,
                    'tgl'=>$tanggal,
                    'jam'=>$jam
                ];
                // echo $quantity;
        // $db->table('event')->insert($datasimpan);
        $event = new Dataevent();
        $insertdata = $event->insertData($datasimpan);
        
        return redirect()->route('events');

    }
    public function editpage($id)
    {
        $event = new Dataevent();
        $data = $event->getByIdfirst($id);
        return view('eventspage/editeventpage', compact('data'));
    }
    public function updateevent($id)
    {
        $nama = $this->request->getPost('nama');
        $speaker = $this->request->getPost('speaker');
        $tgl = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');
        $data = [
            'nama'=>$nama,
            'speaker'=>$speaker,
            'tgl'=>$tgl,
            'jam'=>$jam
        ];
        $event = new Dataevent();
        $saveupdate = $event->dataUpdate($id, $data);
        $this->session->setFlashdata('pesan', 'Data Event '.$nama.', telah Berhasil di ubah');
                return redirect()->to('events');
    }
    public function deleteEvent()
    {

    }
    public function cektime($id)
    {
        $data = new Dataevent();
        $dataevent = $data->getById($id);
        $passdataevent = $data->getByIdfirst($id);
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H:i:s');
        $date = date('Y-m-d');
        // echo $passdataevent['tgl'].'-'.$date;
        if(empty($passdataevent)){
                    return view('eventspage/somecasepage', compact('passdataevent'));
        }
        if($passdataevent['tgl'] != $date) {
            if (strtotime($passdataevent['tgl']) > strtotime('now')) {
                $this->session->setFlashdata('pesan', 'EVENT MASIH BELUM BERLANGSUNG <br> HARAP MENGISI ABSEN PADA WAKTU YANG DIJADWALKAN');
                    return view('eventspage/somecasepage', compact('passdataevent'));
                    // echo strtotime($datanya['tgl']).'-'.strtotime('now');
            }
            else if (strtotime($passdataevent['tgl']) < strtotime('now')) {
                $this->session->setFlashdata('pesan', 'EVENT SUDAH BERLANGSUNG <br> ANDA SUDAH TIDAK DIPERKENANKAN MENGISI ABSEN');
                    return view('eventspage/somecasepage', compact('passdataevent'));
            }
        } else {
            if($passdataevent['jam'] > $time){
                $this->session->setFlashdata('pesan', 'EVENT MASIH BELUM BERLANGSUNG <br> HARAP MENGISI ABSEN PADA WAKTU YANG DIJADWALKAN');
                return view('eventspage/somecasepage', compact('passdataevent'));
            }
            else {
                $laporan = new Dataemployee();
                $dataemployee = $laporan->getAllData();
                return view('eventspage/pilihanawal', compact('dataemployee', 'passdataevent'));
            }
        }
    }
    public function checkabsen($id)
    {
        $nik = $this->request->getPost('nik');
        $cekabsen = new Dataabsen();
        $datanya = $cekabsen->getByIdNik($id, $nik);
        $data = new Dataevent();
        $passdataevent = $data->getByIdfirst($id);
        $laporan = new Dataemployee();
        $dataemployee = $laporan->getByNikfirst($nik);
        if(empty($datanya)){
            return view('eventspage/chekinpage', compact('dataemployee', 'passdataevent'));
        } 
        else if($datanya['vote'] == 0) {
            return view('eventspage/votepage', compact('dataemployee', 'passdataevent'));
        } else {
            $this->session->setFlashdata('pesan', 'Anda '.$dataemployee['nama'].' Sudah melakukan absen dan memberikan penilaian');
                return redirect()->to('formpesertaevent'.'/'.$id);
        }
    }
    public function checkin($id)
    {
        $niknya = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $data = new Dataevent();
        $passdataevent = $data->getByIdfirst($id);
        // date_default_timezone_set('Asia/Jakarta');
        $time = date('Y:m:d H:i:s');
        $now = date('H:i:s');
        
                $idnya = $niknya.$passdataevent['id'];
                $datasimpan = [
                    'id' => $idnya,
                    'id_event' => $passdataevent['id'],
                    'nik' => $niknya,
                    'vote' => '',
                    'notes' => '',
                    'jam_checkin' => $now
                ];
                $absen = new Dataabsen();
                $addabsen = $absen->insertData($datasimpan);
                // return redirect()->route('dataevent'.'/'.$id);
                $this->session->setFlashdata('pesan', 'Selamat '.$nama.' Anda telah absen di jam '.$now);
                return redirect()->to('formpesertaevent'.'/'.$id);
    }
    public function voting($id)
    {
        $niknya = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $vote = $this->request->getPost('rate');
        $notes = $this->request->getPost('notes');
        $absen = new Dataabsen();
        $dataabsen = $absen->getByIdNik($id, $niknya);
        $data = [
            'vote'=> $vote,
            'notes'=>$notes
        ];
        // echo $data['vote'];
        $idabsen = $dataabsen['id'];
        $updateabsen = $absen->dataUpdate($idabsen,  $data);
        if($updateabsen){
            $this->session->setFlashdata('pesan', 'Terimakasih '.$nama.', telah memberikan penilaian anda');
                return redirect()->to('formpesertaevent'.'/'.$id);
        } else {
            echo "<pre>";
            echo print_r($updateabsen->errors());
            echo "</pre>";
        }
    }
}
