<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelLogin extends CI_Model{

	public function CheckLogin($data){		
    $query =$this->db->get_where('admin',$data);
    return $query;	
  }
  
}