<?php
class presensi2 extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        /*
        if ($this->session->userdata('logged') != true){
            redirect('Login');
        } */
        $this->load->model('MPresensi');
    }
     public function index() {
        $data['hasil'] = $this->Mpresensi->getList();
        $this->load->view('presensi');
    }

    public function add($id_presensi=NULL){
    $this->load->library('form_validation');
    $submit =$this->input->post('nisn');

    if ($submit){
        $cek = nisn($submit);
        if ($cek != $submit) {
            $this->session->set_flashdata('notif','NISN Tidak Terdaftar');
            redirect('absen/presensi2');
        }

        $d = $this->input->post('nisn');
        $e = nama_siswa($submit);
        $c = $this->input->post('keterangan');
      //  $this->output->enable_profiler(true);
            $this->Mpresensi->setData($d,$e,$c);
            if ($d){
                //Simpan Edit Data
                $this->Mpresensi->edit($d);
            } else {
                //Simpan Data Baru
                $this->Mpresensi->add();
            }
           // redirect('absen/presensi2/berhasil');
        
    }
        
        $data['judul']= "Tambah Data";
        $data['hasil'] = $this->Mpresensi->getList();
        $this->load->view('presensi', $data);
    }
      
       public function berhasil()
    {
        echo "Berhasil Presensi";
    } 

    }
?>