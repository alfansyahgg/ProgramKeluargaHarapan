<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Index extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
		$this->load->model('M_dashboard');
        $this->load->library('form_validation');
	}

	public function index()
	{
		 if($this->session->logged_in == FALSE){
            $this->load->view('V_Login');
        }else{

        	if($this->session->role == "warga"){        		
	        	$nik = $this->session->username;
	        	$dataDiri = $this->M_dashboard->getDetailAkun($nik);
	        	if(!isset($dataDiri[0]['status_seleksi'])){
	        		$dataDiri[0]['status_seleksi'] = 5;
	        	}
	        	$data["dataDiri"] = $dataDiri;
        	}else{
        		$data["status_admin"] = $this->M_dashboard->getDetailAdmin($this->session->username);
        	}

        	// echo "<pre>";print_r($data);exit();
            $this->load->view('Dashboard/V_Dashboard' , $data);
        }
	}

	public function login(){
		$db = get_instance()->db->conn_id;
		$nik 	= mysqli_real_escape_string($db,stripslashes(strip_tags(htmlspecialchars($this->input->post('nik')))));
		$password 	= mysqli_real_escape_string($db,stripslashes(strip_tags(htmlspecialchars($this->input->post('password')))));

		$akunPengelola = $this->M_login->getAkunPengelola();

		for($i = 0;$i <sizeof($akunPengelola);$i++ ){
			if(strtolower($nik) == strtolower($akunPengelola[$i]['username'])){
				$cek		= $this->M_login->loginPengelola($nik,$password);	
				if(!empty($cek)){					
					$session['username'] = $nik;
					$session['userid'] = $cek[0]['id_user'];
					$session['nama_admin'] = $cek[0]['nama']; 
					$session['role'] = 'admin';
					$session['logged_in'] = true;

					$this->session->set_userdata($session);
					$this->session->unset_userdata('gagal');
					redirect('login/');
					return;
				}else{
					$session['gagal'] = 1;
					$this->session->set_userdata($session);
					$this->session->set_flashdata('status','gagal');
					redirect('login/');
					return;
				}
			}
		}
		//end for

			$cek		= $this->M_login->loginWarga($nik,$password);
			if(!empty($cek)){
				$session['username'] = $nik;
				$session['role'] = 'warga';
				$session['logged_in'] = true;

				// echo "<pre>";print_r($session);exit();

				$this->session->set_userdata($session);
				$this->session->unset_userdata('gagal');
				redirect('login/');
			}else{
				// echo "<pre>";print_r($cek);
				$session['gagal'] = 1;
				$this->session->set_userdata($session);
				$this->session->set_flashdata('status','gagal');
				redirect('login/');
			}
	}

	public function Logout()
    {
        $this->session->sess_destroy();
        redirect('C_Index');
    }

}
