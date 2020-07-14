<?php
class jadwal extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        } 
        $this->load->model('Mjadwal');
    }

    public function index()
    {
		$data['home'] = true;
        $data['hasil'] = $this->Adminm->get_all_jadwal();
        $this->load->view('admin/jadwal-view.php',$data);
    }  
    public function add($id_jadwal=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $b = $this->input->post('hari');
            $c = $this->input->post('jam');
            $d = $this->input->post('id_jadwal');
            $id_matapelajaran = $this->input->post('id_matapelajaran');
            $id_kelas = $this->input->post('id_kelas');

            $this->form_validation->set_rules('hari', 'Hari', 'required');
            $this->form_validation->set_rules('jam', 'Jam', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mjadwal->setData($b,$c, $id_matapelajaran,$id_kelas);
                if ($d){
                    //Simpan Edit Data
                    $this->Mjadwal->edit($d);
                } else {
                    //Simpan Data Baru
                    $this->Mjadwal->add();
                }
                redirect('admin/jadwal');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_jadwal){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mjadwal->detail($id_jadwal);
            }
            $data['judul']= "Tambah Data";
            $data['mata_pelajaran']= $this->Adminm->getAllData('mata_pelajaran');
            $data['kelas']= $this->Adminm->getAllData('kelas');
            $this->load->view('admin/jadwal-add', $data);
        }
        
    }
?>