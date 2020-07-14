<?php
class guru_presensi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        /*
        if ($this->session->userdata('logged') != true){
            redirect('Login');
        } */
        $this->load->model('MpresensiGuru2');
    }
     public function index() {
        $this->load->view('index');
    }

    public function add($idg=NULL){
    $this->load->library('form_validation');
    $submit =$this->input->post('nik');

    if ($submit){
        $cek = nik ($submit);
        if ($cek != $submit) {
            $this->session->set_flashdata('notif','nik Tidak Terdaftar');
            redirect('absen/guru_presensi');
        }

       $d = $this->input->post('nik');
        $e = nama_guru($submit);
        $c = $this->input->post('keterangan');
     // $this->output->enable_profiler(true);
            $this->Mpresensi_guru->setData($d,$e,$c);
            if ($d){
                //Simpan Edit Data
                $this->Mpresensi_guru->edit($d);
            } else {
                //Simpan Data Baru
                $this->Mpresensi_guru->add();
            }
           // redirect('absen/guru_presensi/berhasil');
        
    }
        
        $data['judul']= "Tambah Data";
        $data['hasil'] = $this->MpresensiGuru2->getList();
        $this->load->view('index', $data);

    }
       public function berhasil()
    {
        echo "Berhasil Presensi";
    } 

    }
?>