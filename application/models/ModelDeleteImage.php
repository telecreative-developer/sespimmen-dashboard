<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelDeleteImage extends CI_Model{

  public function deleteImage($id){
    error_reporting(0);
    $this->db->where('event_id',$id);
    $query = $this->db->get('events');
    $row = $query->row();
    $x = $row->thumbnail_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/var/www/sespim/assets/images/events/'.$x;
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
    $this->db->where('document_id',$id);
    $query = $this->db->get('documents');
    $row = $query->row();
    $x = $row->document_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/var/www/sespim/assets/images/documents/'.$x;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

  public function deleteFileAkademik($id){
    error_reporting(0);
    $this->db->where('score_id',$id);
    $query = $this->db->get('scores');
    $row = $query->row();
    $x = $row->akademik_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/var/www/sespim/assets/images/scores/'.$x;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

  public function deleteFileKepribadian($id){
    error_reporting(0);
    $this->db->where('score_id',$id);
    $query = $this->db->get('scores');
    $row = $query->row();
    $x = $row->kepribadian_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/var/www/sespim/assets/images/scores/'.$x;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

  public function deleteFileKesehatan($id){
    error_reporting(0);
    $this->db->where('score_id',$id);
    $query = $this->db->get('scores');
    $row = $query->row();
    $x = $row->kesehatan_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/var/www/sespim/assets/images/scores/'.$x;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

  public function deleteFileUjian($id){
    error_reporting(0);
    $this->db->where('pokuji_document_id',$id);
    $query = $this->db->get('pokuji_documents');
    $row = $query->row();
    $x = $row->document_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/var/www/sespim/assets/images/ujian/'.$x;
    if($this->db->affected_rows() >= 1){
      if(unlink($path)){
        return TRUE;
        } else {
            return FALSE;
        }
    }else{

    }
  }

  public function deletebanner($id){
    error_reporting(0);
    $this->db->where('banner_id',$id);
    $query = $this->db->get('banners');
    $row = $query->row();
    $x = $row->banner_loc;
    
    //$this->db->delete('articles',array('article_id' => $id));
    $path ='/var/www/sespim/assets/images/banners/'.$x;
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