<?php
class presensi3 extends CI_Controller {
    
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
        $data['home'] = true;
        $data['hasil'] = $this->Adminm->get_all_presensi();
        $this->load->view('welcome_message',$data);
    }

    public function add($id_presensi=NULL){
    $this->load->library('form_validation');
    $submit =$this->input->post('submit');
    if ($submit)
        $d = $this->input->post('nisn');
        $e = $this->input->post('nama_siswa');
        $c = $this->input->post('keterangan');
        $f = $this->input->post('id_presensi');
        $id_siswa = $this->input->post('id_siswa');
      //  $this->output->enable_profiler(true);
            $this->Mpresensi2->setData($d,$e,$c,$id_siswa);
            if ($f){
                //Simpan Edit Data
                $this->Mpresensi2->edit($f);
            } else {
                //Simpan Data Baru
                $this->Mpresensi2->add();
            }
           // redirect('absen/presensi2/berhasil');
        
        
       $data['judul']= "Tambah Data";
       $data['siswa']= $this->Adminm->getAllData('siswa');
        $this->load->view('welcome_message', $data);
    }
      
       public function berhasil()
    {
        echo "Berhasil Presensi";
    } 

    }
?>