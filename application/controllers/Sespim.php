<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sespim extends CI_Controller {
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
    $targetPath		= '/var/www/sespim/assets/images/events/'; 
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

  public function banner()
	{
    $id = 'banner_id';
    $data['banners']  = $this->ModelSespim->loadQuery($id,'banners')->result();
		$this->load->view('admin/table-banners',$data);
  }

  public function addbanner()
	{
		$this->load->view('admin/addbanners');
  }

  public function insertbanner(){
    $imageUrl = base_url();
    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/banners/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
    $x = substr($fileName,10);

      $data = array(
        'banner_url'	  => $imageUrl."assets/images/banners/".$fileName,
        'banner_loc'	  => $fileName
      );
    $this->ModelSespim->insertQuery('banners',$data); 
    
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Success Data');
    window.location.href='banner';
    </script>");
  }

  public function editbanner()
	{
    $id = $this->uri->segment(2);
    $where = 'banner_id';
    $data['banner'] = $this->ModelSespim->loadQueryById($where,$id,'banners')->result();
		$this->load->view('admin/editbanners',$data);
  }

  public function updatebanner() {
    $imageUrl = base_url();
    $id = $this->uri->segment(2);
    $tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	  
    $targetPath		= '/var/www/sespim/assets/images/banners/'; 
		$targetFile 	= $targetPath . $fileName;
    move_uploaded_file($tempFile, $targetFile);
   

    $file = substr($fileName,10);
    
    $data = array(
        'banner_url'	  => $imageUrl."assets/images/banners/".$fileName,
        'banner_loc'	  => $fileName
    );
    $where = array(
        'banner_id' => $id
    );
    $this->ModelDeleteImage->deletebanner($id);
    $this->ModelSespim->updateQuery($where,$data,'banners');
    
		echo ("<script LANGUAGE='JavaScript'>
    window.alert('Update Data');
    window.location.href='../banner';
    </script>");
  }

  public function delete_banner() {
    $id = $this->uri->segment(2);
    $idwhere = 'banner_id';
    $this->ModelDeleteImage->deletebanner($id);
    $this->ModelSespim->deleteQuery($idwhere,$id,'banners');
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Delete Data');
    window.location.href='../banner';
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

  public function pagesposts()
	{
    $id = $this->uri->segment(2);
    $data['posts']  = $this->ModelSespim->loadQueryRelationPostWhere($id)->result();
		$this->load->view('admin/pages-posts',$data);
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
   error_reporting(0);
$id = $this->uri->segment(2);
    $query = $this->db->query("SELECT * FROM users WHERE id = '$id'");
    $row = $query->row();
    $first = $row->first_name;
    $last = $row->last_name;
    $x =  ucfirst($first)." ". ucfirst($last);
    
    $this->email->from('donihermawanj11@gmail.com','Aktifasi Akun'); 
    $this->email->to($row->email); 
    $this->email->subject('Aktifasi Akun'); 
     echo $this->email->message(
      "
    <html xmlns='http://www.w3.org/1999/xhtml'>
      <head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
      <title>Aktifasi Akun</title>
      <style type='text/css'>
        body {padding-top: 0 !important;padding-bottom: 0 !important;padding-top: 0 !important;padding-bottom: 0 !important;margin:0 !important;width: 100% !important;
        -webkit-text-size-adjust: 100% !important;-ms-text-size-adjust: 100% !important;-webkit-font-smoothing: antialiased !important;}
        .tableContent img {border: 0 !important;display: block !important;outline: none !important;}a{color:#382F2E;}
        p, h1{color:#382F2E;margin:0;}p{text-align:left;color:#999999;font-size:14px;font-weight:normal;line-height:19px;}
        a.link1{color:#382F2E;}a.link2{font-size:16px;text-decoration:none;color:#ffffff;}h2{text-align:left;color:#222222; font-size:19px;font-weight:normal;}div,p,ul,h1{
        margin:0;}.bgBody{background: #ffffff;}.bgItem{background: #ffffff;}@media only screen and (max-width:480px){table[class='MainContainer'], td[class='cell'] 
        {width: 100% !important;height:auto !important;}td[class='specbundle']{width:100% !important;float:left !important;font-size:13px !important;
        line-height:17px !important;display:block !important;padding-bottom:15px !important;}td[class='spechide']{
        display:none !important;}img[class='banner']{width: 100% !important;height: auto !important;}td[class='left_pad'] {padding-left:15px !important;padding-right:15px !important;}}
        @media only screen and (max-width:540px){table[class='MainContainer'], td[class='cell']{width: 100% !important;height:auto !important; }td[class='specbundle'] {
        width:100% !important;float:left !important;font-size:13px !important;line-height:17px !important;display:block !important;padding-bottom:15px !important;}
        td[class='spechide']{display:none !important;}img[class='banner'] {width: 100% !important;height: auto !important;}.font {font-size:18px !important;line-height:22px !important;}
        .font1 {font-size:18px !important;line-height:22px !important;}}
      </style>
      <script type='colorScheme' class='swatch active'>
        {'name':'Default','bgBody':'ffffff','link':'382F2E','color':'999999','bgItem':'ffffff','title':'222222'}
      </script>
      </head>
        <body paddingwidth='0' paddingheight='0'   style='padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
              <table bgcolor='#ffffff' width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent' align='center'  style='font-family:Helvetica, Arial,serif;'>
            <tbody>
              <tr>
                <td><table width='600' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#ffffff' class='MainContainer'>
            <tbody>
              <tr>
                <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tbody>
              <tr>
                <td valign='top' width='40'>&nbsp;</td>
                <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tbody>
              <tr>
                <td height='75' class='spechide'></td>
              </tr>
              <tr>
                <td class='movableContentContainer ' valign='top'>
                  <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tbody>
              <tr>
                <td height='35'></td>
              </tr>
              <tr>
                <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tbody>
              <tr>
                <td valign='top' align='center' class='specbundle'><div class='contentEditableContainer contentTextEditable'>
                    <div class='contentEditable'>
                      <p style='text-align:center;font-family:Georgia,Time,sans-serif;font-size:20px;color:#222222;'><span class='specbundle2'><span class='font1'>Sipamen - Sistem Informasi Pendidikan Sespimmen&nbsp;</span></span></p>
                    </div>
                  </div></td>
                <td valign='top' class='specbundle'><div class='contentEditableContainer contentTextEditable'>
                    <div class='contentEditable'>
                      <p style='margin:0;font-family:Georgia,Time,sans-serif;font-size:26px;color:#69C374;'><span class='font'></span> </p>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          </td>
              </tr>
            </tbody>
          </table>
              </div>
              <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
                  <tr>
                    <td valign='top' align='center'>
                      <div class='contentEditableContainer contentImageEditable'>
                        <div class='contentEditable'>
                          <img src='https://res.cloudinary.com/rendisimamora/image/upload/v1522837084/line_chs8vz.png' width='251' height='43' alt='' data-default='placeholder' data-max-width='560'>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
                <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
                <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center'>
		<tr>
                  <td height='55'>
                    <center><img src='https://res.cloudinary.com/rendisimamora/image/upload/v1522840764/default_ze1slc.jpg' width='200px'/></center>
                  </td>
                </tr>
                    <tr>
                      <td align='left'>
                        <div class='contentEditableContainer contentTextEditable'>
                          <div class='contentEditable' align='center'>
                            <h2>Hai ".$x."</h2>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr><td height='15'> </td></tr>
                  <tr>
                    <td align='left'>
                      <div class='contentEditableContainer contentTextEditable'>
                        <div class='contentEditable' align='center'>
                          <p >
                            Selamat, Akun anda telah berhasil diverifikasi. Sekarang anda sudah terdaftar sebagai anggota Sipamen ( Sistem Informasi Pendidikan Sespimmen ). 
                            <br>
                            <br>
                            Ada pertanyaan? Hubungi kami melalui email ke tim dukungan kami.
                            <br>
                            <br>
                            Cheers,
                            <br>
                            <span style='color:#222222;'>Admin Sipamen</span>

                          </p>
                        </div>
                      </div>
                    </td>
                  </tr>
              </table>
            </div>
                  <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tbody>
              <tr>
                <td height='65'>
              </tr>
              <tr>
                <td  style='border-bottom:1px solid #DDDDDD;'></td>
              </tr>
              <tr><td height='25'></td></tr>
              <tr>
                <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tbody>
              <tr>
                <td valign='top' class='specbundle'><div class='contentEditableContainer contentTextEditable'>
                  <div class='contentEditable' align='center'>
                    <p  style='text-align:left;color:#CCCCCC;font-size:12px;font-weight:normal;line-height:20px;'>
                      <span style='font-weight:bold;'>SIPAMEN</span>
                      <br>
                      Sistem Informasi Pendidikan Sespimmen
                      <br>
                    </p>
                  </div>
                </div></td>
                <td valign='top' width='30' class='specbundle'>&nbsp;</td>
                <td valign='top' class='specbundle'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
            <tbody>
            </tbody>
          </table>
          </td>
              </tr>
            </tbody>
          </table>
          </td>
              </tr>
              <tr><td height='88'></td></tr>
            </tbody>
          </table>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          </td>
                <td valign='top' width='40'>&nbsp;</td>
              </tr>
            </tbody>
          </table>
          </td>
              </tr>
            </tbody>
          </table>
          </td>
              </tr>
            </tbody>
          </table>
        </body>
    </html>

    ");   
     
    
    $data = array(
      'verified'     => 1,
		);
		
		$where = array(
			'id' => $id
    );
    $this->email->send(); 
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
