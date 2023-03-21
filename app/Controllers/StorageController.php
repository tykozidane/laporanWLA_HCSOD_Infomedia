<?php

namespace App\Controllers;

$session = \Config\Services::session();
use App\Models\DataStorage;
use App\Models\DataUsers;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;

class StorageController extends BaseController
{
    public function index()
    {
        $auth = service('authentication');
        $userId = $auth->id();
        $users = new DataUsers();
        $datausers = $users->getById($userId);
        // if(empty($datausers)){
        //     echo 'kosong';
        // } else {
        //     echo $datausers['email'];
        // }
        $storage = new DataStorage();
        $files = $storage->getByUserId($userId);
        return view('storagepage/listfilepage', compact('datausers', 'files'));
    }
    public function uploadpage()
    {
        return view('storagepage/uploadfilepage');
    }
    public function upload()
    {
        $validation = \Config\Services::validation();

        $valid = $this->validate(
            [
                'fileupload' => [
                    'rules' => 'uploaded[fileupload]|ext_in[fileupload,pdf]',
                    'errors' => [
                        'uploaded' => 'File Upload wajib diisi',
                        'ext_in' => 'File Upload harus PDF'
                    ]
                ]
            ]
        );
        if (!$valid){
            session()->setFlashdata('pesanupload', $validation->getError('fileupload'));
            return redirect()->to('storage/uploadpage');
            // echo $validation->getError('fileimport');
        } else {
            $files = $this->request->getFile('fileupload');
            $ext = $files->guessExtension();
            $auth = service('authentication');
            $userId = $auth->id();
            $nama_dokumen = $this->request->getPost('nama_dokumen');
            list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
            $idnya = $userId.$month.$day.$year.$hour.$min.$sec;
            $kategori = $this->request->getPost('kategori');
            $type = $this->request->getPost('type');
            $nomor_dokumen = $this->request->getPost('nomor_dokumen');
            $deskripsi = $this->request->getPost('deskripsi');
            $nama_file = $files->getName();
            $path = $idnya.'.'.$ext;
            $tanggal_berlaku = $this->request->getPost('tanggal_berlaku');
            $status = $this->request->getPost('status');
            $datasimpan = [
                'id' => $idnya,
                'user_id' => $userId,
                'kategori'=> $kategori,
                'type'=> $type,
                'nomor_dokumen'=> $nomor_dokumen,
                'nama_dokumen' => $nama_dokumen,
                'deskripsi' => $deskripsi,
                'nama_file' => $nama_file,
                'tipe_file' => $ext,
                'path' => $path,
                'tanggal_berlaku'=> $tanggal_berlaku,
                'status'=> $status
            ];
            // echo $idnya .'-'.$path;
            $storage = new DataStorage();
            $savedata = $storage->insertData($datasimpan);
            
             
            $files->move('../public/uploads/storage/', $path);
            return redirect()->route('storage');
        }
    }
    public function download($id)
    {
        $storage = new DataStorage();
        $filenya = $storage->getById($id);
        return $this->response->download('../public/uploads/storage/'.$filenya['path'], null)->setFileName($filenya['nama_dokumen'].'.'.$filenya['tipe_file']);
    }
    public function myPdfPage($id){
        $storage = new DataStorage();
        $filenya = $storage->getById($id);
        $path = $filenya['path'];
        $url = base_url('../../uploads/storage/'.$path);
        $html = '<iframe src="../../uploads/storage/'.$path.'" style="border:none; width: 100%; height: 100%"></iframe>';
        echo $html;
    }
}
