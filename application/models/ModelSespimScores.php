<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelSespimScores extends CI_Model{

  public function CheckLogin($data){		
    $query =$this->db->get_where('admin',$data);
    return $query;	
  }

  public function loadQueryAcademic(){
    $this->db->select('*');
    $this->db->from('academic_scores');
    $this->db->join('academic_categories', 'academic_scores.academic_category_id = academic_categories.academic_category_id');
		$db = $this->db->get("");
		return $db;
  }

  public function loadQueryAcademicRelation($where, $id){
    $this->db->select('*');
    $this->db->from('academic_scores');
    $this->db->join('academic_categories', 'academic_scores.academic_category_id = academic_categories.academic_category_id');
    $this->db->where($where,$id);
		$db = $this->db->get("");
    return $db;
  }

  public function loadQueryNotCategories($id_category, $table){
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where('academic_category_id != ',$id_category);
    $db = $this->db->get("");
    return $db;

  }
  

}