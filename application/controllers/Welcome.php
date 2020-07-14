<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function index()
    {
		$this->load->model('Adminm');

		$data['kelas']=$this->Adminm->getList_kelas();
		$data['jadwal']=$this->Adminm->getList_jadwal();
		$data['mata_pelajaran']=$this->Adminm->getList_matapelajaran();
		$data['siswa']=$this->Adminm->getList_siswa();
		$data['hasil'] = $this->Mpresensi->getList();
        $this->output->enable_profiler(true);
        $this->load->view('presensi',$data);

    }
    public function add($id_presensi=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($this->input->post('id_jadwal')){

       $id_siswa= $this->Mpresensi->getIdSiswaByNisn($this->input->post('nisn'));
            $e = date('Y-m-d h:i:s');
            $c = $this->input->post('keterangan');
            $a = $this->input->post('id_jadwal');
            $d = $this->input->post('nisn');
            $f = $this->input->post('id_presensi');
            //$this->output->enable_profiler(true);
            //$nohp_ortu_wali = nohp_ortu_wali($d);
            //$convert_kata = convert_kata($c);

            //$message = 'Anak anda '.$d.' '.$convert_kata.' pada tanggal '.date('d M Y');

           //$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
                $this->Mpresensi->setData($e,$c,$a,$d,$f);
                //send_sms($nohp_ortu_wali, $message);
                    //Simpan Data Baru
                 //$this->output->enable_profiler(true);
                    $this->Mpresensi->add();

                //redirect('welcome');
            }

        //jika membawa ID, artinya Edit
        $data['judul']= "Tambah Data";
        $data['kelas'] = $this->Adminm->getAllData('kelas');
        $data['jadwal'] = $this->Adminm->getAllData('jadwal');
        $data['mata_pelajaran'] = $this->Adminm->getAllData('mata_pelajaran');
        $data['hasil'] = $this->Adminm->get_all_presensi();
        //$this->output->enable_profiler(true);
         $this->load->view('presensi', $data);
        }
      public function edit($id_presensi=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($this->input->post('id_jadwal')){

       $id_siswa= $this->Mpresensi->getIdSiswaByNisn($this->input->post('nisn'));
            $e = date('Y-m-d h:i:s');
            $c = $this->input->post('keterangan');
            $a = $this->input->post('id_jadwal');
            $d = $id_siswa->id_siswa;
            $f = $this->input->post('id_presensi');
            //$this->output->enable_profiler(true);
            //$nohp_ortu_wali = nohp_ortu_wali($d);
            //$convert_kata = convert_kata($c);

            //$message = 'Anak anda '.$e.' '.$convert_kata.' pada tangga '.date('d M Y');

           // $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
                $this->Mpresensi->setData($e,$c,$a,$d,$f);
                if ($f){
                  //  send_sms($nohp_ortu_wali, $message);
                    //$this->session->set_flashdata('pesan','SMS Telah Dikirim');
                    $this->Mpresensi->edit($f);
                } else {
                    //Simpan Data Baru
                //echo "add kapanggil";
                 //$this->output->enable_profiler(true);
                    $this->Mpresensi->add();

                //redirect('welcome');
            }

        //jika membawa ID, artinya Edit
        $data['judul']= "Tambah Data";
        $data['kelas'] = $this->Adminm->getAllData('kelas');
        $data['mata_pelajaran'] = $this->Adminm->getAllData('mata_pelajaran');
        $data['hasil'] = $this->Adminm->get_all_presensi();
        //$this->output->enable_profiler(true);
           $this->load->view('admin/presensi-add', $data);
        }
			}

			public function ambilHari(){
				$id_kelas = $this->input->post('id_kelas');
				$this->Adminm->get_jadwal($id_kelas);
			}

			public function ambilSiswa(){
				$id_kelas = $this->input->post('id_kelas');
				$this->Adminm->get_siswa_kelas($id_kelas);
			}
			public function ambilMatpel(){
				$id_jadwal = $this->input->post('id_jadwal');
				$this->Adminm->get_matpel($id_jadwal);
			}
}
