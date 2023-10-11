<div class="row h-100">
	<div class="col-lg-5 col-12">
		<div id="auth-left">
			<div class="auth-logo">
				<a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo/logo.png') ?>" alt="Logo"></a>
			</div>
			<h1 class="auth-title">Log in.</h1>
			<p class="auth-subtitle mb-5">Silahkan Log in</p>
			<form action="<?= base_url('auth/') ?>" method="post">
				<div class="form-group position-relative has-icon-left mb-4">
					<input type="text" class="form-control form-control-xl <?= (form_error('username')) ? "is-invalid" : '' ?>" name="username" id="username" placeholder="Username">
					<div class="form-control-icon">
						<i class="bi bi-person"></i>
					</div>
					<?= form_error('username','<div class="invalid-feedback">','</div>') ?>
				</div>
				<div class="form-group position-relative has-icon-left mb-4">
					<input type="password" class="form-control form-control-xl <?= (form_error('password')) ? "is-invalid" : '' ?>" name="password" id="password" placeholder="Password">
					<div class="form-control-icon">
						<i class="bi bi-shield-lock"></i>
					</div>
					<?= form_error('password','<div class="invalid-feedback">','</div>') ?>
				</div>
				<div class="form-check form-check-lg d-flex align-items-end">
					<input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
					<label class="form-check-label text-gray-600" for="flexCheckDefault">
						Keep me logged in
					</label>
				</div>
				<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
			</form>
			<div class="text-center mt-5 text-lg fs-4">
				<p class="text-gray-600">Don't have an account? <a href="<?= base_url('Auth/registration') ?>" class="font-bold">Sign up</a>.</p>
				<p><a class="font-bold" href="<?= base_url('auth/forgotPassword') ?>">Forgot password?</a>.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-7 d-none d-lg-block">
		<div id="auth-right">
		</div>
	</div>
</div>