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
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Role Akses"></div>
        <?= $this->session->flashdata('message'); ?>
        <h5>Role : <?= $role['role']; ?></h5>
        <div class="row">
        	<div class="col-lg-6">
        		<table class="table table-hover">
        			<thead>
        				<tr>
        					<th scope="col">#</th>
        					<th scope="col">Menu</th>
        					<th scope="col">Access</th>
        				</tr>
        			</thead>
        			<tbody>
    					<?php $no=1; ?>
        				<?php foreach ($menu as $m): ?>
            				<tr>
            					<th scope="row"><?= $no ?></th>
            					<td><?= $m['menu'] ?></td>
            					<td>
                                    <div class="form-check">
                                        <input class="form-check-input akses_role" type="checkbox" <?= check_access($role['id'], $m['id']) ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                                    </div>
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