
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <!-- <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a> -->
                <a href="<?= base_url() ?>"><img src="<?= base_url('assets/images/logo/logo.png') ?>" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Sign Up</h1>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>
            <?= $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url('auth/registration') ?>">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control  form-control-xl" id="name" name="name" placeholder="Full Name" value="<?= set_value('name') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('name','<small class="text-danger pl-3">','</small>') ?>
                </div>
                
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control  form-control-xl" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('email','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control  form-control-xl" id="username" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('username','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <select class="form-control" name="gender" id="gender">
                        <option value="" disabled selected>Select Gender</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('gender','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control  form-control-xl" id="place_of_birth" name="place_of_birth" placeholder="Place of Birth" value="<?= set_value('place_of_birth') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('place_of_birth','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="date" class="form-control  form-control-xl" id="birthday" name="birthday" placeholder="Birth Day" value="<?= set_value('birthday') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('birthday','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="number" class="form-control  form-control-xl" id="phone_number" name="phone_number" placeholder="Phone Number" value="<?= set_value('phone_number') ?>">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('phone_number','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <textarea class="form-control  form-control-xl" id="address" name="address" rows="3" placeholder="Address"><?= set_value('address') ?></textarea>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('address','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <select class="form-control" name="religion_id" id="religion_id">
                        <option value="">Select Religion</option>
                        <?php foreach ($agama as $row): ?>
                            <option value="<?= $row['id_agama'] ?>"><?= $row['agama'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <?= form_error('religion_id','<small class="text-danger pl-3">','</small>') ?>
                </div>
                <!-- <div class="form-group position-relative has-icon-left mb-4">
                    <select class="form-control" name="role_id" id="role_id">
                        <option value="">Select Role</option>
                        <?php foreach ($user_role as $row): ?>
                            <option value="<?= $row['id'] ?>"><?= ucwords($row['role']) ?></option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('role_id','<small class="text-danger pl-3">','</small>') ?>
                </div> -->
                <div class="form-group position-relative has-icon-left mb-4 row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control  form-control-xl"
                            id="password1" name="password1" placeholder="Password">
                        <?= form_error('password1','<small class="bi bi-shield-lockdanger pl-3">','</small>') ?>
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control  form-control-xl"
                            id="password2" name="password2" placeholder="Repeat Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        <?= form_error('password2','<small class="text-danger pl-3">','</small>') ?>
                    </div>
                </div>
                <button typer="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                    Register Account
                </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="<?= base_url('auth'); ?>" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>
