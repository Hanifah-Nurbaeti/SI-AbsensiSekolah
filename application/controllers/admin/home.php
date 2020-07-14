<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Supono | @soepono
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
 class home extends CI_Controller{
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata('isLogin') and (!$this->session->userdata('level')=='admin')){
			redirect('admin/login');
		} 

	}
	
	public function index(){

		$this->load->model('mpresensi');
		
		$data['main_menu'] = "dash";
		$data['result'] = $this->mpresensi->getList_siswa();
		$data['resultx'] = $this->mpresensi->getList_guru();
      
  	
		$this->load->view('admin/dashboard', $data);
	}
		
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}
 }
 ?>