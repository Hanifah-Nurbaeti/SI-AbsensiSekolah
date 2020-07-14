<?php

class Adminm extends CI_Model{

// ===========================================          Script         ======================================= //
// ===========================================                         ======================================= //s

    public function getAllData($table)
    {
        return $this->db->get($table)->result();
    }

    public function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data)->result();
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    public function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function get_group_presensi(){
        return $this->db->query("
            SELECT *, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun, COUNT(c.nisn) as jumlah
            FROM presensi a
            INNER JOIN siswa c ON a.nisn = c.nisn
            GROUP BY MONTH(a.tanggal), YEAR(a.tanggal)
        ")->result();
    }

    function select_group_presensi($bulan, $tahun){
        return $this->db->query("
            SELECT *, MONTH(a.tanggal) as bulan, YEAR(a.tanggal) as tahun
            FROM presensi a
            INNER JOIN siswa c ON a.nisn = c.nisn
            WHERE MONTH(a.tanggal) = '$bulan' AND YEAR(a.tanggal) = '$tahun'
        ")->result();
    }

    function get_all_siswa(){
        return $this->db->query("
            SELECT *
            FROM siswa a
            INNER JOIN kelas c ON a.id_kelas = c.id_kelas
        ")->result();
    }

    function get_all_jadwal(){
        return $this->db->query("
            SELECT *
            FROM jadwal a
            INNER JOIN mata_pelajaran c ON a.id_matapelajaran = c.id_matapelajaran
            INNER JOIN kelas d ON a.id_kelas = d.id_kelas
            INNER JOIN guru b ON c.id_guru = b.id_guru
        ")->result();
    }

    function get_all_presensi (){
        return $this->db->query("
            SELECT *
            FROM presensi a
            JOIN jadwal b ON a.id_jadwal = b.id_jadwal
            JOIN mata_pelajaran c ON b.id_matapelajaran = c.id_matapelajaran
            JOIN guru d ON c.id_guru = d.id_guru
            JOIN kelas f ON b.id_kelas = f.id_kelas
            JOIN siswa e ON a.id_siswa = e.id_siswa

            ")->result();
    }
    function getList_presensi(){
        $query = $this->db->get('presensi');
        return $query->result();
    }
    function getList_jadwal(){
        $query = $this->db->get('jadwal');
        return $query->result();
    }

    function getList_kelas(){
        $query = $this->db->get('kelas');
        return $query->result();
    }
    function getList_matapelajaran(){
        $query = $this->db->get('mata_pelajaran');
        return $query->result();
    }
    function getList_siswa(){
        $query = $this->db->get('siswa');
        return $query->result();
    }
    // function get_laporan(){
    //     return $this->db->query("
    //       SELECT DISTINCT id_siswa,id_presensi, (SELECT COUNT(keterangan) FROM presensi WHERE (keterangan = 's')) AS s, (SELECT COUNT(keterangan) FROM presensi WHERE (keterangan = 'h')) AS h, (SELECT COUNT(keterangan) FROM presensi WHERE(keterangan = 'i')) AS i, (SELECT COUNT(keterangan) FROM presensi WHERE(keterangan = 'a')) AS a, (SELECT COUNT(keterangan) FROM presensi WHERE (keterangan = 's') OR (keterangan = 'h') OR (keterangan = 'i') OR (keterangan = 'a')) AS Total FROM presensi
    //     ")->result_array();
    // }

    function get_siswa()
    {
      return $this->db->query("
      SELECT * from siswa")->result_array();
    }

    function get_laporan($id_siswa)
    {
      $array = [];
      $wakwaw = $this->db->query("
      select count(*) as jml,keterangan from presensi where id_siswa = $id_siswa group by keterangan")->result_array();
      $h = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='h'")->result_array();
      $s = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='s'")->result_array();
      $i = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='i'")->result_array();
      $a = $this->db->query("select count(*) as jml from presensi where id_siswa = $id_siswa AND keterangan='a'")->result_array();
      // return $wakwaw ;
      array_push($array,...$s,...$i,...$a,...$h);
      return $array;
    }

    function get_jadwal($id_kelas){
      $wakwaw = $this->db->query("
      select * from jadwal where id_kelas = $id_kelas")->result_array();
      $new = json_encode($wakwaw);
      echo $new;
    }

    function get_siswa_kelas($id_kelas){
      $wakwaw = $this->db->query("
      select * from siswa where id_kelas = $id_kelas")->result_array();
      $new = json_encode($wakwaw);
      echo $new;
    }

    function get_matpel($id_jadwal){
      $wakwaw = $this->db->query("
      select * from mata_pelajaran where id_jadwal = $id_jadwal")->result_array();
      $new = json_encode($wakwaw);
      echo $new;
    }

}
