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
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Data Master"></div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($dataMaster as $key): ?>
                <?php if ($key['id']!=10): ?>
                    <div class="card mb-3 mr-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $key['title'] ?></h5>
                            <a href="<?= base_url("$key[url]") ?>" class="card-link">Detail</a>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
        </div>

    </section>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->