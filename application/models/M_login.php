<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login extends CI_Model {

    function getAkunPengelola(){
        $sql    = "SELECT * from tb_pengelola";
        $query  = $this->db->query($sql);
        return $query->result_array();
    }
    
    function loginPengelola($username,$password){
 
        $sql    = "SELECT * from tb_pengelola where username='$username' and password=md5('$password') ";
        $query  = $this->db->query($sql);
        return $query->result_array();
    }
 
    function loginWarga($username,$password){
 
        $sql    = "SELECT * from tb_user where nik='$username' and password=md5('$password') ";
        $query  = $this->db->query($sql);
        return $query->result_array();
    }
}