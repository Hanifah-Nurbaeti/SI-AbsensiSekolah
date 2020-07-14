<?php 
class Mguru extends CI_Model{
	public $table = "guru";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nik,$nama_guru,$status,$jenis_kelamin){
		$this->a = $nik;
		$this->b = $nama_guru;
		$this->c = $status;
		$this->d = $jenis_kelamin;
	}
	
	public function add(){
		$arrayData = array(
			'nik'=>$this->a,
			'nama_guru'  => $this->b,
			'status'=>$this->c,
			'jenis_kelamin'=>$this->d,

		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_guru){
		$arrayData = array(
			'nik'=>$this->a,
			'nama_guru'  => $this->b,
			'status'=>$this->c,
			'jenis_kelamin'=>$this->d,

			);
		$this->db->where('id_guru', $id_guru);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_guru){
		return $this->db->delete($this->table, array('id_guru'=>$id_guru));
	}
	
	function detail($id_guru){
		$condition = array("id_guru"=>$id_guru);
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