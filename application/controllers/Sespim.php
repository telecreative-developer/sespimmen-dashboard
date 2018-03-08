<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sespim extends CI_Controller {
  public function __construct()
	{
    parent::__construct();
    $this->load->helper('date');
    $this->load->library('pagination');

		if($this->session->userdata('username') == ""){
			redirect('../');	
		}
	}

	public function dashboard()
	{
    $id = 'id';
    $data['users']  = $this->ModelSespim->loadQueryLimit($id,'users')->result();
		$this->load->view('admin/dashboard',$data);
  }

  public function events()
	{
    $orderid = 'event_id';
    $data['events']  = $this->ModelSespim->loadQuery($orderid,'events')->result();
		$this->load->view('admin/table-events',$data);
  }

  public function addevents()
	{
		$this->load->view('admin/addevents');
  }

  public function insertEvents(){
    $imageUrl = base_url();
    $admin_id = $this->session->userdata('admin_id');
    $title         = $this->input->post('title');
    
    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/sespim/assets/images/events/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time          = $this->input->post('time');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $data = array(
      'title'  			    => $title,
      'thumbnail_url'	  => $imageUrl."assets/images/events/".$fileName,
      'thumbnail_loc'	 => $fileName,
      'description'  		=> $description,
      'date'		        => $date." ".$time,
      'admin_id'		    => $admin_id,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelSespim->insertQuery('events',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='events';
     </script>");
  }

  public function editEvents()
	{
    $id = $this->uri->segment(2);
    $where = 'event_id';
    $data['events'] = $this->ModelSespim->loadQueryById($where,$id,'events')->result();
		$this->load->view('admin/editevents',$data);
  }

  public function updateEvents() {
    $imageUrl = base_url();
    $admin_id = $this->session->userdata('admin_id');
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time          = $this->input->post('time');

    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/sespim/assets/images/events/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    
    $pic = substr($fileName,10);
    if($pic == ""){
      $data = array(
        'title'          => $title,
        'description'    => $description,
        'date'		       => $date." ".$time,
        'admin_id'       => $admin_id,
        'updatedAt'		   => $datenow." ".$timenow
      );
      $where = array(
        'event_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'events');
    }else{
      $data = array(
        'title'          => $title,
        'description'    => $description,
        'date'		       => $date." ".$time,
        'admin_id'       => $admin_id,
        'thumbnail_url'		     => $imageUrl."assets/images/events/".$fileName,
        'thumbnail_loc'	 => $fileName,
        'updatedAt'		   => $datenow." ".$timenow
      );
      $where = array(
        'event_id' => $id
      );
      $this->ModelDeleteImage->deleteImage($id);
      $this->ModelSespim->updateQuery($where,$data,'events');
    }

		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../events';
     </script>");
  }
  
  public function deleteEvents() {
    $id = $this->uri->segment(2);
    $idwhere = 'event_id';
    $this->ModelDeleteImage->deleteImage($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'events');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../events';
     </script>");
  }

  public function articles()
	{
    $orderid = 'article_id';
    $data['articles']  = $this->ModelSespim->loadQueryRelationArticles()->result();
		$this->load->view('admin/table-articles',$data);
  }

  public function addarticles()
	{
    $orderid = 'article_category_id';
    $data['categories']  = $this->ModelSespim->loadQuery($orderid,'article_categories')->result();
		$this->load->view('admin/addarticles',$data);
  }

  public function insertarticles(){

    $imageUrl = base_url();
    
    $title              = $this->input->post('title');
    $description        = $this->input->post('description');
    $id_category        = $this->input->post('id_category');

		$tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/sespim/assets/images/articles/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $tempFilePDF 		= $_FILES['file']['tmp_name'];
		$fileNamePDF    = time().$_FILES['file']['name'];	  
    $targetPathPDF	= '/opt/lampp/htdocs/sespim/assets/images/articles/'; 
		$targetFilePDF 	= $targetPathPDF . $fileNamePDF;
    move_uploaded_file($tempFilePDF, $targetFilePDF);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");


    $data = array(
      'title'               => $title,
      'thumbnail_url'	      => $imageUrl."assets/images/articles/".$fileName,
      'thumbnail_loc'	      => $fileName,
      'description'		      => $description,
      'article_category_id' => $id_category,
      'file_url'		        => $imageUrl."assets/images/articles/".$fileNamePDF,
      'file_loc'		        => $fileNamePDF,
      'updatedAt'		        => $datenow." ".$timenow
    );

    $this->ModelSespim->insertQuery('articles',$data); 
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='articles'; 
    </script>");
  }

  public function editarticles()
	{
    $id = $this->uri->segment(2);
    $query = $this->db->query("SELECT * FROM articles WHERE article_id = '$id'");
    $row = $query->row();

    $id_category =  $row->article_category_id;
    $data['articles'] = $this->ModelSespim->loadQueryByIdRelation($id,'articles')->result();
    $data['categories'] = $this->ModelSespim->loadQueryNotById($id_category)->result();
	  $this->load->view('admin/editarticles',$data);
  }

  public function updatearticles() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");

    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $title              = $this->input->post('title');
    $description        = $this->input->post('description');    
    $id_category        = $this->input->post('id_category');

    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/opt/lampp/htdocs/sespim/assets/images/articles/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $tempFilePDF 		= $_FILES['file']['tmp_name'];
		$fileNamePDF    = time().$_FILES['file']['name'];	  
    $targetPathPDF	= '/opt/lampp/htdocs/sespim/assets/images/articles/'; 
		$targetFilePDF 	= $targetPathPDF . $fileNamePDF;
    move_uploaded_file($tempFilePDF, $targetFilePDF);

    $thumbnail = substr($fileName,10);
    
    $pic = substr($fileName,10);
    $file = substr($fileNamePDF,10);
    
    if($pic == "" AND $file == ""){
      $data = array(
        'title'               => $title,
        'description'		      => $description,
        'article_category_id' => $id_category,
        'updatedAt'		        => $datenow." ".$timenow
      );
      
      $where = array(
        'article_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'articles');
    }else if($pic == ""){
      $data = array(
        'title'          => $title,
        'description'		 => $description,
        'article_category_id' => $id_category,
        'file_url'		       => $imageUrl."assets/images/articles/".$fileNamePDF,
        'file_loc'		   => $fileNamePDF,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'article_id' => $id
      );
      $this->ModelSespim->deleteFile($id);
      $this->ModelSespim->updateQuery($where,$data,'articles');
    }else if($file == ""){
      $data = array(
        'title'          => $title,
        'description'		 => $description,
        'article_category_id' => $id_category,
        'thumbnail_url'		     => $imageUrl."assets/images/articles/".$fileName,
        'thumbnail_loc'		 => $fileName,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'article_id' => $id
      );

      $this->ModelSespim->deleteImage($id);
      $this->ModelSespim->updateQuery($where,$data,'articles');
    }else{
      $data = array(
        'title'     => $title,
        'thumbnail_url'		     => $imageUrl."assets/images/articles/".$fileName,
        'thumbnail_loc'		 => $fileName,
        'description'		 => $description,
        'article_category_id' => $id_category,
        'file_url'		       => $imageUrl."assets/images/articles/".$fileNamePDF,
        'file_loc'		   => $fileNamePDF,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'article_id' => $id
      );
      $this->ModelSespim->deleteFile($id);
      $this->ModelSespim->deleteImage($id);
      $this->ModelSespim->updateQuery($where,$data,'articles');
    }
  
		 echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../articles';
     </script>");
  }


  public function deleteArticles() {
    $id = $this->uri->segment(2);
    $idwhere = 'article_id';
    $this->ModelSespim->deleteImage($id);
    $this->ModelSespim->deleteFile($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'articles');
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../articles';
    </script>");
  }

  public function categories()
	{
    $orderid = 'article_category_id';
    $data['categories']  = $this->ModelSespim->loadQuery($orderid,'article_categories')->result();
		$this->load->view('admin/table-categories',$data);
  }

  public function posts()
	{
    $id = 'id';
    $data['posts']  = $this->ModelSespim->loadQuery($id,'posts')->result();
		$this->load->view('admin/table-posts',$data);
  }

  public function deletePosts() {
    $id = $this->uri->segment(2);
    $idwhere = 'post_id';
    $this->ModelSespim->deleteQuery($idwhere,$id,'posts');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../posts';
     </script>");
  }

  public function users()
	{
    $id = 'id';
    $data['users']  = $this->ModelSespim->loadQueryRelation($id,'users')->result();
		$this->load->view('admin/table-users',$data);
  }

  public function addusers()
	{
		$this->load->view('admin/addusers');
  }

  public function pagesprofile()
	{
    $id = $this->uri->segment(2);
    $data['users']  = $this->ModelSespim->loadQueryRelationWhere($id)->result();
		$this->load->view('admin/pages-profile',$data);
  }


  public function scores()
	{
    $orderid = 'score_id';
    $data['scores']  = $this->ModelSespim->loadQueryRelation($orderid,'scores')->result();
		$this->load->view('admin/table-scores',$data);
  }

  public function addscores()
	{
    $id = 'id';
    $data['users']  = $this->ModelSespim->loadQueryLimit($id,'users')->result();
		$this->load->view('admin/addscores',$data);
  }

  public function insertscores(){
    $users         = $this->input->post('users');
    $score         = $this->input->post('score');
    $score2        = $this->input->post('score2');

    $data = array(
      'id'     			    => $users,
      'score'  			    => $score,
      'score2'  		    => $score2
    );

     $this->ModelSespim->insertQuery('scores',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='scores';
     </script>");
  }

  public function editScores()
	{
    $id = $this->uri->segment(2);
    $where = 'score_id';
    $data['scores'] = $this->ModelSespim->loadQueryUserById($where,$id,'scores')->result();
    
    $query = $this->db->query("SELECT * FROM scores WHERE score_id = '$id'");
    $row = $query->row();
    $id_user = $row->id;
    $data['users']  = $this->ModelSespim->LoadUsersNotById($id_user)->result();
		$this->load->view('admin/editscores',$data);
  }

  public function updateScores() {
    $id = $this->uri->segment(2);
    $score         = $this->input->post('score');
    $score2        = $this->input->post('score2');
    $user          = $this->input->post('users');
    
		$data = array(
      'score'     => $score,
      'score2'    => $score2,
      'id'        => $user,
		);
		
		$where = array(
			'score_id' => $id
    );
    
    $this->ModelSespim->updateQuery($where,$data,'scores');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../scores';
     </script>");
  }

  public function deleteScores() {
    $id = $this->uri->segment(2);
    $idwhere = 'score_id';
    $this->ModelSespim->deleteQuery($idwhere,$id,'scores');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../scores';
     </script>");
  }

  public Function logout(){
		$this->session->sess_destroy();
		redirect('../');
  }
}
