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
    	<div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>" data-objek="Kata Sandi"></div>
    		<form action="<?= base_url('user/changePassword') ?>" method="post">
    			<div class="form-group">
    				<label for="current_password">Current Password</label>
    				<input type="password" class="form-control" id="current_password" name="current_password">
    				<?= form_error('current_password','<small class="text-danger pl-3">','</small>') ?>
    			</div>
    			<div class="form-group">
    				<label for="new_password1">New Password</label>
    				<input type="password" class="form-control" id="new_password1" name="new_password1">
    				<?= form_error('new_password1','<small class="text-danger pl-3">','</small>') ?>
    			</div>
    			<div class="form-group">
    				<label for="new_password2">Repeat Password</label>
    				<input type="password" class="form-control" id="new_password2" name="new_password2">
    				<?= form_error('new_password2','<small class="text-danger pl-3">','</small>') ?>
    			</div>
    			<div class="form-group">
    				<button type="submit" class="btn btn-primary">
    					Change Password
    				</button>
    			</div>
    			
    		</form>
    	</div>
    </section>
</div>

    