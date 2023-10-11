<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		is_logged_in();
		$this->load->library('form_validation');
		$this->load->model('Produk_model');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = "Beranda";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['dashboard'] = $this->db->get('dashboard')->row_array();
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/sidebar', $data);
		$this->load->view('produk/index', $data);
		$this->load->view('layouts/footer');
	}

	public function produk()
	{
		$data['title'] = "Data Produk";
		$this->db->select('*, produk.id_produk AS pid');
		$this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori');
		$data['produk'] = $this->db->get('produk')->result_array();
		$data['kategori'] = $this->db->get('kategori')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('kode_produk', 'Product Code', 'trim|required');
		$this->form_validation->set_rules('nama_produk', 'Product Code', 'trim|required');
		$this->form_validation->set_rules('merk', 'Brand', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'Category ID', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stock', 'trim|required');
		$this->form_validation->set_rules('harga', 'Price', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Unit', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Description', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/header', $data);
			$this->load->view('layouts/sidebar', $data);
			$this->load->view('produk/produk', $data);
			$this->load->view('layouts/footer');
		} else{
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
				$config['upload_path'] = './assets/img/produk';
				$config['max_size']     = '180000';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$new_image = $this->upload->data('file_name');
					$this->db->insert('produk', [
						'kode_produk' => htmlspecialchars($this->input->post('kode_produk', true)),
						'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
						'merk' => htmlspecialchars($this->input->post('merk', true)),
						'id_kategori' => htmlspecialchars($this->input->post('id_kategori', true)),
						'stok' => htmlspecialchars($this->input->post('stok', true)),
						'harga' => htmlspecialchars($this->input->post('harga', true)),
						'satuan' => htmlspecialchars($this->input->post('satuan', true)),
						'deskripsi' => $this->input->post('deskripsi'),
						'gambar' => $new_image
					]);
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
						New Product Added!
						</div>');
				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
				}
				redirect('Produk/produk');
			}
		}
	}

	public function terjual($bulan = null)
	{
		$data['title'] = "Produk Terjual";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*, pesanan.id_pesanan AS idp');
		$this->db->join('checkout', 'checkout.id_checkout = pesanan.id_checkout');
		$this->db->join('user', 'checkout.id_user = user.id');
		$this->db->join('produk', 'produk.id_produk = pesanan.id_produk');
		if ($bulan) {
			$y = explode("-", $bulan);
			$this->db->where("MONTH(waktu_pemesanan)", $y[0]);
			$this->db->where("YEAR(waktu_pemesanan)", $y[1]);
		}
		$data['pesanan'] = $this->db->get_where('pesanan',['checkout.status !=' => 'Pesanan dibatalkan'])->result_array();


		$this->db->select('*, transaksi.id_transaksi AS idt');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->join('user', 'transaksi.id_kasir = user.id');
		if ($bulan) {
			$data['print_by_bulan'] = $bulan;
			$y = explode("-", $bulan);
			$this->db->where("MONTH(waktu_transaksi)", $y[0]);
			$this->db->where("YEAR(waktu_transaksi)", $y[1]);
		} else{
			$data['print_by_bulan'] = null;
		}
		$this->db->order_by('idt','DESC');
		$data['transaksi'] = $this->db->get('transaksi')->result_array();

		$this->db->distinct();
		$this->db->select("CONCAT(MONTH(waktu_transaksi),'-',YEAR(waktu_transaksi)) AS bulan");
		$data['bulan'] = $this->db->get('transaksi')->result_array();
		
		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/sidebar', $data);
		$this->load->view('produk/produk-terjual', $data);
		$this->load->view('layouts/footer');
	}

	public function deleteProduk($id_produk)
	{
		$this->db->delete('produk', ['id_produk' => $id_produk]);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Product Deleted!
			</div>');
		redirect('Produk/produk');
	}

	public function updateProduk()
	{
		$this->form_validation->set_rules('nama_produk', 'Product Name', 'trim|required');
		$produk = $this->db->get_where('produk', ['id_produk' => $this->input->post('id_produk')])->row_array();
		if ($this->form_validation->run() == false) {
			redirect('Produk/produk');
		} else{
			$upload_image = $_FILES['gambar']['name'];
			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|svg';
				$config['upload_path'] = './assets/img/produk';
				$config['max_size']     = '2048';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					$old_image = $produk['gambar'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/img/produk/'.$old_image);
					} 
					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'.$this->upload->display_errors().'</div>');
					redirect('Produk/produk');
				}
			}
			$this->db->where('id_produk', $this->input->post('id_produk'));
			$this->db->update('produk', [
				'kode_produk' => $this->input->post('kode_produk'),
				'nama_produk' => $this->input->post('nama_produk'),
				'merk' => $this->input->post('merk'),
				'id_kategori' => $this->input->post('id_kategori'),
				'stok' => $this->input->post('stok'),
				'harga' => $this->input->post('harga'),
				'satuan' => $this->input->post('satuan'),
				'deskripsi' => $this->input->post('deskripsi')
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Product Updated!
				</div>');
			redirect('Produk/produk');
		}
	}
	public function printLaporan($bulan = null)
	{
		$data['title'] = "Produk Terjual";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->select('*, pesanan.id_pesanan AS idp');
		$this->db->join('checkout', 'checkout.id_checkout = pesanan.id_checkout');
		$this->db->join('user', 'checkout.id_user = user.id');
		$this->db->join('produk', 'produk.id_produk = pesanan.id_produk');
		if ($bulan) {
			$y = explode("-", $bulan);
			$this->db->where("MONTH(waktu_pemesanan)", $y[0]);
			$this->db->where("YEAR(waktu_pemesanan)", $y[1]);
		}
		$data['pesanan'] = $this->db->get_where('pesanan',['checkout.status !=' => 'Pesanan dibatalkan'])->result_array();


		$this->db->select('*, transaksi.id_transaksi AS idt');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->join('user', 'transaksi.id_kasir = user.id');
		if ($bulan) {
			$data['print_by_bulan'] = $bulan;
			$y = explode("-", $bulan);
			$this->db->where("MONTH(waktu_transaksi)", $y[0]);
			$this->db->where("YEAR(waktu_transaksi)", $y[1]);
		}
		$data['transaksi'] = $this->db->get('transaksi')->result_array();
		$this->load->view('layouts/header', $data);
		$this->load->view('produk/print-laporan', $data);
		$this->load->view('layouts/footer');
	}
	
	public function getUpdateProduk(){
		echo json_encode($this->Produk_model->getProdukById($this->input->post('id')));
	}

	public function labaRugi()
	{
		$data['title'] = "Laporan Bulanan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$transaksi_hari_ini = [
			'DATE(waktu_transaksi)' => date('Y-m-d')
		];
		$transaksi_bulan_ini = [
			'MONTH(waktu_transaksi)' => date('m'),
			'YEAR(waktu_transaksi)' => date('Y')
		];
		$transaksi_tahun_ini = [
			'YEAR(waktu_transaksi)' => date('Y')
		];
		$pemesanan_hari_ini = [
			'DATE(waktu_pemesanan)' => date('Y-m-d')
		];
		$pemesanan_bulan_ini = [
			'MONTH(waktu_pemesanan)' => date('m'),
			'YEAR(waktu_pemesanan)' => date('Y')
		];
		$pemesanan_tahun_ini = [
			'YEAR(waktu_pemesanan)' => date('Y')
		];
		// $this->db->select('SUM(sub_total_harga) AS total');
		// $data['sum_beli_today'] = $this->db->get_where('pasokan', $transaksi_hari_ini)->row_array();
		// $this->db->select('SUM(sub_total_harga) AS total');
		// $data['sum_beli_month'] = $this->db->get_where('pasokan', $transaksi_bulan_ini)->row_array();
		// $this->db->select('SUM(sub_total_harga) AS total');
		// $data['sum_beli_year'] = $this->db->get_where('pasokan', $transaksi_tahun_ini)->row_array();
		
		// $this->db->select('SUM(sub_total_harga) AS total, DATE(waktu_transaksi) AS hari');
		// $this->db->group_by('DATE(waktu_transaksi)');
		// $data['sum_beli_dayly'] = $this->db->get('pasokan')->result_array();
		// $this->db->select('SUM(sub_total_harga) AS total, MONTH(waktu_transaksi) AS bulan, YEAR(waktu_transaksi) AS tahun, waktu_transaksi');
		// $this->db->group_by('MONTH(waktu_transaksi)');
		// $data['sum_beli_monthly'] = $this->db->get('pasokan')->result_array();
		// $this->db->select('SUM(sub_total_harga) AS total, YEAR(waktu_transaksi) AS tahun');
		// $this->db->group_by('YEAR(waktu_transaksi)');
		// $data['sum_beli_annual'] = $this->db->get('pasokan')->result_array();


		$this->db->select('SUM(total_harga) AS total');
		$data['sum_jual_today'] = $this->db->get_where('checkout', $pemesanan_hari_ini)->row_array();
		$this->db->select('SUM(total_harga) AS total');
		$data['sum_jual_month'] = $this->db->get_where('checkout', $pemesanan_bulan_ini)->row_array();
		$this->db->select('SUM(total_harga) AS total');
		$data['sum_jual_year'] = $this->db->get_where('checkout', $pemesanan_tahun_ini)->row_array();
		
		$this->db->select('SUM(total_harga) AS total, DATE(waktu_pemesanan) AS hari');
		$this->db->group_by('DATE(waktu_pemesanan)');
		$data['sum_jual_dayly'] = $this->db->get('checkout')->result_array();
		$this->db->select('SUM(total_harga) AS total, MONTH(waktu_pemesanan) AS bulan, YEAR(waktu_pemesanan) AS tahun, waktu_pemesanan');
		$this->db->group_by('MONTH(waktu_pemesanan)');
		$data['sum_jual_monthly'] = $this->db->get('checkout')->result_array();
		$this->db->select('SUM(total_harga) AS total, YEAR(waktu_pemesanan) AS tahun');
		$this->db->group_by('YEAR(waktu_pemesanan)');
		$data['sum_jual_annual'] = $this->db->get('checkout')->result_array();


		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_jual_today_offline'] = $this->db->get_where('transaksi', $transaksi_hari_ini)->row_array();
		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_jual_month_offline'] = $this->db->get_where('transaksi', $transaksi_bulan_ini)->row_array();
		$this->db->select('SUM(sub_total_harga) AS total');
		$data['sum_jual_year_offline'] = $this->db->get_where('transaksi', $transaksi_tahun_ini)->row_array();
		
		$this->db->select('SUM(sub_total_harga) AS total, DATE(waktu_transaksi) AS hari');
		$this->db->group_by('DATE(waktu_transaksi)');
		$data['sum_jual_dayly_offline'] = $this->db->get('transaksi')->result_array();
		$this->db->select('SUM(sub_total_harga) AS total, MONTH(waktu_transaksi) AS bulan, YEAR(waktu_transaksi) AS tahun, waktu_transaksi');
		$this->db->group_by('MONTH(waktu_transaksi)');
		$data['sum_jual_monthly_offline'] = $this->db->get('transaksi')->result_array();
		$this->db->select('SUM(sub_total_harga) AS total, YEAR(waktu_transaksi) AS tahun');
		$this->db->group_by('YEAR(waktu_transaksi)');
		$data['sum_jual_annual_offline'] = $this->db->get('transaksi')->result_array();

		$this->db->select('SUM(sub_total_harga) AS total');
		$profit_offline = $this->db->get('transaksi')->row_array();

		$this->db->select('SUM(total_harga) AS total');
		$profit_online = $this->db->get('checkout')->row_array();

		// $this->db->select('SUM(sub_total_harga) AS total');
		// $loss_modal = $this->db->get('pasokan')->row_array();


		// $profit = $profit_offline['total'] + $profit_online['total'];

		// $hasil = $profit - $loss_modal['total'];

		// $data['persentase_hasil'] = $hasil/$loss_modal['total']*100;

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/sidebar', $data);
		$this->load->view('produk/laba-rugi', $data);
		$this->load->view('layouts/footer');
	}

	public function pasokProduk($id = '', $rowid = '', $pemasok='')
	{
		if (!$this->session->userdata('cart_supply', 'cart_supply')) {
			$this->session->unset_userdata('cart_checkout');
			$this->session->set_userdata('cart_supply', 'cart_supply');
			$this->cart->destroy();
		}
		$produk = $this->Produk_model->getProdukById($id);
		$id = $this->input->post('pasok_id');
		$name = $this->input->post('pasok_nama_produk');
		$qty = $this->input->post('pasok_stok');
		$price = $this->input->post('pasok_harga_beli');
		$gambar = $this->input->post('gambar');
		$pemasok = $this->input->post('pasok_pemasok');
		// if ($this->input->post('save')) {
		// } elseif($produk){
		// 	$id = $produk['id'];
		// 	$name = $produk['nama_produk'];
		// 	$qty = 1;
		// 	$price = $produk['harga_beli'];
		// 	$gambar = $produk['gambar'];
		// } else{
		// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
		// 		Data produk Tidak Valid!
		// 		</div>');
		// 	redirect('produk/produk');
		// }
		$data = array(
	        'id'      => $id,
	        'qty'     => $qty,
	        'price'   => $price,
	        'name'    => $name,
	        'gambar'    => $gambar,
	        'pemasok'    => $pemasok
    	);
    	$this->cart->insert($data);
    	redirect('produk/produk');
	}


	public function kurangPasokan($rowid, $qty)
	{
		$data = array(
	        'rowid' => $rowid,
	        'qty'   => ($qty-1)
	    );
		$this->cart->update($data);
    	redirect('produk/produk');
	}
	public function tambahPasokan($rowid, $qty)
	{
		$data = array(
	        'rowid' => $rowid,
	        'qty'   => ($qty+1)
	    );
		$this->cart->update($data);
    	redirect('produk/produk');
	}
	public function bersihkanPasokan()
	{
		$this->cart->destroy();
		$this->session->unset_userdata('cart_supply');
    	redirect('produk/produk');
	}

	public function hapusItem($rowid)
	{
		$this->cart->remove($rowid);
    	redirect('produk/produk');
	}

	public function pasokan()
	{
		$data['title'] = "Pasokan";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->join('user', 'user.id = pasokan.id_petugas');
		$this->db->join('produk', 'produk.id = pasokan.id_produk');
		$data['pasokan'] = $this->db->get('pasokan')->result_array();

		$this->load->view('layouts/header', $data);
		$this->load->view('layouts/sidebar', $data);
		$this->load->view('produk/pasokan', $data);
		$this->load->view('layouts/footer');
	}
	public function supply()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id_petugas = $data['user']['id'];
		foreach ($this->cart->contents() as $item) {
			$data = array(
				'pemasok' => $item['pemasok'],
				'id_petugas' => $id_petugas,
				'id_produk' => $item['id'],
				'jumlah' => $item['qty'],
				'sub_total_harga' => $item['subtotal'],
				'waktu_transaksi' => date("Y-m-d H:i:s")
			);
			$this->db->insert('pasokan', $data);
			$produk = $this->db->get_where('produk',['id' => $item['id']])->row_array();
			$new_stok = $produk['stok'] + $item['qty'];
			$this->db->where('id', $item['id']);
			$this->db->update('produk',['stok' => $new_stok]);
		}
		$this->cart->destroy();
		$this->session->unset_userdata('cart_supply');
		$this->session->set_flashdata('flash', 'Stok Berhasil ditambahkan');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Stok Berhasil ditambahkan
			</div>');
		redirect("produk/produk/");
	}

}