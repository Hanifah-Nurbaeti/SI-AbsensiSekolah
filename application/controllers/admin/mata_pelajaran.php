<?php
class mata_pelajaran extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        } 
        $this->load->model('Mpelajaran');
    }

    public function index()
    {
		$data['home'] = true;
        $data['hasil'] = $this->Adminm->get_all_jadwal();
        $this->load->view('admin/pelajaran-view.php',$data);
    }  
    public function add($id_matapelajaran=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode');
            $b = $this->input->post('nama_matapelajaran');
            $c = $this->input->post('id_matapelajaran');
            $id_guru = $this->input->post('id_guru');
            $this->form_validation->set_rules('kode', 'Kode', 'required');
            $this->form_validation->set_rules('nama_matapelajaran', 'Nama Mata Pelajaran', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mpelajaran->setData($a,$b,$id_guru);
                if ($c){
                    //Simpan Edit Data
                    $this->Mpelajaran->edit($c);
                } else {
                    //Simpan Data Baru
                    $this->Mpelajaran->add();
                }
                redirect('admin/mata_pelajaran');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_matapelajaran){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mpelajaran->detail($id_matapelajaran);

            }
            $data['judul']= "Tambah Data";
            $data['guru']= $this->Adminm->getAllData('guru');
            $this->load->view('admin/pelajaran-add', $data);
        }
       
    }
?>