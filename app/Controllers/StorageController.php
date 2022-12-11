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
                    'rules' => 'uploaded[fileupload]|ext_in[fileupload,xls,xlsx,pdf,docx]',
                    'errors' => [
                        'uploaded' => 'File Upload wajib diisi',
                        'ext_in' => 'File Upload harus ekstensi docx, xls, xlsx atau PDF'
                    ]
                ]
            ]
        );
        if (!$valid){
            $this->session->setFlashdata('pesanupload', $validation->getError('fileupload'));
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
            $nama_file = $files->getName();
            $path = $idnya.'.'.$ext;
            $datasimpan = [
                'id' => $idnya,
                'user_id' => $userId,
                'nama_dokumen' => $nama_dokumen,
                'nama_file' => $nama_file,
                'tipe_file' => $ext,
                'path' => $path
            ];
            // echo $idnya .'-'.$path;
            $storage = new DataStorage();
            $savedata = $storage->insertData($datasimpan);
            $this->session->setFlashdata('berhasil', 'Upload Berhasil');
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
