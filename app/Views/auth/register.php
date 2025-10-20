<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Register | Service Booking System<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h3 class="card-title text-center mb-4">Create an Account</h3>

                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('/register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= old('name') ?>">
                        <?php if (isset($errors['name'])): ?>
                            <div class="text-danger"><?= $errors['name'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= old('email') ?>">
                        <?php if (isset($errors['email'])): ?>
                            <div class="text-danger"><?= $errors['email'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Role</label>
                        <select name="role" class="form-select">
                            <option value="">Select role</option>
                            <option value="customer">Customer</option>
                            <option value="staff">Staff</option>
                        </select>
                        <?php if (isset($errors['role'])): ?>
                            <div class="text-danger"><?= $errors['role'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <?php if (isset($errors['password'])): ?>
                            <div class="text-danger"><?= $errors['password'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="pass_confirm" class="form-control">
                        <?php if (isset($errors['pass_confirm'])): ?>
                            <div class="text-danger"><?= $errors['pass_confirm'] ?></div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>


                <p class="text-center mt-3">
                    Already have an account? <a href="<?= site_url('login') ?>">Login here</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
