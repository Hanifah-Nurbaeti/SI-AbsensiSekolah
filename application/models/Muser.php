<?php
class Muser extends CI_Model {
    public $table = "user";
    public function __construct()
    {
        parent::__construct();
    }
    function auth_user($username,$password){
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
        public function setData($nama_user,$username,$password,$level){
        $this->a = $nama_user;
        $this->b = $username;
        $this->c = $password;
        $this->d = $level;
    }
    
    public function add(){
        $arrayData = array(
            'nama_user'=>$this->a,
            'username'  => $this->b,
            'password'=>$this->c,
            'level'=>$this->d,

        );
        return $this->db->insert($this->table, $arrayData); 
    }
    
    public function edit($id_user){
        $arrayData = array(
            'nama_user'=>$this->a,
            'username'  => $this->b,
            'password'=>$this->c,
            'level'=>$this->d,

            );
        $this->db->where('id_user', $id_user);
        return $this->db->update($this->table, $arrayData); 
    }   
    
    public function getList(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function delete($id_user){
        return $this->db->delete($this->table, array('id_user'=>$id_user));
    }
    
    function detail($id_user){
        $condition = array("id_user"=>$id_user);
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