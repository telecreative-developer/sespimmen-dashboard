<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SespimLogin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function login(){
		$username    = $this->input->post('username');
		$password 	 = SHA1($this->input->post('password'));

	
		$data = array(
				'username' 	=> $username,
				'password'  => $password
		  );
		$cek_login    = $this->ModelLogin->CheckLogin($data);
		  if ($cek_login->num_rows() > 0) {
			  foreach ($cek_login->result() as $sess) {
				  $sess_data['id_admin'] 		= $sess->id_admin;
				  $sess_data['username'] 	= $sess->username;
				  $x = $this->session->set_userdata($sess_data);
			  }
			   echo ("<script LANGUAGE='JavaScript'>
				 window.alert('Login berhasil');
				 window.location.href='dashboard';
				 </script>");
			}
			
			else{
			   echo ("<script LANGUAGE='JavaScript'>
				 window.alert('Username atau Password anda salah');
				 window.location.href='../';
				 </script>");
		}

	 }  
	 
}
