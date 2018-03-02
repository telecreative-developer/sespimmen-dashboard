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
		$this->load->view('admin/dashboard');
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
    $id_admin = $this->session->userdata('id_admin');
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time          = $this->input->post('time');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $data = array(
      'title'  			    => $title,
      'description'  		=> $description,
      'time'		        => $date." ".$time,
      // 'id_admin'		    => $id_admin,
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
    $id_admin = $this->session->userdata('id_admin');
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");
  
    $id = $this->uri->segment(2);
    $title         = $this->input->post('title');
    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time          = $this->input->post('time');
    
		$data = array(
      'title'          => $title,
      'description'    => $description,
      'time'		       => $date." ".$time,
      // 'id_admin'       => $id_admin,
      'updatedAt'		   => $datenow." ".$timenow
		);
		
		$where = array(
			'event_id' => $id
    );
    
    $this->ModelSespim->updateQuery($where,$data,'events');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../events';
     </script>");
  }
  
  public function deleteEvents() {
    $id = $this->uri->segment(2);
    $idwhere = 'event_id';
    $this->ModelSespim->deleteQuery($idwhere,$id,'events');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../events';
     </script>");
  }

  public function articles()
	{
    $orderid = 'post_id';
    $data['articles']  = $this->ModelSespim->loadQuery($orderid,'posts')->result();
		$this->load->view('admin/table-articles',$data);
  }

  public function addarticles()
	{
		$this->load->view('admin/addarticles');
  }

  public function insertarticles(){

    $imageUrl = base_url();
    
    $title              = $this->input->post('title');
    $description        = $this->input->post('description');

		$tempFile 		= $_FILES['thumbnail']['tmp_name'];
		$fileName 		= time().$_FILES['thumbnail']['name'];	  
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
      'title'          => $title,
      'thumbnail'		   => $imageUrl."assets/images/articles/".$fileName,
      'loc_thumbnail'	 => $fileName,
      'description'		 => $description,
      
      'file'		       => $imageUrl."assets/images/articles/".$fileNamePDF,
      'loc_file'		   => $fileNamePDF,
      'updatedAt'		   => $datenow." ".$timenow
    );

    $this->ModelSespim->insertQuery('posts',$data); 
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='articles'; 
    </script>");
  }

  public function editarticles()
	{
    $id = $this->uri->segment(2);

    $where = 'post_id';
    $data['articles'] = $this->ModelSespim->loadQueryById($where,$id,'posts')->result();
		$this->load->view('admin/editarticles',$data);
  }

  public function updatearticles() {
    $datenow = date("Y-m-d");
    $timenow = date("H:i:s");

    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $title              = $this->input->post('title');
    $description        = $this->input->post('description');    

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
        'title'          => $title,
        'description'		 => $description,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'post_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'posts');
    }else if($pic == ""){
      $data = array(
        'title'          => $title,
        'description'		 => $description,
        'file'		       => $imageUrl."assets/images/articles/".$fileNamePDF,
        'loc_file'		   => $fileNamePDF,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'post_id' => $id
      );
      $this->ModelSespim->deleteFile($id);
      $this->ModelSespim->updateQuery($where,$data,'posts');
    }else if($file == ""){
      $data = array(
        'title'          => $title,
        'description'		 => $description,
        'thumbnail'		     => $imageUrl."assets/images/articles/".$fileName,
        'loc_thumbnail'		 => $fileName,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'post_id' => $id
      );

      $this->ModelSespim->deleteImage($id);
      $this->ModelSespim->updateQuery($where,$data,'posts');
    }else{
      $data = array(
        'title'     => $title,
        'thumbnail'		     => $imageUrl."assets/images/articles/".$fileName,
        'loc_thumbnail'		 => $fileName,
        'description'		 => $description,
        'file'		       => $imageUrl."assets/images/articles/".$fileNamePDF,
        'loc_file'		   => $fileNamePDF,
        'updatedAt'		   => $datenow." ".$timenow
      );
      
      $where = array(
        'post_id' => $id
      );
      $this->ModelSespim->deleteFile($id);
      $this->ModelSespim->deleteImage($id);
      $this->ModelSespim->updateQuery($where,$data,'posts');
    }
  
		 echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../articles';
     </script>");
  }


  public function deleteArticles() {
    $id = $this->uri->segment(2);
    $idwhere = 'post_id';
    $this->ModelSespim->deleteImage($id);
    $this->ModelSespim->deleteFile($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'posts');
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../articles';
    </script>");
  }

  public function users()
	{
    $id = 'id';
    $data['users']  = $this->ModelSespim->loadQueryRelation($id,'users')->result();
		$this->load->view('admin/table-users',$data);
  }

  public function pagesprofile()
	{
    $id = 'id';
    $data['users']  = $this->ModelSespim->loadQueryRelation($id,'users')->result();
		$this->load->view('admin/pages-profile',$data);
  }

  public Function logout(){
		$this->session->sess_destroy();
		redirect('../');
  }
}
