<?php 
class Mkelas extends CI_Model{
	public $table = "kelas";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nama_kelas){
		$this->b = $nama_kelas;
	}
	
	public function add(){
		$arrayData = array(
			'nama_kelas'  => $this->b,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_kelas){
		$arrayData = array(
			'nama_kelas'  => $this->b,

			);
		$this->db->where('id_kelas', $id_kelas);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_kelas){
		return $this->db->delete($this->table, array('id_kelas'=>$id_kelas));
	}
	
	function detail($id_kelas){
		$condition = array("id_kelas"=>$id_kelas);
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