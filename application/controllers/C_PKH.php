<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PKH extends CI_Controller {

	
	function __construct(){
		parent::__construct();

        $this->load->library('form_validation');
		$this->load->model('M_dashboard');
		$this->load->model('M_pkh');
		date_default_timezone_set('Asia/Jakarta');
	}

	//fungsi bawaan dari codeigniter, diman

	public function index()
	{
		if($this->session->role != "warga"){
			echo "akses dilarang";
			return;
		}


		$rowPKH = $this->M_pkh->getRowPKH($this->session->username);

        // echo "<pre>";print_r($rowPKH);exit();
        if($rowPKH > 0){
        	redirect('index');
        }

		$nik = $this->session->username;
    	$dataDiri = $this->M_dashboard->getDetailAkun($nik);
    	$data["dataDiri"] = $dataDiri;
		$this->load->view('PKH/V_Input',$data);
	}

	public function inputDataPKH(){

		if($this->session->role != "warga"){
			echo "akses dilarang";
			return;
		}

		$getID 		= $this->M_pkh->getIdPKH();

		$usedID		= [];
		foreach ($getID as $key => $value) {			
			array_push($usedID, $value['id_pkh']);
		}

		do {
		    $id_pkh = random_int(10000, 99999);
		} while(in_array($id_pkh, $usedID));

		$nik 			= $this->input->post('nik');
		$no_kk 			= $this->input->post('no_kk');
		$status_bekerja = $this->input->post('status_bekerja');
		$penghasilan 	= $this->input->post('penghasilan');
		$tanggungan 	= $this->input->post('tanggungan');
		$kondisi_rumah	= $this->input->post('kondisi_rumah');
		$kepemilikan_rumah	= $this->input->post('kepemilikan_rumah');
		$tanggal_input = date('Y-m-d H:i:s');

				

		if(empty($penghasilan)){
			$penghasilan = 0;
		}

		if (!is_dir('uploads/foto_kk/' . $nik))
	    {
	        mkdir('./uploads/foto_kk/' . $nik, 0777, true);
	    }

		$config['upload_path']          = './uploads/foto_kk/'.$nik;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5192;
        $config['overwrite']            = true;

        // echo "<pre>";print_r($error);exit();

        $this->load->library('upload', $config);

         // echo "<pre>";print_r($_FILES['foto_wakil']);exit();

        $namaFileKK = "KK_".$nik;
        $namaFileFotoWakil = "Wakil_".$nik;

        $extensionKK = pathinfo( $_FILES["foto_kk"]["name"], PATHINFO_EXTENSION );
        $extensionWakil = pathinfo( $_FILES["foto_wakil"]["name"], PATHINFO_EXTENSION );

		$_FILES['foto_kk']['name'] = $namaFileKK.".".$extensionKK;
		$_FILES['foto_wakil']['name'] = $namaFileFotoWakil.".".$extensionWakil;

        if ( ! $this->upload->do_upload('foto_kk'))
        {
                $error = array('error1' => $this->upload->display_errors());
                echo "<pre>";print_r($error);exit();

                $this->load->view('PKH/V_Input', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('PKH/V_Input', $data);
        }

        if ( ! $this->upload->do_upload('foto_wakil'))
        {
                $error = array('error2' => $this->upload->display_errors());
                echo "<pre>";print_r($error);exit();

                $this->load->view('PKH/V_Input', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('PKH/V_Input', $data);
        }

        $data = [
        	"id_pkh" => $id_pkh,
        	"nik" => $nik,
        	"status_bekerja" => $status_bekerja,
        	"penghasilan" => $penghasilan,
        	"kondisi_rumah" => $kondisi_rumah,
        	"scan_kk" => $_FILES['foto_kk']['name'],
        	"jumlah_tanggungan" => $tanggungan,
        	"kepemilikan_rumah" => $kepemilikan_rumah,
        	"tanggal_input" => $tanggal_input,
        	"foto_wakil" => $_FILES['foto_wakil']['name'],
        	"status_seleksi" => 0
        ];


        // echo "<pre>";print_r($data);exit();
        $this->M_pkh->inputData($data);

        redirect('PKH/hasil');
	}

	public function seleksi(){
		if($this->session->role != "admin"){
			echo "akses dilarang";
			return;
		}

		$seleksi = $this->M_pkh->getDataSeleksi();

		$data['seleksi'] = $seleksi;

		$this->load->view('PKH/V_Seleksi', $data);
	}

	public function hasil(){
		$nik = $this->session->username;
		$jumlahData = $this->M_pkh->getJumlahHasilSeleksi($nik);
		if($jumlahData == 0 ){
			$data['status_seleksi'] = 5;
			$data['class'] = 'warning';
			$data['teks'] = "ANDA BELUM MENGINPUTKAN DATA YANG DIBUTUHKAN";
			$data['teks2'] = "Lengkapi data diri dan lakukan input data di menu input data di halaman utama.";
		}else{
			$dataSeleksi = $this->M_pkh->getHasilSeleksi($nik);
			// echo "<pre>";print_r($dataSeleksi);exit();
			foreach ($dataSeleksi as $key => $value) {
				if($value['status_seleksi'] == 0){
					$data['status_seleksi'] = 0;
					$data['class'] = 'info';
					$data['teks'] = "ANDA SUDAH MENGINPUTKAN DATA";
					$data['teks2'] = "Mohon tunggu hasil seleksi sampai waktu dan tanggal yang ditentukan.";
					$data['dataSeleksi'] = $dataSeleksi;
				}else if($value['status_seleksi'] == 1){
					$data['status_seleksi'] = 1;
					$data['class'] = 'success';
					$data['teks'] = "SELAMAT ANDA DINYATAKAN LULUS SELEKSI PROGRAM PKH";
					$data['teks2'] = "";
					$data['dataSeleksi'] = $dataSeleksi;
				}else{
					$data['status_seleksi'] = 2;
					$data['class'] = 'danger';
					$data['teks'] = "MOHON MAAF, ANDA DINYATAKAN TIDAK LOLOS SELEKSI PROGRAM PKH";
					$data['teks2'] = "";
					$data['dataSeleksi'] = $dataSeleksi;
				}
			}
		}
		// echo "<pre>";print_r($data);exit();
		$this->load->view('PKH/V_Hasil',$data);
	}

	public function detailSeleksi(){
		$id_pkh = $this->input->get('id_pkh');

		$dataSeleksi = $this->M_pkh->getHasilSeleksiByIdPKH($id_pkh);

		$tanggal_input = $dataSeleksi[0]['tanggal_input'];
		$arrTanggal = explode("-", $tanggal_input);
		$tahun = $arrTanggal[0];
		$bulan = $arrTanggal[1];
		$tanggal = substr($arrTanggal[2], 0, 2);
		$namaBulan = $this->namaBulan($bulan);

		$dataSeleksi[0]['tanggal_indo'] = $tanggal." ".$namaBulan." ".$tahun;


		// echo "<pre>";print_r($dataSeleksi);exit();
		$data['dataSeleksi'] = $dataSeleksi;

		$this->load->view('PKH/V_DetailSeleksi',$data);
	}

	public function inputSeleksi(){

		$id = $this->input->post('id');
		$status = $this->input->post('status');	
		$id_admin = $this->session->userid;

		$this->M_pkh->inputStatus($id,$status,$id_admin);

		redirect('PKH/admin/seleksi');
	}

	public function editDataPkh($id){
		$dataSeleksi = $this->M_pkh->getHasilSeleksiByIdPKH($id);
		// echo "<pre>";print_r($dataSeleksi);exit();
		if($dataSeleksi[0]['status_seleksi'] != 0){
			redirect('index');
		}

		$tanggal_input = $dataSeleksi[0]['tanggal_input'];
		$arrTanggal = explode("-", $tanggal_input);
		$tahun = $arrTanggal[0];
		$bulan = $arrTanggal[1];
		$tanggal = substr($arrTanggal[2], 0, 2);
		$namaBulan = $this->namaBulan($bulan);

		$dataSeleksi[0]['tanggal_indo'] = $tanggal." ".$namaBulan." ".$tahun;


		// echo "<pre>";print_r($dataSeleksi);exit();
		$data['dataSeleksi'] = $dataSeleksi;

		$this->load->view('PKH/V_EditPKH',$data);
	}

	public function updateDataPkh(){

		$id_pkh = $this->input->post('id');
		$nik = $this->input->post('nik');
		$status_bekerja = $this->input->post('status_bekerja');
		$penghasilan 	= $this->input->post('penghasilan');
		$tanggungan 	= $this->input->post('tanggungan');
		$kondisi_rumah	= $this->input->post('kondisi_rumah');
		$kepemilikan_rumah	= $this->input->post('kepemilikan_rumah');
		$tanggal_edit = date('Y-m-d H:i:s');


		$data = [
        	"status_bekerja" => $status_bekerja,
        	"penghasilan" => $penghasilan,
        	"kondisi_rumah" => $kondisi_rumah,
        	"jumlah_tanggungan" => $tanggungan,
        	"kepemilikan_rumah" => $kepemilikan_rumah,
        	"tanggal_edit" => $tanggal_edit
        ];

		$config['upload_path']          = './uploads/foto_kk/'.$nik;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5192;
        $config['overwrite']            = true;

		if(empty($penghasilan)){
			$penghasilan = 0;
		}
		// echo "<pre>";print_r($_FILES);exit();

		if(!empty($_FILES['foto_kk']['name']))
		{
			// echo "aaa";exit();
			if (!is_dir('uploads/foto_kk/' . $nik))
		    {
		        mkdir('./uploads/foto_kk/' . $nik, 0777, true);
		    }

	        // echo "<pre>";print_r($error);exit();

	        $this->load->library('upload', $config);

	         // echo "<pre>";print_r($_FILES['foto_wakil']);exit();

	        $namaFileKK = "KK_".$nik;

	        $extensionKK = pathinfo( $_FILES["foto_kk"]["name"], PATHINFO_EXTENSION );

			$_FILES['foto_kk']['name'] = $namaFileKK.".".$extensionKK;

	        if ( ! $this->upload->do_upload('foto_kk'))
	        {
	                $error = array('error1' => $this->upload->display_errors());
	                echo "<pre>";print_r($error);exit();

	                $this->load->view('PKH/V_Input', $error);
	        }
	        else
	        {
	                $success = array('upload_data' => $this->upload->data());
	                $data['scan_kk'] = $_FILES['foto_kk']['name'];

	                $this->load->view('PKH/V_Input', $success);
	        }
		}

		if(!empty($_FILES['foto_wakil']['name']))
		{
			if (!is_dir('uploads/foto_kk/' . $nik))
		    {
		        mkdir('./uploads/foto_kk/' . $nik, 0777, true);
		    }

	        // echo "<pre>";print_r($error);exit();

	        $this->load->library('upload', $config);

	        $namaFileFotoWakil = "Wakil_".$nik;

	        $extensionWakil = pathinfo( $_FILES["foto_wakil"]["name"], PATHINFO_EXTENSION );

			$_FILES['foto_wakil']['name'] = $namaFileFotoWakil.".".$extensionWakil;

	        if ( ! $this->upload->do_upload('foto_kk'))
	        {
	                $error = array('error1' => $this->upload->display_errors());
	                echo "<pre>";print_r($error);exit();

	                $this->load->view('PKH/V_Input', $error);
	        }
	        else
	        {
	                $success = array('upload_data' => $this->upload->data());
	                $data['foto_wakil'] = $_FILES['foto_wakil']['name'];

	                $this->load->view('PKH/V_Input', $success);
	        }
		}

		// echo "<pre>";print_r($data);exit();


        $this->M_pkh->updateData($id_pkh,$data);
        redirect('index/');

	}

	function cetakData($id){
		$dataSeleksi = $this->M_pkh->cetakByIdPKH($id);

		$tanggal_input = $dataSeleksi[0]['tanggal_input'];
		$arrTanggal = explode("-", $tanggal_input);
		$tahun = $arrTanggal[0];
		$bulan = $arrTanggal[1];
		$tanggal = substr($arrTanggal[2], 0, 2);
		$namaBulan = $this->namaBulan($bulan);

		$tanggal_lahir = $dataSeleksi[0]['tanggal_lahir'];
		$arrTanggalLahir = explode("-", $tanggal_lahir);
		$tahunLahir = $arrTanggalLahir[0];
		$bulanLahir = $arrTanggalLahir[1];
		$tanggalLahir = substr($arrTanggalLahir[2], 0, 2);
		$bulanLahir  = $this->namaBulan($bulanLahir);


		$dataSeleksi[0]['tanggal_indo'] = $tanggal." ".$namaBulan." ".$tahun;
		$dataSeleksi[0]['string_tanggal_lahir'] = $tanggalLahir." ".$bulanLahir." ".$tahunLahir;

		$data['dataSeleksi'] = $dataSeleksi;


		// echo "<pre>";print_r($data);exit();
		require_once 'application/third_party/mpdf/vendor/autoload.php';

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
		$mpdf->showImageErrors = true;

		$html = $this->load->view('PKH/V_CetakHasil', $data, true);
		
		$stylesheet2 = file_get_contents(base_url('assets/custom/css/custom-cetak.css'));

		// $mpdf->WriteHTML('<h1>Hello world!</h1>');

		$mpdf->WriteHTML($stylesheet2,1);
		$mpdf->WriteHTML($html,2);
		// $pdf->Output($filename, 'I');
		$mpdf->Output('kompikaleng_tabel.pdf','I');
	}

	function namaBulan($bulan){
		switch ($bulan) {
			case '01':
				return 'Januari';
				break;
			case '02':
				return 'Februari';
				break;
			case '03':
				return 'Maret';
				break;
			case '04':
				return 'April';
				break;
			case '05':
				return 'Mei';
				break;
			case '06':
				return 'Juni';
				break;
			case '07':
				return 'Juli';
				break;
			case '08':
				return 'Agustus';
				break;
			case '09':
				return 'September';
				break;
			case '10':
				return 'Oktober';
				break;
			case '11':
				return 'November';
				break;
			case '12':
				return 'Desember';
				break;
			
			default:
				return 'Nama Bulan';
				break;
		}
	}

}
