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
        <?= form_error('kurir','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Kurir"></div>
        <div class="row">
        	<div class="col-lg-6">
    		  <a href="" class="btn btn-primary mb-3 newKurirModalButton" data-toggle="modal" data-target="#newKurirModal">Tambah Kurir</a>
            	<table class="table table-hover">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
                            <th scope="col">Kurir</th>
        					<th scope="col">Action</th>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=1; ?>
        				<?php foreach ($kurir as $key): ?>
            				<tr>
            					<th scope="row"><?= $no ?></th>
                                <td><?= $key['kurir'] ?></td>
            					<td>
            						<a href="<?= base_url("DataMaster/updateKurir/$key[id_kurir]"); ?>" class="badge bg-success updateKurirModalButton" data-toggle="modal" data-target="#newKurirModal" data-id="<?=$key['id_kurir']?>">Edit</a>
            						<a href="<?= base_url("DataMaster/deleteKurir/$key[id_kurir]"); ?>" class="badge bg-danger tombol-hapus" data-hapus="Kurir">Delete</a>
            					</td>
            				</tr>
            			<?php $no++; ?>
        				<?php endforeach ?>
        			</tbody>
        		</table>
        	</div>
        </div>

    </section>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newKurirModal" tabindex="-1" aria-labelledby="newKurirModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newKurirModalLabel">Tambah Kurir</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('DataMaster/Kurir') ?>" method="post">
				<input type="hidden" name="id_kurir" id="id_kurir">
    			<div class="modal-body">
    				<div class="form-group">
    					<input type="text" class="form-control" id="kurir" name="kurir" placeholder="Kurir">
                        <?= form_error('kurir','<small class="text-danger pl-3">','</small>'); ?>
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

