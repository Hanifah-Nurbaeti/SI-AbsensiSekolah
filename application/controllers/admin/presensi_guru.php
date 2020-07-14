<?php
class presensi_guru extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        } 
        $this->load->model('Mpresensi_guru');
    }

    public function index()
    {
        $data['home'] = true;
        $data['hasil'] = $this->Mpresensi_guru->getList();
        $this->load->view('admin/presensiGuru-view.php',$data);
    }  
    public function add($idg=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $d = $this->input->post('nik');
            $e = $this->input->post('nama_guru');
            $c = $this->input->post('keterangan');
            $f = $this->input->post('idg');
            $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mpresensi_guru->setData($d,$e,$c);
                if ($f){
                    $this->Mpresensi_guru->edit($f);
                } else {
                    //Simpan Data Baru
                    $this->Mpresensi_guru->add();
                }
                redirect('admin/presensi_guru');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($idg){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mpresensi_guru->detail($idg);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/presensiGuru-add', $data);
        }
        
    }
?>