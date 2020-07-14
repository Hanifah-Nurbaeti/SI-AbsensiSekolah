<?php
class siswa extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        } 
        $this->load->model('Msiswa');
    }

    public function index()
    {
		$data['home'] = true;
        $data['hasil'] = $this->Adminm->get_all_siswa();
        $this->load->view('admin/siswa-view.php',$data);
    }  
    public function add($id_siswa=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nisn');
            $b = $this->input->post('nama_siswa');
            $d = $this->input->post('jenis_kelamin');
            $e = $this->input->post('alamat');
            $f = $this->input->post('nama_ortu_wali');
            $g = $this->input->post('nohp_ortu_wali');
            $h = $this->input->post('id_siswa');
            $id_kelas = $this->input->post('id_kelas');
            $this->form_validation->set_rules('nisn', 'NISN', 'required');
            $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Msiswa->setData($a,$b,$d,$e,$f,$g, $id_kelas);
                if ($h){
                    //Simpan Edit Data
                    $this->Msiswa->edit($h);
                } else {
                    //Simpan Data Baru
                    $this->Msiswa->add();
                }
                redirect('admin/siswa');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_siswa){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Msiswa->detail($id_siswa);

            }
            $data['judul']= "Tambah Data";
            $data['kelas']= $this->Adminm->getAllData('kelas');
            $this->load->view('admin/siswa-add', $data);
        }
        
        
    }
?>