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
    $data['users']  = $this->ModelSespim->loadQueryTheBestValue()->result();
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
    $title    = $this->input->post('title');
    $place    = $this->input->post('place');
    
    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		= '/opt/lampp/htdocs/sespim/assets/images/events/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);

    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time_start    = $this->input->post('time_start');
    $time_end      = $this->input->post('time_end');

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $x = substr($fileName,10);

    if($x == ""){
      $data = array(
        'title'  			    => $title,
        'description'  		=> $description,
        'place'		        => $place,
        'date'		        => $date,
        'time_start'		  => $time_start,
        'time_end'   		  => $time_end,
        'admin_id'		    => $admin_id,
        'createdAt'		    => $datenow." ".$timenow,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $this->ModelSespim->insertQuery('events',$data); 
    }else{
      $data = array(
        'title'  			    => $title,
        'thumbnail_url'	  => $imageUrl."assets/images/events/".$fileName,
        'thumbnail_loc'	  => $fileName,
        'description'  		=> $description,
        'place'		        => $place,
        'date'		        => $date,
        'time_start'		  => $time_start,
        'time_end'   		  => $time_end,
        'admin_id'		    => $admin_id,
        'createdAt'		    => $datenow." ".$timenow,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $this->ModelSespim->insertQuery('events',$data); 
    }
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
    $place         = $this->input->post('place');
    $description   = $this->input->post('description');
    $date          = $this->input->post('date');
    $time_start    = $this->input->post('time_start');
    $time_end      = $this->input->post('time_end');

    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		 = '/var/www/sespim/assets/images/events/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    
    $pic = substr($fileName,10);
    if($pic == ""){
      $data = array(
        'title'          => $title,
        'description'    => $description,
        'place'		       => $place,
        'date'		       => $date,
        'time_start'		  => $time_start,
        'time_end'   		  => $time_end,
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
        'place'		       => $place,
        'date'		       => $date,
        'time_start'		 => $time_start,
        'time_end'   		 => $time_end,
        'admin_id'       => $admin_id,
        'thumbnail_url'	 => $imageUrl."assets/images/events/".$fileName,
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

  public function documents()
	{
    $id = 'document_id';
    $data['documents']  = $this->ModelSespim->loadQuery($id,'documents')->result();
		$this->load->view('admin/table-documents',$data);
  }

  public function add_documents()
	{
		$this->load->view('admin/add_documents');
  }

  public function insert_documents(){
    $imageUrl = base_url();
    $title         = $this->input->post('title');
    $tipe          = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/documents/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");
    
    $data = array(
      'document_title'  => $title,
      'document_url'	  => $imageUrl."assets/images/documents/".$fileName,
      'document_loc'	  => $fileName,
      'document_type'	  => $tipe,
      'createdAt'		    => $datenow." ".$timenow,
      'updatedAt'		    => $datenow." ".$timenow
    );

     $this->ModelSespim->insertQuery('documents',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='documents';
     </script>");
  }

  public function edit_documents()
	{
    $id = $this->uri->segment(2);
    $where = 'document_id';
    $data['documents'] = $this->ModelSespim->loadQueryById($where,$id,'documents')->result();
		$this->load->view('admin/edit_documents',$data);
  }

  public function update_documents() {
    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $title         = $this->input->post('title');
    $tipe          = $this->input->post('tipe');
    $tempFile 		= $_FILES['file']['tmp_name'];
		$fileName 		= time().$_FILES['file']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/documents/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $file = substr($fileName,10);
    if($file== ""){
      $data = array(
        'document_title'  => $title,
        'document_type'	  => $tipe,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $where = array(
        'document_id' => $id
      );
      $this->ModelSespim->updateQuery($where,$data,'documents');
    }else{
      $data = array(
        'document_title'  => $title,
        'document_url'	  => $imageUrl."assets/images/documents/".$fileName,
        'document_loc'	  => $fileName,
        'document_type'	  => $tipe,
        'updatedAt'		    => $datenow." ".$timenow
      );
      $where = array(
        'document_id' => $id
      );
      $this->ModelDeleteImage->deleteFile($id);
      $this->ModelSespim->updateQuery($where,$data,'documents');
    }
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Update Data');
    window.location.href='../documents';
    </script>");
  }

  public function delete_documents() {
    $id = $this->uri->segment(2);
    $idwhere = 'document_id';
    $this->ModelDeleteImage->deleteFile($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'documents');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../documents';
     </script>");
  }
  

  public function posts()
	{
    $id = 'id';
    $data['posts']  = $this->ModelSespim->loadQueryRelationPost()->result();
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

  public function interviewees()
	{
    $id = 'interviewee_id';
    $data['interviewees']  = $this->ModelSespim->loadQuery($id,'interviewees')->result();
		$this->load->view('admin/table-interviewees',$data);
  }

  public function addinterviewees()
	{
		$this->load->view('admin/addinterviewees');
  }

  public function insertInterviewees(){
    $full_name         = $this->input->post('full_name');

    $data = array(
      'full_name'     			    => $full_name,
    );

     $this->ModelSespim->insertQuery('interviewees',$data); 
     echo ("<script LANGUAGE='JavaScript'>
     window.alert('Success Data');
     window.location.href='interviewees';
     </script>");
  }

  public function editinterviewees()
	{
    $id = $this->uri->segment(2);
    $where = 'interviewee_id';
    $data['interviewees'] = $this->ModelSespim->loadQueryById($where,$id,'interviewees')->result();
		$this->load->view('admin/editinterviewees',$data);
  }

  public function updateinterviewees() {
    $id = $this->uri->segment(2);
    $full_name         = $this->input->post('full_name');
    
		$data = array(
      'full_name'     => $full_name,
		);
		
		$where = array(
			'interviewee_id' => $id
    );
    
    $this->ModelSespim->updateQuery($where,$data,'interviewees');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../interviewees';
     </script>");
  }
  
  public function deleteInterviewees() {
    $id = $this->uri->segment(2);
    $idwhere = 'interviewee_id';
    $this->ModelSespim->deleteQuery($idwhere,$id,'interviewees');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../interviewees';
     </script>");
  }

  public function users()
	{
    $id = 'id';
    $data['users']  = $this->ModelSespim->loadQuery($id,'users')->result();
		$this->load->view('admin/table-users',$data);
  }

  public function addusers()
	{
		$this->load->view('admin/addusers');
  }

  public function verifyUsers() {
    $id = $this->uri->segment(2);
		$data = array(
      'verified'     => 1,
		);
		
		$where = array(
			'id' => $id
    );
    
    $this->ModelSespim->updateQuery($where,$data,'users');
		echo ("<script LANGUAGE='JavaScript'>
     window.alert('Update Data');
     window.location.href='../users';
     </script>");
  }

  public function deleteUsers() {
    $id = $this->uri->segment(2);
    $idwhere = 'id';
    $this->ModelSespim->deleteQuery($idwhere,$id,'users');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../users';
     </script>");
  }

  public function pagesprofile()
	{
    $id = $this->uri->segment(2);
    $data['users']  = $this->ModelSespim->loadQueryRelationWhere($id)->result();
		$this->load->view('admin/pages-profile',$data);
  }

  public function admin()
	{
    $id = 'admin_id';
    $data['admin']  = $this->ModelSespim->loadQuery($id,'admin')->result();
		$this->load->view('admin/table-admin',$data);
  }

  public function addAdmin()
	{
		$this->load->view('admin/addAdmin');
  }

  public function insertAdmin(){
    $imageUrl = base_url();
    $first_name    = $this->input->post('first_name');
    $last_name     = $this->input->post('last_name');
    $username      = $this->input->post('username');
    $password      = SHA1($this->input->post('password'));
    $cpassword     = SHA1($this->input->post('cpassword'));

    $datenow = date("Y-m-d");
    $timenow = date("h:i:s");

    $query = $this->db->query("SELECT * FROM admin WHERE username ='$username'");
    $total = $query->num_rows();
    
    if($total >= 1){
      echo ("<script LANGUAGE='JavaScript'>
      window.alert('Username sudah dipakai');
      window.history.back();
      </script>");
    }else{
      if($password == $cpassword){
        $data = array(
          'first_name'	    => $first_name,
          'last_name'	      => $last_name,
          'username'	      => $username,
          'password'	      => $password,
          'createdAt'		    => $datenow." ".$timenow,
          'updatedAt'		    => $datenow." ".$timenow
        );
    
         $this->ModelSespim->insertQuery('admin',$data); 
         echo ("<script LANGUAGE='JavaScript'>
         window.alert('Success Data');
         window.location.href='admin';
         </script>");
      }else{
        echo ("<script LANGUAGE='JavaScript'>
        window.alert('Password tidak sama');
        window.history.back();
        </script>");
      }
    }
  }

  public function deleteAdmin() {
    $id = $this->uri->segment(2);
    $idwhere = 'admin_id';
    $this->ModelSespim->deleteQuery($idwhere,$id,'admin');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../admin';
     </script>");
  }


  public function scores()
	{
    $data['scores']  = $this->ModelSespim->loadQueryRelation()->result();
		$this->load->view('admin/table-scores',$data);
  }

  public function addscores()
	{
    $id = 'id';
    $data['users']  = $this->ModelSespim->loadQuery($id,'users')->result();
    $orderid = 'interviewee_id';
    $data['interviewees']  = $this->ModelSespim->loadQuery($orderid,'interviewees')->result(); 
		$this->load->view('admin/addscores',$data);
  }

  public function insertscores(){
    error_reporting(0);
    $users = $this->input->post('users');
    $query = $this->db->query("SELECT * FROM users WHERE id = '$users'");
    $row = $query->row();
    $id_user = $row->id;

    $query = $this->db->query("SELECT * FROM teams WHERE id = '$id_user'");
    $rows1 = $query->row();
    $id_teams = $rows1->team;
    $narasumber1            = $this->input->post('narasumber1');
    $bobot_1_nr1            = $this->input->post('bobot_1_nr1');
    $bobot_5_nr1            = $this->input->post('bobot_5_nr1');
    $manfaat_bobot_3_nr1    = $this->input->post('manfaat_bobot_3_nr1');
    $teknisi_bobot_3_nr1    = $this->input->post('teknisi_bobot_3_nr1');
    $interviewee_nr1_id     = $this->input->post('narasumber1');

    $narasumber2            = $this->input->post('narasumber2');
    $bobot_1_nr2            = $this->input->post('bobot_1_nr2');
    $bobot_5_nr2            = $this->input->post('bobot_5_nr2');
    $manfaat_bobot_3_nr2    = $this->input->post('manfaat_bobot_3_nr2');
    $teknisi_bobot_3_nr2    = $this->input->post('teknisi_bobot_3_nr2');
    $interviewee_nr2_id     = $this->input->post('narasumber2');
    $keterangan             = $this->input->post('keterangan');
    
    //Narasumber 1
    $insert_bobot_5_nr1   = $bobot_5_nr1 * 5;
    $insert_manfaat_3_nr1 = $manfaat_bobot_3_nr1 * 3;
    $insert_teknisi_3_nr1 = $teknisi_bobot_3_nr1 * 3;
    $total1               = $bobot_1_nr1 + $insert_bobot_5_nr1 + $insert_manfaat_3_nr1 + $insert_teknisi_3_nr1;
    $nilai_murni1         = $total1 / 12;
    
    //Narasumber 2
    $insert_bobot_5_nr2   = $bobot_5_nr2 * 5;
    $insert_manfaat_3_nr2 = $manfaat_bobot_3_nr2 * 3;
    $insert_teknisi_3_nr2 = $teknisi_bobot_3_nr2 * 3;
    $total2               = $bobot_1_nr2 + $insert_bobot_5_nr2 + $insert_manfaat_3_nr2 + $insert_teknisi_3_nr2;
    $nilai_murni2         = $total2 / 12;

    $nak = ( $nilai_murni1 + $nilai_murni2 ) / 2;
    
    if($interviewee_nr2_id == NULL){
      $data = array(
        'penulisan_bobot_1_nr1'  		    => $bobot_1_nr1,
        'pembahasan_bobot_5_nr1'  		  => $bobot_5_nr1,
        'manfaat_bobot_3_nr1'  		      => $manfaat_bobot_3_nr1,
        'teknisi_bobot_3_nr1'  		      => $teknisi_bobot_3_nr1,
        'nilai_murni_narasumber_2_nr1'  => $nilai_murni1,
        'interviewee_nr1_id'            => $interviewee_nr1_id,
        'ket'                           => $keterangan,
        'id'     			                  => $users,
        'team'     			                => $id_teams,
        'nak'     			                => $nilai_murni1,
        'status'                        => '1'
      );
    }else{
      $data = array(
        'penulisan_bobot_1_nr1'  		    => $bobot_1_nr1,
        'pembahasan_bobot_5_nr1'  		  => $bobot_5_nr1,
        'manfaat_bobot_3_nr1'  		      => $manfaat_bobot_3_nr1,
        'teknisi_bobot_3_nr1'  		      => $teknisi_bobot_3_nr1,
        'nilai_murni_narasumber_1_nr1'  => $nilai_murni1,
        'interviewee_nr1_id'            => $interviewee_nr1_id,
        'penulisan_bobot_1_nr2'  		    => $bobot_1_nr2,
        'pembahasan_bobot_5_nr2'  		  => $bobot_5_nr2,
        'manfaat_bobot_3_nr2'  		      => $manfaat_bobot_3_nr2,
        'teknisi_bobot_3_nr2'  		      => $teknisi_bobot_3_nr2,
        'nilai_murni_narasumber_2_nr2'  => $nilai_murni2,
        'interviewee_nr2_id'            => $interviewee_nr2_id,
        'ket'                           => $keterangan,
        'team'     			                => $id_teams,
        'nak'     			                => $nak,
        'id'     			                  => $users,
      );
    }
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
    $orderid = 'interviewee_id';
    $data['interviewees']  = $this->ModelSespim->loadQuery($orderid,'interviewees')->result(); 
    $this->load->view('admin/editscores',$data);
  }

  public function updateScores() {
    $id = $this->uri->segment(2);
    $users = $this->input->post('users');
    $query = $this->db->query("SELECT * FROM users WHERE id = '$users'");
    $row = $query->row();
    $id_user = $row->id;

    $query = $this->db->query("SELECT * FROM teams WHERE id = '$id_user'");
    $rows1 = $query->row();
    $id_teams = $rows1->team;
    
    $users                  = $this->input->post('users');
    $narasumber1            = $this->input->post('narasumber1');
    $bobot_1_nr1            = $this->input->post('bobot_1_nr1');
    $bobot_5_nr1            = $this->input->post('bobot_5_nr1');
    $manfaat_bobot_3_nr1    = $this->input->post('manfaat_bobot_3_nr1');
    $teknisi_bobot_3_nr1    = $this->input->post('teknisi_bobot_3_nr1');
    $interviewee_nr1_id     = $this->input->post('narasumber1');
    
    $narasumber2            = $this->input->post('narasumber2');
    $bobot_1_nr2            = $this->input->post('bobot_1_nr2');
    $bobot_5_nr2            = $this->input->post('bobot_5_nr2');
    $manfaat_bobot_3_nr2    = $this->input->post('manfaat_bobot_3_nr2');
    $teknisi_bobot_3_nr2    = $this->input->post('teknisi_bobot_3_nr2');
    $interviewee_nr2_id     = $this->input->post('narasumber2');
    $keterangan             = $this->input->post('keterangan');

    //Narasumber 1
    $insert_bobot_5_nr1   = $bobot_5_nr1 * 5;
    $insert_manfaat_3_nr1 = $manfaat_bobot_3_nr1 * 3;
    $insert_teknisi_3_nr1 = $teknisi_bobot_3_nr1 * 3;
    $total1               = $bobot_1_nr1 + $insert_bobot_5_nr1 + $insert_manfaat_3_nr1 + $insert_teknisi_3_nr1;
    $nilai_murni1         = $total1 / 12;
    
    //Narasumber 2
    $insert_bobot_5_nr2   = $bobot_5_nr2 * 5;
    $insert_manfaat_3_nr2 = $manfaat_bobot_3_nr2 * 3;
    $insert_teknisi_3_nr2 = $teknisi_bobot_3_nr2 * 3;
    $total2               = $bobot_1_nr2 + $insert_bobot_5_nr2 + $insert_manfaat_3_nr2 + $insert_teknisi_3_nr2;
    $nilai_murni2         = $total2 / 12;

    $nak = ( $nilai_murni1 + $nilai_murni2 ) / 2;
    
		if($interviewee_nr2_id == NULL){
      $data = array(
        'penulisan_bobot_1_nr1'  		    => $bobot_1_nr1,
        'pembahasan_bobot_5_nr1'  		  => $bobot_5_nr1,
        'manfaat_bobot_3_nr1'  		      => $manfaat_bobot_3_nr1,
        'teknisi_bobot_3_nr1'  		      => $teknisi_bobot_3_nr1,
        'nilai_murni_narasumber_2_nr1'  => $nilai_murni1,
        'interviewee_nr1_id'            => $interviewee_nr1_id,
        'ket'                           => $keterangan,
        'id'     			                  => $users,
        'team'     			                => $id_teams,
        'nak'     			                => $nilai_murni1,
        'status'                        => '1'
      );
    }else{
      $data = array(
        'penulisan_bobot_1_nr1'  		    => $bobot_1_nr1,
        'pembahasan_bobot_5_nr1'  		  => $bobot_5_nr1,
        'manfaat_bobot_3_nr1'  		      => $manfaat_bobot_3_nr1,
        'teknisi_bobot_3_nr1'  		      => $teknisi_bobot_3_nr1,
        'nilai_murni_narasumber_1_nr1'  => $nilai_murni1,
        'interviewee_nr1_id'            => $interviewee_nr1_id,
        'penulisan_bobot_1_nr2'  		    => $bobot_1_nr2,
        'pembahasan_bobot_5_nr2'  		  => $bobot_5_nr2,
        'manfaat_bobot_3_nr2'  		      => $manfaat_bobot_3_nr2,
        'teknisi_bobot_3_nr2'  		      => $teknisi_bobot_3_nr2,
        'nilai_murni_narasumber_2_nr2'  => $nilai_murni2,
        'interviewee_nr2_id'            => $interviewee_nr2_id,
        'ket'                           => $keterangan,
        'id'     			                  => $users,
        'team'     			                => $id_teams,
        'nak'     			                => $nak,
        'status'                        => '0'
      );
    }
		
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

  public function teams()
	{
    $id = 'team_id';
    $data['teams']  = $this->ModelSespim->loadQueryRelationTeams($id,'teams')->result();
		$this->load->view('admin/table-teams',$data);
  }

  public function topics()
	{
    $id = 'topic_id';
    $data['topics']  = $this->ModelSespim->loadQueryRelationTopics($id,'topics')->result();
		$this->load->view('admin/table-topics',$data);
  }

  public function insertTopics(){    
    $query = $this->db->query("SELECT * FROM users");      
      while ($row = $query->unbuffered_row()) {
      
      $numbers = range(1, 5);
      shuffle($numbers);
      foreach($numbers as $number) {
          $data = array(
            'id'  			    => $row->id,
            'topic'  		    => $number
          );
      }
      $this->ModelSespim->insertQueryForeach('topics',$data);
    }
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='topics';
    </script>");
  }
  
  public function deleteTopics() {
    $id = $this->uri->segment(2);
    $this->ModelSespim->deleteQueryAll('topics');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../topics';
     </script>");
  }

  public function insertTeams(){    

    $query = $this->db->query("SELECT * FROM users");      
      while ($row = $query->unbuffered_row()) {
      
      $numbers = range(1, 5);
      shuffle($numbers);
      foreach($numbers as $number) {
          $data = array(            
            'team'  		    => $number,
            'id'  			    => $row->id
          );
      }

        $this->ModelSespim->insertQueryForeach('teams',$data);
      }
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='teams';
    </script>");
  }

  public function deleteTeams() {
    $id = $this->uri->segment(2);
    $this->ModelSespim->deleteQueryAll('teams');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../teams';
     </script>");
  }

  public function kodenaskah()
	{
    $data['kode_naskah']  = $this->ModelSespim->loadQueryRelationKodeNaskah()->result();    
		$this->load->view('admin/table-kodenaskah',$data);
  }

  public function deleteKode() {
    $id = $this->uri->segment(2);
    $this->ModelSespim->deleteQueryAll('kodenaskah');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../kodenaskah';
     </script>");
  }

  public function insertKode(){    
    $query = $this->db->query("SELECT * FROM users");          
      function angkaangkaunik($start, $end, $banyak) {
        $angka = range($start, $end);
        shuffle($angka);
        return array_slice($angka, 0, $banyak);
      }
      $x = angkaangkaunik(1, 160, 160);
      $i = 0;
      $query = $this->db->query("SELECT * FROM users");  
        while ($row = $query->unbuffered_row()) {
            $data = array(
              'kode_naskah'   => $x[$i++],
              'id'            => $row->id
            );
            $this->ModelSespim->insertQueryForeach('kodenaskah',$data);    
        }    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='kodenaskah';
    </script>");  
  }

  public function exam()
	{
    $data['pok_uji']  = $this->ModelSespim->loadQueryRelationPokUji()->result();
		$this->load->view('admin/table-exam',$data);
  }

  public function insertPok_uji(){    
    $query = $this->db->query("SELECT * FROM users");      
      while ($row = $query->unbuffered_row()) {
      
      $numbers = range(1, 25);
      shuffle($numbers);
      foreach($numbers as $number) {
          $data = array(
            'id'  			    => $row->id,
            'pok_uji'  		  => $number
          );
      }
      $this->ModelSespim->insertQueryForeach('pok_uji',$data);
    }
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='exam';
    </script>");  
  }

  public function deletePok_uji() {
    $id = $this->uri->segment(2);
    $this->ModelSespim->deleteQueryAll('pok_uji');
    echo ("<script LANGUAGE='JavaScript'>
     window.alert('Delete Data');
     window.location.href='../exam';
     </script>");
  }

  public Function logout(){
		$this->session->sess_destroy();
		redirect('../');
  }
}
