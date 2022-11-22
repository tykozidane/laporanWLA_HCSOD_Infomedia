<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\Dataevent;
use App\Models\Dataemployee;
use App\Models\Dataabsen;
use Kint\Parser\TimestampPlugin;

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
        return view('eventspage/detailevent', compact('data'));
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
    public function cektime($id)
    {
        $data = new Dataevent();
        $dataevent = $data->getById($id);
        $passdataevent = $data->getByIdfirst($id);
        date_default_timezone_set('Asia/Jakarta');
        $time = date('H:i:s');
        $date = date('Y:m:d');
        foreach($dataevent as $datanya){
            if($datanya['tgl'] = $date){
                if($datanya['jam'] > $time){
                    $this->session->setFlashdata('pesan', 'EEVENT MASIH BELUM BERLANGSUNG <br> HARAP MENGISI ABSEN PADA WAKTU YANG DIJADWALKAN');
                    return view('eventspage/somecasepage', compact('passdataevent'));
                }
                if($datanya['jam'] < $time){
                    $laporan = new Dataemployee();
                    $dataemployee = $laporan->getAllData();
                    return view('eventspage/pilihanawal', compact('dataemployee', 'passdataevent'));
                }
            }
            else if ($datanya['tgl'] < $date) {
                $this->session->setFlashdata('pesan', 'EEVENT MASIH BELUM BERLANGSUNG <br> HARAP MENGISI ABSEN PADA WAKTU YANG DIJADWALKAN');
                    return view('eventspage/somecasepage', compact('passdataevent'));
            }
            else {
                $this->session->setFlashdata('pesan', 'EEVENT SUDAH BERLANGSUNG <br> ANDA SUDAH TIDAK DIPERKENANKAN MENGISI ABSEN');
                    return view('eventspage/somecasepage', compact('passdataevent'));
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
                $this->session->setFlashdata('pesan', 'Absen '.$nama.' telah berhasil di submit');
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
            $this->session->setFlashdata('pesan', 'Terimakasih '.$nama.' telah memberikan penilaian anda');
                return redirect()->to('formpesertaevent'.'/'.$id);
        } else {
            echo "<pre>";
            echo print_r($updateabsen->errors());
            echo "</pre>";
        }
    }
}
