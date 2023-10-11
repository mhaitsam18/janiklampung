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
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Pengaturan"></div>
        <?= $this->session->flashdata('message'); ?>
        <div class="card text-left">
			<div class="card-header">
				<?= $konten['header'] ?>
			</div>
			<div class="card-body">
				<h5 class="card-title"><?= $konten['title'] ?></h5>
				<p class="card-text"><?= $konten['content'] ?></p>
			</div>
			<div class="card-footer text-muted">
				-<?= $konten['footer'] ?>
			</div>
		</div>
    
    </section>
</div>