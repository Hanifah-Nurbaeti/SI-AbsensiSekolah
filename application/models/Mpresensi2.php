<?php 
class Mpresensi2 extends CI_Model{
	public $table = "presensi";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nisn,$nama_siswa,$keterangan){
		$this->d = $nisn;
		$this->e = $nama_siswa;
		$this->c = $keterangan;
	}
	
	public function add(){
		$arrayData = array(
			'nisn'=>$this->d,
			'nama_siswa'=>$this->e,
			'keterangan'=>$this->c,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($nisn){
		$arrayData = array(
			'nisn'=>$this->d,
			'nama_siswa'=>$this->e,
			'keterangan'=>$this->c,
			);
		
		$this->db->where('nisn', $nisn);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	
	public function detail($nisn){
		$condition = array("nisn"=>$nisn);
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