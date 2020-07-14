<?php
class guru extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('admin/login');
        } 
        $this->load->model('Mguru');
    }

    public function index()
    {
		$data['home'] = true;
        $data['hasil'] = $this->Mguru->getList();
        $this->load->view('admin/guru-view.php',$data);
    }  
    public function add($id=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nik');
            $b = $this->input->post('nama_guru');
            $c = $this->input->post('status');
            $d = $this->input->post('jenis_kelamin');
            $e = $this->input->post('id_guru');
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mguru->setData($a,$b,$c,$d);
                if ($e){
                    //Simpan Edit Data
                    $this->Mguru->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Mguru->add();
                }
                redirect('admin/guru');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mguru->detail($id);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/guru-add', $data);
        }
        public function delete($id_guru){
            $this->Mguru->delete($id_guru);
            redirect('admin/guru');
        } 
    }
?>