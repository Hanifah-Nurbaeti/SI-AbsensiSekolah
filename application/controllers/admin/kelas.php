<?php
class kelas extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        } 
        $this->load->model('Mkelas');
    }

    public function index()
    {
		$data['home'] = true;
        $data['hasil'] = $this->Mkelas->getList();
        $this->load->view('admin/kelas-view.php',$data);
    }  
    public function add($id_kelas=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $b = $this->input->post('nama_kelas');
            $c = $this->input->post('id_kelas');
            $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mkelas->setData($b);
                if ($c){
                    //Simpan Edit Data
                    $this->Mkelas->edit($c);
                } else {
                    //Simpan Data Baru
                    $this->Mkelas->add();
                }
                redirect('admin/kelas');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_kelas){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mkelas->detail($id_kelas);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/kelas-add', $data);
        }
        public function delete($id_kelas){
            $this->Mpelajaran->delete($id_kelas);
            redirect('admin/kelas');
        } 
    }
?>