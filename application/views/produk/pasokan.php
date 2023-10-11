<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>
<div class="page-heading">
    <h3><?= $title ?></h3>
</div>
<div class="page-content">
    <section class="row">
        <?= $this->session->flashdata('message'); ?>
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Pasokan"></div>
        <div class="col-lg-12">
			<h3 class="h3 mt-5">Riwayat Penyetokan Produk</h3>
			<a href="<?= base_url('Produk/produk') ?>" class="btn btn-sm btn-info">Tambah Stok Produk</a>
			<table class="table table-bordered" style="background-color: white;" id="dataTable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Pemasok</th>
						<th scope="col">Nama Petugas</th>
						<th scope="col">Kode Produk</th>
						<th scope="col">Nama Produk</th>
						<th scope="col">Jumlah</th>
						<th scope="col">Harga</th>
						<th scope="col">Sub Total</th>
						<th scope="col">Waktu Transaksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; ?>
					<?php foreach ($pasokan as $row): ?>
						<tr>
							<th scope="row"><?= ++$no ?></th>
							<td><?= $row['pemasok'] ?></td>
							<td><?= $row['name'] ?></td>
							<td><?= $row['kode_produk'] ?></td>
							<td><?= $row['nama_produk'] ?></td>
							<td><?= $row['jumlah'] ?></td>
							<td><?= 'Rp.'.number_format(($row['sub_total_harga']/$row['jumlah']),2,',','.') ?></td>
							<td><?= 'Rp.'.number_format($row['sub_total_harga'],2,',','.') ?></td>
							<td><?= $row['waktu_transaksi'] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>
</div>
