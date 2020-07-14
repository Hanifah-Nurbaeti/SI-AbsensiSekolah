<?php
class siswa2 extends CI_Controller {
	
    public function index()
    {
		$data['result'] = $this->Mpresensi->getListsiswa();
        $data['welcome'] = true;
        $this->load->view('welcome_message',$data);
    } 

    public function add($id=NULL){
        $data['welcome'] = true;
         $data['result'] = $this->Mpresensi->getList();
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $nisn = $this->input->post('nisn');
            $this->form_validation->set_rules('nisn', 'NISN', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $error = array();
                // cek apakah sedang dipinjam atau tidak
                if (!$this->Mpresensi->cekpresensi($nomor_kendaraan, true)){
                    $error[] = "Anda berhasil melakukan presensi ".$nisn;
                }
                if (!$error){
                    $data['result'] = $this->Mpresensi->getList($nisn);
                } else {
                    $data['error'] = $error;
                    $data['result'] = $this->Mpresensi->getList();
                }
            }
        }
        $this->load->view('welcome_message', $data);
    } 

    
}