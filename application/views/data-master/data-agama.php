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
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Agama"></div>
		<?= form_error('agama','<div class="alert alert-danger" role="alert">','</div>'); ?>
		<div class="row">
			<div class="col-lg-6">
				<a href="" class="btn btn-primary mb-3 newAgamaModalButton" data-toggle="modal" data-target="#newAgamaModal">Add New Religion</a>
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Agama</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; ?>
						<?php foreach ($agama as $key): ?>
							<tr>
								<th scope="row"><?= $no ?></th>
								<td><?= $key['agama'] ?></td>
								<td>
									<a href="<?= base_url("DataMaster/updateAgama/$key[id_agama]"); ?>" class="badge bg-success updateAgamaModalButton" data-toggle="modal" data-target="#newAgamaModal" data-id="<?=$key['id_agama']?>">Edit</a>
									<a href="<?= base_url("DataMaster/deleteAgama/$key[id_agama]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="Agama">Delete</a>
								</td>
							</tr>
							<?php $no++; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<!-- Modal -->
<div class="modal fade" id="newAgamaModal" tabindex="-1" aria-labelledby="newAgamaModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newAgamaModalLabel">Add New Religion</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/agama') ?>" method="post">
				<input type="hidden" name="id_agama" id="id_agama">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" id="agama" name="agama" placeholder="Religion">
						<?= form_error('agama','<small class="text-danger pl-3">','</small>'); ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>