<?= $this->extend('layouts/app') ?>
<?= $this->section('title') ?>Login | Service Booking System<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h3>Login</h3>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="text-center mt-3">
        Don't have an account? <a href="<?= site_url('register') ?>">Register here</a>
    </p>
</div>
<?= $this->endSection() ?>
