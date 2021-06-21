<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daftar extends CI_Model {


	public function inputData($data)
	{
		return $this->db->insert('tb_user',$data);
	}
}
