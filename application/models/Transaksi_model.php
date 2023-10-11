<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
	public function getBebanById($id_beban)
	{
		return $this->db->get_where('beban', ['id_beban' => $id_beban])->row_array();
	}
}