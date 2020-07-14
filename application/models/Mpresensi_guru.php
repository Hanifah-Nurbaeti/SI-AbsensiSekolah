<?php 
class Mpresensi_guru extends CI_Model{
	public $table = "presensi_guru";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nik,$nama_guru,$keterangan){
		$this->d = $nik;
		$this->e = $nama_guru;
		$this->c = $keterangan;
	}
	
	public function add(){
		$arrayData = array(
			'nik'=>$this->d,
			'nama_guru'=>$this->e,
			'keterangan'=>$this->c,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($idg){
		$arrayData = array(
			'nik'=>$this->d,
			'nama_guru'=>$this->e,
			'keterangan'=>$this->c,
			);
		
		$this->db->where('idg', $idg);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	
	public function detail($idg){
		$condition = array("idg"=>$idg);
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