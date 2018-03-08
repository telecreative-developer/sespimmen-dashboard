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
    $path ='/opt/lampp/htdocs/sespim/assets/images/events/'.$x;
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