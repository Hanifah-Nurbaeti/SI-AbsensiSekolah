<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
Source Code by : Aldy Muldani
Email : dieabra@gmail.com
Github : https://github.com/alldie1207
Line : alldie1207
*/

if ( ! function_exists('mine_helper'))

{

    function send_sms($cellPhone, $message)
    {


    $userkey = "kvly69";
    $passkey = "team-project";
    $url = "https://reguler.zenziva.net/apps/smsapi.php";

    $curlHandle = curl_init();
    curl_setopt($curlHandle, CURLOPT_URL, $url);
    curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$cellPhone.'&pesan='.urlencode($message));
    curl_setopt($curlHandle, CURLOPT_HEADER, 0);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
    curl_setopt($curlHandle, CURLOPT_POST, 1);

    $results = curl_exec($curlHandle);
    curl_close($curlHandle);

    }

    function nisn($id) {
        global $CI;
        $data = '';

        $nisn['nisn']=$id;
        $data_agenda = $CI->Adminm->getSelectedData('presensi',$nisn);
        foreach ($data_agenda as $row) {
          $data = $row->nisn;
        }

        return $data;
    }

    function nama_siswa($id) {
        global $CI;
        $data = '';

        $nisn['nisn']=$id;
        $data_agenda = $CI->Adminm->getSelectedData('siswa',$nisn);
        foreach ($data_agenda as $row) {
          $data = $row->nama_siswa;
        }

        return $data;
    }

    function nohp_ortu_wali($id) {
        global $CI;
        $data = '';

        $nisn['nisn']=$id;
        $data_agenda = $CI->Adminm->getSelectedData('siswa',$nisn);
        foreach ($data_agenda as $row) {
          $data = $row->nohp_ortu_wali;
        }

        return $data;

    }

function convert_kata($key) {
    global $CI;

    switch ($key) {
      case 's':
        $bulan = 'Sakit';
        break;
      case 'i':
        $bulan = 'Izin';
        break;
      case 'a':
        $bulan = 'Alfa';
        break;
      case 'h':
        $bulan = 'Hadir';
        break;
    }

    return $bulan; //print tanggal
}



function convert_month($month) {
    global $CI;

    switch ($month) {
      case '01':
        $bulan = 'Januari';
        break;
      case '02':
        $bulan = 'Febuari';
        break;
      case '03':
        $bulan = 'Maret';
        break;
      case '04':
        $bulan = 'April';
        break;
      case '05':
        $bulan = 'Mei';
        break;
      case '06':
        $bulan = 'Juni';
        break;
      case '07':
        $bulan = 'Juli';
        break;
      case '08':
        $bulan = 'Agustus';
        break;
      case '09':
        $bulan = 'September';
        break;
      case '10':
        $bulan = 'Oktober';
        break;
      case '11':
        $bulan = 'November';
        break;
      case '12':
        $bulan = 'Desember';
        break;
      default:
        $bulan = 'Januari';
        break;
    }

    return $bulan; //print tanggal
}


}