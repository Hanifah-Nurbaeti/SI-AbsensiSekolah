<?php
class presensi extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        }
        $this->load->model('Mpresensi');
    }

    public function index()
    {
        $data['home'] = true;
        $data['hasil'] = $this->Adminm->get_all_presensi();
        $data['jadwal'] = $this->Adminm->get_all_jadwal();
        $data['guru'] = $this->Adminm->get_all_jadwal();
        $data['mata_pelajaran'] = $this->Adminm->get_all_jadwal();
        $data['kelas'] = $this->Adminm->get_all_siswa();
        $this->load->view('admin/presensi-view',$data);
    }

   public function cari(){
        $tgl_awal= date('Y-m-d',strtotime($this->input->post('tgl_awal')));
        $tgl_akhir= date('Y-m-d',strtotime($this->input->post('tgl_akhir')));
        $sess_data=array(
            'tgl_awal'=>$tgl_awal,
            'tgl_akhir'=>$tgl_akhir
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dt_result'=> $this->Mpresensi->getLapCetak($tgl_awal,$tgl_akhir),
            'data_result'=> $this->Mpresensi->getLapCetak1($tgl_awal,$tgl_akhir),
            'tgl_awal'=>date('Y-m-d',strtotime($this->session->userdata('tgl_awal'))),
            'tgl_akhir'=>date('Y-m-d',strtotime($this->session->userdata('tgl_akhir'))),
        );
        $this->load->view('admin/laporan-absen2',$data);
    }

    public function caridata() {
        $tglawal  = date("Y-m-d",strtotime($this->input->post('tgl_awal')));
        $tglakhir = date("Y-m-d",strtotime($this->input->post('tgl_akhir')));

        $data["laporan"] = $this->db->query("SELECT * FROM presensi WHERE tanggal BETWEEN '$tglawal' AND '$tglakhir' ORDER BY tanggal DESC");
        if ($data["laporan"]->num_rows() > 0) {
            $this->load->view('admin/table_laporan',$data);
            // print_r($data->result());
        } else {
            echo "data tidak ada";
        }
    }

    public function kirim_sms($id)
    {

        $data_siswa = $this->Adminm->getAllData('siswa')
        ;

        foreach ($data_siswa as $key) {
            $nama_siswa = nama_siswa($id);

            $message = $nama_siswa.' hadir dikelas full ';
            send_sms($nohp_ortu_wali, $message);
                    $this->session->set_flashdata('pesan','SMS Telah Dikirim');
           
        }
        $this->session->set_flashdata('pesan','SMS telah dikirim');
        redirect("admin/presensi");
    }  
    public function add($id_presensi=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $e = $this->input->post('tanggal');
            $c = $this->input->post('keterangan');
            $a = $this->input->post('id_jadwal');
            $d = $this->input->post('nisn');
            $f = $this->input->post('id_presensi');

            $this->output->enable_profiler(true);
           //  $nohp_ortu_wali = nohp_ortu_wali($d);
           $convert_kata = convert_kata($c);
           //
           //  $message = 'Anak anda '.$e.' '.$convert_kata.' pada tangga '.date('d M Y');
           //
           // $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mpresensi->setData($e,$c,$a,$d,$f);
                if ($f){
                   send_sms($nohp_ortu_wali, $message);
                    $this->session->set_flashdata('pesan','SMS Telah Dikirim');
                    $this->Mpresensi->edit($f);
                } else {
                    //Simpan Data Baru
                    $this->Mpresensi->add();
                }
                redirect('admin/presensi');
            }
        }
        //jika membawa ID, artinya Edit
            if ($id_presensi){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mpresensi->detail($id_presensi);

            }
            $data['judul']= "Tambah Data";
            $data['jadwal']= $this->Adminm->getAllData('jadwal');
            $data['guru']= $this->Adminm->getAllData('guru');
            $data['mata_pelajaran']= $this->Adminm->getAllData('mata_pelajaran');
            $data['siswa']= $this->Adminm->getAllData('siswa');
            $this->load->view('presensi', $data);
        }

  public function laporan() {
      $data['home'] = true;
      // $data['hasil'] = $this->Adminm->get_all_presensi();
      // $data['jadwal'] = $this->Adminm->get_all_jadwal();
      // $data['guru'] = $this->Adminm->get_all_jadwal();
      // $data['mata_pelajaran'] = $this->Adminm->get_all_jadwal();
      // $data['kelas'] = $this->Adminm->get_all_siswa();
      $data['laporan'] = $this->Adminm->get_siswa();

      $this->load->view('admin/laporan-absen',$data);
  }

    }
?>
