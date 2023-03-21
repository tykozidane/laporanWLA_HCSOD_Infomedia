<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DataThemplate;
use TCPDF;

class RequestController extends BaseController
{
    public function index()
    {
        //
    }
    public function tandatangan()
    {
        return view('requestpage/tandatangan');
    }
    public function createagreement()
    {
        return view('agreementpage/createagreement');
    }
    public function addttd()
    {
        $datattd = $this->request->getPost('signed');
        // echo $datattd;
        $datattd2 = 'QyISd7Z2ZnPzDvfnXnmeWbVwYMHDzoSBCAAAQhAIJDAKoQjkBTZIAABCEAgI4BwMBAgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYgAAEIQCCKAMIRhYvMEIAABCCAcDAGIAABCEAgigDCEYWLzBCAAAQggHAwBiAAAQhAIIoAwhGFi8wQgAAEIIBwMAYg0JLA888';
        $ttdkedua = '<img src="@' .$datattd2. '" width="50" height="50">';
        // echo $ttdkedua;
        $name = 'surat.pdf';
        $id = 701162023123541;
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
        $pdf->resetColumns();
        $pdf->setEqualColumns(2, 84);  // KEY PART -  number of cols and width
        $pdf->selectColumn();  
        // $pdf->Image('../public/assets/img/tandatangan/kopsurat.png', 0, 5, 200, 45, 'PNG', '', 'N', false, 150, '', false, false, 1, false, false, false);
        // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 30, 85, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        $pdf->writeHTML($text['isi']);
        $pdf->resetColumns();
        $toolcopy = '<img src="../public/assets/img/tandatangan/ttd_tyok_nobg.png"  width="50" height="50">';
        $text['tandatangan'] = str_replace("xttdpertama", $toolcopy, $text['tandatangan']);
        $text['tandatangan'] = str_replace("xttdkedua", $ttdkedua, $text['tandatangan']);
        $pdf->writeHTML($text['tandatangan']);
        $pdf->writeHTML($ttdkedua, true, false, true, false, '');
        // $pdf->Image('../public/assets/img/tandatangan/ttd_tyok_nobg.png', 15, null, 20, 20, 'PNG', '', '', false, 150, '', false, false, false, false, false, false);
        $this->response->setContentType('application/pdf');
        // ob_end_clean();
        $pdf->output($name, 'I');
    }
    public function formsurat()
    {
        return view('requestpage/formsurat');
    }
    public function dmspage()
    {
        return view('requestpage/dmspage');
    }
    public function savetext()
    {
        // $nama= $this->request->getPost('nama');
        
        
        $text = $this->request->getPost('editordata');
        $nama = $this->request->getPost('nama');
        $themplate = new DataThemplate();
        $auth = service('authentication');
            $userId = $auth->id();
        list($day, $month, $year) = explode("/", date('d/m/Y'));
            $idnya = $userId.$month.$day.$year;
        $datasimpan = [
            'id' => $idnya,
            'nama' => $nama,
            'kategori' => 'pkwtjib',
            'deskripsi' => 'testing',
            'isi' => $text
        ];
        $themplate->insertData($datasimpan);
        $this->seepdf($idnya);
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
    public function seepdf($id)
    {
        $name = 'surat.pdf';
        $themplate = new DataThemplate();
        $text = $themplate->getById($id);
        $text['isi'] = str_replace("day", "senin", $text['isi']);
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
        $pdf->setCellHeightRatio(0.9);
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
        $pdf->writeHTML($text['isi']);
        $pdf->resetColumns();
        $pdf->writeHTML($ttd);
        $this->response->setContentType('application/pdf');
        // ob_end_clean();
        $pdf->output($name, 'I');
    }
}
