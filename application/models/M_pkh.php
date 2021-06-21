<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pkh extends CI_Model {


	public function inputData($data)
	{
		return $this->db->insert('tb_inputpkh',$data);
	}

	public function getRowPKH($nik){
		$this->db->where('nik',$nik);
		$this->db->from('tb_inputpkh');
		return $this->db->count_all_results();
	}

	public function getIdPKH(){
		$this->db->select('id_pkh');
		$this->db->from('tb_inputpkh');
		return $this->db->get()->result_array();
	}

	public function getDataSeleksi(){
		$this->db->select('user.nama,user.alamat,user.tempat_lahir,user.tanggal_lahir,pkh.*');
		$this->db->from('tb_inputpkh as pkh');
		$this->db->join('tb_user as user', 'pkh.nik = user.nik','inner');
		$this->db->where('pkh.status_seleksi !=', 5);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getJumlahHasilSeleksi($nik){
		$this->db->where('nik',$nik);
		$this->db->from('tb_inputpkh');
		return $this->db->count_all_results();
	}

	public function getHasilSeleksi($nik){
		$this->db->select('user.nama,user.no_kk,user.alamat,user.tempat_lahir,user.tanggal_lahir,pkh.*');
		$this->db->from('tb_inputpkh as pkh');
		$this->db->join('tb_user as user', 'pkh.nik = user.nik','inner');
		// $this->db->where('pkh.status_seleksi',0);		
		$this->db->where('pkh.nik',$nik);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getHasilSeleksiByIdPKH($id){
		$this->db->select('user.nama,user.no_kk,user.alamat,user.tempat_lahir,user.tanggal_lahir,user.jeniskelamin,pkh.*');
		$this->db->from('tb_inputpkh as pkh');
		$this->db->join('tb_user as user', 'pkh.nik = user.nik','inner');
		$this->db->where('pkh.id_pkh',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cetakByIdPKH($id){
		$this->db->select('user.nama,user.no_kk,user.alamat,user.tempat_lahir,user.tanggal_lahir,user.jeniskelamin,pkh.*,pengelola.nama as nama_admin,pengelola.username as jabatan_admin');
		$this->db->from('tb_inputpkh as pkh');
		$this->db->join('tb_user as user', 'pkh.nik = user.nik','inner');	
		$this->db->join('tb_pengelola as pengelola', 'pkh.id_admin = pengelola.id_user','inner');
		// $this->db->where('pkh.status_seleksi',0);		
		$this->db->where('pkh.id_pkh',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function inputStatus($id,$status,$id_admin){
		$this->db->set('status_seleksi',$status);
		$this->db->set('id_admin',$id_admin);
		$this->db->where('id_pkh',$id);
		$this->db->update('tb_inputpkh');
	}

	public function updateData($id,$data){
		$this->db->where('id_pkh',$id);
		$this->db->update('tb_inputpkh',$data);
	}
}
