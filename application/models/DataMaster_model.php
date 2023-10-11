<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_model extends CI_Model {

	public function getAgamaById($id)
	{
		return $this->db->get_where('agama', ['id_agama' => $id])->row_array();
	}
	public function getKontenById($id)
	{
		return $this->db->get_where('content', ['id_content' => $id])->row_array();
	}
	public function getkurirById($id)
	{
		return $this->db->get_where('kurir', ['id_kurir' => $id])->row_array();
	}
	public function getKategoriById($id)
	{
		return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
	}
	public function getMetodeBayarById($id)
	{
		return $this->db->get_where('metode_bayar', ['id_metode_bayar' => $id])->row_array();
	}
	public function getRekeningById($id)
	{
		return $this->db->get_where('rekening', ['id_rekening' => $id])->row_array();
	}
	
}