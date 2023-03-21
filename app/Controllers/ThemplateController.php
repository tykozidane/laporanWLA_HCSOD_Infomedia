<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataThemplate;
use TCPDF;

class ThemplateController extends BaseController
{
    public function index()
    {
        //
    }
    public function listthemplate()
    {
        $themplate = new DataThemplate();
        $datathemplate = $themplate->getAllData();
        return view('themplatesuratpage/listthemplate', compact('datathemplate'));
    }
    public function addthemplate()
    {
        return view('themplatesuratpage/addthemplate');
    }
    public function savetext()
    {
        // $nama= $this->request->getPost('nama');
        
        
        $text = $this->request->getPost('editordata');
        $nama = $this->request->getPost('nama');
        $kategori = $this->request->getPost('kategori');
        $deskripsi = $this->request->getPost('deskripsi');
        $judul = $this->request->getPost('judul');
        $tandatangan = $this->request->getPost('tandatangan');
        $themplate = new DataThemplate();
        $auth = service('authentication');
            $userId = $auth->id();
            list($day, $month, $year, $hour, $min, $sec) = explode("/", date('d/m/Y/h/i/s'));
            $idnya = $userId.$month.$day.$year.$hour.$min.$sec;
        $datasimpan = [
            'id' => $idnya,
            'nama' => $nama,
            'kategori' => $kategori,
            'deskripsi' => $deskripsi,
            'judul' => $judul,
            'isi' => $text,
            'tandatangan' => $tandatangan
        ];
        // echo $idnya;
        $themplate->insertData($datasimpan);
        // $this->seepdf($idnya);
        return redirect()->to('themplate/seepdf/'.$idnya);
        // $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // $pdf->SetMargins(20, 20, 20, true);
        // $pdf->AddPage('P','A4');
        // $pdf->SetFont('times', '', 14);
        // $pdf->setCellHeightRatio(0.8);
        // $pdf->SetFillColor(200, 220, 255);
        // $pdf->SetFont('times', '', 10);
        // $pdf->setJPEGQuality(75);
        // $pdf->resetColumns();
        // $pdf->setEqualColumns(2, 84);  // KEY PART -  number of cols and width
        // $pdf->selectColumn();  
        // // $pdf->Image('../public/assets/img/tandatangan/kopsurat.png', 0, 5, 200, 45, 'PNG', '', 'N', false, 150, '', false, false, 1, false, false, false);
        // // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 30, 85, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        // $pdf->writeHTML($text);
        // $this->response->setContentType('application/pdf');
        // // ob_end_clean();
        // $pdf->output($name, 'I');
    }
    public function editthemplate($id)
    {
        $getthemplate = new DataThemplate();
        $themplate = $getthemplate->getById($id);
        return view('themplatesuratpage/editthemplate', compact('themplate'));
    }
    public function saveupdate($id)
    {
        $getthemplate = new DataThemplate();
        $isi = $this->request->getPost('isi');
        $nama = $this->request->getPost('nama');
        $deskripsi = $this->request->getPost('deskripsi');
        $judul = $this->request->getPost('judul');
        $tandatangan = $this->request->getPost('tandatangan');
        $data = [
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'judul' => $judul,
            'isi' => $isi,
            'tandatangan' => $tandatangan
        ];
        $updatedata = $getthemplate->dataUpdate($id, $data);
        if($updatedata){
            session()->setFlashdata('pesan', 'Update data Themplate '.$nama.', Berhasil Disimpan ');
                return redirect()->to('themplate/');
        } else {
            echo "<pre>";
            echo print_r($updatedata->errors());
            echo "</pre>";
        }
    }
    public function seethemplate($id)
    {
        $name = 'surat.pdf';
        $themplate = new DataThemplate();
        $text = $themplate->getById($id);
        $judul = $text['judul'];
        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetMargins(20, 20, 20, true);
        $pdf->AddPage('P','A4');
        $pdf->SetFont('times', '', 14);
        $pdf->setCellHeightRatio(0.9);
        $pdf->SetFillColor(200, 220, 255);
        $pdf->writeHTML($judul);
        // $pdf->Cell(180, 6, $judul, 0, 1, 'C');
        // $pdf->Cell(180, 6, $judul2, 0, 2, 'C');
        // $pdf->Cell(180, 6, $judul3, 0, 3, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->setJPEGQuality(75);
        $pdf->resetColumns();
        $pdf->setEqualColumns(2, 84);  // KEY PART -  number of cols and width
        $pdf->selectColumn();  
        // $pdf->Image('../public/assets/img/tandatangan/kopsurat.png', 0, 5, 200, 45, 'PNG', '', 'N', false, 150, '', false, false, 1, false, false, false);
        // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 30, 85, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        $pdf->writeHTML($text['isi']);
        $pdf->resetColumns();
        $pdf->writeHTML($text['tandatangan']);
        // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 15, null, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        $this->response->setContentType('application/pdf');
        // ob_end_clean();
        $pdf->output($name, 'I');
    }
    public function seepdf($id)
    {
        $name = 'surat.pdf';
        $themplate = new DataThemplate();
        $text = $themplate->getById($id);
        $judul = $text['judul'];
        $tandatangan = $text['tandatangan'];
        $text['isi'] = str_replace("xday", "senin", $text['isi']);
        $text['isi'] = str_replace("xtanggal", "01", $text['isi']);
        $text['isi'] = str_replace("xbulan", "Januari", $text['isi']);
        $text['isi'] = str_replace("xtahun", "2023", $text['isi']);
        $text['isi'] = str_replace("xnama", "Tyko Zidane Badhawi", $text['isi']);
        $text['isi'] = str_replace("xnoktp", "12345678910", $text['isi']);
        $text['isi'] = str_replace("xjeniskelamin", "Laki-laki", $text['isi']);
        $text['isi'] = str_replace("xttl", "Jakarta, 10 Oktober 2000", $text['isi']);
        $text['isi'] = str_replace("xnotelp", "081289078298", $text['isi']);
        $text['isi'] = str_replace("xalamat", "Kp. Baru Desa Kembang Kuning No 09 Rt. 006 Rw. 019, Kec Klapanunggal, Kab.Bogor", $text['isi']);
        
        $text['tandatangan'] = str_replace("xtanggal", "01", $text['tandatangan']);
        $text['tandatangan'] = str_replace("xbulan", "Januari", $text['tandatangan']);
        $text['tandatangan'] = str_replace("xtahun", "2023", $text['tandatangan']);
        $text['tandatangan'] = str_replace("xnama", "Tyko Zidane Badhawi", $text['tandatangan']);
        $text['tandatangan'] = str_replace("xjabatan", "Jr Bussines Developer", $text['tandatangan']);
        $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetMargins(20, 20, 20, true);
        $pdf->AddPage('P','A4');
        $pdf->SetFont('times', '', 14);
        $pdf->setCellHeightRatio(0.9);
        $pdf->SetFillColor(200, 220, 255);
        $pdf->writeHTML($judul);
        // $pdf->Cell(180, 6, $judul, 0, 1, 'C');
        // $pdf->Cell(180, 6, $judul2, 0, 2, 'C');
        // $pdf->Cell(180, 6, $judul3, 0, 3, 'C');
        $pdf->SetFont('times', '', 10);
        $pdf->setJPEGQuality(75);
        // $pdf->resetColumns();
        // $pdf->setEqualColumns(2, 84);  // KEY PART -  number of cols and width
        // $pdf->selectColumn();  
        // $pdf->Image('../public/assets/img/tandatangan/kopsurat.png', 0, 5, 200, 45, 'PNG', '', 'N', false, 150, '', false, false, 1, false, false, false);
        // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 30, 85, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        $pdf->writeHTML($text['isi']);
        $pdf->resetColumns();
        $toolcopy = '<img src="../public/assets/img/tandatangan/ttd_tyok_nobg.png"  width="50" height="50">';
        $text['tandatangan'] = str_replace("xttdpertama", $toolcopy, $text['tandatangan']);
        $text['tandatangan'] = str_replace("xttdkedua", $toolcopy, $text['tandatangan']);
        $pdf->writeHTML($text['tandatangan']);
        // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 15, null, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        $this->response->setContentType('application/pdf');
        // ob_end_clean();
        $pdf->output($name, 'I');
    }
}
