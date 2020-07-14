<?php
class laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        } 
        $this->load->model('Mpresensi');
    }

    public function index() {
        $data['home'] = true;
        $data['hasil'] = $this->Adminm->get_group_presensi();
        $this->load->view('admin/laporan-presensi-view.php',$data);
    }

    public function detail($bulan, $tahun) {
        $data['home'] = true;
        $data['hasil'] = $this->Adminm->select_group_presensi($bulan, $tahun);
        $this->load->view('admin/laporan-presensi-detail.php',$data);
    }
        
    }
?>