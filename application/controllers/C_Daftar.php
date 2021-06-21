<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Daftar extends CI_Controller {

	
	function __construct(){
		parent::__construct();		
        $this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('V_Daftar');
	}

	public function action()
	{
		$this->load->model("M_daftar");

		$this->form_validation->set_rules('nik', 'NIK', 'required|min_length[16]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('V_Daftar');
        }
        else
        {
                
			$nik = $this->input->post('nik');
			$nama = strtoupper(trim($this->input->post('nama')));
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$nohp = $this->input->post('nohp');

			//format ulang tanggal lahir
			$tanggal_lahirFormat = date("d-m-Y", strtotime($tanggal_lahir));

			// echo "<pre>";print_r($tanggal_lahirFormat);exit();

			//format password dari tanggal lahir
			$expTanggalLahir = explode("-", $tanggal_lahirFormat);

			$hari = $expTanggalLahir[0];
			$bulan = $expTanggalLahir[1];
			$tahun = $expTanggalLahir[2];

			$passwordAwal = $hari.$bulan.$tahun;

			$data = [
				"nik" => $nik,
				"nama" => $nama,
				"tanggal_lahir" => $tanggal_lahir,
				"no_hp" => $nohp,
				"password" => md5($passwordAwal)
			];

			// echo "<pre>";print_r($passwordAwal);exit();

			$inputData =  $this->M_daftar->inputData($data);

			$this->session->set_flashdata('status_daftar', 'y');
			$this->session->set_flashdata('nik', $nik);
			$this->session->set_flashdata('password', $passwordAwal);
			redirect('daftar/hasil');
        }		
	}

	public function hasil()
	{
		$this->load->view('V_HasilDaftar');
	}
}
