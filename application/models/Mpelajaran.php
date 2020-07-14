<?php 
class Mpelajaran extends CI_Model{
	public $table = "mata_pelajaran";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($kode,$nama_matapelajaran,$id_guru){
		$this->a = $kode;
		$this->b = $nama_matapelajaran;
		$this->id_guru = $id_guru;
	}
	
	public function add(){
		$arrayData = array(
			'kode'=>$this->a,
			'nama_matapelajaran'  => $this->b,
			'id_guru' => $this->id_guru,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_matapelajaran){
		$arrayData = array(
			'kode'=>$this->a,
			'nama_matapelajaran'  => $this->b,
			'id_guru' => $this->id_guru,

			);
		$this->db->where('id_matapelajaran', $id_matapelajaran);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_matapelajaran){
		return $this->db->delete($this->table, array('id_matapelajaran'=>$id_matapelajaran));
	}
	
	function detail($id_matapelajaran){
		$condition = array("id_matapelajaran"=>$id_matapelajaran);
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