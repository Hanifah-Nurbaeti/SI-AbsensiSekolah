<?php 
class Msiswa extends CI_Model{
	public $table = "siswa";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nisn,$nama_siswa,$jenis_kelamin,$alamat,$nama_ortu_wali,$nohp_ortu_wali,$id_kelas){
		$this->a = $nisn;
		$this->b = $nama_siswa;
		$this->c = $jenis_kelamin;
		$this->e = $alamat;
		$this->f = $nama_ortu_wali;
		$this->g = $nohp_ortu_wali;
		$this->id_kelas = $id_kelas;
	}
	
	public function add(){
		$arrayData = array(
			'nisn'=>$this->a,
			'nama_siswa'  => $this->b,
			'jenis_kelamin'=>$this->c,
			'alamat'=>$this->e,
			'nama_ortu_wali'=>$this->f,
			'nohp_ortu_wali'=>$this->g,
			'id_kelas'=>$this->id_kelas,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_siswa){
		$arrayData = array(
			'nisn'=>$this->a,
			'nama_siswa'  => $this->b,
			'jenis_kelamin'=>$this->c,
			'alamat'=>$this->e,
			'nama_ortu_wali'=>$this->f,
			'nohp_ortu_wali'=>$this->g,
			'id_kelas'=>$this->id_kelas,
			);
		// print_r($arrayData); exit;
		$this->db->where('id_siswa', $id_siswa);
		return $this->db->update($this->table, $arrayData); 
	}	

	public function getNameSiswa($id) {
		$cari = $this->db->query("SELECT nama_siswa FROM siswa WHERE id_siswa = '$id'")->result();
		return $cari[0]->nama_siswa;
	}
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_siswa){
		return $this->db->delete($this->table, array('id_siswa'=>$id_siswa));
	}
	
	function detail($id_siswa){
		$condition = array("id_siswa"=>$id_siswa);
		$query = $this->db->get_where($this->table,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}	
	
	public function getTotal(){
		return $this->db->count_all_results($this->tnews);
	}
	
}
?>