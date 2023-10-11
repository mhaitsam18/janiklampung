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
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Status Pembayaran"></div>
        <div class="col-lg-12">
			<h3 class="h3 mt-5">Pembayaran Customer</h3>
			<table class="table table-responsive" style="background-color: white;" id="dataTable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama Pelanggan</th>
						<th scope="col">Kode Bayar</th>
						<th scope="col">Rekening Tujuan</th>
						<th scope="col">Rekening Pengirim</th>
						<th scope="col">Bank Pengirim</th>
						<th scope="col">Atas Nama Pengirim</th>
						<th scope="col">Waktu Transfer</th>
						<th scope="col">Nominal Transfer</th>
						<th scope="col">Bukti Pembayaran</th>
						<th scope="col">Catatan</th>
						<th scope="col">Status</th>
						<th scope="col" style="max-width: 150px; min-width: 90px;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=0; ?>
					<?php foreach ($bukti_pembayaran_paket as $row): ?>
						<tr>
							<th scope="row"><?= ++$no ?></th>
							<td><?= $row['name'] ?></td>
							<td><?= $row['kode_bayar'] ?></td>
							<td><?= $row['no_rekening'] ?></td>
							<td><?= $row['rekening_pengirim'] ?></td>
							<td><?= $row['bank_pengirim'] ?></td>
							<td><?= $row['nama_pengirim'] ?></td>
							<td><?= $row['waktu_transfer'] ?></td>
							<td><?= 'Rp.'.number_format($row['nominal_transfer'],2,',','.') ?></td>
							<td>
								<?php 
								if(file_exists("./assets/img/bukti_pembayaran/$row[bukti_pembayaran]")){
                        			$base_bukti_pembayaran = base_url("assets/img/bukti_pembayaran/$row[bukti_pembayaran]");
                        		}else{
                        			$base_bukti_pembayaran = base_url2("assets/img/bukti_pembayaran/$row[bukti_pembayaran]");
                        		}
								 ?>
								<a href="<?=$base_bukti_pembayaran ?>" title="<?= $row['bukti_pembayaran'] ?>">
									<img src="<?=$base_bukti_pembayaran ?>" class="img-thumbnail" style="width: 120px;">
								</a>
							</td>
							<td><?= $row['catatan'] ?></td>
							<td><?= $row['sbt'] ?></td>
							<td>
								<?php if ($row['sbt'] == 'Belum dikonfirmasi'): ?>
									<a href="#" class="badge bg-danger" data-toggle="modal" data-target="#catatanModal<?= $row['idbt'] ?>">Tidak Valid</a>
									<a href="<?= base_url('Transaksi/updateStatusPembayaranPaket/').$row['idbt'].'/valid' ?>" class="badge bg-success" onclick="return confirm('Are you sure?');">Valid</a>
								<?php else: ?>
									<span class="badge bg-secondary">Sudah dikonfirmasi</span>
								<?php endif ?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>
</div>

<?php foreach ($bukti_pembayaran_paket as $row): ?>
	
	<!-- Modal -->
	<div class="modal fade" id="catatanModal<?= $row['idbt'] ?>" tabindex="-1" aria-labelledby="catatanModalLabel<?= $row['idbt'] ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="catatanModalLabel<?= $row['idbt'] ?>">Catatan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('Transaksi/updateStatusPembayaranPaket/').$row['idbt'].'/tidak valid' ?>" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="catatan">Catatan</label>
							<textarea class="form-control" name="catatan" id="catatan"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Kirim Catatan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach ?>