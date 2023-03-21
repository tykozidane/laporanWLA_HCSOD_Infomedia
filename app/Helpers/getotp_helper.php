<?php
use App\Models\DataOtpReward;
use App\Models\Dataabsen;
use App\Models\DataClaimReward;

function cekOtpNik($nik)
{
    $modelotp = new DataOtpReward();
    $dataotp = $modelotp->getByNik($nik);
    if(empty($dataotp)){
        return false;
    }else if($dataotp['status'] == "expired"){
        return false;
    }else{
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $tgl1 = strtotime($dataotp['created_at']);
        $tgl2 = strtotime($date);
        $sisa = $tgl2 -$tgl1;
        $jarak = $sisa/60/60/24;
        if($jarak > 1){
            $data= [
                'status' => "expired"
            ];
            $modelotp->dataUpdate($dataotp['kode_otp'], $data);
            return false;
        } else {
            return true;
        }
    }
}
function permissionReward($kode_otp)
{
    $modelotp = new DataOtpReward();
    $dataotp = $modelotp->getByKode($kode_otp);
    if(empty($dataotp)){
        return false;
    }else if($dataotp['status'] == "expired"){
        return false;
    }else{
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $tgl1 = strtotime($dataotp['created_at']);
        $tgl2 = strtotime($date);
        $sisa = $tgl2 - $tgl1;
        $jarak = $sisa/60/60;
        $status = "expired";
        if($jarak > 1){
            $datasimpan= [
                'status' => "expired"
            ];
            $modelotp->dataUpdate($kode_otp, $datasimpan);
            return false;
        } else {
            return $dataotp['nik'];
        }
    }
}
function countPoin($nik)
{
    $modelAbsen = new Dataabsen();
    $dataabsen = $modelAbsen->getcekpoin($nik);
    $modelClaimReward = new DataClaimReward();
    $dataclaimreward = $modelClaimReward->getByNik($nik);
    $poin = 0;
    $minus = 0;
    if(!empty($dataabsen)){
        foreach($dataabsen as $absen){
        $poin = $poin + $absen['nilai'];
    }
    }
    if(!empty($dataclaimreward)){
        foreach($dataclaimreward as $claim){
        $minus = $minus + $claim['price'];
    }
    }
    
    $poin = $poin - $minus;
    return $poin;
}