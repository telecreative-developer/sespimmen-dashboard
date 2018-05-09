<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SespimScores extends CI_Controller {
  public function __construct()
	{
    parent::__construct();
    $this->load->helper('date');
    $this->load->library('pagination');
    $this->load->library('email');
		if($this->session->userdata('username') == ""){
			redirect('../');	
		}
	}

	public function academic()
  {
    $orderid = 'academic_id';
    $data['academic']  = $this->ModelSespimScores->loadQueryAcademic($orderid,'academic_scores')->result();
    $this->load->view('admin/table-academic',$data);
  }

  public function addacademic()
	{
    $orderid = 'academic_category_id';
    $data['academic_categories']  = $this->ModelSespim->loadQuery($orderid,'academic_categories')->result();
		$this->load->view('admin/addAcademic', $data);
  }

  public function insertacademic(){
    $imageUrl     = base_url();
    $title        = $this->input->post('title');
    $tempFile 		= $_FILES['akademik_file']['tmp_name'];
		$fileName 		= time().$_FILES['akademik_file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/academic/'; 
    $tipe         = $this->input->post('tipe');
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    
    $data = array(
      'title'           => $title,
      'file_url'	      => $imageUrl."assets/images/academic/".$fileName,
      'file_loc'	      => $fileName,
      'status'	        => "0",
      'academic_category_id' => $tipe,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelSespim->insertQuery('academic_scores',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='academic';
     </script>");
  }

  public function editAcademic()
	{
    $id = $this->uri->segment(2);
    $where = 'academic_id';

    $query = $this->db->query("SELECT * FROM academic_scores WHERE academic_id = '$id' ");
    $row = $query->row();
    $id_category =  $row->academic_category_id;

    $data['academic'] = $this->ModelSespimScores->loadQueryAcademicRelation($where,$id,'academic_scores')->result();
    $data['categories'] = $this->ModelSespimScores->loadQueryNotCategories($id_category,'academic_categories')->result();
    $this->load->view('admin/editacademic',$data);
  }

  public function update_academic() {
    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $title         = $this->input->post('title');
    $tipe          = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/academic/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $file = substr($fileName,10);
    if($file== ""){
      $data = array(
        'title'  => $title,
        'academic_category_id' => $tipe,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $where = array(
        'academic_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'academic_scores');
    }else{
      $data = array(
        'title'                 => $title,
        'file_url'	            => $imageUrl."assets/images/academic/".$fileName,
        'file_loc'	            => $fileName,
        'academic_category_id' => $tipe,
        'updatedAt'		          => $datenow." ".$timenow
      );
      $where = array(
        'academic_id' => $id
      );
      $this->ModelDeleteImage->deleteFileAkademik($id);
      $this->ModelSespim->updateQuery($where,$data,'academic_scores');
    }
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Update Data');
    window.location.href='../academic';
    </script>");
  }

  public function publish_academic(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    $content = array(
      "en" => "Nilai Akademik sudah dipublish"
    );
    
    $fields = array(
      'app_id' => "7a686478-82f7-44c6-b48c-ecaf5c11feb5",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'large_icon' =>"https://res.cloudinary.com/rendisimamora/image/upload/v1522840764/default_ze1slc.jpg",
      'contents' => $content
    );
    
    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Basic ZTQ1Nzc2YTItOWZmMy00MGVmLWJmYjQtZWZlMGFlNzU1Y2Jj'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $data = array(
      'announcement'	  => "Nilai Akademik sudah dipublish",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    
    $query = $this->db->query("SELECT announcement_id FROM announcements ORDER BY announcement_id DESC LIMIT 1");
    $row = $query->row();
    $id_notif_last =  $row->announcement_id;
    $id_notif_new = $id_notif_last + 1;

    $data_notif = array(
      'type'	  => "announcement",
      'announcement_id'	  => $id_notif_new,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    $this->ModelSespim->insertQuery('announcements',$data); 
    $this->ModelSespim->insertQuery('notifications',$data_notif); 

    $data = array(
      'status'         => "1",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'academic_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'academic_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../academic';
    </script>");

    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
    $response = sendMessage();
    $return["allresponses"] = $response;
    $return = json_encode( $return);
  }

  public function unpublish_academic(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $data = array(
      'status'         => "0",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'academic_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'academic_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../academic';
    </script>");
  }

  public function deleteAkademik() {
    $id = $this->uri->segment(2);
    $idwhere = 'academic_id';
    $this->ModelDeleteImage->deleteFileAkademik($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'academic_scores');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../academic';
     </script>");
  }

	public function kepribadian()
  {
    $orderid = 'personality_id';
    $data['kepribadian']  = $this->ModelSespim->loadQuery($orderid,'personalities_scores')->result();
    $this->load->view('admin/table-kepribadian',$data);
  }

  public function addkepribadian()
	{
    $orderid = 'personality_id';
    $data['kepribadian']  = $this->ModelSespim->loadQuery($orderid,'personalities_scores')->result();
		$this->load->view('admin/addkepribadian', $data);
  }

  public function insertkepribadian(){
    $imageUrl     = base_url();
    $tipe        = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/kepribadian/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    
    $data = array(
      'tipe'            => $tipe,
      'file_url'	      => $imageUrl."assets/images/kepribadian/".$fileName,
      'file_loc'	      => $fileName,
      'status'	        => "0",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelSespim->insertQuery('personalities_scores',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='kepribadian';
     </script>");
  }

  public function editkepribadian()
	{
    $id = $this->uri->segment(2);
    $where = 'personality_id';
    $data['kepribadian'] = $this->ModelSespim->loadQueryById($where,$id,'personalities_scores')->result();
    $this->load->view('admin/editkepribadian',$data);
  }

  public function update_kepribadian() {
    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $tipe          = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/kepribadian/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $file = substr($fileName,10);
    if($file== ""){
      $data = array(
        'tipe'            => $tipe,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $where = array(
        'personality_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'personalities_scores');
    }else{
      $data = array(
        'tipe'                  => $tipe,
        'file_url'	            => $imageUrl."assets/images/kepribadian/".$fileName,
        'file_loc'	            => $fileName,
        'updatedAt'		          => $datenow." ".$timenow
      );
      $where = array(
        'personality_id' => $id
      );
      $this->ModelDeleteImage->deleteFileKepribadian($id);
      $this->ModelSespim->updateQuery($where,$data,'personalities_scores');
    }
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Update Data');
    window.location.href='../kepribadian';
    </script>");
  }

  public function publish_kepribadian(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    $content = array(
      "en" => "Nilai Kepribadian sudah dipublish"
    );
    
    $fields = array(
      'app_id' => "7a686478-82f7-44c6-b48c-ecaf5c11feb5",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'large_icon' =>"https://res.cloudinary.com/rendisimamora/image/upload/v1522840764/default_ze1slc.jpg",
      'contents' => $content
    );
    
    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Basic ZTQ1Nzc2YTItOWZmMy00MGVmLWJmYjQtZWZlMGFlNzU1Y2Jj'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $data = array(
      'announcement'	  => "Nilai Kepribadian sudah dipublish",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    
    $query = $this->db->query("SELECT announcement_id FROM announcements ORDER BY announcement_id DESC LIMIT 1");
    $row = $query->row();
    $id_notif_last =  $row->announcement_id;
    $id_notif_new = $id_notif_last + 1;

    $data_notif = array(
      'type'	  => "announcement",
      'announcement_id'	  => $id_notif_new,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    $this->ModelSespim->insertQuery('announcements',$data); 
    $this->ModelSespim->insertQuery('notifications',$data_notif); 

    $data = array(
      'status'         => "1",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'personality_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'personalities_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../kepribadian';
    </script>");

    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
    $response = sendMessage();
    $return["allresponses"] = $response;
    $return = json_encode( $return);
  }

  public function unpublish_kepribadian(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $data = array(
      'status'         => "0",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'personality_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'personalities_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../kepribadian';
    </script>");
  }

  public function deleteKepribadian() {
    $id = $this->uri->segment(2);
    $idwhere = 'personality_id';
    $this->ModelDeleteImage->deleteFileKepribadian($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'personalities_scores');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../kepribadian';
     </script>");
  }

  public function gabungan()
  {
    $orderid = 'gabungan_id';
    $data['gabungan']  = $this->ModelSespim->loadQuery($orderid,'gabungan_scores')->result();
    $this->load->view('admin/table-gabungan',$data);
  }

  public function addgabungan()
	{
    $orderid = 'gabungan_id';
    $data['gabungan']  = $this->ModelSespim->loadQuery($orderid,'gabungan_scores')->result();
		$this->load->view('admin/addgabungan', $data);
  }

  public function insertgabungan(){
    $imageUrl     = base_url();
    $tipe        = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/gabungan/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    
    $data = array(
      'tipe'            => $tipe,
      'file_url'	      => $imageUrl."assets/images/gabungan/".$fileName,
      'file_loc'	      => $fileName,
      'status'	        => "0",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelSespim->insertQuery('gabungan_scores',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='gabungan';
     </script>");
  }

  public function editgabungan()
	{
    $id = $this->uri->segment(2);
    $where = 'gabungan_id';
    $data['gabungan'] = $this->ModelSespim->loadQueryById($where,$id,'gabungan_scores')->result();
    $this->load->view('admin/editgabungan',$data);
  }

  public function update_gabungan() {
    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $tipe          = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/gabungan/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $file = substr($fileName,10);
    if($file== ""){
      $data = array(
        'tipe'            => $tipe,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $where = array(
        'gabungan_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'gabungan_scores');
    }else{
      $data = array(
        'tipe'                  => $tipe,
        'file_url'	            => $imageUrl."assets/images/gabungan/".$fileName,
        'file_loc'	            => $fileName,
        'updatedAt'		          => $datenow." ".$timenow
      );
      $where = array(
        'gabungan_id' => $id
      );
      $this->ModelDeleteImage->deleteFileGabungan($id);
      $this->ModelSespim->updateQuery($where,$data,'gabungan_scores');
    }
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Update Data');
    window.location.href='../gabungan';
    </script>");
  }

  public function deleteGabungan() {
    $id = $this->uri->segment(2);
    $idwhere = 'gabungan_id';
    $this->ModelDeleteImage->deleteFileGabungan($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'gabungan_scores');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../gabungan';
     </script>");
  }

  public function publish_gabungan(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    $content = array(
      "en" => "Nilai Gabungan sudah dipublish"
    );
    
    $fields = array(
      'app_id' => "7a686478-82f7-44c6-b48c-ecaf5c11feb5",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'large_icon' =>"https://res.cloudinary.com/rendisimamora/image/upload/v1522840764/default_ze1slc.jpg",
      'contents' => $content
    );
    
    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Basic ZTQ1Nzc2YTItOWZmMy00MGVmLWJmYjQtZWZlMGFlNzU1Y2Jj'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $data = array(
      'announcement'	  => "Nilai Gabungan sudah dipublish",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    
    $query = $this->db->query("SELECT announcement_id FROM announcements ORDER BY announcement_id DESC LIMIT 1");
    $row = $query->row();
    $id_notif_last =  $row->announcement_id;
    $id_notif_new = $id_notif_last + 1;

    $data_notif = array(
      'type'	  => "announcement",
      'announcement_id'	  => $id_notif_new,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    $this->ModelSespim->insertQuery('announcements',$data); 
    $this->ModelSespim->insertQuery('notifications',$data_notif); 

    $data = array(
      'status'         => "1",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'gabungan_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'gabungan_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../gabungan';
    </script>");

    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
    $response = sendMessage();
    $return["allresponses"] = $response;
    $return = json_encode( $return);
  }

  public function unpublish_gabungan(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $data = array(
      'status'         => "0",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'gabungan_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'gabungan_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../gabungan';
    </script>");
  }

  public function kegiatan_khusus()
  {
    $orderid = 'activities_id';
    $data['kegiatan']  = $this->ModelSespim->loadQuery($orderid,'activities_scores')->result();
    $this->load->view('admin/table-kegiatan',$data);
  }

  public function addkegiatan_khusus()
	{
		$this->load->view('admin/addkegiatan_khusus');
  }

  public function insertkegiatan_khusus(){
    $imageUrl     = base_url();
    $title        = $this->input->post('title');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/kegiatan_khusus/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    
    $data = array(
      'title'           => $title,
      'file_url'	      => $imageUrl."assets/images/kegiatan_khusus/".$fileName,
      'file_loc'	      => $fileName,
      'status'	        => "0",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelSespim->insertQuery('activities_scores',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='kegiatan_khusus';
     </script>");
  }

  public function editkegiatan_khusus()
	{
    $id = $this->uri->segment(2);
    $where = 'activities_id';
    $data['kegiatan'] = $this->ModelSespim->loadQueryById($where,$id,'activities_scores')->result();
    $this->load->view('admin/editkegiatan_khusus',$data);
  }

  public function update_kegiatan_khusus() {
    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $title          = $this->input->post('title');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/kegiatan_khusus/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $file = substr($fileName,10);
    if($file== ""){
      $data = array(
        'title'           => $title,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $where = array(
        'activities_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'activities_scores');
    }else{
      $data = array(
        'title'                 => $title,
        'file_url'	            => $imageUrl."assets/images/kegiatan_khusus/".$fileName,
        'file_loc'	            => $fileName,
        'updatedAt'		          => $datenow." ".$timenow
      );
      $where = array(
        'activities_id' => $id
      );
      $this->ModelDeleteImage->deleteFileKegiatanKhusus($id);
      $this->ModelSespim->updateQuery($where,$data,'activities_scores');
    }
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Update Data');
    window.location.href='../kegiatan_khusus';
    </script>");
  }

  public function publish_kegiatan_khusus(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    $content = array(
      "en" => "Nilai Kegiatan Khusus sudah dipublish"
    );
    
    $fields = array(
      'app_id' => "7a686478-82f7-44c6-b48c-ecaf5c11feb5",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'large_icon' =>"https://res.cloudinary.com/rendisimamora/image/upload/v1522840764/default_ze1slc.jpg",
      'contents' => $content
    );
    
    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Basic ZTQ1Nzc2YTItOWZmMy00MGVmLWJmYjQtZWZlMGFlNzU1Y2Jj'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $data = array(
      'announcement'	  => "Nilai Kegiatan Khusus sudah dipublish",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    
    $query = $this->db->query("SELECT announcement_id FROM announcements ORDER BY announcement_id DESC LIMIT 1");
    $row = $query->row();
    $id_notif_last =  $row->announcement_id;
    $id_notif_new = $id_notif_last + 1;

    $data_notif = array(
      'type'	  => "announcement",
      'announcement_id'	  => $id_notif_new,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    $this->ModelSespim->insertQuery('announcements',$data); 
    $this->ModelSespim->insertQuery('notifications',$data_notif); 

    $data = array(
      'status'         => "1",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'activities_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'activities_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../kegiatan_khusus';
    </script>");

    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
    $response = sendMessage();
    $return["allresponses"] = $response;
    $return = json_encode( $return);
  }

  public function unpublish_kegiatan_khusus(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $data = array(
      'status'         => "0",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'activities_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'activities_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../kegiatan_khusus';
    </script>");
  }

  public function deletekegiatan_khusus() {
    $id = $this->uri->segment(2);
    $idwhere = 'activities_id';
    $this->ModelDeleteImage->deleteFileKegiatanKhusus($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'activities_scores');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../kegiatan_khusus';
     </script>");
  }

  public function kesehatan_jasmani()
  {
    $orderid = 'health_id';
    $data['kesehatan']  = $this->ModelSespim->loadQuery($orderid,'health_scores')->result();
    $this->load->view('admin/table-kesehatan',$data);
  }

  public function addkesehatan_jasmani()
	{
    $orderid = 'health_id';
    $data['kesehatan']  = $this->ModelSespim->loadQuery($orderid,'health_scores')->result();
		$this->load->view('admin/addkesehatan', $data);
  }

  public function insertkesehatan(){
    $imageUrl     = base_url();
    $tipe        = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/kesehatan/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    
    $data = array(
      'tipe'            => $tipe,
      'file_url'	      => $imageUrl."assets/images/kesehatan/".$fileName,
      'file_loc'	      => $fileName,
      'status'	        => "0",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelSespim->insertQuery('health_scores',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='kesehatan_jasmani';
     </script>");
  }

  public function editkesehatan()
	{
    $id = $this->uri->segment(2);
    $where = 'health_id';
    $data['kesehatan'] = $this->ModelSespim->loadQueryById($where,$id,'health_scores')->result();
    $this->load->view('admin/editkesehatan',$data);
  }

  public function update_kesehatan() {
    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $tipe          = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/kesehatan/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $file = substr($fileName,10);
    if($file== ""){
      $data = array(
        'tipe'            => $tipe,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $where = array(
        'health_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'health_scores');
    }else{
      $data = array(
        'tipe'                  => $tipe,
        'file_url'	            => $imageUrl."assets/images/kesehatan/".$fileName,
        'file_loc'	            => $fileName,
        'updatedAt'		          => $datenow." ".$timenow
      );
      $where = array(
        'health_id' => $id
      );
      $this->ModelDeleteImage->deleteFileKesehatan($id);
      $this->ModelSespim->updateQuery($where,$data,'health_scores');
    }
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Update Data');
    window.location.href='../kesehatan_jasmani';
    </script>");
  }

  public function publish_kesehatan(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    $content = array(
      "en" => "Nilai Kesehatan Jasmani sudah dipublish"
    );
    
    $fields = array(
      'app_id' => "7a686478-82f7-44c6-b48c-ecaf5c11feb5",
      'included_segments' => array('All'),
      'data' => array("foo" => "bar"),
      'large_icon' =>"https://res.cloudinary.com/rendisimamora/image/upload/v1522840764/default_ze1slc.jpg",
      'contents' => $content
    );
    
    $fields = json_encode($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Basic ZTQ1Nzc2YTItOWZmMy00MGVmLWJmYjQtZWZlMGFlNzU1Y2Jj'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $data = array(
      'announcement'	  => "Nilai Kesehatan Jasmani sudah dipublish",
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    
    $query = $this->db->query("SELECT announcement_id FROM announcements ORDER BY announcement_id DESC LIMIT 1");
    $row = $query->row();
    $id_notif_last =  $row->announcement_id;
    $id_notif_new = $id_notif_last + 1;

    $data_notif = array(
      'type'	  => "announcement",
      'announcement_id'	  => $id_notif_new,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );
    $this->ModelSespim->insertQuery('announcements',$data); 
    $this->ModelSespim->insertQuery('notifications',$data_notif); 

    $data = array(
      'status'         => "1",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'health_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'health_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../kesehatan_jasmani';
    </script>");

    $response = curl_exec($ch);
    curl_close($ch);
    
    return $response;
    $response = sendMessage();
    $return["allresponses"] = $response;
    $return = json_encode( $return);
  }

  public function unpublish_kesehatan(){
    $id = $this->uri->segment(2);
    $imageUrl = base_url();
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $data = array(
      'status'         => "0",
      'updatedAt'		   => $datenow." ".$timenow
    );
    $where = array(
      'health_id' => $id
    );
    $this->ModelSespim->updateQuery($where,$data,'health_scores');
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='../kesehatan_jasmani';
    </script>");
  }

  public function deleteKesehatan() {
    $id = $this->uri->segment(2);
    $idwhere = 'health_id';
    $this->ModelDeleteImage->deleteFileKesehatan($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'health_scores');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../kesehatan_jasmani';
     </script>");
  }

}
