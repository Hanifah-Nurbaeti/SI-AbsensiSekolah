<?php
class sekul extends CI_Controller {
    function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('logged') != TRUE){
            redirect('admin/login');
        }
  }

 function index()
    {
        $this->load->view('admin/dashboard');
    }  
}
?>