<?php 
class Mpresensi extends CI_Model{
	public $table = "presensi";
	public $table2 = "siswa";
	function __construct(){
		parent::__construct();
	}

	public function setData($tanggal,$keterangan,$id_jadwal,$id_siswa){

		$this->e = $tanggal;
		$this->c = $keterangan;
		$this->a = $id_jadwal;
		$this->d = $id_siswa;	
	}
	
	public function add(){
		$arrayData = array(
			'tanggal'  => $this->e,
			'keterangan'=>$this->c,
			'id_jadwal' => $this->a,
			'id_siswa'  => $this->d,
			
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_presensi){
		$arrayData = array(
			'tanggal'  => $this->e,
			'keterangan'=>$this->c,
			'id_jadwal' => $this->a,
			'id_siswa'  => $this->d,
			
			);

		$this->db->where('id_presensi', $id_presensi);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function getdatareport($tgl_awal, $tgl_akhir) {
	 $query = $this->db->query("SELECT * FROM presensi WHERE (tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir') ORDER BY tanggal DESC");
		return $query;
	}
	
	
	public function detail($id_presensi){
		$condition = array("id_presensi"=>$id_presensi);
		$query = $this->db->get_where($this->table,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}	

	public function getIdSiswaByNisn($id){
		$condition = array("nisn"=>$id);
		$query = $this->db->get_where($this->table2,$condition);	
		if($query->num_rows() > 0){
			return $query->row();
		} else {
			return false;
		}
	}	
	
	   public function getLapCetak($tgl_awal,$tgl_akhir){
      return $this->db->query("SELECT *,sum(keterangan) as total_all from presensi 
            where tanggal between '$tgl_awal' and '$tgl_akhir'
           ")->result();
    }

   public function getLapCetak1($tgl_awal,$tgl_akhir){
        return $this->db->query("SELECT * from presensi a left join siswa b on a.id_siswa=b.id_siswa where tanggal between '$tgl_awal' and '$tgl_akhir'")->result();
    }
	public function getTotal(){
		return $this->db->count_all_results($this->tnews);
	}
	
}
?>,.
