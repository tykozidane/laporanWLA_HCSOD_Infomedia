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
    public function theday()
    {
        $data = new Dataemployee();
        $dataemployee = $data->getAllData();
        return view('eventspage/pilihanawal', compact('dataemployee'));
    }
    public function formadd()
    {
        return view('eventspage/createevent');
    }
    public function upload()
    {
        $id = uniqid();
        $namaevent = $this->request->getPost('nama');
        $cat_event = $this->request->getPost('cat_event');
        $speaker = $this->request->getPost('speaker');
        $tanggal = $this->request->getPost('tanggal');
        $jam = $this->request->getPost('jam');

        $db = \Config\Database::connect();

                $datasimpan = [
                    'id_event'=>$id,
                    'nama'=>$namaevent,
                    'cat_event'=>$cat_event,
                    'speaker'=>$speaker,
                    'tgl'=>$tanggal,
                    'jam'=>$jam
                ];
                // echo $quantity;
        $db->table('event')->insert($datasimpan);
        
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
                if($datanya['jam'] < $time){
                    $laporan = new Dataemployee();
                    $dataemployee = $laporan->getAllData();
                    return view('eventspage/pilihanawal', compact('dataemployee', 'passdataevent'));
                }
                if($datanya['jam'] > $time){
                    $laporan = new Dataemployee();
                    $dataemployee = $laporan->getAllData();
                    return view('eventspage/pilihanawal', compact('dataemployee', 'passdataevent'));
                }
            }
            else {
                if($datanya['jam'] < $time){
                echo ($time.'<br>apa'.$date);
                }
                if($datanya['jam'] > $time){
                    echo ($time.'<br>'.$date);
                }
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
        } else {
            echo "isi voting";
        }
    }
    public function checkin($id)
    {
        $nik = $this->request->getPost('nik');
        echo $nik;
    }
}
