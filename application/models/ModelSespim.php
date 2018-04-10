<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelSespim extends CI_Model{

  public function CheckLogin($data){		
    $query =$this->db->get_where('admin',$data);
    return $query;	
  }
  
  public function loadQueryTheBestValue(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('scores', 'scores.id = users.id');
    $db = $this->db->get();
		return $db;
  }

  public function loadQueryRelationPost(){
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->join('users', 'users.id = posts.id');
    $db = $this->db->get();
		return $db;
  }

  public function loadQueryRelation(){
    $this->db->select('*');
    $this->db->from('scores');
    $this->db->join('users', 'scores.id = users.id');
    $this->db->order_by('scores.id','desc');
    $db = $this->db->get();
		return $db;
  }

  public function loadQueryRelationPokUji(){
    $this->db->select('*');
    $this->db->from('pok_uji');
    $this->db->join('kodenaskah', 'kodenaskah.id = pok_uji.id');
    $db = $this->db->get();
		return $db;
  }
  
  public function loadQueryRelationTeams(){    
    $this->db->select('*');
		$this->db->from('teams');
		$this->db->join('users', 'users.id = teams.id');
		$db = $this->db->get();
		return $db;
  }

  public function loadQueryRelationTopics(){    
    $this->db->select('*');
		$this->db->from('topics');
		$this->db->join('users', 'users.id = topics.id');
		$db = $this->db->get();
		return $db;
  }

  public function loadQueryRelationKodeNaskah(){    
    $this->db->select('*');
		$this->db->from('kodenaskah');
		$this->db->join('users', 'kodenaskah.id = users.id');
		$db = $this->db->get();
		return $db;
  }

  public function loadQueryRelationWhere($id){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('scores', 'scores.id = users.id');
    $this->db->where('users.no_serdik',$id);
		$db = $this->db->get("");
		return $db;
  }

  public function loadQueryRelationPostWhere($id){
    $this->db->select('*');
    $this->db->from('posts');
    $this->db->join('users', 'posts.id = users.id');
    $this->db->where('posts.post_id',$id);
		$db = $this->db->get("");
		return $db;
  }

  public function loadQueryLimit(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->select('((scores.score + scores.score2) / 2) as total');
    $this->db->join('scores', 'scores.id = users.id');
    $this->db->order_by('total','desc');
    $this->db->limit('10');
		$db = $this->db->get("");
		return $db;
  }

  public function loadQuery($orderid,$table){
    $this->db->order_by($orderid, 'desc');
		$db = $this->db->get($table);
		return $db;
  }

  public function LoadUsersNotById($id_user){
    $this->db->where('id !=',$id_user);
    $db =$this->db->get('users');
		return $db;
  }
  
  public function insertQuery($table,$data){
		$this->db->insert($table,$data);
  }
  public function insertQueryForeach($table,$data){
    $this->db->insert($table,$data);
  }
  
  public function loadQueryById($where,$id,$table){
		$this->db->where($where,$id);
    $db =$this->db->get($table);
    return $db;
  }

  public function loadQueryUserById($where,$id,$table){
    $this->db->join('users', 'users.id = scores.id');
		$this->db->where($where,$id);
    $db =$this->db->get($table);
    return $db;
  }

  public function loadQueryUserForce58(){
    $this->db->select('*');
    $this->db->from('users');
		$this->db->where('force_of',58);
    $db =$this->db->get();
    return $db;
  }
  
  public function updateQuery($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
  
  public function deleteQuery($idwhere,$id,$table){
    $this->db->where($idwhere, $id);
    $this->db->delete($table);
  }

  public function deleteQueryAll($table){
    $this->db->query("DELETE FROM $table");
  }
  
}