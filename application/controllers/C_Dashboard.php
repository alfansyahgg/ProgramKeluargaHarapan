<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

	
	function __construct(){
		parent::__construct();

		$this->load->model('M_login');
		$this->load->model('M_dashboard');
        $this->load->library('form_validation');
	}

	//fungsi bawaan dari codeigniter, diman

	public function index()
	{
		if($this->session->role == "warga"){        		
	    	$nik = $this->session->username;
	    	$dataDiri = $this->M_dashboard->getDetailAkun($nik);
	    	$data["dataDiri"] = $dataDiri;
		}else{
			$data["status_admin"] = $this->M_dashboard->getDetailAdmin($this->session->username);
		}
        $this->load->view('Dashboard/V_Dashboard' , $data);
	}

	public function checkSessionAdmin(){
		if($this->session->role == "warga"){
			echo "akses dilarang";exit();
		}
	}

	public function datadiri(){
		$nik = $this->session->username;
    	$dataDiri = $this->M_dashboard->getDetailAkun($nik);
    	$data["dataDiri"] = $dataDiri;

    	// echo "<pre>";print_r($data);exit();

    	$this->load->view('Dashboard/V_DataDiri' , $data);
	}

	public function changePsw(){
		$data["status_admin"] = $this->M_dashboard->getDetailAdmin($this->session->username);
		$this->load->view('Dashboard/V_ChangePassword',$data);
	}

	public function changePassword(){
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE)
        {
        	if($this->session->role == "warga"){        		
		    	$nik = $this->session->username;
		    	$dataDiri = $this->M_dashboard->getDetailAkun($nik);
		    	$data["dataDiri"] = $dataDiri;
			}else{
				$data["status_admin"] = $this->M_dashboard->getDetailAdmin($this->session->username);
			}
	        $this->load->view('Dashboard/V_ChangePassword' , $data);
        }
        else
        {
        	$username = $this->session->username;
        	$nama = $this->input->post('nama');
        	$password = $this->input->post('password');

        	$this->M_dashboard->changePassword($username,$password,$nama);
        	redirect('index/');
        	
        }
	}

	public function updateDataDiri(){		               
		$nik = $this->input->post('nik');
		$no_kk = $this->input->post('no_kk');
		$nama = strtoupper(trim($this->input->post('nama')));
		$tempat_lahir = strtoupper(trim($this->input->post('tempat_lahir')));
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$nohp = $this->input->post('no_hp');
		$alamat = strtoupper(trim($this->input->post('alamat')));

		$data = [
			"nik" => $nik,
			"no_kk" => $no_kk,
			"nama" => $nama,
			"tempat_lahir" => $tempat_lahir,
			"tanggal_lahir" => $tanggal_lahir,
			"jeniskelamin" => $jeniskelamin,
			"no_hp" => $nohp,
			"alamat" => $alamat
		];

		// echo "<pre>";print_r($passwordAwal);exit();

		$this->M_dashboard->updateDataDiri($nik,$data);

		redirect('index/');
	}

	public function about(){
		$this->load->view('Dashboard/V_About');
	}

}
