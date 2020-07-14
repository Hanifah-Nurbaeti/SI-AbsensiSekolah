<?php 
class Mjadwal extends CI_Model{
	public $table = "jadwal";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($hari,$jam, $id_matapelajaran,$id_kelas){
		$this->b = $hari;
		$this->c = $jam;
		$this->id_matapelajaran = $id_matapelajaran;
		$this->id_kelas = $id_kelas;
	}
	
	public function add(){
		$arrayData = array(
			'hari'  => $this->b,
			'jam'=>$this->c,
			'id_matapelajaran'=>$this->id_matapelajaran,
			'id_kelas'=>$this->id_kelas,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_jadwal){
		$arrayData = array(
			'hari'  => $this->b,
			'jam'=>$this->c,
			'id_matapelajaran'=>$this->id_matapelajaran,
			'id_kelas'=>$this->id_kelas,
			);
		$this->db->where('id_jadwal', $id_jadwal);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_jadwal){
		return $this->db->delete($this->table, array('id_jadwal'=>$id_jadwal));
	}
	
	function detail($id_jadwal){
		$condition = array("id_jadwal"=>$id_jadwal);
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