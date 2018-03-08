<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelSespim extends CI_Model{

  public function CheckLogin($data){		
    $query =$this->db->get_where('admin',$data);
    return $query;	
  }
 
  public function loadQueryRelation(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->select('((scores.score + scores.score2) / 2) as total');
    $this->db->join('scores', 'scores.id = users.id');
		$db = $this->db->get("");
		return $db;
  }

  public function loadQueryRelationArticles(){    
    $this->db->select('*');
		$this->db->from('article_categories');
		$this->db->select('article_categories.title as category');
		$this->db->join('articles', 'articles.article_category_id = article_categories.article_category_id');
		$db = $this->db->get();
		return $db;
  }

  public function loadQueryRelationWhere($id){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->select('((scores.score + scores.score2) / 2) as total');
    $this->db->join('scores', 'scores.id = users.id');
    $this->db->where('users.id',$id);
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

  public function loadQueryById($where,$id,$table){
		$this->db->where($where,$id);
    $db =$this->db->get($table);
    return $db;
  }

  public function loadQueryByIdRelation($id){
    $this->db->select('*');
    $this->db->from('article_categories');
    $this->db->select('article_categories.title as category');
    $this->db->join('articles','article_categories.article_category_id = articles.article_category_id');
    $this->db->where('articles.article_id',$id);
    $db =$this->db->get('');
    return $db;
  }

  public function loadQueryUserById($where,$id,$table){
    $this->db->join('users', 'users.id = scores.id');
		$this->db->where($where,$id);
    $db =$this->db->get($table);
    return $db;
  }

  public function loadQueryNotById($id){
		$this->db->where("article_category_id !='$id'");
    $db =$this->db->get('article_categories');
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

  public function deleteImage($id){
    error_reporting(0);
    $this->db->where('article_id',$id);
    $query = $this->db->get('articles');
    $row = $query->row();
    $x = $row->thumbnail_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/opt/lampp/htdocs/sespim/assets/images/articles/'.$x;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

  public function deleteFile($id){
    error_reporting(0);
    $this->db->where('article_id',$id);
    $query = $this->db->get('articles');
    $row = $query->row();
    $y = $row->loc_file;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/opt/lampp/htdocs/sespim/assets/images/articles/'.$y;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

}