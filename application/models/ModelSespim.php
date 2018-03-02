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
  public function loadQuery($orderid,$table){
    $this->db->order_by($orderid, 'desc');
		$db = $this->db->get($table);
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
    $this->db->where('post_id',$id);
    $query = $this->db->get('posts');
    $row = $query->row();
    $x = $row->loc_thumbnail;
    
    //$this->db->delete('posts',array('post_id' => $id));
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
    $this->db->where('post_id',$id);
    $query = $this->db->get('posts');
    $row = $query->row();
    $y = $row->loc_file;
    
    //$this->db->delete('posts',array('post_id' => $id));
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