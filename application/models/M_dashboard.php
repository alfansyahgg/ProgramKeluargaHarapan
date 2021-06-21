<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_dashboard extends CI_Model {

    function getDetailAkun($nik){
        // $this->db->where('nik',$nik);
        // return $this->db->get('tb_user')->result_array();
        // $query  = $this->db->query($sql);
        // return $query->result_array();
        $this->db->select('user.nama,user.nik,user.no_kk,user.no_hp,user.alamat,user.jeniskelamin,user.tempat_lahir,user.tanggal_lahir,pkh.status_seleksi');
        $this->db->from('tb_user as user');
        $this->db->join('tb_inputpkh as pkh', 'pkh.nik = user.nik','left');
        $this->db->where('user.nik',$nik);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getDetailAdmin($username){
        $sql    = "SELECT * from tb_pengelola where username = '$username' ";
        $query  = $this->db->query($sql);
        return $query->result_array();
    }

    function changePassword($username,$password,$nama){
        $sql = "update tb_pengelola set nama='$nama' ,password=md5('$password') , password_changed=1 where username = '$username' ";
        $query = $this->db->query($sql);
    }

    function updateDataDiri($nik,$data){
        $this->db->where('nik', $nik);
        $this->db->update('tb_user',$data);
    }
    
}