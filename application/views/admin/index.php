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
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Dashboard"></div>
		<div class="card text-left">
			<div class="card-header">
				<?= $dashboard['header'] ?>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?= $dashboard['title'] ?></h5>
				<p class="card-text"><?= $dashboard['content'] ?></p>
				<a href="<?= base_url('DataMaster/dashboard'); ?>" class="btn btn-primary">Edit Dashboard</a>
			</div>
			<div class="card-footer text-muted">
				-<?= $dashboard['footer'] ?>
			</div>
		</div>
	</section>
	<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->