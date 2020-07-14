<?php
class login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Muser');
    }

    function index(){
        $this->load->view('admin/login');
    }

    function auth(){
        $username = $this->input->post('username');
            $password = $this->input->post('password');

        $cek_admin=$this->Muser->auth_user($username,$password);

        if($cek_admin->num_rows() > 0){ //jika login sebagai dosen
                        $data=$cek_admin->row_array();
                $this->session->set_userdata('logged',TRUE);
                 if($data['level']=='admin'){ //Akses admin
                    $this->session->set_userdata('level','admin');
                    $this->session->set_userdata('ses_id',$data['id_user']);
                    $this->session->set_userdata('ses_nama',$data['nama_user']);
                    redirect('admin/sekul');

                 }else{ //akses dosen
                    $this->session->set_userdata('level','kepala');
                                $this->session->set_userdata('ses_id',$data['id_user']);
                    $this->session->set_userdata('ses_nama',$data['nama_user']);
                    redirect('admin/sekul');
                 }
            }else {
                $this->session->set_flashdata('pesan', 'Username atau Password Anda salah');
                redirect('admin/login');
            }
        }

    }

     function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }

